<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function index(){
       return view('admin.blog.index');
    }
    public function addBlog(){
        $categories = BlogCategory::where('status',1)->get();
       
        return view('admin.blog.addblog',compact('categories'));
    }
    public function addProcc(Request $request){
    if($request->id){
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$request->id,
            'subtitle' => 'required',
            'category' => 'required'
        ]);
        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->sub_title = $request->subtitle;
        $blog->cat_id = $request->category;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $request->title.rand(0,100).'.'.$file->extension();
            $file->move(public_path().'/blog_images/', $filename);
            $blog->image = $filename;
        }
        $blog->update();
        return redirect()->back()->with('success','successfully updated blogs');
    }else{
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$request->id,
            'subtitle' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->sub_title = $request->subtitle;
        $blog->cat_id = $request->category;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $request->title.rand(0,100).'.'.$file->extension();
            $file->move(public_path().'/blog_images/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect()->back()->with('success','successfully saved blogs');
    }
    }
    public function categories(){
        $categories = BlogCategory::all();
        return view('admin.blog.category',compact('categories'));
    }
    public function categoryadd(Request $request){
        $request->validate([
            'name' => 'required|unique:blog_categories,name,'.$request->id, 
        ]);
        if($request->id){
            $category = BlogCategory::find($request->id);
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->update();
            return redirect()->back()->with('success','successfully updated category');
        }else{
            $category = new BlogCategory;
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->save();
            return redirect()->back()->with('success','successfully saved');
        }
    }
    public function categorydelete($id){
        $category = BlogCategory::find($id);
        if($category){
            $category->delete();
            return redirect()->back()->with('success','successfully deleted category');
        }else{
            return redirect()->back()->with('error','Failed! Something went wrong');
        }
    }
}
