@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Hero Banner')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.hero-banners.index') }}">Daftar Hero Banner</a> /</span> Tambah
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Tambah Hero Banner</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.hero-banners.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul" required />
            <label for="title">Judul</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" placeholder="Sub Judul"  />
            <label for="subtitle">Sub Judul</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">File Gambar</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path"  />
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" placeholder="Teks Tombol"  />
            <label for="button_text">Teks Tombol</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('button_url') is-invalid @enderror" id="button_url" name="button_url" placeholder="URL Tombol"  />
            <label for="button_url">URL Tombol</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" placeholder="Urutan" required />
            <label for="order">Urutan</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.hero-banners.index') }}" class="btn btn-outline-secondary">Batal</a>
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
