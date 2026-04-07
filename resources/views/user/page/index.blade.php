@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

    <div class="hero-slant overlay" data-stellar-background-ratio="0.5" style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-7 intro">
            <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">We turn ideas into extraordinary digital products</h1>
            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="200">
              <input type="text" class="form-control" placeholder="Enter email address">
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
          <div class="col-12 text-center"  data-aos="fade-up">
            <h2 class="heading font-weight-bold mb-3">Our Services</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-pen-tool"></span>
              </div>
              <div>
                <h3>Modern Design</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-layers"></span>
              </div>
              <div>
                <h3>High Performance</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-layout"></span>
              </div>
              <div>
                <h3>Flexible Layout</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-life-buoy"></span>
              </div>
              <div>
                <h3>Free Support</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-shopping-bag"></span>
              </div>
              <div>
                <h3>Cool Pricing</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4">
                <span class="feather-smartphone"></span>
              </div>
              <div>
                <h3>Mobile Apps</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                <p><a href="#">Learn More</a></p>
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


    <div class="features-lg ">
      <div class="container">
        <div class="row feature align-items-center justify-content-between">
          <div class="col-lg-7 section-stack order-lg-2 mb-4 mb-lg-0 position-relative" data-aos="fade-up" data-aos-delay="0">

            <div class="image-stack">
              <div class="image-stack__item image-stack__item--top">
                <img src="{{ asset('user/images/img_h_2-min.jpg') }}" alt="">
              </div>
              <div class="image-stack__item image-stack__item--bottom">
                <img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="">
              </div>
            </div>

          </div>
          <div class="col-lg-4 section-title" data-aos="fade-up" data-aos-delay="100">
            
            <h2 class="font-weight-bold mb-4 heading">Far far away, behind the word mountains</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <p><a href="#" class="btn btn-primary">Get Started</a></p>

          </div>
          
        </div>
      </div>
    </div>
    
    <div class="features-lg">
      <div class="container">
        
        <div class="row feature align-items-center justify-content-between">
          <div class="col-lg-7 mb-4 mb-lg-0 section-stack" data-aos="fade-up" data-aos-delay="0">
            <img src="{{ asset('user/images/img_h_5-min.jpg') }}" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 section-title" data-aos="fade-up" data-aos-delay="100">
            
            <h2 class="font-weight-bold mb-4">Far far away, behind the word mountains</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <p><a href="#" class="btn btn-primary">Get Started</a></p>

          </div>
          
        </div>

      </div>
    </div>



    <div class="pricing-section">
      <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up" data-aos-delay="0">
          <h2 class="heading font-weight-bold mb-5">Plans</h2>

          <div class="switch-plan">
            
            <div class="d-inline-flex align-items-center">
              <div class="period">Monthly</div>
              <a href="#" class="period-toggle js-period-toggle"></a>
              <div class="period"><span class="mr-2">Yearly</span><span class="save-percent">Save 25%</span></div>
            </div>

          </div>
        </div>
        

        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
            <div class="pricing-item ">
              <h3>Basic</h3>
              <div class="description">
                <p>Far far away, behind the word mountains</p>
              </div>
              <div class="period-change mb-4 d-block">
                <div class="price-wrap">
                  <div class="price">
                    <div>
                      <div>$29</div>
                      <div>$299</div>
                    </div>
                  </div>
                </div>
                <div class="d-inline-flex align-items-center text-center period-wrap">
                  <div class="d-inline-block mr-1">Per</div>
                  <div class="d-block text-left period">
                    <div>
                      <div>Month</div>
                      <div>Year</div>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled mb-4">
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
              </ul>
              <div>
                <a href="#" class="btn btn-primary">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item active">
              <h3>Advanced</h3>
              <div class="description">
                <p>Far far away, behind the word mountains</p>
              </div>
              <div class="period-change mb-4 d-block">
                <div class="price-wrap">
                  <div class="price">
                    <div>
                      <div>$49</div>
                      <div>$599</div>
                    </div>
                  </div>
                </div>
                <div class="d-inline-flex align-items-center text-center period-wrap">
                  <div class="d-inline-block mr-1">Per</div>
                  <div class="d-block text-left period">
                    <div>
                      <div>Month</div>
                      <div>Year</div>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled mb-4">
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
              </ul>
              <div>
                <a href="#" class="btn btn-primary">Get Started</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item ">
              <h3>Premium</h3>
              <div class="description">
                <p>Far far away, behind the word mountains</p>
              </div>
              <div class="period-change mb-4 d-block">
                <div class="price-wrap">
                  <div class="price">
                    <div>
                      <div>$99</div>
                      <div>$1,999</div>
                    </div>
                  </div>
                </div>
                <div class="d-inline-flex align-items-center text-center period-wrap">
                  <div class="d-inline-block mr-1">Per</div>
                  <div class="d-block text-left period">
                    <div>
                      <div>Month</div>
                      <div>Year</div>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled mb-4">
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
                <li class="d-flex"><span class="feather-check-square mr-2 mt-1"></span><span>Far far away, behind the word mountains</span></li>
              </ul>
              <div>
                <a href="#" class="btn btn-primary">Get Started</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <div class="testimonial-section">
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

     <div class="site-section bg-light" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-7 mb-4 position-relative text-center mx-auto">
            <h2 class="font-weight-bold text-center">Our Blog Posts</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>

        </div>
        <div class="row">
          
          
          <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="#"><img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="Free Website Template by Free-Template.co" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <h3><a href="#">Far far away, behind the word mountains</a></h3>
                <span class="date">April 25, 2019</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="more"><a href="#">Continue reading...</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="#"><img src="{{ asset('user/images/img_h_5-min.jpg') }}" alt="Free Website Template by Free-Template.co" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <h3><a href="#">Far far away, behind the word mountains</a></h3>
                <span class="date">April 25, 2019</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="more"><a href="#">Continue reading...</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-5 mb-lg-0 col-lg-4">
            <div class="blog_entry">
              <a href="#"><img src="{{ asset('user/images/img_h_7-min.jpg') }}" alt="Free Website Template by Free-Template.co" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <h3><a href="#">Far far away, behind the word mountains</a></h3>
                <span class="date">April 25, 2019</span>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="more"><a href="#">Continue reading...</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 mx-auto">
            <a href="#" class="btn btn-primary btn-block">See All Posts</a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section overlay site-cover-2" style="background-image: url(&quot;{{ asset('user/images/img_v_4-min.jpg') }}&quot;)">
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