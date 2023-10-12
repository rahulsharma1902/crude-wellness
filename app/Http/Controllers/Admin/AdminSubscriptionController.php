<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionOption;

class AdminSubscriptionController extends Controller
{
    public function index(){
        $options = SubscriptionOption::all();

        return view('admin.subscription.index',compact('options'));
    }
   
    public function addProcc(Request $request){
       
        $request->validate([
            'recurring_period' => 'required',
            'recurring_type' => 'required',
            'discount' => 'required',
        ]);
        if($request->id){
            $option = SubscriptionOption::find($request->id);
            $option->recurring_period = $request->recurring_period;
            $option->recurring_type = $request->recurring_type;
            $option->discount_percentage = $request->discount;
            $option->save();
            return redirect()->back()->with('success','Successfully updated option');
        }else{
            $option = new SubscriptionOption;
            $option->recurring_period = $request->recurring_period;
            $option->recurring_type = $request->recurring_type;
            $option->discount_percentage = $request->discount;
            $option->save();
            return redirect()->back()->with('success','Successfully saved option');   
        }
    }
    public function delete($id){
        $option = SubscriptionOption::find($id);
        if($option){
            $option->delete();
            return redirect()->back()->with('success','successfully deleted option');
        }else{
            return redirect()->back()->with('error','Failed! Something went wrong');
        }
    }
}
