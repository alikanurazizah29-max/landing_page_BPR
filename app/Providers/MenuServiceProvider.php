<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\RolePermission;

class MenuServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        \View::composer('*', function ($view) {
            // Load raw menu JSON
            $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
            $verticalMenuData = json_decode($verticalMenuJson);

            // Jika user sudah login, filter berdasarkan can_read
            if (Auth::check()) {
                $user = Auth::user();

                if ($user->role_id) {
                    // Ambil semua menu yang boleh dibaca oleh role ini (path-nya ada di DB)
                    $allowedPaths = RolePermission::with('menu')
                        ->where('role_id', $user->role_id)
                        ->where('can_read', true)
                        ->get()
                        ->pluck('menu.path')
                        ->filter()
                        ->map(fn($p) => ltrim($p, '/'))
                        ->toArray();

                    // Filter item menu dari JSON
                    $verticalMenuData->menu = $this->filterMenuItems(
                        $verticalMenuData->menu,
                        $allowedPaths
                    );
                }
            }

            \View::share('menuData', [$verticalMenuData]);
        });
    }

    /**
     * Filter menu items secara rekursif berdasarkan allowed paths.
     * - Menu header: selalu tampil
     * - Menu tanpa URL (parent group): tampil HANYA jika punya anak yang lolos filter
     * - Menu dengan URL: tampil HANYA jika path-nya ada di allowedPaths
     */
    protected function filterMenuItems(array $items, array $allowedPaths): array
    {
        $filtered = [];

        foreach ($items as $item) {
            // Menu header (divider label) — selalu tampilkan
            if (isset($item->menuHeader)) {
                $filtered[] = $item;
                continue;
            }

            // Menu dengan submenu (parent group)
            if (isset($item->submenu)) {
                $filteredSubmenu = $this->filterMenuItems($item->submenu, $allowedPaths);

                // Tampilkan parent hanya jika ada anak yang lolos
                if (!empty($filteredSubmenu)) {
                    $item->submenu = $filteredSubmenu;
                    $filtered[] = $item;
                }
                continue;
            }

            // Menu dengan URL — cek apakah path ada di allowedPaths
            if (isset($item->url)) {
                $itemPath = ltrim($item->url, '/');
                if (in_array($itemPath, $allowedPaths)) {
                    $filtered[] = $item;
                }
                continue;
            }

            // Item lain (tanpa url & tanpa submenu) — tampilkan saja
            $filtered[] = $item;
        }

        // Bersihkan menu header yang jadi "yatim" (tidak punya item di bawahnya)
        return $this->removeOrphanHeaders($filtered);
    }

    /**
     * Hapus menuHeader yang tidak diikuti item apapun (atau hanya diikuti header lain).
     */
    protected function removeOrphanHeaders(array $items): array
    {
        $result = [];
        $count  = count($items);

        for ($i = 0; $i < $count; $i++) {
            $current = $items[$i];

            if (isset($current->menuHeader)) {
                // Cek apakah ada item non-header setelahnya (sebelum header berikutnya)
                $hasContent = false;
                for ($j = $i + 1; $j < $count; $j++) {
                    if (isset($items[$j]->menuHeader)) break;
                    $hasContent = true;
                    break;
                }

                if ($hasContent) {
                    $result[] = $current;
                }
            } else {
                $result[] = $current;
            }
        }

        return $result;
    }
}
