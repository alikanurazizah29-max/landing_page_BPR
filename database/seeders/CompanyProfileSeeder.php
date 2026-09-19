<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;
use App\Models\Product;
use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Testimonial;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::create([
            'company_name' => 'BPR Sejahtera',
            'headline' => 'Solusi Simpanan dan Kredit yang Cepat, Aman, dan Jelas',
            'subheadline' => 'Ajukan kredit, buka tabungan, atau tempatkan deposito dengan proses mudah dan layanan terpercaya.',
            'about' => 'Kami adalah Bank Perekonomian Rakyat yang hadir untuk membantu kebutuhan finansial masyarakat, UMKM, dan keluarga.',
            'vision' => 'Menjadi BPR terpercaya dan dekat dengan masyarakat.',
            'mission' => 'Memberikan layanan keuangan yang aman, cepat, jelas, dan profesional.',
            'phone' => '0411-123456',
            'whatsapp' => '6281234567890',
            'email' => 'info@bprsejahtera.co.id',
            'address' => 'Jl. Contoh No. 10, Makassar',
            'ojk_text' => 'Berizin dan diawasi oleh OJK',
            'lps_text' => 'Peserta penjaminan LPS',
        ]);

        Product::insert([
            [
                'type' => 'kredit',
                'title' => 'Kredit Usaha Rakyat & Mikro',
                'slug' => 'kredit-usaha-rakyat-mikro',
                'description' => 'Solusi pembiayaan untuk modal kerja usaha, ekspansi UMKM, dan kebutuhan produktif dengan proses cepat dan syarat fleksibel.',
                'icon' => 'bi-cash-stack',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'tabungan',
                'title' => 'Tabungan BPR Prima',
                'slug' => 'tabungan-bpr-prima',
                'description' => 'Simpanan aman dan mudah untuk transaksi harian Anda, bebas biaya administrasi bulanan dengan bunga bersaing.',
                'icon' => 'bi-wallet2',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'deposito',
                'title' => 'Deposito Berjangka BPR',
                'slug' => 'deposito-berjangka-bpr',
                'description' => 'Investasi simpanan berjangka dengan rasa aman terjamin LPS dan suku bunga optimal hingga tenor 12 bulan.',
                'icon' => 'bi-bank',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Benefit::insert([
            ['title' => 'Proses Cepat & Mudah', 'description' => 'Pengajuan kredit dan pembukaan rekening mudah, tidak berbelit-belit.', 'icon' => 'bi-clock', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Aman & Terpercaya', 'description' => 'Berizin dan diawasi OJK serta dijamin oleh Lembaga Penjamin Simpanan (LPS).', 'icon' => 'bi-shield-check', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Layanan Bersahabat', 'description' => 'Tim petugas kami siap datang membantu dan memberikan solusi keuangan terbaik.', 'icon' => 'bi-headset', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        Faq::insert([
            ['question' => 'Apakah simpanan di BPR aman dan dijamin?', 'answer' => 'Sangat aman. Seluruh simpanan tabungan dan deposito di BPR dijamin oleh Lembaga Penjamin Simpanan (LPS) sesuai ketentuan yang berlaku.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'Apa saja syarat pengajuan pinjaman/kredit?', 'answer' => 'Syarat umum meliputi KTP, Kartu Keluarga, bukti usaha/penghasilan, serta dokumen agunan seperti SHM atau BPKB.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['question' => 'Bagaimana cara membuka rekening tabungan?', 'answer' => 'Anda cukup membawa KTP ke kantor operasional terdekat kami, atau hubungi layanan WhatsApp petugas kami untuk pembukaan di lokasi Anda.', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        Testimonial::insert([
            [
                'customer_name' => 'H. Andi Mappanyukki',
                'content' => 'Pelayanan BPR sangat ramah dan proses pencairan kredit modal usaha toko saya sangat cepat. Sangat membantu kemajuan UMKM.',
                'rating' => 5,
                'image_path' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_name' => 'Ibu Ratna Sari',
                'content' => 'Saya menempatkan deposito di BPR karena bunganya lebih kompetitif dan yang terpenting aman dijamin oleh LPS.',
                'rating' => 5,
                'image_path' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        \App\Models\InterestRate::insert([
            ['product_type' => 'Deposito', 'duration' => '1 Bulan', 'rate' => 5.25, 'description' => 'Bunga p.a. Dijamin LPS', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['product_type' => 'Deposito', 'duration' => '3 Bulan', 'rate' => 5.75, 'description' => 'Bunga p.a. Dijamin LPS', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['product_type' => 'Deposito', 'duration' => '6 Bulan', 'rate' => 6.25, 'description' => 'Bunga p.a. Dijamin LPS', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['product_type' => 'Deposito', 'duration' => '12 Bulan', 'rate' => 6.75, 'description' => 'Bunga p.a. Dijamin LPS', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['product_type' => 'Tabungan', 'duration' => 'Fleksibel', 'rate' => 2.50, 'description' => 'Bebas biaya admin bulanan', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
