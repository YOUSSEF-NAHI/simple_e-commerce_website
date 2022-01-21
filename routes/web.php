<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [WelcomeController::class, 'index'])->name('Welcome');

Route::get('/cart', [CartController::class, 'index'])->name('shoppingCart');
Route::get('/cart/add_product/{productId}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart/delete_product/{productId}', [CartController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/cart/increase_product/{productId}', [CartController::class, 'increaseProduct'])->name('increaseProduct');
Route::get('/cart/decrease_product/{productId}', [CartController::class, 'decreaseProduct'])->name('decreaseProduct');
Route::get('/cart/check_out', [CartController::class, 'checkOut'])->name('checkOut');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
