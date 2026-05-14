<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\RolePermission;
use Symfony\Component\HttpFoundation\Response;

class RbacMiddleware
{
    /**
     * Peta HTTP Method → kolom permission
     */
    protected array $methodPermissionMap = [
        'GET'    => 'can_read',
        'HEAD'   => 'can_read',
        'POST'   => 'can_create',
        'PUT'    => 'can_update',
        'PATCH'  => 'can_update',
        'DELETE' => 'can_delete',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 2. User tanpa role → tolak semua
        if (!$user->role_id) {
            abort(403, 'Akun Anda belum memiliki role yang ditetapkan.');
        }

        // 3. Ambil path request saat ini (tanpa leading slash)
        $currentPath = ltrim($request->path(), '/');

        // 4. Cari menu yang path-nya cocok (exact atau prefix resource)
        $menu = Menu::all()->first(function ($menu) use ($currentPath) {
            if (!$menu->path) return false;
            $menuPath = ltrim($menu->path, '/');
            // Cocokkan exact atau sebagai prefix (untuk /{id}, /{id}/edit, dll.)
            return $currentPath === $menuPath
                || str_starts_with($currentPath, $menuPath . '/');
        });

        // 5. Jika tidak ada menu yang cocok → izinkan (halaman non-menu seperti dashboard)
        if (!$menu) {
            return $next($request);
        }

        // 6. Tentukan jenis permission yang diperlukan
        $method          = strtoupper($request->method());
        $permissionKey   = $this->methodPermissionMap[$method] ?? 'can_read';

        // 7. Cek permission dari role_permissions
        $permission = RolePermission::where('role_id', $user->role_id)
            ->where('menu_id', $menu->id)
            ->first();

        if (!$permission || !$permission->$permissionKey) {
            // Kembalikan JSON jika request AJAX / fetch
            if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'error'   => 'Forbidden',
                    'message' => "Anda tidak memiliki izin '{$permissionKey}' untuk menu ini.",
                ], 403);
            }

            abort(403, "Anda tidak memiliki izin untuk mengakses halaman ini.");
        }

        return $next($request);
    }
}
