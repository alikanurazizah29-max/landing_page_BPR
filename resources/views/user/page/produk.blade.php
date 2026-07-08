@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

    <div class="bg-white" style="padding-top: 60px; padding-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9">
                    <h1 class="text-dark font-weight-bold m" data-aos="fade-up" data-aos-delay="0" style="margin-top: 10%">
                        {{ $produk->title }}
                    </h1>
                    <p class="text-break" data-aos="fade-up" data-aos-delay="100" style="white-space: pre-line; text-align: justify;">
                        {{ $produk->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white" style="padding-top: 30px; padding-bottom: 60px;">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-12">
                    <div class="row">
                        </div>
                </div>

            </div>
        </div>
    </div>

@endsection