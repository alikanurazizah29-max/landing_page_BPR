@php
    // Format nomor WhatsApp untuk tautan langsung chat
    $rawWa = $companyProfile->whatsapp ?? '';
    $cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
    if (str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
@endphp

<style>
    .site-footer a.text-white-50:hover {
        color: #ffffff !important;
        text-decoration: underline;
    }
</style>

<div class="site-footer" style="background-color: #a6294d; color: #a0aec0; padding-top: 60px; padding-bottom: 30px;">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <!-- Kolom 1: Tentang BPR & Kontak Kantor Pusat -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="widget mb-4">
                    <h3 class="text-white font-weight-bold" style="font-size: 1.1rem;">Tentang {{ $companyProfile->company_name ?? 'BPR' }}</h3>
                    <p class="small text-muted" style="line-height: 1.8;">
                        {{ $companyProfile->about ?? 'Bank Perekonomian Rakyat yang melayani simpanan tabungan, deposito, dan pembiayaan kredit UMKM terpercaya.' }}
                    </p>
                </div>
                <div class="widget">
                    <h3 class="text-white font-weight-bold" style="font-size: 1.1rem;">Kontak Kantor Pusat</h3>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="feather-map-pin text-primary mr-2 mt-1"></i>
                            <span>{{ $companyProfile->address ?? '-' }}</span>
                        </li>
                        <li class="mb-2">
                            <i class="feather-phone text-primary mr-2"></i>
                            @if(!empty($companyProfile->phone))
                                <a href="tel:{{ $companyProfile->phone }}" class="text-white-50 text-decoration-none">{{ $companyProfile->phone }}</a>
                            @else
                                <span class="text-white-50">-</span>
                            @endif
                        </li>
                        <li class="mb-2">
                            <i class="feather-message-circle text-success mr-2"></i>
                            @if(!empty($cleanWa))
                                <a href="https://wa.me/{{ $cleanWa }}" target="_blank" rel="noopener noreferrer" class="text-white-50 text-decoration-none">
                                    WhatsApp: {{ $companyProfile->whatsapp }}
                                </a>
                            @else
                                <span class="text-white-50">-</span>
                            @endif
                        </li>
                        <li>
                            <i class="feather-mail text-primary mr-2"></i>
                            @if(!empty($companyProfile->email))
                                <a href="mailto:{{ $companyProfile->email }}" class="text-white-50 text-decoration-none">{{ $companyProfile->email }}</a>
                            @else
                                <span class="text-white-50">-</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="widget">
                    <h3 class="text-white font-weight-bold" style="font-size: 1.1rem;">Navigasi Cepat</h3>
                    <ul class="links list-unstyled small">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('user.layanan.layanans') }}" class="text-white-50">Produk & Layanan</a></li>
                        <li class="mb-2"><a href="{{ route('user.article.articles') }}" class="text-white-50">Berita & Edukasi</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50">Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-white-50">Hubungi Kami</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}#jaringan-kantor" class="text-white-50">Jaringan Kantor</a></li>
                        <li class="mb-2"><a href="{{ route('privacy') }}" class="text-white-50">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 3: Jam Operasional & Penjaminan LPS -->
            <div class="col-lg-4">
                <div class="widget mb-4">
                    <h3 class="text-white font-weight-bold" style="font-size: 1.1rem;">Jam Operasional</h3>
                    <p class="text-white-50 small mb-0" style="line-height: 1.7;">
                        <strong class="text-white">Senin - Jumat:</strong> 08.00 - 15.00 WITA<br>
                        <strong class="text-white">Sabtu, Minggu & Hari Libur Nasional:</strong> Tutup
                    </p>
                </div>
                <div class="widget">
                    <h3 class="text-white font-weight-bold" style="font-size: 1.1rem;">Keamanan & Penjaminan</h3>
                    <p class="text-white-50 small" style="line-height: 1.7;">
                        Simpanan nasabah di {{ $companyProfile->company_name ?? 'BPR' }} dijamin aman oleh 
                        <strong class="text-white">Lembaga Penjamin Simpanan (LPS)</strong> sesuai syarat dan ketentuan yang berlaku.
                    </p>
                </div>
            </div>
        </div>

        <!-- Wajib Regulasi: Kepatuhan OJK & LPS -->
        <div class="row justify-content-center text-center copyright pt-4" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
            <div class="col-md-10">
                <p class="mb-2 font-weight-bold text-white small">
                    {{ $companyProfile->company_name ?? 'BPR' }} berizin dan diawasi oleh Otoritas Jasa Keuangan (OJK) serta merupakan peserta penjaminan Lembaga Penjamin Simpanan (LPS).
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