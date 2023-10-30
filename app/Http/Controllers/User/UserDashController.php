<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\UserSubscription;
use Auth;
class UserDashController extends Controller
{
    public function index(){
        
        return view('user.index');  
    }
    public function orders(){
        $orders = Order::where('customer_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        
        return view('user.orders',compact('orders'));
    }
    public function orderdetail($orderid){

        $order = Order::where('order_id',$orderid)->first();
        if(!$order){
            abort(404);
        }
        return view('user.orderdetail',compact('order'));
    }
    public function subscriptions(){
        $subscription = UserSubscription::where([['user_id',Auth::user()->id]])->orderBy('created_at','desc')->get();
     
        return view('user.subscriptions',compact('subscription'));
    }
    public function subscriptionsDetail($subscription_id){
        $subscription_detail = UserSubscription::where('subscription_id',$subscription_id)->first();
        
        $subscription_data = $this->getSubscriptionDetail($subscription_id);
      
        return view('user.subscriptiondetail',compact('subscription_detail','subscription_data'));
    }
    public function cancelSubscription($subscription_id){
        $subscription_detail = UserSubscription::where('subscription_id',$subscription_id)->first();
        if(!$subscription_detail){
            abort(404);
        }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $cancel_status = $stripe->subscriptions->update($subscription_id, ['cancel_at_period_end' => true]);
        return redirect()->back()->with('success','Successfully cancelled subscription');
    }
    public function pauseSubscription($subscription_id){
        $subscription_detail = UserSubscription::where('subscription_id',$subscription_id)->first();
        if(!$subscription_detail){
            abort(404);
        }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $pause_status = $stripe->subscriptions->update(
            $subscription_id,
            [
              'pause_collection' => ['behavior' => 'void'],
              'cancel_at_period_end' => true,
            ]
          );
        return redirect()->back()->with('success','Successfully paused subscription');
    }
    public function resumeSubscription($subscription_id){
        $subscription_detail = UserSubscription::where('subscription_id',$subscription_id)->first();
        if(!$subscription_detail){
            abort(404);
        }
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $resume_status = $stripe->subscriptions->update(
            $subscription_id,
            [
              'pause_collection' => '',
              'cancel_at_period_end' => false,
            ]
          );
        return redirect()->back()->with('success','Successfully resumed subsccriptions');
    }
    private function getSubscriptionDetail($subscription_id){
        $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
        $subscriptiondetail =  $stripe->subscriptions->retrieve(
            $subscription_id,
            []
          );
        return $subscriptiondetail;
    }
}
