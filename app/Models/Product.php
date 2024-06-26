<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function createdUser(){
        return $this->belongsTo(User::class,'created_by');
    }
    // public function images()
    // {
    //     return $this->belongsTo(ProductImage::class,'product_id','id');
    // }
}
