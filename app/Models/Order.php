<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "orders";

    protected $fillable = [
        'total',
        'note',
        'status',
        'user_id',
        'delivery_id',
        'payement_details_id',
        'basket_id'
    ];
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
        $this->hasOne(Basket::class);
    }
    public function order_deliveries()
    {
        $this->hasOne(Order_delivery::class);
    }
}
