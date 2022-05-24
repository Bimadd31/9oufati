<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $table = "users";


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected static function booted()
    {
        static::created(function ($user) {

            $basket_name = $user->last_name . " " . "'s basket";
            $category_panier = DB::table('Category')->where('name', 'PANIER')->select('id')->first();
            $user->baskets()->create([
                'name' => $basket_name,
                'type' => 'custom',
                'category_id' => $category_panier->id
            ]);
            // Mail::to($user->email)->send(new welcomeMail());
        });
    }

    public function user_payements()
    {
        return $this->hasMany(User_payement::class);
    }
    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function order_deliveries()
    {
        return $this->hasMany(Order_delivery::class);
    }
}
