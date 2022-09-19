<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchasController;
use App\Http\Controllers\PaypalPaymentController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'index'])->name('Home');

Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'store']);

Route::get('/logout',[LoginController::class,'destroy']);

Route::get('/product/create',[ProductController::class, 'create']);
Route::post('product/create',[ProductController::class,'store']);


Route::get('/product/sales',[AccountController::class,'index']);
Route::get('/product/{product:name}',[ProductController::class, 'show']);


Route::get('/account', [AccountController::class,'create']);
Route::get('/Information', [AccountController::class,'dashboard']);

Route::get('/addToCart',[CartController::class,'goToCart']);
Route::post('/addToCart',[CartController::class,'store']);

Route::get('/cart',[CartController::class,'goToCart']);

Route::post('/cart/remove-item',[CartController::class,'removeItem']);
Route::post('/cart/adjustAmount',[CartController::class,'addAndDelete']);

Route::post('/product/buy',[PurchasController::class , 'index']);
Route::post('/product/finishBuying', [PurchasController::class, 'finishBuying']);

Route::post('/add/address',[AccountController::class , 'addAddress']);

Route::get('/orders',[AccountController::class, 'orders']);

Route::get('/my_products',[ProductController::class , 'myProducts']);
Route::delete('/product/delete/{product:id}',[ProductController::class , 'deleteProduct']);
Route::get('/product/{product:id}/edit',[ProductController::class, 'productEdit']);
Route::patch('/product/{product:id}',[ProductController::class , 'productUpdate']);


// paypal api routes

Route::post('/pay',[PaypalPaymentController::class , 'pay']);

// Route::get('success',[PurchasController::class, 'success']);
// Route::get('error',[PurchasController::class, 'error']);
