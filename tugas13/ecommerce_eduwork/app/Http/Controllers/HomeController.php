<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        // Mengambil semua produk, diurutkan dari yang terbaru, dan batasi 12 produk per halaman (pagination)
        // Menggunakan eager loading 'category' agar query lebih efisien
        $products = Product::with('category')->latest()->paginate(12);

        // Kirim data produk ke file view home.blade.php
        return view('home', compact('products'));
    }
}
