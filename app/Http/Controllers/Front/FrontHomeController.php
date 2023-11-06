<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\FaqMeta;
use App\Models\Products;
use App\Models\SubscriptionOption;
use App\Models\ReviewCategory;
use App\Models\Review;

class FrontHomeController extends Controller
{
    public function index(){
    $categories = Categories::where('status',1)->get();
    $blog = Blog::where('status',1)->orderBy('created_at','desc')->get();
    $faqs = FaqMeta::where('home_page',1)->first();
    $product =Products::where([['status',1],['home_page_status',1]])->first();
    $subscriptions = SubscriptionOption::where('status',1)->get();
    $review_category = ReviewCategory::where('home_status',1)->first();
    $customers_reviews = Review::where([['category_id','!=',$review_category->id]])->get();

    return view('front.home.index',compact('blog','categories','faqs','product','subscriptions','review_category','customers_reviews'));
    }

    
}
