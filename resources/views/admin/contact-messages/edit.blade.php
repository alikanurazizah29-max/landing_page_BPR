@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Pesan Masuk')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.contact-messages.index') }}">Daftar Pesan Masuk</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit Pesan Masuk</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.contact-messages.update', $contactMessage->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $contactMessage->name }}" placeholder="Nama Pengirim" required />
            <label for="name">Nama Pengirim</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $contactMessage->phone }}" placeholder="Nomor Telepon/WA" required />
            <label for="phone">Nomor Telepon / WhatsApp</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $contactMessage->email }}" placeholder="Email" />
            <label for="email">Email (Opsional)</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('product_interest') is-invalid @enderror" id="product_interest" name="product_interest" value="{{ $contactMessage->product_interest }}" placeholder="Minat Produk"  />
            <label for="product_interest">Minat Produk</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('message') is-invalid @enderror" id="message" name="message" placeholder="Isi Pesan...">{{ $contactMessage->message }}</textarea>
            <label for="message">Isi Pesan</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
              <option value="unread" {{ $contactMessage->status == 'unread' ? 'selected' : '' }}>Belum Dibaca (Unread)</option>
              <option value="read" {{ $contactMessage->status == 'read' ? 'selected' : '' }}>Sudah Dibaca (Read)</option>
              <option value="followed_up" {{ $contactMessage->status == 'followed_up' ? 'selected' : '' }}>Sudah Ditindaklanjuti (Followed Up)</option>
            </select>
            <label for="status">Status Tindak Lanjut</label>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
