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
        $dataProduct = Product::all();
        $dataArticle = Article::all();
        $dataTestimonial = Testimonial::all();
        $dataHeroBanner = HeroBanner::all();
        $databenefit = Benefit::all();
        return view('user.page.index', [
            'dataArticle' => $dataArticle,
            'dataProduk' => $dataProduct,
            'dataTestimonial' => $dataTestimonial,
            'dataHeroBanner' => $dataHeroBanner,
            'databenefit' => $databenefit
        ]);
    }
}
