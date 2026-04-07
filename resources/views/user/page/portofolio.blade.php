@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

<div class="hero-slant overlay" data-stellar-background-ratio="0.5" style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-7 intro text-center">
            <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Append Portfolio</h1>
            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-primary">Get Started</a></p>
            
          
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
            <li data-filter=".packaging">Packaging</li>
            <li data-filter=".mockup">Mockup</li>
            <li data-filter=".typography">Typography</li>
            <li data-filter=".photography">Photography</li>
          </ul>
        </div>

        <div class="filters-content mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="row grid">
            <div class="isotope-card col-sm-4 all mockup">
              <a href="{{ asset('user/images/img_v_4-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_v_4-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>Card Vol. 3</h3>
                  <div class="cat">Mockup</div>
                </div>
              </a>
            </div>

            <div class="isotope-card col-sm-4 all mockup">
              <a href="{{ asset('user/images/img_h_1-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_1-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>Card Vol. 3</h3>
                  <div class="cat">Mockup</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all mockup">
              <a href="{{ asset('user/images/img_h_8-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_8-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>Card Vol. 3</h3>
                  <div class="cat">Mockup</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all typography">
              <a href="{{ asset('user/images/img_h_2-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_2-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>House Design</h3>
                  <div class="cat">Typography</div>
                </div>
              </a>

            </div>                            
            <div class="isotope-card col-sm-4 all mockup">
              <a href="{{ asset('user/images/img_h_3-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>WoW</h3>
                  <div class="cat">Mockup</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all packaging">
              <a href="{{ asset('user/images/img_h_4-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_4-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>Seat</h3>
                  <div class="cat">Packaging</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all typography">
              <a href="{{ asset('user/images/img_h_5-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_h_5-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>Seat</h3>
                  <div class="cat">Packaging</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all photography">
              <a href="{{ asset('user/images/img_v_1-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_v_1-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>House Design</h3>
                  <div class="cat">Photography</div>
                </div>
              </a>
            </div>
            <div class="isotope-card col-sm-4 all photography">
              <a href="{{ asset('user/images/img_v_2-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_v_2-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>House Design</h3>
                  <div class="cat">Photography</div>
                </div>
              </a>

            </div>

            <div class="isotope-card col-sm-4 all photography">
              <a href="{{ asset('user/images/img_v_8-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_v_8-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>House Design</h3>
                  <div class="cat">Photography</div>
                </div>
              </a>

            </div>
            <div class="isotope-card col-sm-4 all photography">
              <a href="{{ asset('user/images/img_v_3-min.jpg') }}" data-fancybox="gal">
                <img src="{{ asset('user/images/img_v_3-min.jpg') }}" alt="Image" class="img-fluid">
                <div class="contents">
                  <h3>House Design</h3>
                  <div class="cat">Photography</div>
                </div>
              </a>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- .untrtee_co-section -->
        

    <div class="testimonial-section bg-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-4 mb-5 section-title" data-aos="fade-up" data-aos-delay="0">
            
            <h2 class="mb-4 font-weight-bold heading">Testimonials</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
            <p><a href="#" class="btn btn-primary">Product Tour</a></p>
          </div>
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            
            <div class="testimonial--wrap">
              <div class="owl-single owl-carousel no-dots no-nav">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center mb-4">
                    <div class="photo mr-3">
                      <img src="{{ asset('user/images/person_4-min.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="author">
                      <cite class="d-block mb-0">Kaila Woodland</cite>
                      <span>Owner, Greenland, Inc.</span>
                    </div>
                  </div>
                  <blockquote>
                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
                  </blockquote>
                </div>  

                <div class="testimonial-item">
                  <div class="d-flex align-items-center mb-4">
                    <div class="photo mr-3">
                      <img src="{{ asset('user/images/person_1-min.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="author">
                      <cite class="d-block mb-0">Kaila Woodland</cite>
                      <span>Owner, Greenland, Inc.</span>
                    </div>
                  </div>
                  <blockquote>
                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
                  </blockquote>
                </div>  

                <div class="testimonial-item">
                  <div class="d-flex align-items-center mb-4">
                    <div class="photo mr-3">
                      <img src="{{ asset('user/images/person_2-min.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="author">
                      <cite class="d-block mb-0">Kaila Woodland</cite>
                      <span>Owner, Greenland, Inc.</span>
                    </div>
                  </div>
                  <blockquote>
                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.&rdquo;</p>
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