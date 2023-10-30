<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
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
}
