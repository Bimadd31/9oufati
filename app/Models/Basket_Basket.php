<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket_Basket extends Model
{
    public function baskets()
    {
        $this->hasMany(Basket::class);
    }
}
