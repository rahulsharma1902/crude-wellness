<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewCategory;

class FrontSubscriptionController extends Controller
{
    public function index(){
        $doctor_review = ReviewCategory::where('home_status',1)->first();
        if($doctor_review){
            $reviews = Review::where([['status',1],['category_id','!=',$doctor_review->id]])->get();
        }else{
            $reviews = Review::where('status',1)->get();
        }
        
        return view('front.subscription.index',compact('reviews'));
    }
}
