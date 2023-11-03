<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewCategory;
use App\Models\Review;

class ReviewsController extends Controller
{
    public function index(){
        $reviews = Review::where('status',1)->get();

        return view('admin.reviews.index',compact('reviews'));
    }
    public function addreviews($id = null){
        $categories = ReviewCategory::where('status',1)->get();
        if($id != null){
        $review = Review::find($id);
        if(!$review){
            abort(404);
        }
          }else{
            $review = [];
          }
        return view('admin.reviews.addreviews',compact('categories','review'));
    }
    public function addReviewsProcc(Request $request){
        
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'category' => 'required',
            'text' => 'required',
        ]);
        if($request->id){
            $review = Review::find($request->id);
            $review->review_by = $request->name;
            $review->position = $request->position;
            $review->category_id = $request->category;
            $review->text = $request->text;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $request->title.rand(0,100).'.'.$file->extension();
                $file->move(public_path().'/reviewsIMG/', $filename);
                $review->image = $filename;
            }
            $review->update();
            return redirect()->back()->with('success',"successfully updated review");
        }else{
            $request->validate([
                'image' => 'required',
            ]);
            $review = new Review;
            $review->review_by = $request->name;
            $review->position = $request->position;
            $review->category_id = $request->category;
            $review->text = $request->text;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $request->name.rand(0,1000).'.'.$file->extension();
                $file->move(public_path().'/reviewsIMG/', $filename);
                $review->image = $filename;
            }
            $review->save();
            return redirect()->back()->with('success',"Successfully added review");
        }

    }
    public function reviewDelete($id){
        $review = Review::find($id);
        if(!$review){
            abort(404);
        }
        $review->delete();
        return redirect()->back()->with('success','Successfully deleted review');
    }
    public function categories(){
        $categories = ReviewCategory::where('status',1)->get();
        return view('admin.reviews.reviewcategories',compact('categories'));
    }
    public function addCatgories(Request $request){
        if($request->action){
            $allcategories = ReviewCategory::where('home_status',1)->update(['home_status'=>0]);
            $home_category = ReviewCategory::find($request->id);
            if($home_category){
                $home_category->home_status = 1;
                $home_category->update();
                return response()->json(['success'=>'Successfully updated']);
            }
            return response()->json(['error'=>'Failed ! Something went wrong']);
        }
        $request->validate([
            'name' => 'required|unique:review_categories,name,'.$request->id,
        ]);
        if($request->id){
            $category = ReviewCategory::find($request->id);
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->status = 1;
            $category->update();
            return redirect()->back()->with('success','Successfully updated Category');
        }else{
            $category = new ReviewCategory;
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(" ","-",$request->name));
            $category->status = 1;
            $category->save();
            return redirect()->back()->with('success','Successfully added new Categories');
        }
       
    }
    public function deletereviewCategory($id){
        $category = ReviewCategory::find($id);
        if(!$category){
            abort(404);
        }
        $category->delete();
    return redirect()->back()->with('success','Successfully deleted category');
    }
}
