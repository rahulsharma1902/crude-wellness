<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Media;
use App\Models\Products;
use App\Models\ProductVariations;
use Illuminate\Support\Facades\DB;

class FrontShopController extends Controller
{
    public function index(){
        $categories = Categories::whereNull('parent_category')->with('products')->get()->toArray();
        echo '<pre>';
        print_r($categories);
        die();
        return view('front.shop.index');
    }
    public function shopdetail(){
        
        return view('front.shop.shopdetail');
    }
}
