<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function index(){
        $blogcategory = BlogCategory::all();
        $blogs = Blog::all();
        return view('front.Education.index', compact('blogcategory','blogs'));
    }
    public function details(Request $request , $slug){
        $blog = Blog::where('slug',$slug)->first();
        $latestblog = blog::latest()->take(5)->get();
        // echo "<pre>";
        // print_r($blog);
        // die();
        return view('front.Education.educationDetails' , compact('blog','latestblog'));
    }
}
