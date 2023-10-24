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
        //  return $price;
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
            $p = Products::find($PID);
            $media = Media::where('product_id',$PID)->first();
            $src = '<img src="' . asset('/productIMG/' . $media->img_name) . '" alt="Product Image">';
            $name = ' <h5 id="productname">'.$p->name.'</h5>';
            $cprice = ' <span id="productprice">$'.$price.'</span>';
            // $data =['name'=>$p->name,'image'=>$src,'price'=>$price]; 
            return response()->json(['msg'=>"new",'name'=>$name,'image'=>$src,'price'=>$cprice,'qty'=>$cart->qty]);
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
                $p = Products::find($PID);
                $media = Media::where('product_id',$PID)->first();
                $src = '<img src="' . asset('/productIMG/' . $media->img_name) . '" alt="Product Image">';

                // $data =['name'=>$p->name,'image'=>$src,'price'=>$price,'qty'=>$cart->qty]; 
                return response()->json(['msg'=>"new",'name'=>$p->name,'image'=>$src,'price'=>$price,'qty'=>$cart->qty]);
            }else{
                foreach($c as $cart){
                if(!$SID){
                    $cart->update([
                        'total_price'=>$price,
                        'qty'=>$cart->qty + 1]);
                }else{
               
                    $cart->update([
                        'subscription_id'=>$SID,
                        'total_price'=>$price,
                        'qty'=>$cart->qty + 1]);
               }
              
              return response()->json(['update'=>$cart->qty,'sID'=>$SID,'totalprice'=>$price]);
            }
            }
           
         }

         //delete from cart 
         public function delCart(Request $request){
            $ID = $request->input('id');
            //  return $ID;
            $cart = Cart::find($ID);
            
            if($cart->qty>=2){
                $cart->update(['qty'=>$cart->qty - 1]);
         
            $Newqty= $cart->qty;
            return response()->json(['qty'=>$Newqty,]);
        }else{
            $cart->delete();
            // return "done";
        return response()->json(['msg1'=>"done"]);
         }
        }

        public function updateCart(Request $request){
            $ID = $request->input('id');
            //  return $ID;
            $cart = Cart::find($ID);
            $cart->update(['qty'=>$cart->qty+1]);
            $newqty = $cart->qty ;
            
            return response()->json(['msg'=>$newqty]);
        }
    }

    

