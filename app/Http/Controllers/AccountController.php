<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use app\Repositories\UserRepository;


use function Ramsey\Uuid\v1;

class AccountController extends Controller
{

    function index(\App\Models\User $user, $id, \App\Models\User_address $address)
    {
        if (auth()->user()->id == $id) {
            $user = $user->find($id);
            $address = $address::where('user_id', $id)->get();
            return view("./account/index", compact('user', 'address'));
        } else {
            return response('', '403');
        }
    }

    function update(\App\Models\User $user, $id)
    {
        if (auth()->user()->id == $id) {

            $data = request()->validate([

                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'numeric|nullable',

            ]);
            $user = User::find($id);

            $user->update($data);

            return redirect("/account/{$id}");
        }
    }
}
