<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan penting: Admin (role) → Menu → RolePermission → Data Profil & Konten Awal
        $this->call([
            AdminSeeder::class,          // Buat role ADMIN + akun admin@bpr.com
            MenuSeeder::class,           // Buat semua data menu
            RolePermissionSeeder::class, // Beri admin akses ke semua menu
            CompanyProfileSeeder::class, // Data profil, produk, suku bunga, keunggulan awal
        ]);
    }
}
