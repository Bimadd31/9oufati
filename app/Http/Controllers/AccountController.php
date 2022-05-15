<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use app\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class AccountController extends Controller
{

    function index(\App\Models\User $user, $id)
    {
        // if (auth()->user()->id == $id) {
        //     $user = $user->find($id);
        //     $address = $address::where('user_id', $id)->get();
        //     return view("./account/index", compact('user', 'address'));
        // } else {
        //     return response('', '403');
        // }
    }

    function update(Request $request, $id)
    {
        $currentTime = Carbon::now();

        if (auth()->user()->id == $id) {

            $data = $request->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'phone' => 'numeric|required',
                'address_line1' => 'required',
                'address_line2' => 'nullable',
                'city' => 'required',
                'updated_at' => $currentTime->toDateTimeString()

            ]);


            $updated = DB::table('users')
                ->where('id', $id)
                ->update($data);
            return $updated;
        }
    }
}
