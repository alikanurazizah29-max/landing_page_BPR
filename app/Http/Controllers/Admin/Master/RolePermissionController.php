<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Menu;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Tampilkan daftar semua Role (bukan daftar permission).
     */
    public function index()
    {
        try {
            $roles = Role::withCount('permissions')->get();
            return view('admin.master.role-permissions.index', compact('roles'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Tampilkan halaman matrix permission untuk satu Role.
     */
    public function manage(Role $role)
    {
        try {
            $menus = Menu::orderBy('parent_id')->orderBy('name')->get();

            // Susun permission yang sudah ada menjadi map: menu_id => RolePermission
            $existingPermissions = RolePermission::where('role_id', $role->id)
                ->get()
                ->keyBy('menu_id');

            return view('admin.master.role-permissions.manage', compact('role', 'menus', 'existingPermissions'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data permission', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Simpan semua permission untuk satu Role sekaligus (upsert).
     */
    public function save(Request $request, Role $role)
    {
        try {
            $menus = Menu::all();
            $permissionKeys = ['can_read', 'can_create', 'can_update', 'can_delete', 'can_report'];

            foreach ($menus as $menu) {
                $data = ['role_id' => $role->id, 'menu_id' => $menu->id];
                foreach ($permissionKeys as $key) {
                    $data[$key] = $request->has("{$key}_{$menu->id}") ? 1 : 0;
                }

                RolePermission::updateOrCreate(
                    ['role_id' => $role->id, 'menu_id' => $menu->id],
                    $data
                );
            }

            return response()->json([
                'success'  => true,
                'message'  => "Hak akses untuk role \"{$role->name}\" berhasil disimpan.",
                'redirect' => route('admin.master.role-permissions.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan hak akses', 'message' => $e->getMessage()], 500);
        }
    }

    // Method lama (create/store/edit/update/destroy) tidak diperlukan lagi,
    // tapi kita pertahankan destroy untuk menghapus seluruh permission satu role.
    public function destroy(Role $role)
    {
        try {
            RolePermission::where('role_id', $role->id)->delete();
            return response()->json(['success' => true, 'message' => "Semua hak akses role \"{$role->name}\" berhasil direset."]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mereset hak akses', 'message' => $e->getMessage()], 500);
        }
    }
}
