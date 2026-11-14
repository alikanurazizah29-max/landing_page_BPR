<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $companyProfile = CompanyProfile::firstOrNew();
        return view('admin.company-profiles.index', compact('companyProfile'));
    }

    public function create()
    {
        return redirect()->route('admin.company-profiles.index');
    }

    public function edit()
    {
        return redirect()->route('admin.company-profiles.index');
    }

    public function store(Request $request)
    {
        return $this->save($request);
    }

    public function update(Request $request)
    {
        return $this->save($request);
    }

    protected function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'company_name' => 'required|string|max:255',
                'headline'     => 'required|string|max:255',
                'subheadline'  => 'required|string',
                'about'        => 'required|string',
                'vision'       => 'nullable|string',
                'mission'      => 'nullable|string',
                'phone'        => 'nullable|string|max:50',
                'whatsapp'     => 'nullable|string|max:50',
                'email'        => 'nullable|email|max:100',
                'address'      => 'nullable|string',
                'ojk_text'     => 'nullable|string|max:255',
                'lps_text'     => 'nullable|string|max:255',
            ]);

            $companyProfile = CompanyProfile::firstOrNew();
            $companyProfile->fill($validated);
            $companyProfile->save();

            return response()->json([
                'success'  => true,
                'message'  => 'Profil Perusahaan berhasil diperbarui.',
                'redirect' => route('admin.company-profiles.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error'  => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error'   => 'Gagal memperbarui Profil Perusahaan',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy()
    {
        return response()->json(['error' => 'Profil Perusahaan utama tidak dapat dihapus.'], 403);
    }
}