<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\PaymentCollection;
use App\Mail\PaymentConfirmation;
use Auth;
use Mail;

class CheckoutController extends Controller
{
    public function index(){
        if(Auth::check()){
            $address = Address::where('user_id',Auth::user()->id)->first();
        }else{
            $address = null;
        }
        // $invoice = $this->getinvoice('in_1O4dUvSHFLlPQCJ7cGnVZ8Vc');
        // dd($invoice);
        $cartitems = Cart::where('user_id',Auth::user()->id)->get();
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        #################### Create setupintent ##########################
        $intent =  $stripe->setupIntents->create([
            'payment_method_types' => ['card'],
          ]);
        return view('front.checkout.index',compact('cartitems','address','intent'));
    }
    public function addresssave(Request $request){
     
        if($request->id){
            $address = Address::find($request->id);
            $address->first_name = $request->first_name;
            $address->last_name  = $request->last_name;
            $address->address = $request->address;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->region = $request->country;
            $address->zipcodes = $request->zipcodes;
            $address->mobiles = $request->phone;
            $address->user_id = Auth::user()->id;
            $address->update(); 
        }else{
            $address = new Address;
            $address->first_name = $request->first_name;
            $address->last_name  = $request->last_name;
            $address->address = $request->address;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->region = $request->country;
            $address->zipcodes = $request->zipcodes;
            $address->mobiles = $request->phone;
            $address->user_id = Auth::user()->id;
            $address->save();
        }
        return response()->json(['success'=>'Successfully saved address','address'=>$address]);        
    }

