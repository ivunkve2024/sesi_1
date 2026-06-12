<?php

use Illuminate\Support\Facades\Route;

// Import masing-masing controller yang baru dibuat
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('detail-product');