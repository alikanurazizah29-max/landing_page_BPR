@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Suku Bunga')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.interest-rates.index') }}">Daftar Suku Bunga</a> /</span> Tambah
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Tambah Suku Bunga</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.interest-rates.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('product_type') is-invalid @enderror" id="product_type" name="product_type" required>
                <option value="">Pilih Tipe Produk</option>
                <option value="Tabungan">Tabungan</option><option value="Deposito">Deposito</option><option value="Kredit">Kredit</option>
            </select>
            <label for="product_type">Tipe Produk</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" placeholder="Durasi / Tenor" required />
            <label for="duration">Durasi / Tenor</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate" placeholder="Suku Bunga (%)" required />
            <label for="rate">Suku Bunga (%)</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi..." ></textarea>
            <label for="description">Deskripsi</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.interest-rates.index') }}" class="btn btn-outline-secondary">Batal</a>
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
