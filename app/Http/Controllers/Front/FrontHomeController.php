<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\SiteMeta;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){
        $categories = Categories::latest()->take(10)->get();
       
        return view('front.home.index', compact('categories'));
    }
}
