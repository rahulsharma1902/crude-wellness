<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Models\SubscriptionOption;
use Auth;
use App\Models\Cart;

class FrontShopController extends Controller
{
    public function index($slug = null){
      
        

        $categories = Categories::where('parent_category',null)->get();
        if($slug == null){
            $products = Products::where('status',1)->paginate(12);

        }else{
            $category_id = Categories::where('slug',$slug)->first();
            if($category_id){
                $products = Products::where([['status',1],['category_id',$category_id->id]])->paginate(12);

            }else{
                abort(404);
            }

        }
        return view('front.shop.index',compact('categories','products','slug'));
    }
    public function shopdetail($slug){
        $product = Products::where([['status',1],['slug',$slug]])->first();
        if(!$product){
            abort(404);
        }
        $category_id = $product->category_id;
        $subscriptions = SubscriptionOption::where('status',1)->get();
        $related_products = Products::where([['status',1],['category_id',$category_id],['id','!=',$product->id]])->get()->take(4);
        return view('front.shop.shopdetail',compact('product','related_products','subscriptions'));
    }
    public function getPrice(Request $request){
        if($request->id){
        $price =  ProductVariations::find($request->id)->price;
        return $price;
        }elseif($request->subscription_id){
            $subscriptions = SubscriptionOption::find($request->subscription_id);
            $percentage_off = $subscriptions->discount_percentage;
            $final_off = $percentage_off/100 * $request->price;
            $final_price = $request->price - $final_off; 
            $response = [
                "final_price" => number_format($final_price,2),
                "final_off" => number_format($final_off,2),
            ];
            return response()->json($response);
        }elseif($request->action){
            $price =  ProductVariations::find($request->variation)->price;
            $subscriptions = SubscriptionOption::find($request->plan_id);
            $percentage_off = $subscriptions->discount_percentage;
            $final_off = ($percentage_off/100) * $price;
            $final_price = $price - $final_off;
            $response = [
                "final_price" => number_format($final_price,2),
                "final_off" => number_format($final_off,2),
            ]; 
            return response()->json($response);
        }
    }
    public function addtocart(Request $request){
        if(!Auth::check()){
            return response()->json(['error'=>'Please login first']);

        }

        $user_id = Auth::user()->id;
        $cartitem = Cart::where([['user_id',$user_id],['status',1],['purchase_type',$request->purchase_type],['subscription_id',$request->subscription_plan],['variation_id',$request->variation]])->first();
        $product = Products::find($request->id);
        $variation = ProductVariations::find($request->variation);
        $subscriptions = SubscriptionOption::find($request->subscription_plan);
        if($request->purchase_type == 'multi_time'){
            $discount_price = ($subscriptions->discount_percentage/100) * $variation->price;
            $price = $variation->price - $discount_price;
        }else{
            $price = $variation->price;
        }
        
        if($cartitem){
            $cart = Cart::find($cartitem->id);
            $cart->quantity = $cartitem->quantity+1;
            $cart->price = $price;
            $cart->update();

            $cartitems = Cart::where([['user_id',Auth::user()->id],['status',1]])->get();
            $totalprice = 0;
            foreach($cartitems as $item){
                $totalprice += $item->price*$item->quantity;
            }
            return response()->json(['success'=>'updated','cart'=>$cart,'product'=>$product,'variation'=>$variation,'total_price'=>number_format($totalprice,2)]);
        }else{
            $cart = new Cart;
            $cart->purchase_type = $request->purchase_type;
            $cart->subscription_id = $request->subscription_plan;
            $cart->variation_id = $request->variation;
            $cart->product_id = $request->id;
            $cart->user_id = $user_id;
            $cart->quantity = 1;
            $cart->price = $price;
            $cart->status = 1;
            $cart->save();
            
            $cartitems = Cart::where([['user_id',Auth::user()->id],['status',1]])->get();
            $totalprice = 0;
            foreach($cartitems as $item){
                $totalprice += $item->price*$item->quantity;
            }
            $allsubscriptions  = SubscriptionOption::where('status',1)->get();
            return response()->json(['success'=>'created','price'=>number_format($cart->price,2),'cart'=>$cart,'product'=>$product,'variation'=>$variation,'total_items'=>count($cartitems),'subcriptions'=>$allsubscriptions,'total_price'=>number_format($totalprice,2)]);
        }
        
    }
}
