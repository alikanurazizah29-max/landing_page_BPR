@extends('user.layout.app')
@section('title', 'Berita & Artikel | ' . ($companyProfile->company_name ?? 'BPR'))
@section('content')

    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8 intro mt-lg-n5">
                    <span class="badge badge-primary px-3 py-2 mb-3 text-uppercase font-weight-bold"
                        style="letter-spacing: 1px; font-size: 0.75rem;">
                        Informasi Terkini
                    </span>
                    <h1 class="text-white font-weight-bold" data-aos="fade-up" data-aos-delay="0" style="font-size: 2.5rem;">
                        Berita &amp; Artikel Edukasi {{ $companyProfile->company_name ?? 'BPR' }}
                    </h1>
                    <p class="text-white-50" data-aos="fade-up" data-aos-delay="100">
                        Dapatkan wawasan seputar tips keuangan, pengelolaan bisnis, literasi perbankan, dan pengumuman resmi.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="site-section" id="portfolio-section">
        <div class="container">

            <div class="filters text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <ul>
                    <li class="active font-weight-bold" data-filter="*">Semua</li>
                    <li class="font-weight-bold" data-filter=".Berita">Berita</li>
                    <li class="font-weight-bold" data-filter=".Pengumuman">Pengumuman</li>
                    <li class="font-weight-bold" data-filter=".Edukasi">Edukasi</li>
                </ul>
            </div>

            <div class="filters-content mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="row grid">
                    @foreach ($dataArticle as $article)
                        <div class="isotope-card col-sm-6 col-lg-4 mb-4 all {{ $article->category }}">
                            <div class="blog_entry shadow-sm rounded overflow-hidden h-100 d-flex flex-column bg-white border">
                                <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}" class="d-block bg-light">
                                    @if ($article->image_path)
                                        <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                            class="img-fluid w-100" style="aspect-ratio: 16 / 9; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('user/images/hero-min.jpg') }}" alt="{{ $article->title }}"
                                            class="img-fluid w-100" style="aspect-ratio: 16 / 9; object-fit: cover;">
                                    @endif
                                </a>
                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge badge-light border text-primary px-2 py-1 small">
                                            {{ $article->category ?? 'Artikel' }}
                                        </span>
                                        <span class="date text-muted small">
                                            <i class="feather-calendar mr-1"></i>{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}
                                        </span>
                                    </div>
                                    <h3 class="h5 font-weight-bold mb-2">
                                        <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}" class="text-dark">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    <p class="text-muted small mb-auto"
                                        style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-align: justify; line-height: 1.6;">
                                        {{ $article->excerpt }}
                                    </p>
                                    <p class="more mb-0 pt-3 border-top mt-3">
                                        <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}" class="font-weight-bold text-primary small">
                                            Baca Selengkapnya &rarr;
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection