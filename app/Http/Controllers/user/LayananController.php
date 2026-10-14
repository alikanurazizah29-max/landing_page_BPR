<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\InterestRate; // Tambahkan import model InterestRate
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $dataproduk = Product::where('is_active', true)->get();
        $interestRates = InterestRate::where('is_active', true)->get(); // Ambil data suku bunga

        return view('user.page.layanan', [
            'dataproduk'    => $dataproduk,
            'interestRates' => $interestRates // Kirim ke view
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