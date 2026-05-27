<?php

use Illuminate\Support\Facades\Route;

// Import masing-masing controller yang baru dibuat
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Setiap route sekarang mengarah ke controllernya sendiri
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class)->names(['index' => 'products']);
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');