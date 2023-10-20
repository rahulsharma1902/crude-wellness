<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurStoryMeta;

class OurStoryController extends Controller
{
    //
    public function index(){

        $ourstory = OurStoryMeta::first();
        
        return view('front.OurStory.index',compact('ourstory'));
    }
}
