<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Menu;
use App\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('code', 'ADMIN')->first();

        if (!$adminRole) {
            $this->command->warn('Role ADMIN tidak ditemukan. Jalankan RoleSeeder terlebih dahulu.');
            return;
        }

        $menus = Menu::all();

        foreach ($menus as $menu) {
            // Parent menu (tanpa path) tidak perlu permission
            if (!$menu->path) continue;

            RolePermission::updateOrCreate(
                ['role_id' => $adminRole->id, 'menu_id' => $menu->id],
                [
                    'can_read'   => true,
                    'can_create' => true,
                    'can_update' => true,
                    'can_delete' => true,
                    'can_report' => true,
                ]
            );
        }

        $this->command->info("✅ Admin mendapat akses ke {$menus->whereNotNull('path')->count()} menu.");
    }
}
