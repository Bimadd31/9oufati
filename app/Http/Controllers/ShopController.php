<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_details;
use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()) {
            $products = DB::table('products')
                ->join('product_category', 'products.category_id', '=', 'product_category.id')
                ->selectRaw('product_category.name as category_name,products.*')
                ->get();
        } else {

            $user_basket = DB::table('baskets')
                ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)
                ->get();

            $basket_id = $user_basket[0]->id;

            $products = DB::table('products')
                ->join('product_category', 'products.category_id', '=', 'product_category.id')
                ->selectRaw('product_category.name as category_name,products.*')
                // ->leftJoin('basket_details', 'products.id', '=', 'basket_details.product_id')
                ->get();
        }
        $categories = DB::table('product_category')->get();

        return view('shop.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
