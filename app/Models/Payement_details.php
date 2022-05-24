<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement_details extends Model
{
    public $table = "payement_details";
    protected $fillable = [
        'payement_method',
        'amount'
    ];

    public function orders()
    {
        $this->belongsTo(Order::class);
    }
}
