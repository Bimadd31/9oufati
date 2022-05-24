<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_delivery extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'address_line1',
        'address_line2',
        'city',
        'delivery_date',
        'status',
        'delivery_plan'
    ];
    public $table = "order_delivery";

    public function orders()
    {
        $this->belongsTo(Order::class);
    }
    public function user()
    {
        $this->hasOne(User::class);
    }
}
