# 📑 Buku Petunjuk Teknis & Standar Pengerjaan Landing Page BPR
> **Untuk:** Tim Pengembang Web (*Frontend / Fullstack Developer*)  
> **Target:** Menyelesaikan perbaikan bug, integrasi database, kepatuhan regulasi OJK/LPS, dan penambahan fitur bisnis perbankan secara bertahap per-tampilan (*Page-by-Page*).

---

## 🧭 Daftar Isi Alur Kerja Per-Tampilan

1. [Pembersihan Awal: File & Rute Sampah Template](#0-pembersihan-awal-file--rute-sampah-template)
2. [Layout Global: Header, Footer, Meta SEO & Floating WA](#1-layout-global-header-footer-meta-seo--floating-wa)
3. [Tampilan 1: Halaman Beranda (Home)](#2-tampilan-1-halaman-beranda-indexbladephp)
4. [Tampilan 2: Halaman Layanan & Detail Produk](#3-tampilan-2-halaman-layanan--detail-produk)
5. [Tampilan 3: Halaman Berita, Edukasi & Laporan Publikasi](#4-tampilan-3-halaman-berita-edukasi--laporan-publikasi)
6. [Tampilan 4: Halaman Hubungi Kami & Jaringan Kantor](#5-tampilan-4-halaman-hubungi-kami--jaringan-kantor)
7. [Tampilan 5: Halaman Tentang Kami (Visi, Misi & GCG)](#6-tampilan-5-halaman-tentang-kami-aboutbladephp)
8. [Tampilan 6: Halaman Kebijakan Privasi & WBS Pengaduan Nasabah](#7-tampilan-6-kebijakan-privasi--pengaduan-nasabah-wbs)
9. [Checklist Pengujian Akhir (Definition of Done)](#8-checklist-pengujian-akhir-definition-of-done)

---

## 0. Pembersihan Awal: File & Rute Sampah Template
Sebelum mulai memodifikasi tampilan, bersihkan file sisa template agensi agar struktur proyek bersih dan tidak menimbulkan celah keamanan.

* **Berkas yang dihapus:**
  - [x] Hapus file: `resources/views/user/app.blade copy.php`
  - [x] Hapus file: `resources/views/user/page/element.blade.php`
  - [x] Hapus file: `resources/views/user/page/portofolio.blade.php`
* **Berkas yang diedit: `routes/web.php`**
  - Hapus baris rute sampah:
    ```php
    // HAPUS RUTE DI BAWAH INI DARI routes/web.php:
    Route::get('/element', ...);
    Route::get('/portofolio', ...);
    Route::get('/single', ...);
    ```

---

## 1. Layout Global: Header, Footer, Meta SEO & Floating WA
> **Berkas yang dibuka:**
> - `resources/views/user/layout/app.blade.php`
> - `resources/views/user/layout/header.blade.php`
> - `resources/views/user/layout/footer.blade.php`
> - `app/Providers/AppServiceProvider.php`

### A. Sharing Data Profil Global (`AppServiceProvider.php`)
Agar data nama bank, telepon, WhatsApp, dan alamat selalu tersedia di Header & Footer tanpa harus dipanggil berulang di setiap controller:
```php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\CompanyProfile;

public function boot(): void
{
    View::composer(['user.*'], function ($view) {
        if (Schema::hasTable('company_profiles')) {
            $view->with('companyProfile', CompanyProfile::first());
        }
    });
}
```

### B. Header Navigasi (`header.blade.php`)
* **❌ Kondisi Salah Saat Ini:**
  * Link menu masih format HTML mentah: `index.html`, `about.html`, `contact.html` (Menyebabkan Error 404).
  * Brand logo tertulis statis: `DCC Bank.`.
  * Menu sampah: *"Menu Two"*, *"Sub Menu One"*, *"Elements"*.
* **🛠️ Kode Perbaikan:**
  ```html
  <div class="logo">
      <a href="{{ route('home') }}" class="text-white font-weight-bold">
          {{ $companyProfile->company_name ?? 'BPR' }}<span class="text-primary">.</span>
      </a>
  </div>

  <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
      <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
      <li class="{{ request()->routeIs('user.layanan.*') ? 'active' : '' }}"><a href="{{ route('user.layanan.layanans') }}">Produk & Layanan</a></li>
      <li class="{{ request()->routeIs('user.article.*') ? 'active' : '' }}"><a href="{{ route('user.article.articles') }}">Berita & Edukasi</a></li>
      <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
      <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Hubungi Kami</a></li>
  </ul>
  ```

### C. Footer Resmi Bank (`footer.blade.php`)
* **❌ Kondisi Salah Saat Ini:**
  * Teks about berisi dummy *"Far far away, behind the word mountains..."*.
  * Link navigasi hanya `#`.
  * Baris 88–90 ada tag duplikat `</body></html>` (harus dihapus!).
  * Tidak ada keterangan legalitas OJK & LPS.
* **🛠️ Kode Perbaikan & Tambahan:**
  ```html
  <div class="col-lg-4">
      <div class="widget">
          <h3>Tentang {{ $companyProfile->company_name ?? 'BPR' }}</h3>
          <p>{{ $companyProfile->about ?? 'Bank Perekonomian Rakyat yang melayani simpanan tabungan, deposito, dan pembiayaan kredit UMKM.' }}</p>
      </div>
      <div class="widget">
          <h3>Kontak Kantor Pusat</h3>
          <ul class="list-unstyled text-white-50 small">
              <li><i class="feather-map-pin mr-2"></i> {{ $companyProfile->address ?? '-' }}</li>
              <li><i class="feather-phone mr-2"></i> {{ $companyProfile->phone ?? '-' }}</li>
              <li><i class="feather-message-circle mr-2"></i> WhatsApp: {{ $companyProfile->whatsapp ?? '-' }}</li>
              <li><i class="feather-mail mr-2"></i> {{ $companyProfile->email ?? '-' }}</li>
          </ul>
      </div>
  </div>

  <!-- Wajib Regulasi: Kepatuhan OJK & LPS -->
  <div class="row justify-content-center text-center copyright mt-4 pt-4 border-top border-secondary">
      <div class="col-md-10">
          <p class="mb-2 font-weight-bold text-white">
              PT BPR {{ $companyProfile->company_name ?? '' }} berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan Lembaga Penjamin Simpanan (LPS).
          </p>
          <p class="small text-muted mb-0">
              Hak Cipta &copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'BPR' }}. Seluruh hak cipta dilindungi undang-undang.
          </p>
      </div>
  </div>
  ```

### D. Master Layout & Floating WhatsApp (`app.blade.php`)
* **✨ Tambahan Baru:**
  1. **Favicon Resmi BPR**: Ganti `user/favicon.png` dengan logo BPR.
  2. **Open Graph SEO**: Pasang meta tag agar saat link dibagikan ke WhatsApp muncul judul, deskripsi, dan gambar resmi BPR:
     ```html
     <meta property="og:title" content="{{ $companyProfile->company_name ?? 'BPR' }} - Simpanan & Kredit Terpercaya">
     <meta property="og:description" content="{{ $companyProfile->subheadline ?? 'Wujudkan rencana finansial Anda bersama kami.' }}">
     <meta property="og:image" content="{{ asset('user/images/hero-min.jpg') }}">
     ```
  3. **Tombol Melayang WhatsApp (Floating Button)**: Letakkan sebelum `</body>`:
     ```html
     <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyProfile->whatsapp ?? '6281234567890') }}?text=Halo%20{{ urlencode($companyProfile->company_name ?? 'BPR') }},%20saya%20ingin%20konsultasi%20layanan%20perbankan"
        class="floating-wa shadow-lg" target="_blank" title="Chat WhatsApp Customer Service">
         <span class="feather-message-circle"></span> Chat CS
     </a>
     ```

---

## 2. Tampilan 1: Halaman Beranda (`index.blade.php`)
> **Berkas yang dibuka:**
> - `app/Http/Controllers/HomeController.php`
> - `resources/views/user/page/index.blade.php`

### A. Controller Update (`HomeController.php`)
Ambil seluruh data aktif dari tabel yang relevan:
```php
public function index()
{
    $dataProduct = Product::where('is_active', true)->get();
    $dataArticle = Article::where('is_published', true)->latest()->take(3)->get();
    $dataTestimonial = Testimonial::where('is_active', true)->get();
    $dataHeroBanner = HeroBanner::where('is_active', true)->orderBy('order', 'asc')->get();
    $databenefit = Benefit::where('is_active', true)->get();
    $interestRates = InterestRate::where('is_active', true)->get();
    $faqs = Faq::where('is_active', true)->get();

    return view('user.page.index', compact(
        'dataProduct', 'dataArticle', 'dataTestimonial',
        'dataHeroBanner', 'databenefit', 'interestRates', 'faqs'
    ));
}
```

### B. Perbaikan & Fitur pada `index.blade.php`
1. **Hero Banner Dinamis (Baris 5–26)**:
   - Gunakan data `$dataHeroBanner->first()` atau fallback ke `$companyProfile->headline`.
   - Ubah tombol menjadi: *"Ajukan Pinjaman"* dan *"Buka Tabungan / Deposito"*.
2. **Ganti Logo Puma, Adobe, Google (Baris 28–53)**:
   - Ganti dengan logo regulator resmi: **OJK, LPS, Bank Indonesia / Ayo ke Bank, Perbarindo**.
3. **Perbaiki Typo Judul Layanan (Baris 59)**:
   - Ganti *"Layanin Kami Untuk Anda"* ➔ *"Produk & Layanan Unggulan"*.
4. **Perbaiki BUG Grid Keunggulan (Benefit) (Baris 95–111) — [PENTING]**:
   - Pindahkan tag `<div class="col-lg-4 col-md-6 mb-4">` ke **dalam** loop `@foreach ($databenefit as $benefit)` agar kartu tersusun mendatar 3 kolom per baris (bukan menumpuk vertikal).
5. **✨ TAMBAHAN BARU: Tabel Suku Bunga Simpanan (Interest Rates)**:
   - Tampilkan tabel bunga Tabungan dan Deposito 1, 3, 6, 12 Bulan lengkap dengan label batas bunga penjaminan LPS.
6. **✨ TAMBAHAN BARU: Kalkulator Simulasi Kredit & Deposito Sederhana**:
   - Buat widget interaktif 2 tab:
     - **Tab 1: Simulasi Kredit**: Input Plafon Pinjaman + Tenor Bulan ➔ Menghitung perkiraan cicilan per bulan.
     - **Tab 2: Simulasi Deposito**: Input Nominal Deposito + Tenor + Bunga p.a. ➔ Menghitung estimasi imbal hasil bunga bersih per bulan setelah pajak PPh (20%).
7. **✨ TAMBAHAN BARU: Akordion Tanya Jawab (FAQ)**:
   - Render FAQ interaktif dari variabel `$faqs` mengenai cara buka rekening, syarat pinjaman, dan keamanan penjaminan LPS.
8. **Rating Bintang Dinamis pada Testimoni**:
   - Render jumlah bintang sesuai nilai integer `$testimonials->rating` (1–5 bintang).

---

## 3. Tampilan 2: Halaman Layanan & Detail Produk
> **Berkas yang dibuka:**
> - `app/Http/Controllers/LayananController.php`
> - `resources/views/user/page/layanan.blade.php`
> - `resources/views/user/page/produk.blade.php`

### A. Halaman Daftar Layanan (`layanan.blade.php`)
* **❌ Masalah**: Tombol filter bertuliskan *"Berita"*, *"Pengumuman"*, *"Edukasi"* (kategori artikel yang salah tempat).
* **🛠️ Perbaikan**: Ganti opsi filter menjadi jenis produk BPR:
  ```html
  <div class="filters" data-aos="fade-up">
      <ul>
          <li class="active" data-filter="*">Semua Layanan</li>
          <li data-filter=".tabungan">Tabungan</li>
          <li data-filter=".deposito">Deposito</li>
          <li data-filter=".kredit">Kredit Pinjaman</li>
      </ul>
  </div>
  ```
  Pada card produk, pastikan class filternya sesuai: `class="col-md-6 col-lg-4 mb-4 grid-item {{ strtolower($produk->type) }}"`.

### B. Halaman Detail Produk (`produk.blade.php`)
* **✨ Tambahan Baru (Saat ini masih kosong polos):**
  1. Tampilkan gambar/ilustrasi produk (`$produk->image`).
  2. Tampilkan badge kategori: `<span class="badge badge-primary">{{ ucfirst($produk->type) }}</span>`.
  3. Rincian deskripsi, manfaat, dan persyaratan dokumen (KTP, KK, Bukti Usaha).
  4. **Tombol Call-to-Action WhatsApp**:
     ```html
     <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyProfile->whatsapp ?? '') }}?text=Halo%20BPR,%20saya%20tertarik%20mengajukan%20{{ urlencode($produk->title) }}"
        class="btn btn-success btn-lg font-weight-bold" target="_blank">
         <i class="feather-message-circle mr-2"></i> Ajukan Produk Ini Sekarang
     </a>
     ```

---

## 4. Tampilan 3: Halaman Berita, Edukasi & Laporan Publikasi
> **Berkas yang dibuka:**
> - `app/Http/Controllers/user/UserArticleController.php`
> - `resources/views/user/page/articles.blade.php`
> - `resources/views/user/page/single.blade.php` (Detail Baca Artikel)

### A. Controller Update (`UserArticleController.php`)
* **❌ Masalah**: Menggunakan `Article::all()` sehingga artikel draft di admin ikut tampil ke publik.
* **🛠️ Perbaikan**:
  ```php
  public function index()
  {
      $dataArticle = Article::where('is_published', true)->latest()->paginate(9);
      return view('user.page.articles', compact('dataArticle'));
  }

  public function detail($slug)
  {
      $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();
      $relatedArticles = Article::where('id', '!=', $article->id)
          ->where('is_published', true)
          ->latest()->take(3)->get();

      return view('user.page.single', compact('article', 'relatedArticles'));
  }
  ```

### B. Halaman Daftar Artikel (`articles.blade.php`)
* **Perbaikan Link Judul**: Ganti `href="#"` pada judul menjadi `href="{{ route('user.article.detail', $article->slug) }}"`.
* **Perbaikan Link Gambar**: Klik foto mengarah ke detail artikel (bukan popup modal gambar).
* **Fallback Gambar**: Jika `image_path` null, tampilkan gambar default BPR agar tidak ada gambar pecah (*broken image*).

### C. Halaman Detail Artikel (`single.blade.php`)
* Tampilkan cover foto artikel beresolusi penuh di atas teks artikel.
* Tampilkan tanggal terbit resmi dan kategori artikel (*Berita*, *Literasi Keuangan*, *Pengumuman*, *Laporan Publikasi*).

---

## 5. Tampilan 4: Halaman Hubungi Kami & Jaringan Kantor
> **Berkas yang dibuka:**
> - `routes/web.php`
> - `app/Http/Controllers/user/UserContactController.php` *(Buat controller baru jika belum ada)*
> - `resources/views/user/page/contact.blade.php`

### A. Pembuatan Rute & Controller Submit Pesan
1. Di `routes/web.php`:
   ```php
   Route::get('/contact', [\App\Http\Controllers\user\UserContactController::class, 'index'])->name('contact');
   Route::post('/contact', [\App\Http\Controllers\user\UserContactController::class, 'store'])->name('contact.send');
   ```
2. Di `UserContactController.php`:
   * Validasi field: `name`, `email`, `phone`, `product_interest`, `message`.
   * Simpan ke `ContactMessage::create(...)` dengan `status = 'unread'`.
   * Kembalikan `back()->with('success', 'Pesan berhasil terkirim. Petugas kami akan segera menghubungi Anda.')`.

### B. Formulir Kontak (`contact.blade.php`)
* Pasang atribut form: `<form action="{{ route('contact.send') }}" method="POST">` dan sertakan `@csrf`.
* Tambahkan field input `email` yang sebelumnya belum ada.
* Tambahkan dropdown *"Produk yang Diminati"* (Kredit, Tabungan, Deposito).
* Tampilkan pesan sukses setelah submit.
* **Hapus Iklan Template**: Hapus banner promosi Untree.co (*"Get this template for free!"*).

### C. ✨ TAMBAHAN BARU: Daftar Jaringan Kantor & Google Maps
* Ambil data dari tabel `branches` (`pusat`, `cabang`, `kas`).
* Tampilkan kartu jaringan kantor: Nama Kantor, Alamat, No Telepon, dan tautan tombol *"Lihat di Google Maps"*.
* Embed iframe Google Maps lokasi kantor pusat operasional.

---

## 6. Tampilan 5: Halaman Tentang Kami (`about.blade.php`)
> **Berkas yang dibuka:**
> - `resources/views/user/page/about.blade.php`

### A. Perbaikan & Pembersihan Konten
* Hapus teks lorem agensi: *"A small river named Duden flows..."*.
* Hapus logo Puma/Google/Adobe ➔ ganti dengan logo kepatuhan OJK, LPS, Perbarindo.
* Hapus banner iklan template di bagian paling bawah.

### B. ✨ Tambahan Konten BPR Resmi
* **Seksi Profil & Sejarah Singkat**: Menggunakan data `$companyProfile->about`.
* **Seksi Visi & Misi BPR**: Tampilkan Visi dan Misi resmi bank dalam kartu berdampingan yang rapi.
* **Prinsip Tata Kelola (GCG)**: Tampilkan komitmen BPR terhadap transparansi, akuntabilitas, tanggung jawab, dan independensi perbankan.
* **Banner Call-to-Action (CTA)**: Ajakan untuk bermitra dengan BPR dilengkapi tombol menuju kontak/WhatsApp.

---

## 7. Tampilan 6: Kebijakan Privasi & Pengaduan Nasabah (WBS)
> **Penting untuk Kepatuhan Regulasi OJK & UU Perlindungan Data Pribadi (PDP)**
> **Berkas:** `resources/views/user/page/privacy.blade.php` (atau seksi di halaman kontak)

* **Saluran Pengaduan Konsumen & Whistleblowing System (WBS)**:
  * Cantumkan tata cara resmi bagi nasabah jika mengalami kendala transaksi atau ingin melaporkan fraud:
    - Nomor telepon pengaduan konsumen.
    - Jam operasional layanan konsumen.
    - Informasi bahwa pengaduan dapat diteruskan ke Kontak OJK 157 jika belum terselesaikan.
* **Pernyataan Kerahasiaan Data (Privacy Policy)**:
  * Pernyataan bahwa BPR menjaga seluruh data nasabah dan tidak membagikan data kepada pihak ketiga tanpa persetujuan.

---

## 8. Checklist Pengujian Akhir (Definition of Done)

Developer dapat menyatakan pengerjaan landing page selesai jika seluruh checklist berikut tercentang:

- [ ] Seluruh menu di Header dan Footer dapat diklik tanpa menghasilkan error 404.
- [ ] File dan rute sampah template (`/element`, `/portofolio`, `/single`) sudah dihapus.
- [ ] Formulir di halaman Kontak berhasil menyimpan data ke database tabel `contact_messages` dengan status `unread` dan memunculkan alert sukses.
- [ ] Grid keunggulan (*benefit*) di Beranda tersusun rapi 3-4 kolom menyamping dan tidak menumpuk ke bawah.
- [ ] Seluruh logo klien asing (Puma/Adobe/Google) sudah diganti dengan logo resmi **OJK, LPS, dan Perbarindo**.
- [ ] Tabel Suku Bunga Simpanan tampil jelas di Beranda.
- [ ] Banner iklan Untree.co (*"Get this template for free!"*) sudah tidak ada di halaman mana pun.
- [ ] Keterangan resmi legalitas OJK & LPS tampil di area footer seluruh halaman.
- [ ] Tombol floating WhatsApp berfungsi dan langsung membuka obrolan ke nomor CS BPR.
- [ ] Artikel berstatus draft di admin tidak bisa dibuka oleh pengunjung umum.
