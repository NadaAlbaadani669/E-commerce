<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','GoodBye!!');
    }

    public function create()
    {
        return view('Login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password' =>'required'
        ]);
        if (!auth()->attempt($attributes)) {
            return back()
            ->withInput()
            ->withErrors(['email'=>'Your information are wrong try to enter your information again']);


        }
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back');
    }
}
