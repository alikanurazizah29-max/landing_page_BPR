@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Produk')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.products.index') }}">Daftar Produk</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Produk</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
              <option value="tabungan" {{ $product->type == 'tabungan' ? 'selected' : '' }}>Tabungan</option>
              <option value="deposito" {{ $product->type == 'deposito' ? 'selected' : '' }}>Deposito</option>
              <option value="kredit" {{ $product->type == 'kredit' ? 'selected' : '' }}>Kredit</option>
            </select>
            <label for="type">Tipe Produk</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $product->title }}" placeholder="Nama Produk" required />
            <label for="title">Nama Produk</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $product->slug }}" placeholder="Slug (URL)" />
            <label for="slug">Slug (URL)</label>
            <div class="form-text">Bagian URL halaman layanan detail produk.</div>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ $product->icon }}" placeholder="Contoh: bi-wallet2 atau mdi mdi-bank"  />
            <label for="icon">Icon Class (Bootstrap Icon / MDI)</label>
          </div>

          <div class="mb-4">
            <label for="image" class="form-label">Gambar Produk (Opsional)</label>
            @if($product->image)
              <div class="mb-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="rounded" style="max-height: 80px;">
              </div>
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" />
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi..." required>{{ $product->description }}</textarea>
            <label for="description">Deskripsi</label>
          </div>

          <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }} />
            <label class="form-check-label" for="is_active">Status Aktif</label>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
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
