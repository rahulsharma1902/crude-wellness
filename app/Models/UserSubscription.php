<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    public function ordermeta(){
        return $this->hasOne(OrderMeta::class,'id','order_meta_id');
    }
}
