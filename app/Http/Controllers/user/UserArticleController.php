<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index()
    {
        $dataArticle = Article::all();

        return view('user.page.articles', [
            'dataArticle' => $dataArticle,
        ]);
    }

    public function detail($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $dataArticle = Article::where('category',$article->category)->take(2)->get();

        return view('user.page.single', [
            'article' => $article,
            'dataArticle' => $dataArticle,
        ]);
    }
}
