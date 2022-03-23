<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket_details extends Model
{
    public function products()
    {
        $this->hasOne(Product::class);
    }
    public function baskets()
    {
        $this->hasOne(Basket::class);
    }
}
