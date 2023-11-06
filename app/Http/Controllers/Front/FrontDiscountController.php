<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\User;
use App\Mail\DiscountMail;
use Mail;

class FrontDiscountController extends Controller
{
    public function index(){

    }
    public function SingleTimeDiscount(Request $request){
        $email = 'test@gmail.com';
        $user = User::where('email',$email)->first();
        if(!$user){
            $discount = new Discount;
            $discount->discount_name = 'Welcome Discount';
            $discount->discount_code = '#DISC-'.$this->getCouponCode();
            $discount->discount_type = 'percentage';
            $discount->amount = 15;
            $discount->discount_use = 'single';
            $discount->time_used = 0;
            $discount->expire_on = date('Y-m-d',strtotime("+1 days")).date('H:i');
            $discount->save();
            $mailData = [
                'discount_code' => $discount->discount_code
            ];
            $mail = Mail::to($email)->send(new DiscountMail($mailData));
            return response()->json(['success'=>'Congratulation you got a new discount coupon']);
        }else{
            return response()->json(['error'=>'You are not eligible for this discount! Thank you']);
        }
        // return response()->json($request->all());

       
        // $date = date('Y-m-d').'T'.date('H:i');
    //     $discount_code = '#FEST-dHzX';
    //     $amount = 50;
    //    $discount = Discount::where([['discount_code',$discount_code],['status',1]])->first();
       
    //    if(!$discount){
    //     echo 'No Coupon found';
    //    }else{
    //     if($date > $discount->expire_on){
    //         echo 'Error! Your coupon is expired.';
    //       }
    //         if($discount->discount_type == 'percentage'){
    //             $percentage_off = $discount->amount;
    //             $discount_amount = ($percentage_off*$amount)/100;
    //         }else{
    //             $discount_amount = $discount->amount;
    //         }
 
    //    $discount->time_used = $discount->time_used+1;
    //    if($discount->discount_use  == 'multiple'){

    //    }else{
    //         $discount->status = 0;
    //    }
    //    $discount->update();
       
    // }
    }
    private function getCouponCode(){
        $chars='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $length = 4;
        $totalChars = strlen($chars);
        $totalRepeat = ceil($length/$totalChars);
        $repeatString = str_repeat($chars, $totalRepeat);
        $shuffleString = str_shuffle($repeatString);
        return substr($shuffleString,1,$length);
    }
    
}
