<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Addres;

class CartController extends Controller
{

    protected $attributes = [];

    public function goToCart()
    {
        // return 'item added successfully';
        return view('cart.index',[
            'cartItems' => CartItem::all()->where('cart_id','==',Auth::id()),
            'addres' => Addres::where('user_id','=',Auth::id())->first()
        ]);
    }

    public function updatingTotal()
    {
        $total_amount = CartItem::select('quantity')->where('cart_id','=',Auth::id())->sum('quantity');
        $total_price = CartItem::select('price')->where('cart_id','=',Auth::id())->sum('price');
        // dd($total_amount,$total_price);


        $cart = Cart::where('id','=',Auth::id())->first();
        $cart->total_products = (int)$total_amount;
        $cart->total_price = (float)$total_price;
        $cart->update();
    }

    public function addAndDelete(Request $request)
    {
        $price = request()->price;
        $item = CartItem::where('cart_id','=',Auth::id())->where('product_id','=',request()->product_id)->first();
        $totalQuantity = request()->totalQuantity;

        if($item !== null)
        {
            switch ($request->input('action'))
            {
                case 'increase':
                    if($item->quantity >= $totalQuantity){

                        return redirect('/cart')->with('success','We dont have this amount in stoks when it is available we will contact with you.');
                    }
                    else
                    {
                        $item->increment('quantity',1);
                        $item->increment('price',$price);
                        $item->save();
                        $this->updatingTotal();
                    }

                    break;

                case 'dicrease':
                    if($item->quantity > 1)
                    {
                        $item->decrement('quantity',1);
                        $item->decrement('price',$price);
                        $item->save();
                        $this->updatingTotal();
                    }
                    else
                    {
                        return $this->remove($item);
                    }
                    break;
            }



        }


        return redirect('/cart');

    }

    public function store()
    {
        $attributes = [
            'cart_id' => Auth::id(),
            'product_id' => request()->product_id,
            'quantity' => request()->quantity,
            'price' => request()->price,
        ];
        $item = CartItem::where('cart_id','=',$attributes['cart_id'])->where('product_id','=',$attributes['product_id'])->first();

        if ($item == null)
        {
            CartItem::create($attributes);
        }
        else
        {
            $price = $item->price;
            $item->increment('quantity',1);
            $item->increment('price',$price);
            $item->save();
        }

        $this->updatingTotal();
        return redirect('/cart');
    }

    public function removeItem()
    {
        $product_id = request()->id;
        $item = CartItem::where('cart_id','=',Auth::id())->where('product_id','=',$product_id)->first();
        return $this->remove($item);
    }

    public function remove($item)
    {
        if ($item !== null) {
            $item->delete();
        }
        $this->updatingTotal();
        return redirect('/cart')->with('success','The item has been deleted successfully');
    }


}
