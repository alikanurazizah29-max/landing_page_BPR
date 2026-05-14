<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan penting: Admin (role) → Menu → RolePermission
        $this->call([
            AdminSeeder::class,          // Buat role ADMIN + akun admin@bpr.com
            MenuSeeder::class,           // Buat semua data menu
            RolePermissionSeeder::class, // Beri admin akses ke semua menu
        ]);
    }
}
