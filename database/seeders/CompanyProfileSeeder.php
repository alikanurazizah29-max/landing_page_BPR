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
            ['title' => 'Kredit', 'description' => 'Solusi pembiayaan untuk usaha, kebutuhan keluarga, dan kebutuhan produktif.', 'icon' => 'bi-cash-stack'],
            ['title' => 'Tabungan', 'description' => 'Simpanan aman dan mudah untuk kebutuhan transaksi harian.', 'icon' => 'bi-wallet2'],
            ['title' => 'Deposito', 'description' => 'Simpanan berjangka dengan rasa aman dan keuntungan kompetitif.', 'icon' => 'bi-bank'],
        ]);

        Benefit::insert([
            ['title' => 'Proses Cepat', 'description' => 'Pengajuan lebih mudah dan jelas.', 'icon' => 'bi-clock'],
            ['title' => 'Aman & Legal', 'description' => 'Berizin dan diawasi lembaga berwenang.', 'icon' => 'bi-shield-check'],
            ['title' => 'Layanan Ramah', 'description' => 'Tim siap membantu kebutuhan Anda.', 'icon' => 'bi-headset'],
        ]);

        Faq::insert([
            ['question' => 'Apakah pengajuan kredit bisa konsultasi dulu?', 'answer' => 'Bisa. Anda dapat menghubungi tim kami melalui WhatsApp atau form kontak.'],
            ['question' => 'Apa saja produk utama yang tersedia?', 'answer' => 'Produk utama kami adalah Kredit, Tabungan, dan Deposito.'],
            ['question' => 'Apakah simpanan aman?', 'answer' => 'Simpanan mengikuti ketentuan penjaminan yang berlaku.'],
        ]);

        Testimonial::insert([
            ['name' => 'Andi', 'job' => 'Pelaku UMKM', 'message' => 'Prosesnya jelas dan pelayanannya sangat membantu.'],
            ['name' => 'Sari', 'job' => 'Nasabah Tabungan', 'message' => 'Layanan ramah dan mudah dipahami.'],
        ]);
    }
}
