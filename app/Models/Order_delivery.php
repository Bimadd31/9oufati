<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_delivery extends Model
{
    public function orders()
    {
        $this->belongsTo(Order::class);
    }
    public function user()
    {
        $this->hasOne(User::class);
    }
}
