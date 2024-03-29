<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_payement extends Model
{
    public $table = "user_payements";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
