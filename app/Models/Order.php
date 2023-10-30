<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function orderDetails(){
        return $this->hasMany(OrderMeta::class,'order_id','id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','customer_id');
    }
    public function payment(){
        return $this->hasMany(PaymentCollection::class,'order_id','id');
    }
}
