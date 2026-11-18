@extends('user.layout.app')
@section('title', $article->title . ' | ' . ($companyProfile->company_name ?? 'BPR'))
@section('content')

    <div class="site-section" style="padding-top: 120px !important;">
        <div class="container article">
            <div class="row justify-content-between">

                <!-- Konten Utama Artikel -->
                <article class="col-lg-8 mb-5">
                    @if ($article->image_path)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                                class="img-fluid rounded w-100" style="aspect-ratio: 16/9; object-fit: cover;">
                        </div>
                    @endif

                    @if ($article->excerpt)
                        <p class="lead font-weight-normal text-muted mb-4">
                            {{ $article->excerpt }}
                        </p>
                    @endif

                    <div class="text-break mb-5" style="white-space: pre-line; line-height: 1.85; text-align: justify; color: #333;">
                        {{ $article->content }}
                    </div>

                    <!-- Tombol Aksi Bawah: Sederhana & Bersih -->
                    <div class="pt-4 border-top d-flex justify-content-between align-items-center flex-wrap">
                        <button type="button" class="btn btn-outline-secondary btn-sm mb-2" id="btnCopyArticle" onclick="copyArticleLink(this)">
                            <i class="feather-copy mr-1"></i> Salin Tautan
                        </button>
                        <a href="{{ route('user.article.articles') }}" class="btn btn-link btn-sm text-muted mb-2 p-0">
                            &larr; Kembali ke Artikel
                        </a>
                    </div>
                </article>

                <!-- Sidebar Artikel Terkait Sederhana -->
                <div class="col-lg-4 mb-5 mb-lg-0 pl-lg-5">
                    <h4 class="h5 font-weight-bold mb-4">Artikel Terkait</h4>

                    @if ($relatedArticles->isNotEmpty())
                        @foreach ($relatedArticles as $item)
                            <div class="mb-4 pb-3 border-bottom">
                                @if ($item->image_path)
                                    <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}">
                                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                            class="img-fluid rounded w-100 mb-2" style="aspect-ratio: 16/9; object-fit: cover;">
                                    </a>
                                @endif
                                <span class="d-block text-muted small mb-1">
                                    {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}
                                </span>
                                <h6 class="font-weight-bold mb-0">
                                    <a href="{{ route('user.article.detail', ['slug' => $item->slug]) }}" class="text-dark">
                                        {{ $item->title }}
                                    </a>
                                </h6>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted small">Tidak ada artikel terkait lainnya.</p>
                    @endif
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