<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;
use Auth;

class CheckoutController extends Controller
{
    public function index(){
        if(Auth::check()){
            $address = Address::where('user_id',Auth::user()->id)->first();
        }else{
            $address = null;
        }
        $cartitems = Cart::where('user_id',Auth::user()->id)->get();
        return view('front.checkout.index',compact('cartitems','address'));
    }
    public function addresssave(Request $request){
        // return $request->all();
        if($request->id){
            $address = Address::find($request->id);
            $address->first_name = $request->first_name;
            $address->last_name  = $request->last_name;
            $address->address = $request->address;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->region = $request->country;
            $address->zipcodes = $request->zipcodes;
            $address->mobiles = $request->phone;
            $address->user_id = Auth::user()->id;
            $address->update(); 
        }else{
            $address = new Address;
            $address->first_name = $request->first_name;
            $address->last_name  = $request->last_name;
            $address->address = $request->address;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->region = $request->country;
            $address->zipcodes = $request->zipcodes;
            $address->mobiles = $request->phone;
            $address->user_id = Auth::user()->id;
            $address->save();
        }
        return response()->json(['success'=>'Successfully saved address','address'=>$address]);        
    }

}
