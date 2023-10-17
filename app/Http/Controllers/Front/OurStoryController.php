<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OurStoryMeta;
use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    //
    public function index(){
        $story = OurStoryMeta::first();
        return view('front.OurStory.index',compact('story'));
    }
}
