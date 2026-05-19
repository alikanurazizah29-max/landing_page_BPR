<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $dataProduct=Product::all();
        $dataArticle=Article::all();
        return view ('user.page.index',[
            'dataArticle' => $dataArticle,
            'dataProduk' => $dataProduct
        ]);
    }

}
