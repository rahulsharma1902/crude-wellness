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
use App\Models\UserSubscription;
use App\Mail\PaymentConfirmation;
use App\Mail\OneTimePaymentConfirmation;
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
        // dd($invoice);
        $cartitems = Cart::where([['user_id',Auth::user()->id],['status',1]])->get();
        if($cartitems->IsEmpty()){
            abort(404);
        }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        #################### Create setupintent ##########################
        $intent =  $stripe->setupIntents->create([
            'payment_method_types' => ['card'],
          ]);
        return view('front.checkout.index',compact('cartitems','address','intent'));
    }
    public function addresssave(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcodes' => 'required',
            'phone' => 'required',
        ]);
     
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
        try{
            $user = User::find(Auth::user()->id);
            $cartitems = Cart::with('product')->where([['user_id',$user->id],['status',1]])->get();
            $totalprice = 0;
            foreach($cartitems as $items){
                $totalprice +=  $items->price*$items->quantity;
            }
            $orderid = 'ORD_'.rand(0,10).time();
            $order = new Order;
            $order->order_id = $orderid;
            $order->customer_id = Auth::user()->id;
            $order->price = $totalprice;
            $order->discount = null;
            $order->total_price = $totalprice;
            $order->status = 0;
            $order->save();
            $address = Address::where('user_id',Auth::user()->id)->first();
            // if (!$address) {
            //     return redirect()->back()->with('error', 'Failed to find your address. Please try again.');
            // }
        
            $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
            $customer =  $stripe->customers->create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'payment_method' => $request->token,
                'invoice_settings' => [
                'default_payment_method' => $request->token,
                ],
                'address' => [
                'line1' => $address->address,
                'postal_code' => $address->zipcodes,
                'city' => $address->city,
                'state' => $address->state,
                'country' => $address->country,
                ],
            ]);

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
                $ordermeta->subscription_id = $items->subscription_id;
                $ordermeta->total_price = $items->price*$items->quantity;
                $ordermeta->stripe_price_id = $price->id;
                $ordermeta->order_type = $items->purchase_type;
                $ordermeta->variation_id = $items->variation_id;
                $ordermeta->product_id = $items->product_id;
                $ordermeta->user_id = Auth::user()->id;
                $ordermeta->status = 0;
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
                $ordermeta->subscription_id = null;
                $ordermeta->stripe_price_id = null;
                $ordermeta->order_type = $items->purchase_type;
                $ordermeta->variation_id = $items->variation_id;
                $ordermeta->user_id = Auth::user()->id;
                $ordermeta->product_id = $items->product_id;
                $ordermeta->status = 0;
                $ordermeta->save();
            }
            
            }

            $payment = $this->Payment($customer,$request->token,$order->id);
            $payment = $this->onetimepayment($customer,$request->token,$order->id);
            
            $status = 1;
            foreach($order->payment as $payment){
                if($payment->payment_status == 'incomplete'){
                    $status = 0;
                }
            }
            $order->status = $status;
            $order->update();            
           
            Cart::where([['user_id', Auth::user()->id],['status',1]])->update(['status' => 2]);

        // return redirect()->back()->with('success', 'Please check your email for payment confirmation');
        return redirect('/')->with('success', 'Please check your email for payment confirmation');
        } catch (\Exception $e) {
            // Handle exceptions here
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
        
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

         
         
         

/* payment */
         $invoice = $this->getinvoice($createMembership->latest_invoice);
        //  echo '<pre>';
        //  print_r($createMembership);
        //  echo '<hr>';
        //  print_r($createMembership->status);
        //  echo '<hr>';
        //  print_r($invoice);
        //  die();
         $subscriptions = new UserSubscription;
         $subscriptions->subscription_id = $createMembership->id;
         $subscriptions->order_meta_id = $meta->id;
         $subscriptions->price_id = $meta->stripe_price_id;
         $subscriptions->user_id = Auth::user()->id;
         $subscriptions->subscription_plan_id = $meta->subscription_id;
         $subscriptions->started_on = $this->changedate($invoice->period_start);
         $subscriptions->end_on = $this->changedate($invoice->period_end); 
         $subscriptions->subscription_status = 0;
         $subscriptions->save();

         if(!empty($invoice)){
                $payment = new PaymentCollection;
                $payment->order_id = $orderid;
                $payment->order_meta_id = $meta->id;
                $payment->inovice_id = $createMembership->latest_invoice;
                $payment->payment_intent = $invoice->payment_intent;
                $payment->invoice_url = $invoice->hosted_invoice_url;
                $payment->invoice_pdf = $invoice->invoice_pdf;
                $payment->payment_type = 'Recurring';
                $payment->payment_amount = ($createMembership->plan->amount / 100) * $meta->quantity;
                $payment->payment_status = $createMembership->status;
                $payment->save();

                $order_meta_data = OrderMeta::find($meta->id);
                $order_meta_data->payment_id = $payment->id;
                $order_meta_data->reccuring_id = $createMembership->id;
                $order_meta_data->update();
            
            $mailData = [
                'name' => Auth::user()->name,
                'invoice_url' => $payment->invoice_url,
                'invoice_pdf' => $payment->invoice_pdf,
                'payment_status' => $payment->payment_status,
            ]; 
            //  echo '<pre>';
            //  print_r($mailData);
            //  die();
            try {
            $mail = Mail::to(Auth::user()->email)->send(new PaymentConfirmation($mailData)); 
            } catch (\Throwable $th) {
                //throw $th;
            }
            }
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
              /* payment */
            $payment = new PaymentCollection;
            $payment->order_id = $orderid;
            $payment->order_meta_id = null;
            $payment->inovice_id = $invoice->id;
            $payment->payment_intent = $stripePaymentIntent->id;
            $payment->payment_type = 'one_time';
            // $payment->invoice_url = $invoice->hosted_invoice_url;
            // $payment->invoice_pdf = $invoice->invoice_pdf;
            $payment->payment_amount = $stripePaymentIntent->amount / 100;
            $payment->payment_status = $stripePaymentIntent->status;
            $payment->save();

            OrderMeta::where([['order_id',$orderid],['order_type','one_time']])->update(['payment_id' => $payment->id,'status' => 1]);

          }

          $mailData = [
            'name' => Auth::user()->name,
            'payment_status' => $payment->payment_status,
          ];
          try {
          
            $mail = Mail::to(Auth::user()->email)->send(new OneTimePaymentConfirmation($mailData)); 
            //code...
            } catch (\Throwable $th) {
                //throw $th;
            }
        return true;
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
    protected function changedate($date){
        $datetime = date('Y-m-d H:i:s', $date);
        return $datetime;
    }
    
    public function test(){


        // $order = OrderMeta::get();
        // dd($order[0]->productDetails);
        // $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        // $subscriptiondetail =  $stripe->subscriptions->retrieve(
        //     'sub_1O5nDISHFLlPQCJ78T7Fidnf',
        //     []
        //   );
        //   echo '<pre>';
        //   print_r($subscriptiondetail);
        //   echo '</pre>';
                // $timestamp = 1699618301;
                // $expirationDate = date('Y-m-d H:i:s', $timestamp);
                // echo $expirationDate;

        // $subscriptions = $stripe->subscriptions->all();
        // dd($subscriptions);

    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    //     $session = \Stripe\Checkout\Session::create([
    //       'payment_method_types' => ['card'],
    //       'line_items' => [[
    //         'price' => 'price_1O4kO1SHFLlPQCJ7pxpCd8uu',
    //         'quantity' => 1,
    //       ]],
    //       'mode' => 'subscription',
    //       'success_url' => 'https://example.com/success',
    //       'cancel_url' => 'https://example.com/cancel',
    //     ]);
    //     return redirect($session->url);
    return view('test',compact('order'));
    }
}