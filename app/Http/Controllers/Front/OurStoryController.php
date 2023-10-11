<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    //
    public function index(){
        return view('front.OurStory.index');
    }
}
