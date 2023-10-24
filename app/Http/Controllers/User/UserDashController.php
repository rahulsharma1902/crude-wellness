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
            echo '<pre>';
            $order =  Order::with('orderDetails','orderDetails.productDetails','orderDetails.productDetails.category')->where('customer_id',Auth::user()->id)->get()->toArray();
            print_r($order);
            die();
        }
        return view('user.index');  
    }
}
