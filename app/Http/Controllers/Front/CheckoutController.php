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
        }else{
            // $price = $stripe->prices->create(
            //     [
            //     'product' => $items->product->stripe_product_id,
            //     'unit_amount' => $items->price * 100,
            //     'currency' => 'USD',
            //     ]
            //     );
        }

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
        }

        // $payment = $this->Payment($request->token,$order->id);
        $payment = $this->onetimepayment($request->token,$order->id);
        // if($payment == true){
        //     echo '<pre>';
        //     echo 'Done:';
        //     echo '<br>';
        //     print_r($ordermeta);
        // }else{
        //     echo '<pre>';
        //     print_r($ordermeta);
        // }
    }

    protected function Payment($token,$orderid){
        $ordermeta = OrderMeta::where('order_id',$orderid)->get();
        
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );

        $customer =  $stripe->customers->create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'payment_method' => $token,
            'invoice_settings' => [
            'default_payment_method' => $token,
            ],
            'address' => [
            'line1' => '510 Townsend St',
            'postal_code' => '98140',
            'city' => 'San Francisco',
            'state' => 'CA',
            'country' => 'US',
            ],
          ]);

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
        //  echo '<pre>';
        //  print_r($mailData);
        //  die();
         $mail = Mail::to(Auth::user()->email)->send(new PaymentConfirmation($mailData)); 
         
          }
        }

        return true;
    }
    private function onetimepayment($token,$orderid){
        $orderMeta = OrderMeta::where([['order_id',$orderid],['order_type','one_time']])->get();
        if($orderMeta->isEmpty()){
        return true;
        }else{
            $totalprice = 0;
            foreach($orderMeta as $order){
                $totalprice += $order->price*$order->quantity;
            }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        

        }

    }


    protected function getinvoice($invoice_number){
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $invoice = $stripe->invoices->retrieve(
         $invoice_number,
          []
        );
        return $invoice;
    }

}
