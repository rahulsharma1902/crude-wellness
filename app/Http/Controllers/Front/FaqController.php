<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqMeta;

class FaqController extends Controller
{
    //
    public function index(){
        $faqmeta = FaqMeta::get();

        return view('front.Faq.index',compact('faqmeta'));
    }
}
