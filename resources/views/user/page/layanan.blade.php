@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 intro mt-lg-n5">

                    <h1 class="text-white font-weight-bold display-3" data-aos="fade-up" data-aos-delay="0">
                        Daftar Layanan DCC Bank
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

                    @foreach ($dataproduk as $produk)
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                            <div class="unit-4 d-flex">
                                <div class="unit-4-icon mr-4">
                                    <span class="feather-pen-tool"></span>
                                </div>
                                <div>
                                    <h3>{{ $produk->title }}</h3>
                                    <p>{{ $produk->description }}</p>
                                    <p>
                                        <a
                                            href="{{ route('user.layanan.detail', [ $produk->id]) }}">
                                            Learn More
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
