<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket_details;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('layouts.header', function ($view) {
            $view->with('incart_products', $this->getVariable());
        });
    }

    private function getVariable()
    {
        if (Auth::check()) {

            $user_cart = DB::table('baskets')->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();

            $user_cart_id = $user_cart[0]->id;

            $incart_products = Basket_details::whereRaw("basket_id = $user_cart_id")
                ->join('products', 'basket_details.product_id', '=', 'products.id')
                ->get();

            return $incart_products;
        }
    }
}
