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
            $view->with('basket_products', $this->getVariable());
        });
    }

    private function getVariable()
    {
        if (Auth::check()) {

            $user_basket = DB::table('baskets')->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();

            $user_basket_id = $user_basket[0]->id;

            $basket_products = Basket_details::whereRaw("basket_id = $user_basket_id")
                ->join('products', 'basket_details.product_id', '=', 'products.id')
                ->get();

            return $basket_products;
        }
    }
}
