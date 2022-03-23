<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement_details extends Model
{
    public function orders()
    {
        $this->belongsTo(Order::class);
    }
}
