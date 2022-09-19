<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Cart;


class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:5|max:255',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:7']
            //    ,'regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        $user =User::create($attributes);


        Cart::create([
            'customer_id' => $user->id,
            'total_products'=>0,
            'total_price'=>0
        ]);

        return redirect('/')->with('success','Your account has been created.');
    }
}
