<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Master Data ───────────────────────────────────────────────
        $masterParent = Menu::create(['name' => 'Master Data', 'path' => null, 'icon' => 'mdi mdi-database-cog-outline']);

        Menu::create(['name' => 'Menu',       'path' => 'admin/master/menus',            'icon' => 'mdi mdi-menu',                  'parent_id' => $masterParent->id]);
        Menu::create(['name' => 'Role',       'path' => 'admin/master/roles',            'icon' => 'mdi mdi-account-key-outline',   'parent_id' => $masterParent->id]);
        Menu::create(['name' => 'Hak Akses',  'path' => 'admin/master/role-permissions', 'icon' => 'mdi mdi-shield-account-outline','parent_id' => $masterParent->id]);
        Menu::create(['name' => 'Pengguna',   'path' => 'admin/master/users',            'icon' => 'mdi mdi-account-group-outline', 'parent_id' => $masterParent->id]);

        // ─── Katalog Produk ────────────────────────────────────────────
        $katalogParent = Menu::create(['name' => 'Katalog Produk', 'path' => null, 'icon' => 'mdi mdi-package-variant-closed']);

        Menu::create(['name' => 'Daftar Produk', 'path' => 'admin/products',       'icon' => 'mdi mdi-package-variant', 'parent_id' => $katalogParent->id]);
        Menu::create(['name' => 'Keunggulan',    'path' => 'admin/benefits',       'icon' => 'mdi mdi-star-outline',    'parent_id' => $katalogParent->id]);
        Menu::create(['name' => 'Suku Bunga',    'path' => 'admin/interest-rates', 'icon' => 'mdi mdi-percent',         'parent_id' => $katalogParent->id]);

        // ─── Publikasi ─────────────────────────────────────────────────
        $publikasiParent = Menu::create(['name' => 'Publikasi', 'path' => null, 'icon' => 'mdi mdi-newspaper-variant-outline']);

        Menu::create(['name' => 'Hero Banners',     'path' => 'admin/hero-banners', 'icon' => 'mdi mdi-image-multiple',          'parent_id' => $publikasiParent->id]);
        Menu::create(['name' => 'Berita & Artikel', 'path' => 'admin/articles',     'icon' => 'mdi mdi-file-document-outline',   'parent_id' => $publikasiParent->id]);

        // ─── Perusahaan ────────────────────────────────────────────────
        $perusahaanParent = Menu::create(['name' => 'Perusahaan', 'path' => null, 'icon' => 'mdi mdi-domain']);

        Menu::create(['name' => 'Profil Perusahaan', 'path' => 'admin/company-profiles', 'icon' => 'mdi mdi-office-building-outline', 'parent_id' => $perusahaanParent->id]);
        Menu::create(['name' => 'Jaringan Kantor',   'path' => 'admin/branches',          'icon' => 'mdi mdi-map-marker-multiple',     'parent_id' => $perusahaanParent->id]);

        // ─── Layanan Nasabah ───────────────────────────────────────────
        $layananParent = Menu::create(['name' => 'Layanan Nasabah', 'path' => null, 'icon' => 'mdi mdi-account-group-outline']);

        Menu::create(['name' => 'Pesan Masuk', 'path' => 'admin/contact-messages', 'icon' => 'mdi mdi-email-outline',      'parent_id' => $layananParent->id]);
        Menu::create(['name' => 'Testimoni',   'path' => 'admin/testimonials',     'icon' => 'mdi mdi-comment-quote-outline','parent_id' => $layananParent->id]);
        Menu::create(['name' => 'FAQ',         'path' => 'admin/faqs',             'icon' => 'mdi mdi-frequently-asked-questions', 'parent_id' => $layananParent->id]);
    }
}
