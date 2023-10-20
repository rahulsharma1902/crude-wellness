<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ProductVariations;
use App\Models\SubscriptionOption;
use Auth;

class FrontCartController extends Controller
{
   public function index(){

   }
   public function updatecart(Request $request){
    if($request->action == 'purchase_type'){
        $cart = Cart::find($request->cart_id);
        ///check already item with this variations

        $alreadyitems = Cart::where([['user_id',$cart->user_id],['purchase_type',$request->purchase_type],['subscription_id',$cart->subscription_id],['variation_id',$cart->variation_id]])->first();
        
        if($alreadyitems){
            $alreadyitems->quantity = $alreadyitems->quantity+$cart->quantity;
            $alreadyitems->update();
            $cart->delete();
            $cart = Cart::find($alreadyitems->id);
            $response = 'quantityupdate';
        }else{
            $response = 'productupdate';
        }
        $variation = ProductVariations::find($cart->variation_id);
        $subscriptions = SubscriptionOption::find($cart->subscription_id);
        if($request->purchase_type == 'multi_time'){
            $discount_price = ($subscriptions->discount_percentage/100) * $variation->price;
            $price = $variation->price - $discount_price;
        }else{
            $price = $variation->price;
        }
        
        $cart->purchase_type = $request->purchase_type;
        $cart->price = $price;
        $cart->update();

        $allcartitems = Cart::where('user_id',Auth::user()->id)->get();
        $total_price = null;
        foreach($allcartitems as $items){
            $total_price += $items->price*$items->quantity; 
        }
        return response()->json(['success'=>'successfully updated','cart'=>$cart,'item_price'=>number_format($cart->price,2),'total_price'=>number_format($total_price,2),'response'=>$response]);

    }elseif($request->action == 'change_plan'){
        
        $newsubscription = SubscriptionOption::find($request->subscriptionid);
        $cart = Cart::find($request->cart_id);

        $alreadyitems = Cart::where([['user_id',$cart->user_id],['purchase_type',$cart->purchase_type],['subscription_id',$request->subscriptionid],['variation_id',$cart->variation_id]])->first();
        if($alreadyitems){
                $alreadyitems->quantity = $alreadyitems->quantity+$cart->quantity;
                $alreadyitems->update();
            $cart->delete();
            $cart = Cart::find($alreadyitems->id);

            $response = 'quantityupdate';
         }else{
           
            $response = 'productupdate';
                
         }
         $variation = ProductVariations::find($cart->variation_id);

        $cart->subscription_id = $request->subscriptionid;
        $discount_price = ($newsubscription->discount_percentage/100) * $variation->price;
        $price = $variation->price - $discount_price;
        $cart->price = $price;
        $cart->update();

        $allcartitems = Cart::where('user_id',Auth::user()->id)->get();

            $total_price = null;
            foreach($allcartitems as $items){
                $total_price += $items->price*$items->quantity; 
            }
        return response()->json(['success'=>'successfully updated','cart'=>$cart,'item_price'=>number_format($cart->price,2),'total_price'=>number_format($total_price,2),'response'=>$response]);
    }else{
                    if($request->quantity == 0){
                        Cart::find($request->cart_id)->delete();
                        
                    }else{
                        $cart = Cart::find($request->cart_id);
                        $cart->quantity = $request->quantity;
                        $cart->update();
                    }
                    $cartitems = Cart::where('user_id',Auth::user()->id)->get();
                    $total_price = 0;
                    foreach($cartitems as $c){
                        $item_price = $c->price*$c->quantity;
                        $total_price +=$item_price;
                    }

                    return response()->json(['price'=>number_format($total_price,2),'success'=>'successfully updated quantity','count'=>count($cartitems),'total_items'=>count($cartitems)]);

    }
}
}
