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
                ->leftJoin('basket_basket', 'basket_basket.fixed_basket_id', '=', 'baskets.id')
                ->leftJoin('Category', 'Category.id', '=', 'baskets.category_id')
                ->leftJoin('discounts', 'baskets.discount_id', '=', 'discounts.id')
                ->whereRaw("custom_basket_id = $user_cart_id")
                ->selectRaw('baskets.*,basket_basket.quantity,category.name AS category_name,
                discounts.name as discount_name,discounts.percent as discount_percent,discounts.active as discount_active,discounts.startDate as discount_startDate,discounts.endDate as discount_endDate,discounts.created_at as discount_created_at,discounts.updated_at as discount_updated_at')
                ->get();

            $products = DB::table('products')
                ->leftJoin('basket_details', 'basket_details.product_id', '=', 'products.id')
                ->leftJoin('Category', 'Category.id', '=', 'products.category_id')
                ->leftJoin('discounts', 'products.discount_id', '=', 'discounts.id')
                ->whereRaw("basket_id = $user_cart_id")
                ->selectRaw('products.*,Category.name AS category_name,basket_details.*,
                discounts.name as discount_name,discounts.percent as discount_percent,discounts.active as discount_active,discounts.startDate as discount_startDate,discounts.endDate as discount_endDate,discounts.created_at as discount_created_at,discounts.updated_at as discount_updated_at')
                ->get();

            $incart_products = $baskets->merge($products);

            return  $incart_products;
        } else {
            return $incart_products = null;
        }
    }
}
