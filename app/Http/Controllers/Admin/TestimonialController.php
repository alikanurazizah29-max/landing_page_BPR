<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        try {
            $testimonials = Testimonial::all();
            return view('admin.testimonials.index', compact('testimonials'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Testimoni', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'content' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'image_path' => 'nullable|image|max:1024',
                'is_active' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/testimonials', 'public');
            }
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            Testimonial::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Testimoni berhasil ditambahkan.',
                'redirect' => route('admin.testimonials.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Testimoni', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'content' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'image_path' => 'nullable|image|max:1024',
                'is_active' => 'nullable'
            ]);
            
            if ($request->hasFile('image_path')) {
                // Hapus file lama jika ada
                if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
                    Storage::disk('public')->delete($testimonial->image_path);
                }
                $validated['image_path'] = $request->file('image_path')->store('uploads/testimonials', 'public');
            }
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            $testimonial->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Testimoni berhasil diperbarui.',
                'redirect' => route('admin.testimonials.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Testimoni', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            // Hapus file fisik
            if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
                Storage::disk('public')->delete($testimonial->image_path);
            }
            $testimonial->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Testimoni berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Testimoni', 'message' => $e->getMessage()], 500);
        }
    }
}
