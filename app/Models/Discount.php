<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $table = "discounts";

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function baskets()
    {
        return $this->belongsToMany(Basket::class);
    }
}
