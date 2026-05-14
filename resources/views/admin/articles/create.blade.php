@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Berita & Artikel')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.articles.index') }}">Daftar Berita & Artikel</a> /</span> Tambah
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Tambah Berita & Artikel</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Artikel" required />
            <label for="title">Judul Artikel</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug (URL)" required />
            <label for="slug">Slug (URL)</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" >
                <option value="">Pilih Kategori</option>
                <option value="Berita">Berita</option><option value="Pengumuman">Pengumuman</option><option value="Edukasi">Edukasi</option>
            </select>
            <label for="category">Kategori</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" placeholder="Ringkasan..." ></textarea>
            <label for="excerpt">Ringkasan</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Konten Utama..." required></textarea>
            <label for="content">Konten Utama</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">File Gambar</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path"  />
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Dipublikasikan</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" checked />
              <label class="form-check-label" for="is_published">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan</button>
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
        btn.innerHTML = 'Simpan';
    }
});
</script>
@endsection
