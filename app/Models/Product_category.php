<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category
extends Model
{
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
