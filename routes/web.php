<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Client\CartController;
use App\Http\Controllers\Dashboard\Client\CheckoutController;
use App\Http\Controllers\Dashboard\Client\OrderController;
use App\Http\Controllers\Dashboard\ClientController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes([
    'register'=>false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');














Route::group(['prefix' =>  LaravelLocalization::setLocale(),'middleware' => [ 'auth','is_admin','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('admin',[DashboardController::class, 'index'])->name('admin');
    Route::group(['prefix'=>'admin'],function(){
        Route::resource('user',UserController::class)->except('show');
        Route::resource('category',CategoryController::class)->except('show');
        Route::resource('product',ProductController::class)->except('show');
        Route::resource('client',ClientController::class)->except('show');
        Route::resource('client.cart',CartController::class)->except('create','show','edit','update');
        Route::get('client/{client}/cart/{cart}/update/{status}',[CartController::class,'updateCart'])->name('client.cart.update');
        Route::get('checkout/client/{id}',[CheckoutController::class, 'checkout'])->name('checkout');
        Route::resource('client.order',OrderController::class)->except('index','update','edit','show','destory');
        Route::resource('order',OrdersController::class)->except('create','store');


    });
});
