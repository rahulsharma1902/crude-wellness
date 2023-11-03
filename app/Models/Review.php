<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    public function category(){
        
        return $this->hasOne(ReviewCategory::class,'id','category_id');
    }
>>>>>>> 618a5d75542e373171a05aab14e18b68645b1a18
}
