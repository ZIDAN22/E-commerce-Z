<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


// Route::middleware('auth')->group(function(){
//     Route::resource('product', )
//  });