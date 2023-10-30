<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    use HasFactory;
    public function productDetails(){
        return $this->hasOne(Products::class,'id','product_id');
    }
    public function paymentStatus(){
        return $this->hasOne(PaymentCollection::class,'order_meta_id','id');
    }
    public function PaymentDetail(){
        return $this->hasOne(PaymentCollection::class,'id','payment_id');
    }
    public function variations(){
        return $this->hasOne(ProductVariations::class,'id','variation_id');
    }
    public function subscriptiondetail(){
        
        return $this->hasOne(SubscriptionOption::class,'id','subscription_id');
    }
    public function orderdata(){

        return $this->hasOne(Order::class,'id','order_id');
    }
}
