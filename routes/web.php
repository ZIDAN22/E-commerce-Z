<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/home', App\Http\Controllers\homeController::class);     //  TASK SESI 11
Route::resource('/product', App\Http\Controllers\ProductController::class);     //  TASK SESI 11
Route::resource('/cart', App\Http\Controllers\cartController::class);
Route::resource('/checkout', App\Http\Controllers\checkoutController::class); 