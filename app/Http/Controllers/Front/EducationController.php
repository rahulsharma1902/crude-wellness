<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class EducationController extends Controller
{
    //
    public function index(){
        $blogcategories = BlogCategory::where('status',1)->with('blogs')->get();
        $blogwithoutcat = Blog::where('status',1)->get();
        return view('front.Education.index',compact('blogcategories','blogwithoutcat'));
    }
    public function details(Request $request , $slug){
        $blog = Blog::where('slug',$slug)->first();
        $recentblogs = Blog::orderBy('created_at','desc')->get()->take(3);
        $previousBlog = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $blog->id)->orderBy('id','asc')->first();
        return view('front.Education.educationDetails',compact('blog','recentblogs','previousBlog','nextBlog'));
    }
}
