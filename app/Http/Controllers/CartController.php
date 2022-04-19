<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $user_basket = DB::table('baskets')->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();


            $data = $request->validate([
                'quantity' => 'required',
                'product_id' => 'required',
            ]);

            DB::table('basket_details')->insert([
                'product_id' => $data['product_id'],
                'basket_id' => $user_basket[0]->id,
                'quantity' => $data['quantity'],
                'created_at' => $currentTime->toDateTimeString()

            ]);
        } catch (\Throwable $th) {
            return $th->getCode();
        };

        // $user->baskets()->basket_details()->create([
        //     'basket_id' => $user_basket[0]->id,
        //     'product_id' => $data['product_id'],
        //     'quantity' => $data['quantity']
        // ]);


        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }


    public function destroy($id)
    {
        try {
            $user_basket = DB::table('baskets')->whereRaw('active =  1 AND type = "custom" AND order_id IS NULL')
                ->where('user_id', '=', auth()->user()->id)->get();

            $user_basket_id = $user_basket[0]->id;

            $deleted = DB::table('basket_details')->whereRaw("product_id = $id AND basket_id = $user_basket_id")->delete();
        } catch (\Throwable $th) {
            return $th->getCode();
        }
    }
}
