<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
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
}
