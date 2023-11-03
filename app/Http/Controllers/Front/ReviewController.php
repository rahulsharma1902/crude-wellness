<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewCategory;

class ReviewController extends Controller
{
    
    public function index(){
        $review_category = ReviewCategory::where('status',1)->get();

        return view('front.Review.index',compact('review_category'));
    }
}
