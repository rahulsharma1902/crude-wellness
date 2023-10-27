<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCollection extends Model
{
    use HasFactory;

    public function Order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function ordermeta(){
        return $this->hasOne(OrderMeta::class,'id','order_meta_id');
    }
    public function ordermetas(){
        return $this->hasMany(OrderMeta::class,'payment_id','id');
    }
    
}
