<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroBanner;

class HeroBannerController extends Controller
{
    public function index(Request $request)
    {
        try {
            $hero_banners = HeroBanner::all();
            return view('admin.hero-banners.index', compact('hero_banners'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Hero Banner', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.hero-banners.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image_path' => 'nullable|image|max:2048',
                'button_text' => 'nullable|string|max:255',
                'button_url' => 'nullable|string',
                'order' => 'required|integer',
                'is_active' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/hero-banners', 'public');
            }
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            HeroBanner::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Hero Banner berhasil ditambahkan.',
                'redirect' => route('admin.hero-banners.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Hero Banner', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(HeroBanner $heroBanner)
    {
        return view('admin.hero-banners.edit', compact('heroBanner'));
    }

    public function update(Request $request, HeroBanner $heroBanner)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'image_path' => 'nullable|image|max:2048',
                'button_text' => 'nullable|string|max:255',
                'button_url' => 'nullable|string',
                'order' => 'required|integer',
                'is_active' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/hero-banners', 'public');
            }
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            $heroBanner->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Hero Banner berhasil diperbarui.',
                'redirect' => route('admin.hero-banners.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Hero Banner', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(HeroBanner $heroBanner)
    {
        try {
            $heroBanner->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Hero Banner berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Hero Banner', 'message' => $e->getMessage()], 500);
        }
    }
}
