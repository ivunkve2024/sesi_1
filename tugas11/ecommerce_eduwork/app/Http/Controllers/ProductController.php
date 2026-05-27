<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = [
            [
                'nama' => 'Laptop ASUS ROG Strix',
                'harga' => 18500000,
                'deskripsi' => 'Laptop gaming berspesifikasi tinggi dengan Intel i7 dan RTX 4060.',
                'kategori' => 'Elektronik',
                'stok' => 10,
                'gambar' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=500&auto=format&fit=crop&q=60'
            ],
            [
                'nama' => 'Smartphone Samsung S24',
                'harga' => 13999000,
                'deskripsi' => 'Flagship smartphone dengan fitur AI kamera terbaru dan layar AMOLED.',
                'kategori' => 'Elektronik',
                'stok' => 15,
                'gambar' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=500&auto=format&fit=crop&q=60'
            ],
            [
                'nama' => 'Sepatu Running Nike Airmax',
                'harga' => 2200000,
                'deskripsi' => 'Sepatu lari super empuk, ringan, dan sangat nyaman digunakan olahraga harian.',
                'kategori' => 'Fashion',
                'stok' => 8,
                'gambar' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&auto=format&fit=crop&q=60'
            ]
        ];

        if ($request->filled('kategori')) {
            $products = array_filter($products, function($item) use ($request) {
                return $item['kategori'] == $request->kategori;
            });
        }
        return view('products', compact('products'));
    }
}
