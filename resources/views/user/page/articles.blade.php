@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 intro mt-lg-n5">

                    <h1 class="text-white font-weight-bold display-2" data-aos="fade-up" data-aos-delay="0">
                        Daftar Artikel DCC Bank
                    </h1>

                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <div class="site-section" id="portfolio-section">
        <div class="container">

            <div class="filters" data-aos="fade-up" data-aos-delay="100">
                <ul>
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".Berita">Berita</li>
                    <li data-filter=".Pengumuman">Pengumuman</li>
                    <li data-filter=".Edukasi">Edukasi</li>
                </ul>
            </div>

            <div class="filters-content mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="row grid">

                    @foreach ($dataArticle as $article)
                        <div class="isotope-card col-sm-4 all {{ $article->category }}">
                            <div class="blog_entry" style="margin-bottom: 30%">
                                <a href="{{ asset('storage/' . $article->image_path) }}" data-fancybox="gal">
                                    <img src="{{ asset('storage/' . $article->image_path) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 bg-white">
                                    <h3><a href="#">{{ $article->title }}</a></h3>
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}</span>
                                    <p
                                        style="
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;  
                                    overflow: hidden;
                                    text-align: justify;
                                ">
                                        {{ $article->excerpt }}
                                    </p>
                                    </p>
                                    <p class="more"><a
                                            href="{{ route('user.article.detail', ['slug' => $article->slug]) }}">Continue
                                            reading...</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
