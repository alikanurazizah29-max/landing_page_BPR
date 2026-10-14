@extends('user.layout.app')
@section('title', 'Layanan & Produk | BPR')

@section('content')

    <!-- Hero Banner -->
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 intro mt-lg-n5">
                    <h1 class="text-white font-weight-bold display-3" data-aos="fade-up" data-aos-delay="0">
                        Produk &amp; Layanan Perbankan
                    </h1>
                    <p class="text-white-50" data-aos="fade-up" data-aos-delay="100">
                        Solusi simpanan dan pembiayaan terpercaya untuk mendukung kebutuhan Anda dan perkembangan usaha.
                    </p>
                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <!-- Section Daftar Produk -->
    <div class="site-section py-5" id="portfolio-section">
        <div class="container">

            <!-- Banner Ringkas Informasi Suku Bunga & LPS (Tambahan agar info bunga mudah dilihat) -->
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-4 bg-light rounded-lg border-left-primary" style="border-left: 5px solid #c0392b;">
                        <div class="row align-items-center">
                            <div class="col-lg-8 mb-3 mb-lg-0">
                                <h5 class="font-weight-bold text-dark mb-1">
                                    <i class="feather-trending-up mr-2 text-primary"></i> Nikmati Suku Bunga Kompetitif &amp; Dijamin LPS
                                </h5>
                                <p class="text-muted small mb-0">
                                    Seluruh produk simpanan tabungan dan deposito kami menawarkan imbal hasil menarik yang aman dan telah dijamin oleh Lembaga Penjamin Simpanan (LPS).
                                </p>
                            </div>
                            <div class="col-lg-4 text-lg-right">
                                <a href="{{ route('home') }}#suku-bunga-section" class="btn btn-outline-primary btn-sm font-weight-bold">
                                    Lihat Tabel Bunga &amp; Kalkulator &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid Card Layanan menggunakan Row Standar -->
            <div class="row">

                @foreach ($dataproduk as $produk)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                        <!-- Card Container -->
                        <div class="card h-100 border rounded-lg shadow-sm bg-white p-4" 
                             style="border-color: #e2e8f0; border-radius: 8px; transition: transform 0.2s, box-shadow 0.2s;">
                            
                            <div class="d-flex align-items-start mb-3">
                                <!-- Ikon Centang Lingkaran Merah/Cokelat -->
                                <div class="mr-3 flex-shrink-0" style="margin-top: 2px;">
                                    <div style="width: 32px; height: 32px; border: 2px solid #c0392b; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #c0392b;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Judul Produk -->
                                <h4 class="font-weight-bold text-dark m-0" style="font-size: 1.25rem; line-height: 1.3;">
                                    {{ $produk->title ?? $produk->name }}
                                </h4>
                            </div>

                            <!-- Deskripsi Singkat -->
                            <p class="text-secondary mb-4" style="font-size: 0.92rem; line-height: 1.6; color: #6c757d;">
                                {{ Str::limit(strip_tags($produk->description ?? $produk->content), 110, '...') }}
                            </p>

                            <!-- Tombol Pelajari Selengkapnya -->
                            <div class="mt-auto">
                                <a href="{{ route('user.layanan.detail', [$produk->slug ?? $produk->id]) }}" 
                                   class="font-weight-bold text-decoration-none" 
                                   style="color: #c0392b; font-size: 1rem; transition: color 0.2s;">
                                    Pelajari Selengkapnya &rarr;
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection