<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function parentCategory(){
        return $this->hasOne(Categories::class,'id','parent_category');
    }
    public function products(){
        return $this->hasMany(Products::class,'category_id','id');
    }
}
