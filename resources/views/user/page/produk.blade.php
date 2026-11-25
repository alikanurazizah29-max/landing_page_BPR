@extends('user.layout.app')
@section('title', $produk->title . ' | ' . ($companyProfile->company_name ?? 'BPR'))

@section('content')

    <!-- 1. Hero Banner Detail Produk -->
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 intro text-center">
                    <div class="mb-3">
                        <span
                            class="badge badge-{{ $produk->type == 'kredit' ? 'warning' : ($produk->type == 'deposito' ? 'success' : 'primary') }} px-3 py-2 text-uppercase font-weight-bold"
                            style="font-size: 0.8rem; letter-spacing: 1px;">
                            <i class="{{ $produk->icon ?? 'feather-check-circle' }} mr-1"></i> Produk
                            {{ ucfirst($produk->type) }}
                        </span>
                    </div>
                    <h1 class="text-white font-weight-bold mb-3" data-aos="fade-up" data-aos-delay="0">
                        {{ $produk->title }}
                    </h1>
                    <p class="text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('home') }}" class="text-white-50">Beranda</a> &nbsp;/&nbsp;
                        <a href="{{ route('user.layanan.layanans') }}" class="text-white-50">Produk &amp; Layanan</a>
                        &nbsp;/&nbsp;
                        <span class="text-white">{{ $produk->title }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Isi Detail Produk & Sidebar CTA -->
    <div class="site-section bg-light py-5">
        <div class="container">
            <div class="row">

                <!-- Kolom Kiri: Foto & Deskripsi Lengkap Produk -->
                <div class="col-lg-8 mb-5 mb-lg-0" data-aos="fade-up">
                    <div class="card border-0 shadow-sm p-4 p-md-5 rounded-lg bg-white">

                        @if ($produk->image)
                            <div class="mb-4 rounded overflow-hidden shadow-sm" style="max-height: 420px;">
                                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->title }}"
                                    class="img-fluid w-100" style="object-fit: cover;">
                            </div>
                        @endif

                        <h3 class="font-weight-bold text-dark mb-3 border-bottom pb-3">Deskripsi &amp; Manfaat Layanan</h3>

                        <div class="text-secondary leading-relaxed mb-4"
                            style="line-height: 1.9; font-size: 1.05rem; text-align: justify;">
                            {!! nl2br(e($produk->description)) !!}
                        </div>

                        <!-- Kotak Informasi Regulasi & Keamanan -->
                        <div class="p-3 bg-light rounded border border-light mt-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3 text-primary">
                                    <span class="feather-shield display-4"></span>
                                </div>
                                <div>
                                    <h6 class="font-weight-bold text-dark mb-1">Aman &amp; Terpercaya</h6>
                                    <p class="small text-muted mb-0">
                                        {{ $companyProfile->company_name ?? 'BPR' }} berizin dan diawasi oleh
                                        <strong>Otoritas Jasa Keuangan (OJK)</strong> serta simpanan Anda dijamin oleh
                                        <strong>Lembaga Penjamin Simpanan (LPS)</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Kolom Kanan: Kotak Konsultasi & Pengajuan Cepat (Sticky Sidebar) -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm p-4 rounded-lg bg-white sticky-top" style="top: 100px;">

                        <span class="sub-title text-primary font-weight-bold text-uppercase d-block mb-1"
                            style="font-size: 0.8rem; letter-spacing: 1px;">Konsultasi Produk</span>
                        <h5 class="font-weight-bold text-dark mb-3">Tertarik dengan Layanan Ini?</h5>
                        <p class="text-muted small mb-4">
                            Petugas layanan kami siap membantu menjelaskan persyaratan, simulasi, dan proses pengajuan
                            secara jelas dan ramah.
                        </p>

                        <!-- Tombol Chat CS WhatsApp Langsung -->
                        @if ($companyProfile->whatsapp ?? false)
                            @php
                                $csWa = preg_replace('/[^0-9]/', '', $companyProfile->whatsapp);
                                if (str_starts_with($csWa, '0')) {
                                    $csWa = '62' . substr($csWa, 1);
                                }
                            @endphp
                            <a href="https://api.whatsapp.com/send?phone={{ $csWa }}&text={{ urlencode('Halo ' . ($companyProfile->company_name ?? 'BPR') . ', saya tertarik dengan produk ' . $produk->title . '. Mohon informasi selengkapnya.') }}"
                                target="_blank" rel="noopener noreferrer"
                                class="btn btn-success btn-block font-weight-bold py-3 mb-2 shadow-sm d-flex align-items-center justify-content-center">
                                <span class="feather-message-circle mr-2" style="font-size: 20px;"></span> Ajukan via
                                WhatsApp
                            </a>
                        @endif

                        <!-- Tombol Formulir Hubungi Kami (Auto-select produk di form kontak) -->
                        <a href="{{ route('contact', ['produk' => $produk->title]) }}"
                            class="btn btn-outline-primary btn-block font-weight-bold py-2 mb-4">
                            <span class="feather-mail mr-1"></span> Kirim Pesan / Tanya CS
                        </a>

                        <hr class="my-3">

                        <!-- Kontak Cepat Kantor -->
                        <div class="small text-muted">
                            <div class="mb-2">
                                <i class="feather-phone text-primary mr-2"></i> <strong>Telepon Kantor:</strong><br>
                                <span class="pl-4 text-dark">{{ $companyProfile->phone ?? '-' }}</span>
                            </div>
                            <div class="mb-2">
                                <i class="feather-clock text-primary mr-2"></i> <strong>Jam Layanan:</strong><br>
                                <span class="pl-4 text-dark">Senin - Jumat: 08.00 - 15.00 WITA</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Produk & Layanan Lainnya -->
            @if (isset($otherProducts) && $otherProducts->count() > 0)
                <div class="row mt-5 pt-4">
                    <div class="col-12 text-center mb-4">
                        <h4 class="font-weight-bold text-dark">Produk &amp; Layanan Lainnya</h4>
                        <p class="text-muted small">Pilihan solusi keuangan lainnya untuk kebutuhan Anda dan keluarga.</p>
                    </div>

                    @foreach ($otherProducts as $item)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-4 rounded-lg bg-white d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span
                                        class="badge badge-{{ $item->type == 'kredit' ? 'warning' : ($item->type == 'deposito' ? 'success' : 'primary') }} px-3 py-1 text-uppercase font-weight-bold"
                                        style="font-size: 0.75rem;">
                                        {{ ucfirst($item->type) }}
                                    </span>
                                </div>
                                <h5 class="font-weight-bold text-dark mb-2">{{ $item->title }}</h5>
                                <p class="small text-muted mb-3 flex-grow-1"
                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $item->description }}
                                </p>
                                <a href="{{ route('user.layanan.detail', $item->slug ?: $item->id) }}"
                                    class="btn btn-outline-primary btn-sm btn-block font-weight-bold mt-auto">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

@endsection
