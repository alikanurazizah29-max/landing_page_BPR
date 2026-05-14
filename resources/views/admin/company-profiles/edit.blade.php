@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Profil Perusahaan')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.company-profiles.index') }}">Daftar Profil Perusahaan</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Profil Perusahaan</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.company-profiles.update', $companyProfile->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $companyProfile->title }}" placeholder="Judul Profil" required />
            <label for="title">Judul Profil</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                <option value="">Pilih Tipe</option>
                <option value="Visi" {{ $companyProfile->type == 'Visi' ? 'selected' : '' }}>Visi</option><option value="Misi" {{ $companyProfile->type == 'Misi' ? 'selected' : '' }}>Misi</option><option value="Sejarah" {{ $companyProfile->type == 'Sejarah' ? 'selected' : '' }}>Sejarah</option><option value="Lainnya" {{ $companyProfile->type == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <label for="type">Tipe</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Konten..." required>{{ $companyProfile->content }}</textarea>
            <label for="content">Konten</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">File Gambar</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path" />
            @if($companyProfile->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $companyProfile->image_path) }}" width="100" class="rounded">
                    <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengubah file.</small>
                </div>
            @endif
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-outline-secondary">Batal</a>
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
