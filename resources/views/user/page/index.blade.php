@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')
    <style>
        .hero-image-curve {
            width: 80%;
            height: 100vh;
            object-fit: cover;

            /* Lengkungan kanan */
            border-top-right-radius: 105% 50%;
            border-bottom-right-radius: 105% 50%;

            overflow: hidden;
        }

        .hero-text-box {
            background: #111a63;
            min-height: 100vh;
        }

        .feature-card {
            position: relative;
            padding: 40px 30px 30px;
            border-radius: 22px;
            color: white;
            min-height: 240px;
            margin: 0px 20px;

            transition: 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-light {
            background: #ef6b3b;
        }

        .feature-dark {
            background: #cc4e0f;
        }

        .feature-icon {
            position: absolute;
            top: 20px;
            left: -25px;

            width: 50px;
            height: 50px;

            border-radius: 50%;
            background: #fff3e8;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 6px solid #f7f7f7;
        }

        .feature-icon span {
            font-size: 24px;
            color: #cc4e0f;
        }

        .feature-card h4 {
            margin-top: 10px;
            margin-bottom: 20px;

            font-size: 24px;
            font-weight: 700;
            color: white;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
        }

        .feature-card a {
            display: inline-block;
            margin-top: 20px;

            color: white;
            font-weight: 600;
        }

        .feature-shift-top {
            margin-top: 60px;
        }

        .feature-shift-bottom {
            margin-top: -60px;
        }
    </style>

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


    <div class="container-fluid overflow-hidden">
        <div class="row h-100 g-5" style="background: rgb(255, 255, 255)">

            <!-- IMAGE -->
            <div class="col-lg-4 p-0 position-relative hero-image-wrapper">

                <img src="{{ asset('user/images/img_v_3-min.jpg') }}" class="hero-image-curve">

            </div>

            <!-- TEXT -->
            <div class="col-lg-6 d-flex align-items-center" style="margin-inline-start: 80px">


                <div class="row g-5">

                    <!-- CARD 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-card feature-light">

                            <div class="feature-icon">
                                <span class="icon-briefcase"></span>
                            </div>

                            <h4>Banking Info</h4>

                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>

                            <a href="#">Read More</a>

                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div class="col-md-6 mb-4 feature-shift-top">
                        <div class="feature-card feature-dark">

                            <div class="feature-icon">
                                <span class="icon-shield"></span>
                            </div>

                            <h4>Finance & Risk</h4>

                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>

                            <a href="#">Read More</a>

                        </div>
                    </div>

                    <!-- CARD 3 -->
                    <div class="col-md-6 mb-4 feature-shift-bottom">
                        <div class="feature-card feature-dark">

                            <div class="feature-icon">
                                <span class="icon-lock"></span>
                            </div>

                            <h4>Safe & Secure</h4>

                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>

                            <a href="#">Read More</a>

                        </div>
                    </div>

                    <!-- CARD 4 -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-card feature-light">

                            <div class="feature-icon">
                                <span class="icon-home"></span>
                            </div>

                            <h4>Fast Loan</h4>

                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>

                            <a href="#">Read More</a>

                        </div>
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
                    <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
                        <div class="blog_entry">
                            <a href="#"><img src="{{ asset('storage/' . $article->image_path) }}"
                                    alt="Free Website Template by Free-Template.co" class="img-fluid"></a>
                            <div class="p-4 bg-white">
                                <h3><a href="#">{{ $article->title }}</a></h3>
                                <span class="date">{{ $article->created_at }}</span>
                                <p>{{ $article->excerpt }}
                                </p>
                                <p class="more"><a href="#">Continue reading...</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col-lg-4 mx-auto">
                    <a href="#" class="btn btn-primary btn-block">See All Posts</a>
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
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="photo mr-3">
                                        <img src="{{ asset('user/images/person_4-min.jpg') }}" alt="Image"
                                            class="img-fluid">
                                    </div>
                                    <div class="author">
                                        <cite class="d-block mb-0">Kaila Woodland</cite>
                                        <span>Owner, Greenland, Inc.</span>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
                                </blockquote>
                            </div>

                            <div class="testimonial-item">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="photo mr-3">
                                        <img src="{{ asset('user/images/person_1-min.jpg') }}" alt="Image"
                                            class="img-fluid">
                                    </div>
                                    <div class="author">
                                        <cite class="d-block mb-0">Kaila Woodland</cite>
                                        <span>Owner, Greenland, Inc.</span>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
                                </blockquote>
                            </div>

                            <div class="testimonial-item">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="photo mr-3">
                                        <img src="{{ asset('user/images/person_2-min.jpg') }}" alt="Image"
                                            class="img-fluid">
                                    </div>
                                    <div class="author">
                                        <cite class="d-block mb-0">Kaila Woodland</cite>
                                        <span>Owner, Greenland, Inc.</span>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
                                </blockquote>
                            </div>
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
    </div>
@endsection
