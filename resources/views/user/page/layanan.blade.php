@extends('user.layout.app')
@section('title', 'Layanan & Produk | ' . ($companyProfile->company_name ?? 'BPR'))
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

    </div>

    <!-- Section Daftar Produk -->
    <div class="site-section py-5" id="portfolio-section">
        <div class="container">

            <!-- Banner Ringkas Informasi Suku Bunga & LPS (Tambahan agar info bunga mudah dilihat) -->
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-4 bg-light rounded-lg border-left-primary"
                        style="border-left: 5px solid #c0392b;">
                        <div class="row align-items-center">
                            <div class="col-lg-8 mb-3 mb-lg-0">
                                <h5 class="font-weight-bold text-dark mb-1">
                                    <i class="feather-trending-up mr-2 text-primary"></i> Nikmati Suku Bunga Kompetitif
                                    &amp; Dijamin LPS
                                </h5>
                                <p class="text-muted small mb-0">
                                    Seluruh produk simpanan tabungan dan deposito kami menawarkan imbal hasil menarik yang
                                    aman dan telah dijamin oleh Lembaga Penjamin Simpanan (LPS).
                                </p>
                            </div>
                            <div class="col-lg-4 text-lg-right">
                                <a href="{{ route('home') }}#suku-bunga-section"
                                    class="btn btn-outline-primary btn-sm font-weight-bold">
                                    Lihat Tabel Bunga &amp; Kalkulator &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filters text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <ul>
                    <li class="active font-weight-bold" data-filter="*">Semua</li>
                    <li class="font-weight-bold" data-filter=".tabungan">Tabungan</li>
                    <li class="font-weight-bold" data-filter=".deposito">Deposito</li>
                    <li class="font-weight-bold" data-filter=".kredit">Kredit</li>
                </ul>
            </div>

            <div class="filters-content mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="row grid">
                    @foreach ($dataproduk as $produk)
                        <div class="isotope-card col-sm-6 col-lg-4 mb-4 all {{ strtolower($produk->type) }}">
                            <!-- Card Container dengan tinggi yang lebih proporsional -->
                            <div class="card border rounded-lg shadow-sm bg-white p-4 d-flex flex-column"
                                style="height: 245px;">

                                <!-- Header Card: Ikon + Judul -->
                                <div class="d-flex align-items-start mb-3" style="min-height: 52px;">
                                    <!-- Ikon Centang Lingkaran Merah/Cokelat -->
                                    <div class="mr-3 flex-shrink-0" style="margin-top: 2px;">
                                        <div
                                            style="width: 32px; height: 32px; border: 2px solid #c0392b; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #c0392b;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Judul Produk (maksimal 2 baris) -->
                                    <h4 class="font-weight-bold text-dark m-0"
                                        style="font-size: 1.25rem; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $produk->title ?? $produk->name }}
                                    </h4>
                                </div>

                                <!-- Deskripsi Singkat (maksimal 3 baris) -->
                                <p class="text-secondary mb-auto"
                                    style="font-size: 0.92rem; line-height: 1.6; color: #6c757d; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ strip_tags($produk->description ?? $produk->content) }}
                                </p>

                                <!-- Tombol Pelajari Selengkapnya -->
                                <div class="pt-2">
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
    </div>

@endsection
