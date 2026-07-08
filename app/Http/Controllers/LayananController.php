<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $dataproduk = Product::all();

        return view('user.page.layanan', [
            'dataproduk' => $dataproduk
        ]);
    }

    public function detail($id)
    {
        $produk = Product::findOrFail($id);
        return view('user.page.produk', compact('produk'));
    }
}
