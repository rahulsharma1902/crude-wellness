<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCategory extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    public function reviews(){
        return $this->hasMany(Review::class,'category_id','id');
    }
>>>>>>> 618a5d75542e373171a05aab14e18b68645b1a18
}
