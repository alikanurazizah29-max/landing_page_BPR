 @extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

<div class="hero-slant overlay" data-stellar-background-ratio="0.5" style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-7 intro text-center">
            <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Elements</h1>
            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>
            <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-primary">Get Started</a></p>
            
          
          </div>
          
          
        </div>

        
      </div>

      <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <div class="container pt-5 pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">01. Slider</h1>
      </div>
      <div class="col-lg-12">
        <div class="main-slider owl-single dots-absolute owl-carousel">
          <img src="{{ asset('user/images/img_h_1-min.jpg') }}" alt="Image" class="img-fluid">
          <img src="{{ asset('user/images/img_h_2-min.jpg') }}" alt="Image" class="img-fluid">
          <img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">02. Accordion</h1>
      </div>
      <div class="col-lg-12">
        <div class="custom-accordion" id="accordion_1">
          <div class="accordion-item">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How to download and register?</button>
            </h2>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
              <div class="accordion-body">
                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
              </div>
            </div>
          </div> <!-- .accordion-item -->

          <div class="accordion-item">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How to create your paypal account?</button>
            </h2>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
              <div class="accordion-body">
                A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
              </div>
            </div>
          </div> <!-- .accordion-item -->
          <div class="accordion-item">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How to link your paypal and bank account?</button>
            </h2>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
              <div class="accordion-body">
                When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.
              </div>
            </div>

          </div> <!-- .accordion-item -->

        </div>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">03. Gallery</h1>
      </div>
      <div class="col-lg-12">
        <div class="row gutter-1 gallery">
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_1-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_1-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_2-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_2-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_3-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_3-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_4-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_4-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_5-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_5-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4">
            <a href="{{ asset('user/images/img_h_6-min.jpg') }}" class="gal-item" data-fancybox="gal"><img src="{{ asset('user/images/img_h_6-min.jpg') }}" alt="Image" class="img-fluid"></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">04. Video</h1>
      </div>
      <div class="col-lg-7">
        <a href="https://vimeo.com/342333493" data-fancybox class="video-wrap">
          <span class="play-wrap"><span class="icon-play"></span></span>
          <img src="{{ asset('user/images/img_h_5.jpg') }}" alt="Image" class="img-fluid rounded">
        </a>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">05. Form</h1>
      </div>
      <div class="col-lg-7">
        <form>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="text-black" for="fname">First name</label>
                <input type="text" class="form-control" id="fname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="text-black" for="lname">Last name</label>
                <input type="text" class="form-control" id="lname">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="text-black" for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label class="text-black" for="password">Password</label>
            <input type="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label class="text-black" for="message">Message</label>
            <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label class="text-black" for="select">Select</label>

            <select name="" id="select" class="custom-select">
              <option value="">Untree.co</option>
              <option value="">Offers high quality free template</option>
            </select>

          </div>
          <div class="form-group">
            <label class="control control--checkbox">
              <span class="caption">Custom checkbox</span>
              <input type="checkbox" checked="checked"/>
              <div class="control__indicator"></div>
            </label>
          </div>
          <button type="submit" class="btn btn-primary-hover-outline">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">06. Social Icons</h1>
      </div>
      <div class="col-lg-7">
        <ul class="list-unstyled social-icons light">
          <li><a href="#"><span class="icon-facebook"></span></a></li>
          <li><a href="#"><span class="icon-twitter"></span></a></li>
          <li><a href="#"><span class="icon-linkedin"></span></a></li>
          <li><a href="#"><span class="icon-google"></span></a></li>
          <li><a href="#"><span class="icon-play"></span></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">07. Testimonials</h1>
      </div>
      <div class="col-lg-7">
        <div class="main-slider owl-single owl-carousel">
          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Adam Aderson</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Lukas Devlin</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

          <div class="testimonial mx-auto">
            <figure class="img-wrap">
              <img src="images/person_4.jpg" alt="Image" class="img-fluid">
            </figure>
            <h3 class="name">Kayla Bryant</h3>
            <blockquote>
              <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
            </blockquote>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container pb-5 mb-5 border-bottom">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="h6 mb-3 text-black">08. Check List</h1>
      </div>
      <div class="col-lg-7">
        <ul class="list-unstyled list-check primary">
          <li>Far far away, behind the word</li>
          <li>Far from the countries Vokalia</li>
          <li>Separated they live in Bookmarksgrove</li>
        </ul>
      </div>
    </div>
  </div>
        
    
    <div class="site-section overlay site-cover-2" style="background-image: url('images/img_v_3-min.jpg')">
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