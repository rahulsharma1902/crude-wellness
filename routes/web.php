<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontShopController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontSubscriptionController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Front\EducationController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\OurStoryController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminSiteMetaController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Front\FrontCartController;
use App\Http\Controllers\User\UserDashController;


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

// Route::get('/', function () {
//     return view('front_layout.master');
// });
// Route::get('/test', function () {
//     return view('test');
// });
//Authentications routes
Route::get('login',[AuthenticationController::class,'index'])->name('login');
Route::post('loginProcc',[AuthenticationController::class,'loginprocc']);
Route::get('register',[AuthenticationController::class,'register'])->name('register');
Route::post('registerProcc',[AuthenticationController::class,'registerProcc']);
Route::get('logout',[AuthenticationController::class,'logout']);
Route::get('forgotten-password',[AuthenticationController::class,'forgetPassword']);
Route::get('forgotten-password/newpassword/{secret?}',[AuthenticationController::class,'newPassword']);
Route::post('forgotten-password/submit',[AuthenticationController::class,'forgetPasswordSubmit']);
Route::post('new-password/submit',[AuthenticationController::class,'newpasswordSubmit']);


Route::get('/',[FrontHomeController::class,'index']);
Route::get('/shop/{id?}',[FrontShopController::class,'index']);
Route::get('/shop-detail/{id}',[FrontShopController::class,'shopdetail']);
Route::get('/checkout',[CheckoutController::class,'index']);
Route::get('/subscription',[FrontSubscriptionController::class,'index']);

Route::get('education',[EducationController::class,'index']);
Route::get('education-details/{slug}',[EducationController::class,'details']);
Route::get('faq',[FaqController::class,'index']);
Route::get('review',[ReviewController::class,'index']);

Route::get('contact',[ContactController::class,'index']);
Route::post('contactProcc',[ContactController::class,'contactProcc']);

Route::get('our-story',[OurStoryController::class,'index']);

////////buy now proccesss routes
Route::post('shop/getPrices',[FrontShopController::class,'getPrice']);
Route::post('shop/addCart',[FrontShopController::class,'addtocart']);

//////cart update and delete
Route::post('cart/update',[FrontCartController::class,'updatecart']);


////checkout routes
Route::post('addresssave',[CheckoutController::class,'addresssave']);
Route::post('paymentProcc',[CheckoutController::class,'paymentProcc']);

////StripeWebhookcall
Route::post('/stripe/webhook',[StripeWebHooks::class,'index']);


/////Admin Dashboarda
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('admin-dashboard',[AdminDashController::class,'index']);


    //subcription option

    Route::get('admin-dashboard/subscriptions-options/',[AdminSubscriptionController::class,'index']);
    Route::get('admin-dashboard/subscriptions-options/addProcc',[AdminSubscriptionController::class,'addProcc']);
    Route::get('admin-dashboard/subscriptions-options/delete/{id}',[AdminSubscriptionController::class,'delete']);
    
    /* categories */
    Route::get('admin-dashboard/categories',[CategoriesController::class,'index']);
    Route::get('admin-dashboard/add-category/{slug?}',[CategoriesController::class,'AddCategory']);

    Route::post('save-category',[CategoriesController::class,'save']);
    Route::get('remove-category/{slug}',[CategoriesController::class,'remove']);

    /* blogs  */  
    Route::get('admin-dashboard/blogs',[AdminBlogController::class,'index']);
    Route::get('admin-dashboard/blogs/add/{id?}',[AdminBlogController::class,'addBlog']);
    Route::post('admin-dashboard/blogs/addProcc',[AdminBlogController::class,'addProcc']);
    Route::get('admin-dashboard/blogs/delete/{id}',[AdminBlogController::class,'blogDelete']);

    Route::get('admin-dashboard/blogs/categories',[AdminBlogController::class,'categories']);
    Route::post('admin-dashboard/blogs/categories/addProcc',[AdminBlogController::class,'categoryadd']);
    Route::get('admin-dashboard/blog/category/delete/{id}',[AdminBlogController::class,'categorydelete']);


    /* sitemeta */
    Route::get('admin-dashboard/site-detail',[AdminSiteMetaController::class,'index']);
    Route::post('admin-dashboard/site-detail/addProcc',[AdminSiteMetaController::class,'addProcc']);
    Route::get('admin-dashboard/faqs/{slug?}',[AdminSiteMetaController::class,'faqs']);
    Route::post('admin-dashboard/faqs/addProcc',[AdminSiteMetaController::class,'faqaddProcc']);
    Route::post('admin-dashboard/faqs/homestatus',[AdminSiteMetaController::class,'faqhomestatus']);
    Route::get('admin-dashboard/faqs/delete/{id}',[AdminSiteMetaController::class,'faqDelete']);
    Route::get('admin-dashboard/ourstory-meta',[AdminSiteMetaController::class,'ourStory']);
    Route::post('admin-dashboard/ourstory-meta/addProcc',[AdminSiteMetaController::class,'ourStoryAdd']);



    /* Products : */
    Route::get('admin-dashboard/products',[ProductsController::class,'index']);
    Route::get('admin-dashboard/add-products',[ProductsController::class,'addProducts']);
    Route::post('productSave',[ProductsController::class,'save']);
    Route::post('product/updatehomestatus',[ProductsController::class,'homestatus']);

    Route::get('admin-dashboard/product-edit/{slug}',[ProductsController::class,'editProduct']);
    Route::post('productUpdate',[ProductsController::class,'updateProc']);

    Route::get('productRemove/{slug}',[ProductsController::class,'removeProducts']);


    /*admin-dashboard/contact-us =>  Contact us */
    Route::get('admin-dashboard/contact-us',[ContactUsController::class,'index'])->name('contact-us');
    Route::get('admin-dashboard/removeContactUs/{id}',[ContactUsController::class,'remove']);

    // AdminAccountSetting
    Route::get('admin-dashboard/setting',[AdminSettingController::class,'index'])->name('account-setting');
    Route::post('admin-dashboard/settingupdate',[AdminSettingController::class,'updateprocc']);


    Route::get('admin-dashboard/orders',[OrdersController::class,'index'])->name('orders');

});

Route::group(['middleware' =>['auth','user']],function(){
    Route::get('account',[UserDashController::class,'index']);
});




Route::get('test',[CheckoutController::class,'test']);