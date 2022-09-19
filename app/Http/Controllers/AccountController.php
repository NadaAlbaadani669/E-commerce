<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchas;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::id();
         return view('product.sales',[
            'products'=> Product::all()->where('seller_id','==',$user)
        ]);
    }

    public function create()
    {
        return view('product.addProduct');
    }
    public function dashboard()
    {
        return view('product.dashboard',[
            'addres' => Addres::where('user_id','=',Auth::id())->first()
        ]);
    }

    public function addAddress()
    {
        $attributes = ([
            'addres' => request()->address,
            'user_id' => Auth::id()
        ]);
        Addres::create($attributes);

        return redirect('/Information')->with('success','Address added successfully');
    }

    public function orders()
    {
        return view('product.orders',[
            'items' => Purchas::where('buyer_id','=',Auth::id())->paginate(10)
        ]);
    }

}
