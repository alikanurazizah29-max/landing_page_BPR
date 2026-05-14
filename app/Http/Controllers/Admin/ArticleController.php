<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $articles = Article::all();
            return view('admin.articles.index', compact('articles'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Berita & Artikel', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'category' => 'nullable|string|max:255',
                'excerpt' => 'nullable|string',
                'content' => 'required|string',
                'image_path' => 'nullable|image|max:2048',
                'is_published' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/articles', 'public');
            }
            
            $validated['is_published'] = $request->has('is_published') ? 1 : 0;
            
            Article::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Berita & Artikel berhasil ditambahkan.',
                'redirect' => route('admin.articles.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Berita & Artikel', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'category' => 'nullable|string|max:255',
                'excerpt' => 'nullable|string',
                'content' => 'required|string',
                'image_path' => 'nullable|image|max:2048',
                'is_published' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/articles', 'public');
            }
            
            $validated['is_published'] = $request->has('is_published') ? 1 : 0;
            
            $article->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Berita & Artikel berhasil diperbarui.',
                'redirect' => route('admin.articles.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Berita & Artikel', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Article $article)
    {
        try {
            $article->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Berita & Artikel berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Berita & Artikel', 'message' => $e->getMessage()], 500);
        }
    }
}
