<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {

        $currentTime = Carbon::now();

        try {

            $user_basket = DB::table('baskets')
                ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();

            $data = $request->validate([
                'quantity' => 'required',
                'id' => 'required',
                'category_name' => 'required'
            ]);

            $category = $data['category_name'];

            if ($category == "PANIER") {
                DB::table('basket_basket')->insert([
                    'custom_basket_id' => $user_basket[0]->id,
                    'fixed_basket_id' =>  $data['id'],
                    'quantity' => $data['quantity'],
                    'created_at' => $currentTime->toDateTimeString()
                ]);
            } else {
                DB::table('basket_details')->insert([
                    'product_id' => $data['id'],
                    'basket_id' => $user_basket[0]->id,
                    'quantity' => $data['quantity'],
                    'created_at' => $currentTime->toDateTimeString()

                ]);
            }
        } catch (\Throwable $th) {
            return $th->getCode();
        };

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }
    public function update(Request $request, $id)
    {
        $category = $request->category_name;
        $quantity = $request->quantity;

        $user_basket = DB::table('baskets')
            ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
            ->where('user_id', '=', auth()->user()->id)->get();
        $user_basket_id = $user_basket[0]->id;


        if ($category == 'PANIER') {
            DB::table('basket_basket')
                ->whereRaw("custom_basket_id = $user_basket_id AND fixed_basket_id = $id")
                ->update(['quantity' => $quantity]);
        } else {

            DB::table('basket_details')
                ->whereRaw("product_id = $id AND basket_id = $user_basket_id")
                ->update(['quantity' => $quantity]);
        }
    }

    public function destroy(Request $request, $id)
    {

        $category = $request->category_name;

        $user_basket = DB::table('baskets')
            ->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
            ->where('user_id', '=', auth()->user()->id)->get();

        $user_basket_id = $user_basket[0]->id;

        if ($category == 'PANIER') {
            DB::table('basket_basket')
                ->whereRaw("custom_basket_id = $user_basket_id AND fixed_basket_id = $id")
                ->delete();
        } else {

            DB::table('basket_details')
                ->whereRaw("product_id = $id AND basket_id = $user_basket_id")
                ->delete();
        }
    }
}
