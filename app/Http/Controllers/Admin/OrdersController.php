<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMeta;
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
    $metadetail = OrderMeta::with('subscriptiondetail','productDetails','variations','orderdata.user.address')->where('reccuring_id',$subscription_id)->first();
    // $metadetail = OrderMeta::with('subscriptiondetail','productDetails','variations','orderdata.user.address')->where('reccuring_id',$subscription_id)->first()->toArray();
    // echo '<pre>';
    // print_r($metadetail);
    // die();
    if(!$metadetail){
        abort(404);
    }
    return view('admin.orders.subscriptiondetail',compact('metadetail'));
    }

}
