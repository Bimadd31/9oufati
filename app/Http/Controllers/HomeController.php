<?php

namespace App\Http\Controllers;

use App\Models\Basket_details;
use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index(\App\Models\User $user)
    {

        $Category = DB::table('Category')->get();


        return view('home', compact('user', 'Category'));
    }
}
