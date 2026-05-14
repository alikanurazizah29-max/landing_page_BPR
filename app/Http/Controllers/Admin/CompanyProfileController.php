<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function index(Request $request)
    {
        try {
            $company_profiles = CompanyProfile::all();
            return view('admin.company-profiles.index', compact('company_profiles'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Profil Perusahaan', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.company-profiles.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'content' => 'required|string',
                'image_path' => 'nullable|image|max:1024'
            ]);
            
            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('uploads/company-profiles', 'public');
            }
            
            
            CompanyProfile::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Profil Perusahaan berhasil ditambahkan.',
                'redirect' => route('admin.company-profiles.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Profil Perusahaan', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('admin.company-profiles.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'content' => 'required|string',
                'image_path' => 'nullable|image|max:1024'
            ]);
            
            if ($request->hasFile('image_path')) {
                // Hapus file lama jika ada
                if ($companyProfile->image_path && Storage::disk('public')->exists($companyProfile->image_path)) {
                    Storage::disk('public')->delete($companyProfile->image_path);
                }
                $validated['image_path'] = $request->file('image_path')->store('uploads/company-profiles', 'public');
            }
            
            
            $companyProfile->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Profil Perusahaan berhasil diperbarui.',
                'redirect' => route('admin.company-profiles.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Profil Perusahaan', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        try {
            // Hapus file fisik
            if ($companyProfile->image_path && Storage::disk('public')->exists($companyProfile->image_path)) {
                Storage::disk('public')->delete($companyProfile->image_path);
            }
            $companyProfile->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Profil Perusahaan berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Profil Perusahaan', 'message' => $e->getMessage()], 500);
        }
    }
}
