<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data dummy untuk produk unggulan di beranda
        $featuredProducts = [
            [
                'nama' => 'Laptop ASUS ROG Strix',
                'harga' => 18500000,
                'deskripsi' => 'Laptop gaming berspesifikasi tinggi dengan Intel i7 dan RTX 4060.',
                'kategori' => 'Elektronik',
                'stok' => 10,
                'gambar' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=500&auto=format&fit=crop&q=60'
            ]
        ];

        return view('home', compact('featuredProducts'));
    }
}
