<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\PaymentCollection;
use Auth;
class OrdersController extends Controller
{
    //customer_id
    public function index(){
        $orders =  Order::with('orderDetails','orderDetails.productDetails','orderDetails.paymentStatus','orderDetails.productDetails.category','user','user.address')->get();
        // $orders =  Order::with('orderDetails','orderDetails.productDetails','orderDetails.paymentStatus','orderDetails.productDetails.category','user','user.address')->get()->toArray();
        // echo '<pre>';
        // print_r($orders);
        // die();
        return view('admin.orders.index',compact('orders'));
    }
    public function orderdetail($orderid){
        $order = Order::where('order_id',$orderid)->first();
        if(!$order){
            abort(404);
        }
        return view('admin.orders.orderdetail',compact('order')); 
    }
    public function recurringorders(){
        $ordermeta = OrderMeta::where('order_type','multi_time')->with('orderdata')->get();
       
        // dd($ordermeta);
       return view('admin.orders.recurringorders',compact('ordermeta'));
    }
    public function subscriptiondetail($subscription_id){
        $metadetail = OrderMeta::with('userSubscription','subscriptiondetail','productDetails','variations','orderdata.user.address')->where('reccuring_id',$subscription_id)->first();
        // $metadetail = OrderMeta::with('userSubscription','subscriptiondetail','productDetails','variations','orderdata.user.address')->where('reccuring_id',$subscription_id)->first()->toArray();
        // echo '<pre>';
        // print_r($metadetail);
        // die();
        if(!$metadetail){
            abort(404);
        }
        return view('admin.orders.subscriptiondetail',compact('metadetail'));
    }
    public function updateorder(Request $request){
        $order = Order::where('id',$request->orderid)->with('orderDetails','payment')->first();
        if($order->status == 1){
            $order->status = 2;
            $ordermeta = OrderMeta::where('order_id',$order->id)->update(['status' => 2]);
            $payments = PaymentCollection::where('order_id',$order->id)->update(['delivery_status' => 2]);
            $status = 'Shipped';
        }elseif($order->status == 2){
            $order->status = 3;
            $ordermeta = OrderMeta::where('order_id',$order->id)->update(['status' => 3]);
            $payments = PaymentCollection::where('order_id',$order->id)->update(['delivery_status' => 3]);
            $status = 'Delievered';
        }elseif($order->status == 3){
            $order->status = 1;
            $ordermeta = OrderMeta::where('order_id',$order->id)->update(['status' => 1]);
            $payments = PaymentCollection::where('order_id',$order->id)->update(['delivery_status' => 1]);
            $status = 'Confirmed';
        }else{
            return response()->json(['error'=>'Failed to change status of this order this order is not Confirmed']);
        }
        $order->update();  
        return response()->json(['success'=>'Successfully updated status','status'=>$status]);
        
    }
    // private function getSubscriptionDetail($subscription_id){
    //     $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );
    //     $subscriptiondetail =  $stripe->subscriptions->retrieve(
    //         $subscription_id,
    //         []
    //       );
    //     return $subscriptiondetail;
    // }
}
