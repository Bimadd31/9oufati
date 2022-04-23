<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $guarded = [];

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
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function basket_basket()
    {
        return $this->belongsToMany(Basket_Basket::class);
    }
}
