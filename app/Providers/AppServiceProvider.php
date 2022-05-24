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

            $user_cart = DB::table('baskets AS B')
                ->leftJoin('orders AS O', 'O.basket_id', '=', 'B.id')
                ->whereRaw('B.active =  1 AND B.type = "custom" AND O.basket_id IS NULL')
                ->select('B.id')
                ->where('B.user_id', '=', auth()->user()->id)->get();

            $user_cart_id = $user_cart[0]->id;

            $baskets = DB::table('baskets AS B')
                ->leftJoin('basket_basket AS B2B', 'B2B.fixed_basket_id', '=', 'B.id')
                ->leftJoin('Category AS C', 'C.id', '=', 'B.category_id')
                ->leftJoin('discounts AS D', 'B.discount_id', '=', 'D.id')
                ->selectRaw('B.*,B2B.quantity,C.name AS category_name,
                D.name as discount_name,D.percent as discount_percent,D.active as discount_active,D.startDate as discount_startDate,D.endDate as discount_endDate,D.created_at as discount_created_at,D.updated_at as discount_updated_at')
                ->whereRaw("custom_basket_id = $user_cart_id")
                ->get();

            $products = DB::table('products AS P')
                ->leftJoin('basket_details AS BD', 'BD.product_id', '=', 'P.id')
                ->leftJoin('Category AS C', 'C.id', '=', 'P.category_id')
                ->leftJoin('discounts AS D', 'P.discount_id', '=', 'D.id')
                ->selectRaw('P.*,C.name AS category_name,BD.*,
                D.name as discount_name,D.percent as discount_percent,D.active as discount_active,D.startDate as discount_startDate,D.endDate as discount_endDate,D.created_at as discount_created_at,D.updated_at as discount_updated_at')
                ->whereRaw("basket_id = $user_cart_id")
                ->get();

            $incart_products = $baskets->merge($products);

            return  $incart_products;
        } else {
            return $incart_products = null;
        }
    }
}
