<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function(){ return view('admin.dashboard'); })->name('dashboard');     //  TASK SESI 11
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('/home', App\Http\Controllers\homeController::class);     //  TASK SESI 11
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/product', App\Http\Controllers\ProductController::class);     //  TASK SESI 11
    Route::resource('/category', App\Http\Controllers\CategoryController::class);     //  TASK SESI 11
    Route::resource('/cart', App\Http\Controllers\cartController::class);
    Route::resource('/checkout', App\Http\Controllers\checkoutController::class);
});

require __DIR__ . '/auth.php';
