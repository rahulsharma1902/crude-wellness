<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\FaqMeta;

class FrontHomeController extends Controller
{
    public function index(){
        $categories = Categories::where('status',1)->get();
        $blog = Blog::where('status',1)->orderBy('created_at','desc')->get();
        $faqs = FaqMeta::where('home_page',1)->first();
       
        return view('front.home.index',compact('blog','categories','faqs'));
    }
}
