<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SiteMeta;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){
        // $s = SiteMeta::first();
       
        return view('front.home.index');
    }
}
