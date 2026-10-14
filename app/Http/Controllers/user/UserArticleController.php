<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index()
    {
        // Hanya mengambil artikel yang sudah dipublikasikan
        $dataArticle = Article::where('is_published', true)->latest()->paginate(9);
        return view('user.page.articles', compact('dataArticle'));
    }

    public function detail($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        return view('user.page.single', compact('article', 'relatedArticles'));
    }
}