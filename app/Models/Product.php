<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Product_category()
    {
        return $this->hasOne(Product_category::class);
    }
    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function basket_details()
    {
        return $this->belongsToMany(Basket_details::class);
    }
}
