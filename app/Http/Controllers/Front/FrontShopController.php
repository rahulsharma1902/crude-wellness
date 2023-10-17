<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Media;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Models\SubscriptionOption;
use Illuminate\Support\Facades\DB;

class FrontShopController extends Controller
{
    public function index(){
        $categories = Categories::whereNull('parent_category')->get();
        $products = Products::with('variations')->get();
        
        return view('front.shop.index', compact('categories','products'));
    }
    public function shopdetail($id){
        $subscription = SubscriptionOption::all();
        $product = Products::find($id);
        $variations = ProductVariations::where('product_id',$id)->pluck('price','strength');
        $first = ProductVariations::where('product_id',$id)->first();
        // echo "<pre>";
        // print_r($variations);
        // die();
        $categories = Products::where('category_id',$product->id)->get();
        return view('front.shop.shopdetail',compact('product','subscription','categories','first','variations'));
    }

    
}
