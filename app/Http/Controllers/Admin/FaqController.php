<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        try {
            $faqs = Faq::all();
            return view('admin.faqs.index', compact('faqs'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data FAQ', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            Faq::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'FAQ berhasil ditambahkan.',
                'redirect' => route('admin.faqs.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan FAQ', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        try {
            $validated = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            $faq->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'FAQ berhasil diperbarui.',
                'redirect' => route('admin.faqs.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui FAQ', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
            return response()->json([
                'success' => true, 
                'message' => 'FAQ berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus FAQ', 'message' => $e->getMessage()], 500);
        }
    }
}
