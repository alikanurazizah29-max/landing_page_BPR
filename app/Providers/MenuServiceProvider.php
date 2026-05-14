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
        // Selalu load template/referensi dari JSON (non-admin items)
        $templateItems = $this->loadTemplateItems();

        // Item Dashboard BPR selalu ada di atas
        $dashboardItem = (object)[
            'url'   => 'admin',
            'name'  => 'Dashboard BPR',
            'icon'  => 'menu-icon tf-icons mdi mdi-home-outline',
            'slug'  => 'admin-dashboard',
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

        // Gabungkan: Dashboard + Admin menus + Template referensi
        $allItems = array_merge([$dashboardItem], $adminItems, $templateItems);

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

        $items    = [];
        $hasItems = false;

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
                $hasItems = true;
                continue;
            }

            // ── Case 2: Root menu TANPA path (grup/dropdown) ──
            $children = Menu::where('parent_id', $parent->id)
                ->whereIn('id', $allowedMenuIds)
                ->whereNotNull('path')
                ->orderBy('id')
                ->get();

            if ($children->isEmpty()) continue;

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

            $hasItems = true;
        }

        // Tambah section header di atas jika ada item
        if ($hasItems) {
            array_unshift($items, (object)['menuHeader' => 'MANAJEMEN']);
        }

        return $items;
    }

    /**
     * Ambil item non-admin dari JSON (template referensi).
     * Item yang URL-nya dimulai dengan "admin/" diabaikan karena sudah diurus DB.
     */
    protected function loadTemplateItems(): array
    {
        $jsonPath = base_path('resources/menu/verticalMenu.json');
        if (!file_exists($jsonPath)) return [];

        $data = json_decode(file_get_contents($jsonPath));
        if (!isset($data->menu)) return [];

        return $this->filterTemplateOnly($data->menu);
    }

    /**
     * Rekursif: ambil hanya item yang BUKAN admin/* (template/referensi).
     */
    protected function filterTemplateOnly(array $items): array
    {
        $result = [];

        foreach ($items as $item) {
            // Header section — pertahankan dulu, bersihkan yatim di akhir
            if (isset($item->menuHeader)) {
                $result[] = $item;
                continue;
            }

            // Item dengan submenu — filter rekursif
            if (isset($item->submenu)) {
                $filtered = $this->filterTemplateOnly($item->submenu);
                if (!empty($filtered)) {
                    $item->submenu = $filtered;
                    $result[] = $item;
                }
                continue;
            }

            // Item dengan URL
            if (isset($item->url)) {
                $path = ltrim($item->url, '/');
                // Tampilkan hanya jika BUKAN admin/* (referensi template)
                if ($path !== 'admin' && !str_starts_with($path, 'admin/')) {
                    $result[] = $item;
                }
                continue;
            }

            $result[] = $item;
        }

        return $this->removeOrphanHeaders($result);
    }

    /**
     * Hapus menuHeader yang tidak diikuti item apapun.
     */
    protected function removeOrphanHeaders(array $items): array
    {
        $result = [];
        $count  = count($items);

        for ($i = 0; $i < $count; $i++) {
            $current = $items[$i];

            if (isset($current->menuHeader)) {
                $hasContent = false;
                for ($j = $i + 1; $j < $count; $j++) {
                    if (isset($items[$j]->menuHeader)) break;
                    $hasContent = true;
                    break;
                }
                if ($hasContent) $result[] = $current;
            } else {
                $result[] = $current;
            }
        }

        return $result;
    }
}
