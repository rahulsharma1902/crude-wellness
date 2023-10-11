<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function index(){
        return view('front.Education.index');
    }
    public function details(Request $request , $slug){
        return view('front.Education.educationDetails');
    }
}
