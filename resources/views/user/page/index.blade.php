@extends('user.layout.app')
@section('title', ($companyProfile->company_name ?? 'BPR') . ' | Beranda - Simpanan & Kredit Terpercaya')

@section('content')
    <!-- 1. Hero Banner Utama (Pilihan A: Banner Resmi BPR + Promo Slider) -->
    @if (isset($dataHeroBanner) && $dataHeroBanner->count() > 0)
        <div class="hero-slider owl-single owl-carousel dots-absolute no-nav">

            <!-- Slide 2, 3, dst: Promo & Program Hero Banner dari Admin -->
            @foreach ($dataHeroBanner as $banner)
                <div class="hero-slant overlay"
                    style="background-image: url('{{ asset('storage/' . $banner->image_path) }}'); background-size: cover; background-position: center;">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-8 intro">
                                <span class="badge badge-primary px-3 py-2 mb-3 text-uppercase font-weight-bold"
                                    style="letter-spacing: 1px; font-size: 0.75rem;">
                                    {{ $companyProfile->company_name ?? 'Bank Perekonomian Rakyat' }}
                                </span>
                                <h1 class="text-white font-weight-bold mb-4" style="font-size: 2.6rem; line-height: 1.25;">
                                    {{ $banner->title }}
                                </h1>
                                @if ($banner->subtitle)
                                    <p class="text-white mb-4" style="font-size: 1.1rem; opacity: 0.95; line-height: 1.6;">
                                        {{ $banner->subtitle }}
                                    </p>
                                @endif
                                <div>
                                    @if ($banner->button_text && $banner->button_url)
                                        <a href="{{ $banner->button_url }}"
                                            class="btn btn-primary mr-2 mb-2 font-weight-bold shadow">
                                            {{ $banner->button_text }}
                                        </a>
                                    @else
                                        <a href="{{ route('contact') }}"
                                            class="btn btn-primary mr-2 mb-2 font-weight-bold shadow">
                                            Ajukan Pinjaman
                                        </a>
                                    @endif
                                    <a href="{{ route('user.layanan.layanans') }}" class="btn btn-outline-white mb-2">Lihat
                                        Produk Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Hero Default (Jika Belum Ada Banner Tambahan di Admin) -->
        <div class="hero-slant overlay"
            style="background-image: url('{{ asset('user/images/hero-min.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-8 intro">

                        <h1 class="text-white font-weight-bold mb-4" style="font-size: 2.6rem; line-height: 1.25;">
                            {{ $companyProfile->headline ?? 'Mitra Keuangan Terpercaya Untuk Pertumbuhan Usaha Anda' }}
                        </h1>
                        <p class="text-white mb-4" style="font-size: 1.1rem; opacity: 0.95; line-height: 1.6;">
                            {{ $companyProfile->subheadline ?? 'Wujudkan rencana finansial bersama kami melalui layanan tabungan aman, deposito bunga kompetitif, dan pembiayaan kredit UMKM.' }}
                        </p>
                        <div>
                            <a href="{{ route('contact') }}"
                                class="btn btn-primary mr-2 mb-2 font-weight-bold shadow">Ajukan Pinjaman</a>
                            <a href="{{ route('user.layanan.layanans') }}" class="btn btn-outline-white mb-2">Lihat Produk
                                Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- 2. Logo Kepatuhan & Regulator Resmi -->
    <div class="py-4 bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-4 col-12 mb-3 mb-md-0">
                    <span class="font-weight-bold text-muted d-block small">BERIZIN &amp; DIAWASI OLEH</span>
                    <strong class="text-dark" style="font-size: 1.1rem;">OTORITAS JASA KEUANGAN (OJK)</strong>
                </div>
                <div class="col-md-4 col-12 mb-3 mb-md-0">
                    <span class="font-weight-bold text-muted d-block small">PESERTA PENJAMINAN</span>
                    <strong class="text-dark" style="font-size: 1.1rem;">LEMBAGA PENJAMIN SIMPANAN (LPS)</strong>
                </div>
                <div class="col-md-4 col-12">
                    <span class="font-weight-bold text-muted d-block small">ANGGOTA ASOSIASI</span>
                    <strong class="text-dark" style="font-size: 1.1rem;">PERBARINDO</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Produk & Layanan Unggulan -->
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Layanan Perbankan</span>
                    <h2 class="heading font-weight-bold mb-3">Produk &amp; Layanan Unggulan</h2>
                </div>
            </div>
            <div class="row align-items-stretch">
                @foreach ($dataProduk as $produk)
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex p-4 border rounded shadow-sm bg-white h-100">
                            <div class="unit-4-icon mr-4 text-primary">
                                <span class="feather-check-circle" style="font-size: 28px;"></span>
                            </div>
                            <div>
                                <h3 class="h5 font-weight-bold">{{ $produk->title }}</h3>
                                <p class="text-muted small">{{ Str::limit($produk->description, 90) }}</p>
                                <p class="mb-0"><a
                                        href="{{ route('user.layanan.detail', [$produk->slug ?? $produk->id]) }}"
                                        class="text-primary font-weight-bold">Pelajari Selengkapnya &rarr;</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- 4. Keunggulan BPR (Grid Benefit - Estetik Merah BPR) -->
    <div class="position-relative py-5"
        style="background-image: url('{{ asset('user/images/img_v_3-min.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">

        <div class="position-absolute"
            style="top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6); z-index: 1;">
        </div>

        <div class="container text-center position-relative py-5" style="z-index: 2;">
            <span class="sub-title text-white font-weight-bold text-uppercase" style="letter-spacing: 2px;">Mengapa Memilih
                Kami</span>
            <h2 class="font-weight-bold mb-2 text-white">Keunggulan &amp; Nilai Lebih Layanan</h2>
            <p class="text-white-50 mb-5">Komitmen kami memberikan pelayanan perbankan yang cepat, aman, dan transparan.</p>

            <div class="row justify-content-center">
                @foreach ($databenefit as $benefit)
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                        <div class="card w-100 text-center shadow-lg"
                            style="border: 2px solid #8C1818; border-radius: 8px; background-color: rgba(255, 255, 255, 0.98);">
                            <div class="card-body py-5 d-flex flex-column justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4 shadow"
                                    style="width: 60px; height: 60px; background-color: #8C1818; color: white;">
                                    <span class="{{ $benefit->icon ?? 'feather-shield' }}" style="font-size: 26px;"></span>
                                </div>
                                <h5 class="card-title font-weight-bold" style="color: #8C1818;">{{ $benefit->title }}
                                </h5>
                                <p class="card-text text-muted small mt-2 mb-0">{{ $benefit->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- 5. Informasi Suku Bunga & Kalkulator Simulasi (Versi Padat & Ringkas) -->
    <div class="site-section bg-light py-3" id="suku-bunga-section">
        <div class="container" style="max-width: 750px;">

            <div class="row justify-content-center text-center mb-3" data-aos="fade-up">
                <div class="col-lg-8">
                    <span class="text-primary font-weight-bold text-uppercase"
                        style="font-size: 0.75rem; letter-spacing: 1px;">Transparan &amp; Menguntungkan</span>
                    <h4 class="font-weight-bold text-dark mt-1 mb-1" style="font-size: 1.35rem;">Informasi Suku Bunga BPR
                    </h4>
                    <p class="text-muted small mb-0" style="font-size: 0.8rem;">
                        Simpanan optimal dan pembiayaan kredit kompetitif yang dijamin oleh Lembaga Penjamin Simpanan (LPS).
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Tabel Suku Bunga Simpanan -->
                <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded overflow-hidden">
                        <div class="card-header text-white px-3 py-2 d-flex justify-content-between align-items-center"
                            style="background-color: #1a252f;">
                            <span class="font-weight-bold text-white" style="font-size: 0.85rem;">
                                <i class="feather-trending-up mr-1 text-warning"></i> Suku Bunga Simpanan Resmi
                            </span>
                            <span class="badge badge-success px-2 py-1" style="font-size: 0.65rem;">Dijamin LPS</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0 text-center" style="font-size: 0.82rem;">
                                    <thead style="background-color: #f8f9fa;">
                                        <tr>
                                            <th class="text-left pl-3 py-2">Produk Simpanan</th>
                                            <th class="py-2">Tenor</th>
                                            <th class="py-2">Suku Bunga (p.a)</th>
                                            <th class="py-2">Penjaminan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($interestRates ?? [] as $rate)
                                            <tr>
                                                <td class="text-left pl-3 font-weight-bold text-dark py-1">
                                                    {{ $rate->product_type }}</td>
                                                <td class="py-1">
                                                    {{ $rate->duration ?? ($rate->tenor ?? '1 - 12 Bulan') }}</td>
                                                <td class="text-success font-weight-bold py-1">
                                                    {{ $rate->rate ?? $rate->interest_rate }}%</td>
                                                <td class="py-1"><span class="badge badge-success"
                                                        style="font-size: 0.65rem;">LPS</span></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-left pl-3 font-weight-bold text-dark py-1">Deposito
                                                    Berjangka (1 Bln)</td>
                                                <td class="py-1">1 Bulan</td>
                                                <td class="text-success font-weight-bold py-1">5.25%</td>
                                                <td class="py-1"><span class="badge badge-success"
                                                        style="font-size: 0.65rem;">LPS</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left pl-3 font-weight-bold text-dark py-1">Deposito
                                                    Berjangka (3-6 Bln)</td>
                                                <td class="py-1">3-6 Bulan</td>
                                                <td class="text-success font-weight-bold py-1">5.75%</td>
                                                <td class="py-1"><span class="badge badge-success"
                                                        style="font-size: 0.65rem;">LPS</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left pl-3 font-weight-bold text-dark py-1">Deposito
                                                    Berjangka (12 Bln)</td>
                                                <td class="py-1">12 Bulan</td>
                                                <td class="text-success font-weight-bold py-1">6.00%</td>
                                                <td class="py-1"><span class="badge badge-success"
                                                        style="font-size: 0.65rem;">LPS</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left pl-3 font-weight-bold text-dark py-1">Tabungan BPR
                                                    Utama</td>
                                                <td class="py-1">Harian</td>
                                                <td class="text-success font-weight-bold py-1">2.50%</td>
                                                <td class="py-1"><span class="badge badge-success"
                                                        style="font-size: 0.65rem;">LPS</span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white text-muted px-3 py-1" style="font-size: 0.7rem;">
                            <i class="feather-info mr-1 text-primary"></i> Suku bunga dapat berubah sewaktu-waktu sesuai
                            ketentuan LPS.
                        </div>
                    </div>
                </div>

                <!-- Kalkulator Simulasi Deposito -->
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded p-3 bg-white">
                        <h6 class="font-weight-bold text-dark mb-1 text-center" style="font-size: 0.95rem;">Kalkulator
                            Simulasi Deposito</h6>
                        <p class="text-muted text-center mb-2" style="font-size: 0.75rem;">Hitung estimasi imbal hasil
                            simpanan Anda.</p>

                        <div class="row align-items-end">
                            <div class="col-md-5 mb-2 mb-md-0">
                                <label class="font-weight-bold text-dark mb-1" style="font-size: 0.75rem;">Nominal
                                    Deposito (Rp)</label>
                                <input type="number" id="nominalDeposito" class="form-control form-control-sm"
                                    value="10000000" style="font-size: 0.85rem;" oninput="hitungDeposito()">
                            </div>
                            <div class="col-md-4 mb-2 mb-md-0">
                                <label class="font-weight-bold text-dark mb-1" style="font-size: 0.75rem;">Tenor
                                    (Bulan)</label>
                                @php
                                    $depositoRates = collect($interestRates ?? [])->filter(function ($item) {
                                        return stripos($item->product_type, 'deposito') !== false ||
                                            stripos($item->duration, 'bulan') !== false;
                                    });
                                    if ($depositoRates->isEmpty()) {
                                        $depositoRates = collect($interestRates ?? []);
                                    }
                                @endphp
                                <select id="tenorDeposito" class="form-control form-control-sm"
                                    style="font-size: 0.85rem;" onchange="hitungDeposito()">
                                    @forelse($depositoRates as $rate)
                                        @php
                                            preg_match('/\d+/', $rate->duration, $matches);
                                            $tenorMonths = !empty($matches[0]) ? (int) $matches[0] : 12;
                                            $rateValue = (float) ($rate->rate ?? ($rate->interest_rate ?? 6.0));
                                        @endphp
                                        <option value="{{ $tenorMonths }}" data-rate="{{ $rateValue }}"
                                            {{ $loop->last ? 'selected' : '' }}>
                                            {{ $rate->duration }} ({{ $rateValue }}% p.a)
                                        </option>
                                    @empty
                                        <option value="1" data-rate="5.25">1 Bulan (5.25%)</option>
                                        <option value="3" data-rate="5.75">3 Bulan (5.75%)</option>
                                        <option value="6" data-rate="6.25">6 Bulan (6.25%)</option>
                                        <option value="12" data-rate="6.75" selected>12 Bulan (6.75%)</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="button" onclick="hitungDeposito()"
                                    class="btn btn-primary btn-sm btn-block font-weight-bold py-1"
                                    style="font-size: 0.85rem;">
                                    Hitung
                                </button>
                            </div>
                        </div>

                        <!-- Hasil Estimasi -->
                        <div class="p-2 mt-2 rounded bg-light border text-center" id="hasilSimulasi">
                            <span class="text-muted d-block" style="font-size: 0.7rem;">Estimasi Bunga Bersih per Bulan
                                (Setelah Pajak PPh 20%):</span>
                            <span class="font-weight-bold text-success" id="bungaApresiasi" style="font-size: 1rem;">Rp
                                40.000 / bulan</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- 6. Berita & Edukasi Terkini -->
    <div class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 mx-auto position-relative text-center">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Informasi &amp; Edukasi</span>
                    <h2 class="font-weight-bold text-center">Berita &amp; Artikel Terbaru</h2>
                    <p class="text-muted">Dapatkan tips keuangan, literasi perbankan, dan pengumuman resmi dari kami.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($dataArticle as $article)
                    <div class="col-md-6 mb-5 col-lg-4 d-flex align-items-stretch">
                        <div class="blog_entry shadow-sm rounded overflow-hidden d-flex flex-column w-100 bg-white">
                            <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}"
                                class="d-block text-center bg-light">
                                @if ($article->image_path)
                                    <img src="{{ asset('storage/' . $article->image_path) }}"
                                        alt="{{ $article->title }}" class="img-fluid w-100"
                                        style="aspect-ratio: 3 / 2; object-fit: cover; object-position: center;">
                                @else
                                    <img src="{{ asset('user/images/hero-min.jpg') }}" alt="{{ $article->title }}"
                                        class="img-fluid w-100"
                                        style="aspect-ratio: 3 / 2; object-fit: cover; object-position: center;">
                                @endif
                            </a>

                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <h3>
                                    <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}"
                                        class="text-dark font-weight-bold h5">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <span class="date d-block mb-3 text-muted small">
                                    <i class="feather-calendar mr-1"></i>
                                    {{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}
                                </span>

                                <p class="mb-auto text-muted small"
                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $article->excerpt }}
                                </p>

                                <p class="more mb-0 pt-3 border-top mt-3">
                                    <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}"
                                        class="font-weight-bold text-primary">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mx-auto">
                    <a href="{{ route('user.article.articles') }}"
                        class="btn btn-outline-primary btn-block font-weight-bold">Lihat Semua Artikel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 7. Testimoni Nasabah -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 mb-5 section-title" data-aos="fade-up" data-aos-delay="0">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Kepercayaan Nasabah</span>
                    <h2 class="mb-4 font-weight-bold heading">Apa Kata Mereka?</h2>
                    <p class="mb-4 text-muted">Pengalaman nyata dari nasabah setia yang telah mempercayakan pengelolaan
                        keuangan dan pengembangan usahanya bersama kami.</p>
                    <p><a href="{{ route('contact') }}" class="btn btn-primary">Mulai Bermitra</a></p>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial--wrap">
                        <div class="owl-single owl-carousel no-dots no-nav">
                            @foreach ($dataTestimonial as $testimonials)
                                <div class="testimonial-item p-4 border rounded bg-white shadow-sm">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="photo mr-3">
                                            @if ($testimonials->image_path)
                                                <img src="{{ asset('storage/' . $testimonials->image_path) }}"
                                                    alt="{{ $testimonials->customer_name }}"
                                                    class="img-fluid rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('user/images/person_' . (($loop->index % 4) + 1) . '-min.jpg') }}"
                                                    alt="{{ $testimonials->customer_name }}"
                                                    class="img-fluid rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="author">
                                            <cite
                                                class="d-block mb-0 font-weight-bold h6 text-dark">{{ $testimonials->customer_name }}</cite>
                                            <small
                                                class="text-muted">{{ $testimonials->profession ?? 'Nasabah Setia' }}</small>
                                            <div class="rating text-warning mt-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    {!! $i <= ($testimonials->rating ?? 5)
                                                        ? '&#9733;'
                                                        : '<span class="text-muted" style="opacity: 0.3;">&#9733;</span>' !!}
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <blockquote>
                                        <p class="text-muted font-italic mb-0">"{{ $testimonials->content }}"</p>
                                    </blockquote>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 8. Pertanyaan yang Sering Diajukan (FAQ) -->
    @if (isset($faqs) && $faqs->count() > 0)
        <div class="site-section bg-light py-5" id="faq-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                    <div class="col-lg-8">
                        <span class="sub-title text-primary font-weight-bold text-uppercase"
                            style="letter-spacing: 2px;">Bantuan &amp; Informasi</span>
                        <h2 class="heading font-weight-bold text-dark mt-2">Pertanyaan yang Sering Diajukan (FAQ)</h2>
                        <p class="text-muted">Temukan jawaban cepat seputar pembukaan rekening tabungan, deposito, pinjaman
                            kredit UMKM, dan keamanan penjaminan LPS.</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-wrapper" id="accordion_faq">
                            @foreach ($faqs as $faq)
                                <div class="card border-0 shadow-sm mb-3 rounded-lg overflow-hidden faq-card">
                                    <div class="card-header bg-white p-0 border-0" id="headingFaq{{ $faq->id }}">
                                        <button
                                            class="btn btn-block text-left p-4 d-flex justify-content-between align-items-center faq-toggle {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-toggle="collapse"
                                            data-target="#collapseFaq{{ $faq->id }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapseFaq{{ $faq->id }}">
                                            <span class="font-weight-bold text-dark d-flex align-items-center pr-3"
                                                style="font-size: 1.05rem;">
                                                <i class="feather-help-circle text-primary mr-3"
                                                    style="font-size: 20px;"></i>
                                                {{ $faq->question }}
                                            </span>
                                            <span
                                                class="faq-icon d-flex align-items-center justify-content-center rounded-circle bg-light text-primary"
                                                style="width: 32px; height: 32px; min-width: 32px;">
                                                <i class="feather-chevron-down" style="font-size: 18px;"></i>
                                            </span>
                                        </button>
                                    </div>

                                    <div id="collapseFaq{{ $faq->id }}"
                                        class="collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="headingFaq{{ $faq->id }}" data-parent="#accordion_faq">
                                        <div class="card-body px-4 pb-4 pt-0 faq-answer">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Bantuan Lebih Lanjut -->
                        <div class="text-center mt-4">
                            <p class="text-muted small mb-2">Masih memiliki pertanyaan lain yang belum terjawab?</p>
                            <a href="{{ route('contact') }}"
                                class="btn btn-outline-primary btn-sm font-weight-bold px-4 py-2">
                                <i class="feather-message-circle mr-1"></i> Hubungi Petugas Layanan Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Script Perhitungan Simulasi Deposito (100% Dinamis dari Database) -->
    <script>
        function hitungDeposito() {
            var nominalInput = document.getElementById('nominalDeposito');
            var nominal = parseFloat(nominalInput ? nominalInput.value : 0) || 0;
            var tenorSelect = document.getElementById('tenorDeposito');

            if (!tenorSelect) return;

            var selectedOption = tenorSelect.options[tenorSelect.selectedIndex];
            var ratePercent = selectedOption ? parseFloat(selectedOption.getAttribute('data-rate')) : 6.0;
            if (isNaN(ratePercent)) ratePercent = 6.0;

            var annualRate = ratePercent / 100;

            // Bunga kotor per bulan = (nominal * rate) / 12
            // Pajak PPh atas bunga = 20% jika nominal deposito > Rp 7.500.000 (ketentuan resmi perbankan)
            var bungaKotorBulan = (nominal * annualRate) / 12;
            var pajak = nominal > 7500000 ? 0.20 : 0.0;
            var bungaBersihBulan = bungaKotorBulan * (1 - pajak);

            var hasil = document.getElementById('bungaApresiasi');
            if (hasil) {
                hasil.innerText = 'Rp ' + Math.round(bungaBersihBulan).toLocaleString('id-ID') + ' / bulan';
            }
        }

        // Jalankan perhitungan otomatis saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            hitungDeposito();
        });
    </script>
@endsection
