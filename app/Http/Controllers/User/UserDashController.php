<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class UserDashController extends Controller
{
    public function index(){
        if(Auth::user()){
            $orders =  Order::with('orderDetails','orderDetails.productDetails','orderDetails.productDetails.category')->where('customer_id',Auth::user()->id)->get()->toArray();
            // echo '<pre>';
            // print_r($orders);
            // die();
        }
        return view('user.index',compact('orders'));  
    }
}