    public function paymentProcc(Request $request){

        // echo '<pre>'
        // return $request->all();
        // die();
        $user = User::find(Auth::user()->id);
        $cartitems = Cart::with('product')->where('user_id',$user->id)->get();
        $totalprice = 0;
        foreach($cartitems as $items){
            $totalprice +=  $items->price*$items->quantity;
        }
        $orderid = '#ORD_'.rand(0,10).time();
        $order = new Order;
        $order->order_id = $orderid;
        $order->customer_id = Auth::user()->id;
        $order->price = $totalprice;
        $order->discount = null;
        $order->total_price = $totalprice;
        $order->status = 0;
        $order->save();

        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $customer =  $stripe->customers->create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'payment_method' => $request->token,
            'invoice_settings' => [
            'default_payment_method' => $request->token,
            ],
            'address' => [
            'line1' => '510 Townsend St',
            'postal_code' => '98140',
            'city' => 'San Francisco',
            'state' => 'CA',
            'country' => 'US',
            ],
        ]);
        // echo '<pre>';

        // print_r($cartitems);
        // die();
        foreach($cartitems as $items){
        
        if($items->purchase_type == 'multi_time'){
            $price = $stripe->prices->create(
                [
                'product' => $items->product->stripe_product_id,
                'unit_amount' => $items->price * 100,
                'currency' => 'USD',
                'recurring' => [
                    'interval' => $items->subscription->recurring_type, // product price charge interval 
                    'interval_count' => $items->subscription->recurring_period,  // 
                ],
                ]
            );
            $ordermeta = new OrderMeta;
            $ordermeta->order_id = $order->id;
            $ordermeta->price = $items->price;
            $ordermeta->quantity = $items->quantity;
            $ordermeta->total_price = $items->price*$items->quantity;
            $ordermeta->stripe_price_id = $price->id;
            $ordermeta->order_type = $items->purchase_type;
            $ordermeta->variation_id = $items->variation_id;
            $ordermeta->product_id = $items->product_id;
            $ordermeta->save();
        }else{
            // $price = $stripe->prices->create(
            //     [
            //     'product' => $items->product->stripe_product_id,
            //     'unit_amount' => $items->price * 100,
            //     'currency' => 'USD',
            //     ]
            //     );
            $ordermeta = new OrderMeta;
            $ordermeta->order_id = $order->id;
            $ordermeta->price = $items->price;
            $ordermeta->quantity = $items->quantity;
            $ordermeta->total_price = $items->price*$items->quantity;
            $ordermeta->stripe_price_id = null;
            $ordermeta->order_type = $items->purchase_type;
            $ordermeta->variation_id = $items->variation_id;
            $ordermeta->product_id = $items->product_id;
            $ordermeta->save();
        }

        
        }

        $payment = $this->Payment($customer->id,$request->token,$order->id);
        $payment = $this->onetimepayment($customer,$request->token,$order->id);

        return redirect()->back()->with('success','Please check your email for payment confirmation');
        
    }

    protected function Payment($customer,$token,$orderid){
        $ordermeta = OrderMeta::where('order_id',$orderid)->get();
        
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );

        // $customer =  $stripe->customers->create([
        //     'name' => Auth::user()->name,
        //     'email' => Auth::user()->email,
        //     'payment_method' => $token,
        //     'invoice_settings' => [
        //     'default_payment_method' => $token,
        //     ],
        //     'address' => [
        //     'line1' => '510 Townsend St',
        //     'postal_code' => '98140',
        //     'city' => 'San Francisco',
        //     'state' => 'CA',
        //     'country' => 'US',
        //     ],
        //   ]);

          $order = Order::find($orderid);
          $order->stripe_customer_id = $customer->id;
          $order->update();

          foreach($ordermeta as $meta){
        if($meta->order_type == 'multi_time'){
          $createMembership =  $stripe->subscriptions->create([
            'customer' => $customer->id,
            'collection_method'=>'charge_automatically',
            'items' =>[
               [ 'price' => $meta->stripe_price_id,
                'quantity' => $meta->quantity,]
            ],
         ]);
        

         $invoice = $this->getinvoice($createMembership->latest_invoice);
        //  dd($invoice);
         if(!empty($invoice)){
            $payment = new PaymentCollection;
            $payment->order_id = $orderid;
            $payment->inovice_id = $createMembership->latest_invoice;
            $payment->payment_intent = $invoice->payment_intent;
            $payment->invoice_url = $invoice->hosted_invoice_url;
            $payment->invoice_pdf = $invoice->invoice_pdf;
            $payment->payment_amount = $createMembership->plan->amount / 100;
            $payment->payment_status = $createMembership->status;
            $payment->save();
         }
         $mailData = [
            'name' => Auth::user()->name,
            'invoice_url' => $payment->invoice_url,
            'invoice_pdf' => $payment->invoice_pdf,
            'payment_status' => $payment->payment_status,
         ]; 
         $mail = Mail::to(Auth::user()->email)->send(new PaymentConfirmation($mailData)); 
         
          }
        }

        return true;
    }
    private function onetimepayment($customer,$token,$orderid){
        $orderMeta = OrderMeta::where([['order_id',$orderid],['order_type','one_time']])->get();
        if($orderMeta->isEmpty()){
        return true;
        }else{
            $totalprice = 0;
            foreach($orderMeta as $order){
                $totalprice += $order->price*$order->quantity;
            }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
            // $customer =  $stripe->customers->create([
            //     'name' => Auth::user()->name,
            //     'email' => Auth::user()->email,
            //     'payment_method' => $token,
            //     'invoice_settings' => [
            //     'default_payment_method' => $token,
            //     ],
            //     'address' => [
            //     'line1' => '510 Townsend St',
            //     'postal_code' => '98140',
            //     'city' => 'San Francisco',
            //     'state' => 'CA',
            //     'country' => 'US',
            //     ],
            // ]);

            $totalAmountCents = (int)($totalprice * 100);
            $stripePaymentIntent = $stripe->paymentIntents->create([
                'customer' => $customer->id,
                'amount' => $totalAmountCents,
                'currency' => 'inr',
                'payment_method' => $token,
                'off_session' => true,
                'confirm' => true,
                'description' => 'test description',
            ]);
          if($stripePaymentIntent->status === 'succeeded'){
           $invoice = $stripe->invoices->create([
                'customer' => $customer->id,
              ]);
            $payment = new PaymentCollection;
            $payment->order_id = $orderid;
            $payment->inovice_id = $invoice->id;
            $payment->payment_intent = $stripePaymentIntent->id;
            // $payment->invoice_url = $invoice->hosted_invoice_url;
            // $payment->invoice_pdf = $invoice->invoice_pdf;
            $payment->payment_amount = $stripePaymentIntent->amount / 100;
            $payment->payment_status = $stripePaymentIntent->status;
            $payment->save();
          }

          $mailData = [
            'name' => Auth::user()->name,
            'payment_status' => $payment->payment_status,
          ];

         $mail = Mail::to(Auth::user()->email)->send(new PaymentConfirmation($mailData)); 
          return true;
        }

    }


    protected function getinvoice($invoice_number){
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $invoice = $stripe->invoices->retrieve(
         $invoice_number,
          []
        );
        
    }

    // public function test(){
    //     Stripe::setApiKey($stripeSecretKey);
    //         header('Content-Type: application/json');

    //         $YOUR_DOMAIN = 'http://localhost:4242';

    //         $checkout_session = \Stripe\Checkout\Session::create([
    //         'line_items' => [[
    //             # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    //             'price' => '{{PRICE_ID}}',
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => $YOUR_DOMAIN . '/success.html',
    //         'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
    //         ]);
    // }
}
