<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitController extends Controller
{
    public function index(Request $request)
    {
        try {
            $benefits = Benefit::all();
            return view('admin.benefits.index', compact('benefits'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Keunggulan', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.benefits.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'icon' => 'nullable|string|max:255',
                'description' => 'required|string'
            ]);
            
            
            
            Benefit::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Keunggulan berhasil ditambahkan.',
                'redirect' => route('admin.benefits.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Keunggulan', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Benefit $benefit)
    {
        return view('admin.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, Benefit $benefit)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'icon' => 'nullable|string|max:255',
                'description' => 'required|string'
            ]);
            
            
            
            $benefit->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Keunggulan berhasil diperbarui.',
                'redirect' => route('admin.benefits.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Keunggulan', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Benefit $benefit)
    {
        try {
            $benefit->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Keunggulan berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Keunggulan', 'message' => $e->getMessage()], 500);
        }
    }
}
