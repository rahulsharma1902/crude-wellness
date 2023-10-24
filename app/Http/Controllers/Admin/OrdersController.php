<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class OrdersController extends Controller
{
    //
    public function index(){
        $orders =  Order::with('orderDetails','orderDetails.productDetails','orderDetails.productDetails.category')->get()->toArray();
        echo '<pre>';
        print_r($orders);
        die();
        return view('admin.orders.index',compact('orders'));
    }
}
