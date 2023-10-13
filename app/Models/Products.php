<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function category(){
        return $this->hasOne(Categories::class,'id','category_id');
    }
    public function variations(){
        return $this->hasMany(ProductVariations::class,'product_id','id');
    }
    public function media(){
        return $this->hasMany(Media::class,'product_id','id');
    }
}
