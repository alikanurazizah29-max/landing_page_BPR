<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestRate;

class InterestRateController extends Controller
{
    public function index(Request $request)
    {
        try {
            $interest_rates = InterestRate::all();
            return view('admin.interest-rates.index', compact('interest_rates'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Suku Bunga', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.interest-rates.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_type' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'rate' => 'required|numeric',
                'description' => 'nullable|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            InterestRate::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Suku Bunga berhasil ditambahkan.',
                'redirect' => route('admin.interest-rates.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Suku Bunga', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(InterestRate $interestRate)
    {
        return view('admin.interest-rates.edit', compact('interestRate'));
    }

    public function update(Request $request, InterestRate $interestRate)
    {
        try {
            $validated = $request->validate([
                'product_type' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'rate' => 'required|numeric',
                'description' => 'nullable|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            $interestRate->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Suku Bunga berhasil diperbarui.',
                'redirect' => route('admin.interest-rates.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Suku Bunga', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(InterestRate $interestRate)
    {
        try {
            $interestRate->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Suku Bunga berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Suku Bunga', 'message' => $e->getMessage()], 500);
        }
    }
}
