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
        $article = Article::where('slug', $slug)->firstOrFail();
        $dataArticle = Article::where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->take(2)
            ->get();

        if ($dataArticle->isEmpty()) {
            $dataArticle = Article::where('id', '!=', $article->id)
                ->latest()
                ->take(2)
                ->get();
        }

        return view('user.page.single', [
            'article' => $article,
            'dataArticle' => $dataArticle,
        ]);
    }
}
