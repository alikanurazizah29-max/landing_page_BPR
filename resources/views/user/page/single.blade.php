@extends('user.layout.app')
@section('title', 'BPR | Home')
@section('content')

    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 intro">
                    <h1 class="text-white font-weight-bold" data-aos="fade-up" data-aos-delay="0">{{ $article->title }}
                    </h1>
                    <p class="text-white" data-aos="fade-up" data-aos-delay="100">
                        {{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}</p>
                    <p class="text-white" data-aos="fade-up" data-aos-delay="100">{{ $article->category }}</p>
                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant.svg') }}&quot;);"></div>
    </div>

    <div class="site-section">
        <div class="container article">
            <div class="row justify-content-center align-items-stretch">

                <article class="col-lg-8 order-lg-2 px-lg-5">
                    <p><strong>{{ $article->excerpt }}</strong></p>
                    <p class="text-break" style="white-space: pre-line; text-align: justify;">{{ $article->content }}</p>
                </article>

                <div class="col-md-12 col-lg-1 order-lg-1">
                    <div class="share sticky-top">
                        <h3>Share</h3>
                        <ul class="list-unstyled share-article">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 mb-5 mb-lg-0 order-lg-3">
                    <div class="row">

                        @if ($dataArticle->isNotEmpty())
                            @foreach ($dataArticle as $item)
                                <div class="col-12 mb-4">
                                    <div class="blog_entry shadow-sm rounded overflow-hidden">
                                        <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}">
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt=".."
                                                class="img-fluid w-100">
                                        </a>
                                        <div class="p-4 bg-white">
                                            <h3>
                                                <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}"
                                                    class="text-dark">
                                                    {{ $item->title }}
                                                </a>
                                            </h3>
                                            <span class="date d-block mb-2 text-muted">
                                                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}
                                            </span>
                                            <p
                                                style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-align: justify;">
                                                {{ $item->excerpt }}
                                            </p>
                                            <p class="more mb-0">
                                                <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}">
                                                    Continue reading...
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center text-muted">
                                <p>Tidak ada artikel terkait lainnya.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
