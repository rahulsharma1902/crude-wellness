<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCollection;

class PaymentController extends Controller
{
   public function index(){
    $payments = PaymentCollection::orderBy('created_at','desc')->get();
    
    return view('admin.payments.index',compact('payments'));
   }
}
