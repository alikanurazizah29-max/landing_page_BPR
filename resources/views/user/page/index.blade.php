@extends('user.layout.app')
@section('title', 'BPR | Home')

@section('content')
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 intro">
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">We turn ideas into
                        extraordinary digital products</h1>
                    <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word
                        mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated
                        they live.</p>
                    <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="200">
                        <input type="text" class="form-control" placeholder="Pencarian">
                        <input type="submit" class="btn btn-primary" value="Sign up">
                    </form>

                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <div class="py-3">
        <div class="container">

            <div class="owl-logos owl-carousel">
                <div class="item">
                    <img src="{{ asset('user/images/logo-puma.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('user/images/logo-adobe.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('user/images/logo-google.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('user/images/logo-paypal.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('user/images/logo-adobe.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('user/images/logo-google.png') }}" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>

    <div class="site-section" style="background-color: #f8f9fa;">
        <!-- Background luar sedikit abu-abu agar card putih terlihat -->
        <div class="container">

            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="heading font-weight-bold mb-3" style="color: #000;">Layanin Kami Untuk Anda</h2>
                </div>
            </div>

            <!-- Tambahkan margin-top ekstra (mt-5) agar ikon paling atas tidak terpotong -->
            <div class="row align-items-stretch mt-5">
                @foreach ($dataProduk as $produk)
                    <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                        <div class="card h-100 text-center border-0 shadow"
                            style="background-color: #ffffff; border-radius: 12px; margin-top: 40px; position: relative;">

                            <!-- Bagian Ikon (Overlapping ke atas) -->
                            <div class="position-absolute" style="top: -40px; left: 50%; transform: translateX(-50%);">
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 80px; height: 80px; background-color: #1a365d; /* Biru Tua */ color: #ffffff; border: 5px solid #ffffff;">
                                    <!-- Ikon dinamis dari database -->
                                    <span class="{{ $produk->icon }}" style="font-size: 32px;"></span>
                                </div>
                            </div>

                            <!-- Card Body: Padding atas diperbesar (pt-5) agar teks tidak menabrak ikon -->
                            <div class="card-body pt-5 pb-4 px-4 d-flex flex-column">

                                <h4 class="font-weight-bold mb-3 mt-3" style="color: #000000;">
                                    {{ $produk->title }}
                                </h4>

                                <p class="text-break text-muted mb-4" style="color: #333333 !important;">
                                    {{ \Illuminate\Support\Str::limit($produk->description, 75) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('user.layanan.detail', [$produk->id]) }}" class="font-weight-bold"
                                        style="color: #1a365d; text-decoration: none;">
                                        Learn More
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container-fluid px-0 position-relative d-flex align-items-center min-vh-100"
        style="background-color: #ffffff;">
        <div class="container py-5">
            <div class="row align-items-center">

                <!-- Bagian Kiri: Judul dan Teks "abc" -->
                <div class="col-lg-5 mb-5 mb-lg-0 text-left">
                    {{-- <p class="text-uppercase font-weight-bold mb-2" style="letter-spacing: 2px; font-size: 0.9rem; color: #5a8fb9;">
                    Creative Design
                </p> --}}
                    <h2 class="font-weight-bold mb-4" style="color: #000000;">
                        Mengapa Harus Memilih Bank?
                    </h2>

                </div>

                <!-- Bagian Kanan: List Benefit -->
                <div class="col-lg-7">
                    <div style="padding: 1rem 2rem;">
                        @foreach ($databenefit as $benefit)
                            <div class="d-flex align-items-start mb-4">

                                <!-- 1. Bagian Icon Dinamis -->
                                <div class="rounded-circle d-flex align-items-center justify-content-center shadow flex-shrink-0"
                                    style="width: 70px; height: 70px; background-color: #fff; color: #5a8fb9; border: 4px solid #f4f6f9;">
                                    <!-- Mengambil class icon dari database -->
                                    <span class="{{ $benefit->icon }}" style="font-size: 26px;"></span>
                                </div>

                                <!-- 2. Bagian Panah -->
                                <div class="d-flex align-items-center px-3 flex-shrink-0"
                                    style="height: 70px; color: #5a8fb9;">
                                    <span style="font-size: 24px;">&rarr;</span>
                                </div>

                                <!-- 3. Bagian Teks -->
                                <div class="d-flex flex-column justify-content-center text-left" style="min-height: 70px;">
                                    <h5 class="font-weight-bold mb-1" style="color: #2c3e50;">
                                        {{ $benefit->title }}
                                    </h5>
                                    <p class="text-muted mb-0" style="font-size: 0.95rem; line-height: 1.6;">
                                        {{ $benefit->description }}
                                    </p>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="site-section bg-light" id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-7 mb-4 position-relative text-center mx-auto">
                    <h2 class="font-weight-bold text-center">Our Blog Posts</h2>
                    <p>Ini adalah semua artikel yang saya buat</p>
                </div>

            </div>
            <div class="row">


                @foreach ($dataArticle as $article)
                    <div class="col-md-6 mb-5 col-lg-4 d-flex align-items-stretch">
                        <div class="blog_entry shadow-sm rounded overflow-hidden d-flex flex-column w-100">

                            <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}"
                                class="d-block text-center bg-light">
                                <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                    class="img-fluid w-100"
                                    style="aspect-ratio: 3 / 2; object-fit: cover; object-position: center;">
                            </a>

                            <div class="p-4 bg-white d-flex flex-column flex-grow-1">
                                <h3>
                                    <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}"
                                        class="text-dark">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <span class="date d-block mb-3 text-muted">
                                    {{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}
                                </span>

                                <p class="mb-auto"
                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-align: justify;">
                                    {{ $article->excerpt }}
                                </p>

                                <p class="more mb-0 pt-3">
                                    <a href="{{ route('user.article.detail', ['slug' => $article->slug]) }}">
                                        Continue reading...
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col-lg-4 mx-auto">
                    <a href="{{ route('user.article.articles') }}" class="btn btn-primary btn-block">See All Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 mb-5 section-title" data-aos="fade-up" data-aos-delay="0">

                    <h2 class="mb-4 font-weight-bold heading">Testimonials</h2>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                    <p><a href="#" class="btn btn-primary">Product Tour</a></p>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">

                    <div class="testimonial--wrap">
                        <div class="owl-single owl-carousel no-dots no-nav">
                            @foreach ($dataTestimonial as $testimonials)
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="photo mr-3">
                                            <img src="{{ asset('storage/' . $testimonials->image_path) }}" alt="Image"
                                                class="img-fluid">
                                        </div>
                                        <div class="author">
                                            <cite class="d-block mb-0">{{ $testimonials->customer_name }}</cite>
                                            {{-- <span>{{$testimonials->image_path}}</span> --}}
                                            <div class="rating">
                                                &#9733; &#9733; &#9733; &#9733; &#9733; </div>
                                        </div>
                                    </div>
                                    <blockquote>
                                        <p>{{ $testimonials->content }}</p>
                                    </blockquote>
                                </div>
                            @endforeach
                        </div>
                        <div class="custom-nav-wrap">
                            <a href="#" class="custom-owl-prev"><span class="icon-keyboard_backspace"></span></a>
                            <a href="#" class="custom-owl-next"><span class="icon-keyboard_backspace"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
