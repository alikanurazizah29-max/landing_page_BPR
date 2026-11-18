<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\RolePermission;
use App\Models\Menu;

class MenuServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        \View::composer('*', function ($view) {
            $verticalMenuData = $this->buildSidebarData();
            \View::share('menuData', [$verticalMenuData]);
        });
    }

    protected function buildSidebarData(): object
    {
        // Item Dashboard BPR selalu ada di posisi paling atas
        $dashboardItem = (object)[
            'url'   => 'admin',
            'name'  => 'Dashboard BPR',
            'icon'  => 'menu-icon tf-icons mdi mdi-home-outline',
            'slug'  => 'dashboard-analytics',
        ];

        $adminItems = [];

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role_id) {
                // Ambil semua menu_id yang boleh dibaca role ini
                $allowedMenuIds = RolePermission::where('role_id', $user->role_id)
                    ->where('can_read', true)
                    ->pluck('menu_id')
                    ->toArray();

                // Bangun item sidebar dari DB
                $adminItems = $this->buildAdminMenuItems($allowedMenuIds);
            }
        }

        // Jika user belum login atau DB belum diset, gunakan menu JSON (yang sudah bersih dari demo template)
        if (empty($adminItems)) {
            $jsonItems = $this->loadMenuJson();
            return (object)['menu' => $jsonItems];
        }

        // Gabungkan: Dashboard BPR + Menu Admin BPR
        $allItems = array_merge([$dashboardItem], $adminItems);

        return (object)['menu' => $allItems];
    }

    /**
     * Bangun item admin sidebar dari database.
     * Hanya tampilkan child yang ada di allowedMenuIds.
     * Parent (root) tampil hanya jika ada child yang lolos.
     */
    protected function buildAdminMenuItems(array $allowedMenuIds): array
    {
        if (empty($allowedMenuIds)) return [];

        // Load semua parent menu (root, parent_id = null)
        $parents = Menu::whereNull('parent_id')
            ->orderBy('id')
            ->get();

        $items              = [];
        $hasMasterHeader    = false;
        $hasManajemenHeader = false;

        foreach ($parents as $parent) {
            // ── Case 1: Root menu DENGAN path (direct link, bukan dropdown) ──
            if ($parent->path && in_array($parent->id, $allowedMenuIds)) {
                $path = ltrim($parent->path, '/');
                $items[] = (object)[
                    'url'  => $path,
                    'name' => $parent->name,
                    'icon' => $parent->icon
                        ? 'menu-icon tf-icons ' . $parent->icon
                        : 'menu-icon tf-icons mdi mdi-circle-outline',
                    'slug' => str_replace('/', '.', $path),
                ];
                continue;
            }

            // ── Case 2: Root menu TANPA path (grup/dropdown) ──
            $children = Menu::where('parent_id', $parent->id)
                ->whereIn('id', $allowedMenuIds)
                ->whereNotNull('path')
                ->orderBy('id')
                ->get();

            if ($children->isEmpty()) continue;

            // Section Header pemisah rapi
            if ($parent->name === 'Master Data' && !$hasMasterHeader) {
                $items[] = (object)['menuHeader' => 'Master Data'];
                $hasMasterHeader = true;
            } elseif ($parent->name !== 'Master Data' && !$hasManajemenHeader) {
                $items[] = (object)['menuHeader' => 'Manajemen Data'];
                $hasManajemenHeader = true;
            }

            // Bangun submenu
            $submenu = $children->map(function ($child) {
                $path = ltrim($child->path ?? '', '/');
                return (object)[
                    'url'  => $path,
                    'name' => $child->name,
                    'slug' => str_replace('/', '.', $path),
                ];
            })->values()->toArray();

            $items[] = (object)[
                'name'    => $parent->name,
                'icon'    => $parent->icon
                    ? 'menu-icon tf-icons ' . $parent->icon
                    : 'menu-icon tf-icons mdi mdi-circle-outline',
                'submenu' => $submenu,
            ];
        }

        return $items;
    }

    /**
     * Ambil struktur menu bersih dari JSON jika DB kosong / unauthenticated
     */
    protected function loadMenuJson(): array
    {
        $jsonPath = base_path('resources/menu/verticalMenu.json');
        if (!file_exists($jsonPath)) return [];

        $data = json_decode(file_get_contents($jsonPath));
        return $data->menu ?? [];
    }
}
