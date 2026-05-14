<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        try {
            $menus = Menu::with('parent')->get();
            return view('admin.master.menus.index', compact('menus'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Menu', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('admin.master.menus.create', compact('parents'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'path'            => 'nullable|string|max:255',
                'permission_path' => 'nullable|string|max:255',
                'icon'            => 'nullable|string|max:255',
                'parent_id'       => 'nullable|exists:menus,id',
            ]);

            Menu::create($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Menu berhasil ditambahkan.',
                'redirect' => route('admin.master.menus.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Menu', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->get();
        return view('admin.master.menus.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, Menu $menu)
    {
        try {
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'path'            => 'nullable|string|max:255',
                'permission_path' => 'nullable|string|max:255',
                'icon'            => 'nullable|string|max:255',
                'parent_id'       => 'nullable|exists:menus,id',
            ]);

            $menu->update($validated);
            return response()->json([
                'success'  => true,
                'message'  => 'Menu berhasil diperbarui.',
                'redirect' => route('admin.master.menus.index'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Menu', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return response()->json(['success' => true, 'message' => 'Menu berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Menu', 'message' => $e->getMessage()], 500);
        }
    }
}
