<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FaqMeta;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(){
        $faqs = FaqMeta::all();
        $faq = FaqMeta::first();
        return view('front.Faq.index',compact('faqs','faq'));
    }
}
