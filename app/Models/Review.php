<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function category(){
        
        return $this->hasOne(ReviewCategory::class,'id','category_id');
    }
}
