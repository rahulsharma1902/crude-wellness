<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
   public function index(){
        $categories = Categories::with('parentCategory')->get();
        return view('admin.category.index',compact('categories'));
   }

   public function AddCategory($slug = null){
     if($slug){
          $categories = Categories::where([['slug','!=',$slug],['parent_category',null]])->get();
     }else{
          $categories = Categories::where('parent_category',null)->get();
     }
     $edit_category = Categories::where('slug',$slug)->first();   
      
     return view('admin.category.addCategory',compact('categories','edit_category'));
   }


   public function save(Request $request){
  
     if($request->id){
          $request->validate([
               'name' => 'required',
               'slug' => 'required|unique:categories,id,'.$request->id,
           ]);

          $category = Categories::find($request->id);
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->parent_category = $request->parent_category;
          
          $category->update();

          return redirect('admin-dashboard/add-category/'.$request->slug)->with('success','successfully updated category');  
     }else{
          $request->validate([
               'name' => 'required',
               'slug' => 'required|unique:categories',
           ]);
          $category = new Categories;
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->parent_category = $request->parent_category;
          $category->save();

          return redirect()->back()->with('success','You category has been added .');
     }

   }


   public function remove(Request $request, $slug)
   {
       if ($slug) {
           $category = Categories::where('slug', $slug)->first();
   
           if ($category) {
               $childCategories = Categories::where('parent_category', $category->id)->get();
               foreach ($childCategories as $childCategory) {
                   $childCategory->delete();
               }
               $category->delete();
               return redirect()->back()->with('success', 'Category has been removed');
           } else {
               return redirect()->back()->with('error', 'Invalid category for deletion');
           }
       }
       return redirect()->back()->with('error', 'Invalid category for deletion');
   }
   
}
