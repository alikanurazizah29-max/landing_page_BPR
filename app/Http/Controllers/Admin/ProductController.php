<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = Product::all();
            return view('admin.products.index', compact('products'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Produk', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'nullable|in:tabungan,deposito,kredit',
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:products,slug',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image|max:2048',
                'description' => 'required|string',
                'is_active' => 'nullable'
            ]);
            
            if (empty($validated['slug'])) {
                $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
            }
            if (empty($validated['type'])) {
                $validated['type'] = 'tabungan';
            }
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('uploads/products', 'public');
            }
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            Product::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Produk berhasil ditambahkan.',
                'redirect' => route('admin.products.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Produk', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'type' => 'nullable|in:tabungan,deposito,kredit',
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image|max:2048',
                'description' => 'required|string',
                'is_active' => 'nullable'
            ]);
            
            if (empty($validated['slug'])) {
                $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
            }
            if (empty($validated['type'])) {
                $validated['type'] = $product->type ?? 'tabungan';
            }
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('uploads/products', 'public');
            }
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            $product->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Produk berhasil diperbarui.',
                'redirect' => route('admin.products.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Produk', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Produk berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Produk', 'message' => $e->getMessage()], 500);
        }
    }
}
