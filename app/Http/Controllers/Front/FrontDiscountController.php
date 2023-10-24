<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontDiscountController extends Controller
{
    public function index(){

    }
    public function SingleTimeDiscount(Request $request){
        $user = User::where('email',$request->email)->first();
        if(empty($user)){

            
        }else{
            return response()->json(['error'=>'You are not eligible for this discount! Thank you']);
        }
        return response()->json($request->all());

    }
}
