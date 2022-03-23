<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function payement_details()
    {
        $this->hasOne(Payement_details::class);
    }
    public function baskets()
    {
        $this->hasMany(Basket::class);
    }
    public function order_deliveries()
    {
        $this->hasOne(Order_delivery::class);
    }
}
