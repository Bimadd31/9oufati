<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Order_delivery;
use App\Models\Payement_details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // if (Auth::user()) {

        //     $user_cart = DB::table('baskets')
        //         ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
        //         ->where('user_id', '=', auth()->user()->id)
        //         ->get();

        //     $cart_id = $user_cart[0]->id;
        // }



        return view('checkout.index');
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
    public function store(Request $request,)
    {
        //
        $user_cart = DB::table('baskets AS B')
            ->leftJoin('orders AS O', 'O.basket_id', '=', 'B.id')
            ->whereRaw('B.active =  1 AND B.type = "custom" AND O.basket_id IS NULL')
            ->select('B.id')
            ->where('B.user_id', '=', auth()->user()->id)->get();

        $user_cart_id = $user_cart[0]->id;
        $checkoutAddress = $request['checkoutAddress'];
        $order_delivery = Order_delivery::create([
            "full_name" => $checkoutAddress['first_name'],
            "phone" => $checkoutAddress['phone'],
            "address_line1" => $checkoutAddress['address_line1'],
            "address_line2" => $checkoutAddress['address_line2'],
            "city" => $checkoutAddress['city'],
            "delivery_date" => $request['checkoutDeliveryDate'],
            "status" => "En traitement",

        ]);
        $payement_details = Payement_details::create([
            "payement_method" => $request['checkoutPayement'],
            "amount" => $request['total'],
        ]);

        $order = Order::create([
            "total" => $request['total'],
            "note" => $request['note'],
            "status" => "Nouveau",
            "active" => 1,
            "onsite" => 1,
            "basket_id" => $user_cart_id,
            "user_id" => auth()->user()->id,
            "delivery_id" => $order_delivery->id,
            "payement_details_id" => $payement_details->id,
        ]);

        $basket_name = auth()->user()->last_name . "" . "'s basket";
        $category_panier = DB::table('Category')->where('name', 'PANIER')->select('id')->first();

        Basket::create([
            'name' => $basket_name,
            'type' => 'custom',
            'category_id' => $category_panier->id,
            'user_id' => auth()->user()->id
        ]);
        return $order->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
