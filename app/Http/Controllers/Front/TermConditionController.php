<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index(){

        return view('front.term-conditions.index');
    }
    public function cookies(){

        return view('front.term-conditions.cookies');
    }
    public function policies(){
        
        return view('front.term-conditions.policies');
    }

}
