<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Benefit;
use App\Models\HeroBanner;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dataProduct = Product::where('is_active', true)->get();
        $dataArticle = Article::where('is_published', true)->latest()->take(3)->get();
        $dataTestimonial = Testimonial::where('is_active', true)->get();
        $dataHeroBanner = HeroBanner::where('is_active', true)->orderBy('order', 'asc')->get();
        $databenefit = Benefit::where('is_active', true)->get();
        return view('user.page.index', [
            'dataArticle' => $dataArticle,
            'dataProduk' => $dataProduct,
            'dataTestimonial' => $dataTestimonial,
            'dataHeroBanner' => $dataHeroBanner,
            'databenefit' => $databenefit
        ]);
    }
}
