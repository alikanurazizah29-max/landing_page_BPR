@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

<div class="hero-slant overlay" data-stellar-background-ratio="0.5" style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-7 intro text-center">
            <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">About Us</h1>
            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-primary">Get Started</a></p>
            
          
          </div>
          
          
        </div>

        
      </div>

      <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <div class="site-section about-section ">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-4">
            <h2 class="section-title mb-4">A small river named Duden flows</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p class="mt-4"><a href="#" class="btn btn-primary btn-md">Book now</a></p>
          </div>
          <div class="col-lg-7 pl-lg-5 position-relative ">


            <div class="section-stack">
              <div class="image-stack">
                <div class="image-stack__item image-stack__item--top">
                  <img src="{{ asset('user/images/img_h_2-min.jpg') }}" alt="">
                </div>
                <div class="image-stack__item image-stack__item--bottom">
                  <img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="">
                </div>
              </div>
            </div>  

          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h4 class="font-weight-bold">Our Clients</h4>
          </div>
        </div>

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
        <div class="row align-items-center">
          <div class="col-lg-6">
            <img src="{{ asset('user/images/img_v_2-min.jpg') }}" alt="image" class="img-fluid rounded">
          </div>
          <div class="col-lg-6 pl-lg-5">
            <h3 class="mb-4 font-weight-bold">Who We Are</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. </p>
            <ul class="list-check list-unstyled primary">
              <li>Far far away, behind the word mountains</li>
              <li>Vokalia and Consonantia there</li>
              <li>Separated they live</li>
              <li>Semantics a large language ocean</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section slider-team-wrap bg-light">
      <div class="container">

        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold">Our Awesome Team</h2>
          </div>
          <div class="col-md-6 text-left text-md-right">
            <div class="slider-nav">
              <a href="#" class="js-prev js-custom-prev-v2"><span class="icon-arrow_back"></span></a>
              <a href="#" class="js-next js-custom-next-v2"><span class="icon-arrow_forward"></span></a>

            </div> <!-- /.slider-nav -->
          </div>
        </div>

        <div class="slider-team owl-carousel no-nav owl-3-slider">
          <div class="team">
            <div class="pic">
              <img src="{{ asset('user/images/person_1-min.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <h3 clas><a href="#"><span class="">Jeremy</span> Walker</a></h3>
            <span class="d-block position">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
          </div>
          <div class="team">
            <div class="pic">
              <img src="{{ asset('user/images/person_2-min.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <h3 clas><a href="#"><span class="">Lawson</span> Arnold</a></h3>
            <span class="d-block position">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
          </div>

          <div class="team">
            <div class="pic">
              <img src="{{ asset('user/images/person_3-min.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <h3 clas><a href="#"><span class="">Patrik</span> White</a></h3>
            <span class="d-block position">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
          </div>

          <div class="team">
            <div class="pic">
              <img src="{{ asset('user/images/person_4-min.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <h3 clas><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
            <span class="d-block position">CEO, Founder, Atty.</span>
            <p>Separated they live in.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
          </div>

        </div>
      </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
        
    
    <div class="site-section overlay site-cover-2" style="background-image: url(&quot;{{ asset('user/images/img_v_3-min.jpg') }}&quot;)">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto text-center">
            <h2 class="text-white mb-4">Get this template for free! :)</h2>
            <p class="mb-0"><a href="https://untree.co/" rel="noopener" class="btn btn-primary">Get it for free!</a></p>
          </div>
        </div>
      </div>
    </div>
    @endsection