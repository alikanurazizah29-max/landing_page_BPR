<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $dataproduk = Product::where('is_active', true)->get();

        return view('user.page.layanan', [
            'dataproduk' => $dataproduk
        ]);
    }

    public function detail($slug)
    {
        $produk = Product::where('is_active', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)
                      ->orWhere('id', $slug);
            })
            ->firstOrFail();

        return view('user.page.produk', compact('produk'));
    }
}
