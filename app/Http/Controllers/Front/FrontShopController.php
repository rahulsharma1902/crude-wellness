<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Media;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Models\SubscriptionOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontShopController extends Controller
{
    public function index(){
        $categories = Categories::whereNull('parent_category')->get();
        $products = Products::with('variations')->paginate(1);
        
        return view('front.shop.index', compact('categories','products'));
    }
    public function shopdetail($id){
        $subscription = SubscriptionOption::all();
        $product = Products::find($id);
        $variations = ProductVariations::where('product_id',$id)->pluck('price','strength');
        $offer = SubscriptionOption::all()->pluck('discount_percentage','id');
        $first = ProductVariations::where('product_id',$id)->first();
        // echo "<pre>";
        // print_r($variations);
        // die();
        $categories = Products::where('category_id',$product->id)->get();
        return view('front.shop.shopdetail',compact('product','subscription','offer','categories','first','variations'));
    }

    public function AddCart(Request $request){
        $PID = $request->input('id');
        $SID = $request->input('Sid');
        $varID = $request->input('varID');
        $price = $request->input('Price');
        $carts = Cart::where('product_id',$PID)->where('user_id',Auth::user()->id)->get();
        if($carts->isEmpty()){
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $PID;
            $cart->product_variation_id = $varID;
            if(!$SID){

            }else{
            $cart->subscription_id = $SID;
            
           }
            $cart->total_price = $price;
            $cart->save();
            return "done";
         }else
         
           $c= Cart::where('product_variation_id',$varID)->where('product_id',$PID)->get();
            if($c->isEmpty()){
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $PID;
                $cart->product_variation_id = $varID;
                if(!$SID){
    
                }else{
                $cart->subscription_id = $SID;
                
               }
                $cart->total_price = $price;
                $cart->save();
                return "new done";

            }else{
                foreach($c as $cart){
                if(!$SID){
                    $cart->update(['qty'=>$cart->qty + 1]);
                }else{
               
                    $cart->update([
                        'subscription_id'=>$SID,
                        'qty'=>$cart->qty + 1]);
               }
              
                return "qty";
            }
            }
           
         }
    }

    

