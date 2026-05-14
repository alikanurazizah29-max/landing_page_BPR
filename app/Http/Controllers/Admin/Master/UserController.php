<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::with('role')->get();
            return view('admin.master.users.index', compact('users'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Pengguna', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.master.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'role_id'  => 'nullable|exists:roles,id',
            ]);

            $validated['is_active'] = $request->has('is_active') ? 1 : 0;
            $validated['password']  = Hash::make($validated['password']);

            User::create($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Pengguna berhasil ditambahkan.',
                'redirect' => route('admin.master.users.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Pengguna', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.master.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'email'    => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
                'role_id'  => 'nullable|exists:roles,id',
            ]);

            $validated['is_active'] = $request->has('is_active') ? 1 : 0;

            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            $user->update($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Pengguna berhasil diperbarui.',
                'redirect' => route('admin.master.users.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Pengguna', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Pengguna berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Pengguna', 'message' => $e->getMessage()], 500);
        }
    }
}
