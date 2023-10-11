<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\EducationController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\OurStoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front_layout.master');
});

Route::get('education',[EducationController::class,'index']);
Route::get('education-details/{slug}',[EducationController::class,'details']);

Route::get('faq',[FaqController::class,'index']);

Route::get('review',[ReviewController::class,'index']);

Route::get('contact',[ContactController::class,'index']);

Route::get('our-story',[OurStoryController::class,'index']);
