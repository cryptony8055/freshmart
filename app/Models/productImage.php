<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    use HasFactory;
    protected $fillable = ['location'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
