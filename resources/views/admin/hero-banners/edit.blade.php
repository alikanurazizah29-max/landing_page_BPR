@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Hero Banner')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.hero-banners.index') }}">Daftar Hero Banner</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Hero Banner</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.hero-banners.update', $heroBanner->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $heroBanner->title }}" placeholder="Judul" required />
            <label for="title">Judul</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ $heroBanner->subtitle }}" placeholder="Sub Judul"  />
            <label for="subtitle">Sub Judul</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">File Gambar</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path" />
            @if($heroBanner->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $heroBanner->image_path) }}" width="100" class="rounded">
                    <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengubah file.</small>
                </div>
            @endif
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ $heroBanner->button_text }}" placeholder="Teks Tombol"  />
            <label for="button_text">Teks Tombol</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('button_url') is-invalid @enderror" id="button_url" name="button_url" value="{{ $heroBanner->button_url }}" placeholder="URL Tombol"  />
            <label for="button_url">URL Tombol</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ $heroBanner->order }}" placeholder="Urutan" required />
            <label for="order">Urutan</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $heroBanner->is_active ? 'checked' : '' }} />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
