<?php

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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

// Route::get('/account/{id}', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index')->middleware('auth');


// Route::patch('/account/{id}', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update')->middleware('auth');
