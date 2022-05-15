<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Auth::routes();


Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/checkout', [OrderController::class, 'index'])->name('order.index')->middleware('auth');


Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store')->middleware('auth');
Route::patch('/cart/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

// Route::get('/account/{id}', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index')->middleware('auth');


Route::patch('/account/{id}', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update')->middleware('auth');
