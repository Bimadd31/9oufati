<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_details;
use App\Models\Category;
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
        try {

            if (Auth::user()) {

                $user_cart = DB::table('baskets')
                    ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                    ->where('user_id', '=', auth()->user()->id)
                    ->get();

                $cart_id = $user_cart[0]->id;
            }

            $fixed_baskets = DB::table('baskets AS B')

                ->leftJoin('Category AS C', 'B.category_id', '=', 'C.id')
                ->leftJoin('discounts AS D', 'B.discount_id', '=', 'D.id')
                ->selectRaw('C.name as category_name,B.*,
                D.name as discount_name,D.percent as discount_percent,D.active as discount_active,D.startDate as discount_startDate,D.endDate as discount_endDate,D.created_at as discount_created_at,D.updated_at as discount_updated_at')
                ->whereRaw('B.type = "fixed" AND B.active = 1')
                ->get();

            $products = DB::table('products AS P')
                ->leftJoin('Category AS C', 'P.category_id', '=', 'C.id')
                ->leftJoin('discounts AS D', 'P.discount_id', '=', 'D.id')
                ->selectRaw('C.name as category_name,P.*,
                D.name as discount_name,D.percent as discount_percent,D.active as discount_active,D.startDate as discount_startDate,D.endDate as discount_endDate,D.created_at as discount_created_at,D.updated_at as discount_updated_at')
                ->whereRaw('P.active = 1')
                ->get();

            $categories = DB::table('Category')->get();

            $products = $products->merge($fixed_baskets);

            $catProp = '';
            if ($_GET['cat']) {
                $catProp = $_GET['cat'];
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return view('shop.index', compact('products', 'categories', 'catProp'));
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
