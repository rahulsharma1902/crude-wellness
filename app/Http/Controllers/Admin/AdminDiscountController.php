<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class AdminDiscountController extends Controller
{
    public function index(){
        $discounts = Discount::all();

        return view('admin.discount.index',compact('discounts'));
    }
    public function addCoupon($id = null){
        $discount = Discount::find($id);
        if($id != null){
            if(!$discount){
                abort(404);
            }
        }
        return view('admin.discount.addcoupon',compact('discount'));
    }
    public function submitProcc(Request $request){
     
        $request->validate([
            'discount_name' => 'required',
            'discount_code' => 'required|unique:discounts,discount_code,'.$request->id,
            'discount_type' => 'required',
            'amount' => 'required',
            'discount_use' => 'required',
            'expire_on' => 'required',
        ]);
        if($request->id){
            $discount = Discount::find($request->id);
            $discount->discount_name = $request->discount_name;
            $discount->discount_code = $request->discount_code;
            $discount->discount_type = $request->discount_type;
            $discount->amount = $request->amount;
            $discount->discount_use = $request->discount_use;
            $discount->expire_on = $request->expire_on;
            // $discount->time_used = 0;
            $discount->status = 1;
            $discount->update();
            return redirect()->back()->with('success','Successfully updated discount coupon');
        }else{
            $discount = new Discount;
            $discount->discount_name = $request->discount_name;
            $discount->discount_code = $request->discount_code;
            $discount->discount_type = $request->discount_type;
            $discount->amount = $request->amount;
            $discount->discount_use = $request->discount_use;
            $discount->expire_on = $request->expire_on;
            $discount->time_used = 0;
            $discount->status = 1;
            $discount->save();
            return redirect()->back()->with('success','Successfully saved new disocunt coupon');
        }
    }
    public function deleteCoupon($id){
    
        $discount = Discount::find($id);
        if(!($discount)){
            abort(404);
        }
        $discount->delete();
        return redirect()->back()->with('success','Successfully deleted discount coupons');
    }
    public function updateStatus(Request $request){
        $discount = Discount::find($request->id);
        if($discount){
            $discount->status = $request->status;
            $discount->update();
            return response()->json(['success'=>'Successfully updated discount status']);
        }else{
            return response()->json(['error'=>'Failed! Something went wrong']);
        }
    }
}
