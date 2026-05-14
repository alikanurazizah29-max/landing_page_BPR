@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Jaringan Kantor')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.branches.index') }}">Daftar Jaringan Kantor</a> /</span> Tambah
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Tambah Jaringan Kantor</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.branches.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Cabang" required />
            <label for="name">Nama Cabang</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                <option value="">Pilih Tipe Kantor</option>
                <option value="Pusat">Kantor Pusat</option><option value="Cabang">Kantor Cabang</option><option value="Kas">Kantor Kas</option>
            </select>
            <label for="type">Tipe Kantor</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('address') is-invalid @enderror" id="address" name="address" placeholder="Alamat Lengkap..." required></textarea>
            <label for="address">Alamat Lengkap</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Nomor Telepon"  />
            <label for="phone">Nomor Telepon</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" placeholder="Nomor WhatsApp"  />
            <label for="whatsapp">Nomor WhatsApp</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('maps_url') is-invalid @enderror" id="maps_url" name="maps_url" placeholder="URL Google Maps"  />
            <label for="maps_url">URL Google Maps</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.branches.index') }}" class="btn btn-outline-secondary">Batal</a>
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
