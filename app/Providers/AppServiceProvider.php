<?php

namespace App\Providers;

use App\Models\Basket_Basket;
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

            // return dd($this->getVariable());
        });
    }

    private function getVariable()
    {
        if (Auth::check()) {

            $user_cart = DB::table('baskets')->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();

            $user_cart_id = $user_cart[0]->id;

            $baskets = DB::table('baskets')
                ->join('basket_basket', 'basket_basket.fixed_basket_id', '=', 'baskets.id')
                ->join('Category', 'Category.id', '=', 'baskets.category_id')
                ->whereRaw("custom_basket_id = $user_cart_id")
                ->selectRaw('baskets.*,basket_basket.quantity,category.name AS category_name')
                ->get();

            $products = DB::table('products')
                ->join('basket_details', 'basket_details.product_id', '=', 'products.id')
                ->join('Category', 'Category.id', '=', 'products.category_id')
                ->whereRaw("basket_id = $user_cart_id")
                ->selectRaw('products.*,Category.name AS category_name,basket_details.*')
                ->get();

            $incart_products = $baskets->merge($products);

            return  $incart_products;
        } else {
            return $incart_products = null;
        }
    }
}
