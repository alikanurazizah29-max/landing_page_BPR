@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Testimoni')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.testimonials.index') }}">Daftar Testimoni</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Testimoni</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ $testimonial->customer_name }}" placeholder="Nama Nasabah" required />
            <label for="customer_name">Nama Nasabah</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Isi Testimoni..." required>{{ $testimonial->content }}</textarea>
            <label for="content">Isi Testimoni</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                <option value="">Pilih Rating (Bintang)</option>
                <option value="5" {{ $testimonial->rating == '5' ? 'selected' : '' }}>5 Bintang</option><option value="4" {{ $testimonial->rating == '4' ? 'selected' : '' }}>4 Bintang</option><option value="3" {{ $testimonial->rating == '3' ? 'selected' : '' }}>3 Bintang</option><option value="2" {{ $testimonial->rating == '2' ? 'selected' : '' }}>2 Bintang</option><option value="1" {{ $testimonial->rating == '1' ? 'selected' : '' }}>1 Bintang</option>
            </select>
            <label for="rating">Rating (Bintang)</label>
          </div>

          <div class="mb-4">
            <label for="image_path" class="form-label">Foto Nasabah</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path" />
            @if($testimonial->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $testimonial->image_path) }}" width="100" class="rounded">
                    <small class="text-muted d-block">Biarkan kosong jika tidak ingin mengubah file.</small>
                </div>
            @endif
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Batal</a>
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
            sessionStorage.setItem('flash_message', data.message || 'Data berhasil disimpan.');
            window.location.href = data.redirect;
        } else {
            console.error('Validation/Server Error:', data);
            showAlert('error', 'Gagal menyimpan data.');
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
