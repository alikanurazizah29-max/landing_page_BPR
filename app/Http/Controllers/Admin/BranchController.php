<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $branches = Branch::all();
            return view('admin.branches.index', compact('branches'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Jaringan Kantor', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'address' => 'required|string',
                'phone' => 'nullable|string|max:255',
                'whatsapp' => 'nullable|string|max:255',
                'maps_url' => 'nullable|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            if (!empty($validated['whatsapp'])) {
                $cleanWa = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
                if (str_starts_with($cleanWa, '0')) {
                    $cleanWa = '62' . substr($cleanWa, 1);
                }
                $validated['whatsapp'] = $cleanWa;
            }
            
            Branch::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Jaringan Kantor berhasil ditambahkan.',
                'redirect' => route('admin.branches.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Jaringan Kantor', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'address' => 'required|string',
                'phone' => 'nullable|string|max:255',
                'whatsapp' => 'nullable|string|max:255',
                'maps_url' => 'nullable|string',
                'is_active' => 'nullable'
            ]);
            
            
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            
            if (!empty($validated['whatsapp'])) {
                $cleanWa = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
                if (str_starts_with($cleanWa, '0')) {
                    $cleanWa = '62' . substr($cleanWa, 1);
                }
                $validated['whatsapp'] = $cleanWa;
            }
            
            $branch->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Jaringan Kantor berhasil diperbarui.',
                'redirect' => route('admin.branches.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Jaringan Kantor', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Jaringan Kantor berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Jaringan Kantor', 'message' => $e->getMessage()], 500);
        }
    }
}
