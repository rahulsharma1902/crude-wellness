<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class ProductsController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard.index');
    }

    public function addProducts(){
        $categories = Categories::all();
        return view('admin.products.addProducts',compact('categories'));
    }
    public function save(Request $request){
        
        $request->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'direction' => 'required',
            'ingredients' => 'required',
            'lab_results' => 'required',
            'images' => 'required',
            'featured_img' => 'required',
            'strength' => 'required|array|min:1',
            'qty' => 'required|array|min:1',
            'price' => 'required|array|min:1',
        ]);
        return redirect()->back()->with('success','Product has been uploaded.');
    }
}
