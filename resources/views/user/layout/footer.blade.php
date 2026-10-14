<div class="site-footer">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <!-- Kolom 1: Tentang BPR & Kontak Kantor Pusat -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="widget mb-4">
                    <h3>Tentang {{ $companyProfile->company_name ?? 'BPR' }}</h3>
                    <p>{{ $companyProfile->about ?? 'Bank Perekonomian Rakyat yang melayani simpanan tabungan, deposito, dan pembiayaan kredit UMKM terpercaya.' }}</p>
                </div>
                <div class="widget">
                    <h3>Kontak Kantor Pusat</h3>
                    <ul class="list-unstyled text-white-50 small">
                        <li class="mb-2"><i class="feather-map-pin mr-2"></i> {{ $companyProfile->address ?? '-' }}</li>
                        <li class="mb-2"><i class="feather-phone mr-2"></i> {{ $companyProfile->phone ?? '-' }}</li>
                        <li class="mb-2"><i class="feather-message-circle mr-2"></i> WhatsApp: {{ $companyProfile->whatsapp ?? '-' }}</li>
                        <li><i class="feather-mail mr-2"></i> {{ $companyProfile->email ?? '-' }}</li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="widget">
                    <h3>Navigasi Cepat</h3>
                    <ul class="links list-unstyled">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('user.layanan.layanans') }}">Produk & Layanan</a></li>
                        <li><a href="{{ route('user.article.articles') }}">Berita & Edukasi</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 3: Jam Operasional & Penjaminan LPS -->
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Jam Operasional</h3>
                    <p class="text-white-50 small mb-3">
                        Senin - Jumat: 08.00 - 15.00 WITA<br>
                        Sabtu - Minggu: Tutup (Hari Libur Nasional Libur)
                    </p>
                    <h3>Keamanan Nasabah</h3>
                    <p class="text-white-50 small">
                        Simpanan Anda dijamin aman melalui program penjaminan Lembaga Penjamin Simpanan (LPS).
                    </p>
                </div>
            </div>
        </div>

        <!-- Wajib Regulasi: Kepatuhan OJK & LPS -->
        <div class="row justify-content-center text-center copyright pt-4 border-top border-secondary">
            <div class="col-md-10">
                <p class="mb-2 font-weight-bold text-white small">
                    PT BPR {{ $companyProfile->company_name ?? '' }} berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan Lembaga Penjamin Simpanan (LPS).
                </p>
                <p class="small text-muted mb-0">
                    Hak Cipta &copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'BPR' }}. Seluruh hak cipta dilindungi undang-undang.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>