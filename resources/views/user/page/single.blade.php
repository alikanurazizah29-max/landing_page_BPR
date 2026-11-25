@extends('user.layout.app')
@section('title', $article->title . ' | ' . ($companyProfile->company_name ?? 'BPR'))
@section('content')

    <!-- Konten Halaman Baca Artikel dengan Spacing Atas Luas & Bersih -->
    <div class="site-section bg-white" style="padding-top: 140px; padding-bottom: 80px;">
        <div class="container article">
            <div class="row justify-content-between">

                <!-- Konten Utama Artikel -->
                <article class="col-lg-8 mb-5 mb-lg-0">
                    <!-- Navigasi Breadcrumbs -->
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb bg-transparent p-0 mb-0 small">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted"><i class="feather-home mr-1"></i>Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.article.articles') }}" class="text-muted">Berita &amp; Edukasi</a></li>
                            <li class="breadcrumb-item active text-primary font-weight-bold" aria-current="page">{{ Str::limit($article->title, 40) }}</li>
                        </ol>
                    </nav>

                    <!-- Meta Kategori & Tanggal Rilis -->
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge badge-primary px-3 py-1 text-uppercase font-weight-bold mr-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            {{ $article->category ?? 'Berita' }}
                        </span>
                        <span class="text-muted small">
                            <i class="feather-calendar mr-1"></i>
                            {{ \Carbon\Carbon::parse($article->created_at)->isoFormat('D MMMM Y') }}
                        </span>
                    </div>

                    <!-- Judul Utama Artikel -->
                    <h1 class="font-weight-bold text-dark mb-4" style="font-size: 2.2rem; line-height: 1.3;">
                        {{ $article->title }}
                    </h1>

                    @if ($article->image_path)
                        <div class="mb-4 rounded overflow-hidden shadow-sm" style="max-height: 480px;">
                            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                class="img-fluid w-100" style="object-fit: cover;">
                        </div>
                    @endif

                    @if ($article->excerpt)
                        <p class="lead font-weight-normal text-muted mb-4" style="line-height: 1.7; font-size: 1.1rem;">
                            {{ $article->excerpt }}
                        </p>
                    @endif

                    <div class="text-break mb-5" style="white-space: pre-line; line-height: 1.9; font-size: 1.05rem; text-align: justify; color: #2d3748;">
                        {{ $article->content }}
                    </div>

                    <!-- Tombol Aksi Bawah: Sederhana & Bersih -->
                    <div class="pt-4 border-top d-flex justify-content-between align-items-center flex-wrap">
                        <button type="button" class="btn btn-outline-secondary btn-sm mb-2 font-weight-bold" id="btnCopyArticle" onclick="copyArticleLink(this)">
                            <i class="feather-copy mr-1"></i> Salin Tautan
                        </button>
                        <a href="{{ route('user.article.articles') }}" class="btn btn-link btn-sm text-muted mb-2 p-0 font-weight-bold">
                            &larr; Kembali ke Berita &amp; Edukasi
                        </a>
                    </div>
                </article>

                <!-- Sidebar Artikel Terkait (Clean Card Layout) -->
                <div class="col-lg-4 pl-lg-5">
                    <div class="card border-0 shadow-sm p-4 bg-light rounded sticky-top" style="top: 110px;">
                        <h5 class="font-weight-bold text-dark mb-3 pb-2 border-bottom">
                            <i class="feather-bookmark mr-2 text-primary"></i> Artikel Terkait
                        </h5>

                        @if ($relatedArticles->isNotEmpty())
                            @foreach ($relatedArticles as $item)
                                <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    @if ($item->image_path)
                                        <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}">
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                                class="img-fluid rounded w-100 mb-2 shadow-xs" style="aspect-ratio: 16/9; object-fit: cover;">
                                        </a>
                                    @endif
                                    <span class="d-block text-muted small mb-1">
                                        <i class="feather-calendar mr-1"></i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}
                                    </span>
                                    <h6 class="font-weight-bold mb-0" style="line-height: 1.4;">
                                        <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}" class="text-dark">
                                            {{ $item->title }}
                                        </a>
                                    </h6>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted small mb-0 py-2">
                                <i class="feather-info mr-1 text-primary"></i> Belum ada artikel terkait lainnya saat ini.
                            </p>
                        @endif

                        <div class="mt-3 pt-3 border-top text-center">
                            <a href="{{ route('user.article.articles') }}" class="btn btn-outline-primary btn-sm btn-block font-weight-bold">
                                Lihat Semua Berita &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function copyArticleLink(btn) {
        var dummy = document.createElement('textarea');
        dummy.value = window.location.href;
        document.body.appendChild(dummy);
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);

        var originalHtml = btn.innerHTML;
        btn.innerHTML = '<i class="feather-check mr-1 text-success"></i> Tautan Tersalin!';
        setTimeout(function() {
            btn.innerHTML = originalHtml;
        }, 2000);
    }
</script>
@endsection