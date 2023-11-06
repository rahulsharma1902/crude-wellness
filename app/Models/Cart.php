<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function users_data(){
        return $this->haOne(User::class,'id','user_id');
    }
    public function product(){
        return $this->hasOne(Products::class,'id','product_id');
    }
    public function subscription(){
        return $this->hasOne(SubscriptionOption::class,'id','subscription_id');
    }
    public function variations(){
        return $this->hasOne(ProductVariations::class,'id','variation_id');
    }
    
}
