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
}
