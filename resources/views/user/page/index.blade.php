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

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2 class="heading font-weight-bold mb-3">Layanin Kami Untuk Anda</h2>
                </div>
            </div>
            <div class="row align-items-stretch">
                @foreach ($dataProduk as $produk)
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                        <div class="unit-4 d-flex">
                            <div class="unit-4-icon mr-4">
                                <span class="feather-pen-tool"></span>
                            </div>
                            <div>
                                <h3>{{ $produk->title }}</h3>
                                <p>{{ $produk->description }}</p>
                                <p><a href="#">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid px-0 position-relative d-flex align-items-center justify-content-center min-vh-100"
        style="background-image: url('{{ asset('user/images/img_v_3-min.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;">
        </div>

        <div class="container text-center position-relative py-5" style="z-index: 2;">
            <h2 class="font-weight-bold mb-2 text-white">Mengapa Harus Memilih Bank?</h2>
            <p class="text-uppercase mb-5 text-white font-weight-bold" style="letter-spacing: 2px; font-size: 0.9rem;">
                Creative Design
            </p>

            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-6 mb-4">
                    @foreach ($databenefit as $benefit)
                        <div class="card h-100 text-center shadow-lg"
                            style="border: 2px solid #8C1818; border-radius: 8px; background-color: rgba(255, 255, 255, 0.95);">
                            <div class="card-body py-5">
                                <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4"
                                    style="width: 50px; height: 50px; background-color: #8C1818; color: white; font-weight: bold; font-size: 1.1rem;">
                                    <div class="unit-4-icon">
                                        <span class="feather-pen-tool" style="font-size: 24px;"></span>
                                    </div>
                                </div>
                                <h5 class="card-title font-weight-bold" style="color: #8C1818;">{{ $benefit->title }}</h5>
                                <p class="card-text text-muted small mt-3">{{ $benefit->description }}</p>
                            </div>
                        </div>
                    @endforeach
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
                    <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
                        <div class="blog_entry">
                            <a href="#"><img src="{{ asset('storage/' . $article->image_path) }}" alt=".."
                                    class="img-fluid"></a>
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
