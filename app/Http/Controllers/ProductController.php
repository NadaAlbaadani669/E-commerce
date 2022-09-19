<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;



class ProductController extends Controller
{
    public function index()
    {
        return view('product.index' ,[
            'products' => Product::latest()->filter(request(['search','category']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Product $product)
    {
        return view('product.show',[
            'product'=>$product
        ]);
    }

    public function create()
    {
        return view('product.addProduct');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'=>'required',
            'slug' => ['required',Rule::unique('products','slug')],
            'price'=>'required|integer|not_in:0',
            'image' =>'required|image',
            'category_id'=>['required', Rule::exists('categories','id')],
            'description' => 'required',
            'quantity'=>'required|integer|not_in:0'
        ]);

        $attributes['seller_id']= auth()->id();
        $attributes['image']=request()->file('image')->store('images');

        Product::create($attributes);

        return redirect('/product/create')->with('success','Product added successfully');

    }

    public function myProducts()
    {
        return view('product.myProducts',[
            'products' => Product::all()->where('seller_id','=',Auth::id())
        ]);
    }

    public function deleteProduct(Product $product)
    {
        $product -> delete();
        return redirect('/my_products')->with('success','The product has been deleted successfully.');
    }

    public function productEdit(Product $product)
    {
        return view('product.edit',['product'=>$product]);
    }

    public function productUpdate(Product $product)
    {
        $attributes = request()->validate([
            'name'=>'required',
            'slug' => ['required',Rule::unique('products','slug')->ignore($product->id)],
            'price'=>'required|integer|not_in:0',
            'image' =>'image',
            'category_id'=>['required', Rule::exists('categories','id')],
            'description' => 'required',
            'quantity'=>'required|integer|not_in:0'
        ]);

        if(isset($attributes['image']))
        {
            $attributes['image']=request()->file('image')->store('images');
        }

        $product->update($attributes);

        return redirect('/my_products')->with('success','Product Updated successfully.');

    }


}
