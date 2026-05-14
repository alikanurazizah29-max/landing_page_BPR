@extends('layouts/contentNavbarLayout')

@section('title', 'Tambah Pesan Masuk')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.contact-messages.index') }}">Daftar Pesan Masuk</a> /</span> Tambah
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Tambah Pesan Masuk</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.contact-messages.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Pengirim" required />
            <label for="name">Nama Pengirim</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required />
            <label for="email">Email</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Subjek"  />
            <label for="subject">Subjek</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('message') is-invalid @enderror" id="message" name="message" placeholder="Isi Pesan..." required></textarea>
            <label for="message">Isi Pesan</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Sudah Dibaca</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_read" name="is_read" value="1" checked />
              <label class="form-check-label" for="is_read">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">Batal</a>
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
        btn.innerHTML = 'Simpan';
    }
});
</script>
@endsection
