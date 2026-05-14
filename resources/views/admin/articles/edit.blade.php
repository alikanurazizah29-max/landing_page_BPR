@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Berita & Artikel')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.articles.index') }}">Daftar Berita & Artikel</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Berita & Artikel</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $article->title }}" placeholder="Judul Artikel" required />
            <label for="title">Judul Artikel</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $article->slug }}" placeholder="Slug (URL)" required />
            <label for="slug">Slug (URL)</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" >
                <option value="">Pilih Kategori</option>
                <option value="Berita" {{ $article->category == 'Berita' ? 'selected' : '' }}>Berita</option><option value="Pengumuman" {{ $article->category == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option><option value="Edukasi" {{ $article->category == 'Edukasi' ? 'selected' : '' }}>Edukasi</option>
            </select>
            <label for="category">Kategori</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" placeholder="Ringkasan..." >{{ $article->excerpt }}</textarea>
            <label for="excerpt">Ringkasan</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Konten Utama..." required>{{ $article->content }}</textarea>
            <label for="content">Konten Utama</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">File Gambar</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path" />
            @if($article->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $article->image_path) }}" width="100" class="rounded">
                    <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengubah file.</small>
                </div>
            @endif
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Dipublikasikan</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ $article->is_published ? 'checked' : '' }} />
              <label class="form-check-label" for="is_published">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerHTML = 'Menyimpan...';
    
    try {
        const formData = new FormData(this);
        // PHP/Laravel has a quirk where PUT requests can't parse FormData files properly.
        // The standard workaround is to send a POST request and spoof the PUT method.
        // We already have @method('PUT') in the form which adds _method=PUT to formData.
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        const data = await response.json();
        
        if (response.ok) {
            window.location.href = data.redirect;
        } else {
            console.error('Validation/Server Error:', data);
            alert('Gagal: ' + (data.message || data.error || 'Terjadi kesalahan'));
        }
    } catch(err) {
        console.error('Network Error:', err);
    } finally {
        btn.disabled = false;
        btn.innerHTML = 'Simpan Perubahan';
    }
});
</script>
@endsection
