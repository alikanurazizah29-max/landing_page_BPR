<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        try {
            $roles = Role::all();
            return view('admin.master.roles.index', compact('roles'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Role', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.master.roles.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'code' => 'required|string|max:50|unique:roles,code',
                'name' => 'required|string|max:255',
            ]);

            Role::create($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Role berhasil ditambahkan.',
                'redirect' => route('admin.master.roles.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Role', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Role $role)
    {
        return view('admin.master.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        try {
            $validated = $request->validate([
                'code' => 'required|string|max:50|unique:roles,code,' . $role->id,
                'name' => 'required|string|max:255',
            ]);

            $role->update($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Role berhasil diperbarui.',
                'redirect' => route('admin.master.roles.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Role', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return response()->json(['success' => true, 'message' => 'Role berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Role', 'message' => $e->getMessage()], 500);
        }
    }
}
