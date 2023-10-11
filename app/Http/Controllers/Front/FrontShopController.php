<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontShopController extends Controller
{
    public function index(){

        return view('front.shop.index');
    }
    public function shopdetail(){
        
        return view('front.shop.shopdetail');
    }
}
