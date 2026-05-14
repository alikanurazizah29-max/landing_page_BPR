@extends('layouts/contentNavbarLayout')

@section('title', 'Edit FAQ')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen / <a href="{{ route('admin.faqs.index') }}">Daftar FAQ</a> /</span> Edit
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">Form Edit FAQ</h5>
      <div class="card-body">
        <form id="ajaxForm" action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ $faq->question }}" placeholder="Pertanyaan" required />
            <label for="question">Pertanyaan</label>
          </div>

          <div class="form-floating form-floating-outline mb-4">
            <textarea class="form-control h-px-100 @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Jawaban..." required>{{ $faq->answer }}</textarea>
            <label for="answer">Jawaban</label>
          </div>

          <div class="mb-4">
            <label class="form-label d-block">Status Aktif</label>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }} />
              <label class="form-check-label" for="is_active">Aktif / Ya</label>
            </div>
          </div>

          
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary">Batal</a>
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
