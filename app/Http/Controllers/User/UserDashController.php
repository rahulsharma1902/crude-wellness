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
}
