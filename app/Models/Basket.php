<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function user()
    {
        $this->belongsToMany(User::class);
    }
    public function orders()
    {
        $this->belongsToMany(Order::class);
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
