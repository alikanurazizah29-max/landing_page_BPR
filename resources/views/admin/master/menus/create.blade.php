@extends('layouts/contentNavbarLayout')
@section('title', 'Tambah Menu')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data / <a href="{{ route('admin.master.menus.index') }}">Menu</a> /</span> Tambah</h4>
<div class="row"><div class="col-12">
  <div class="card mb-4">
    <h5 class="card-header">Form Tambah Menu</h5>
    <div class="card-body">
      <form id="ajaxForm" action="{{ route('admin.master.menus.store') }}" method="POST">
        @csrf
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama Menu" required />
          <label for="name">Nama Menu</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="path" name="path" placeholder="Path (contoh: admin/products)" />
          <label for="path">Path / URL</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="mdi mdi-home-outline" />
          <label for="icon">Icon Class (MDI)</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select class="form-select" id="parent_id" name="parent_id">
            <option value="">— Tidak ada (Root) —</option>
            @foreach($parents as $parent)
            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
          </select>
          <label for="parent_id">Parent Menu</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.master.menus.index') }}" class="btn btn-outline-secondary">Batal</a>
      </form>
    </div>
  </div>
</div></div>
@endsection
@section('page-script')
<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true; btn.innerHTML = 'Menyimpan...';
    try {
        const res = await fetch(this.action, { method: 'POST', headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }, body: new FormData(this) });
        const data = await res.json();
        if (res.ok) { sessionStorage.setItem('flash_message', data.message); window.location.href = data.redirect; } else { console.error(data); console.error(data.message || data.error); showAlert('error', 'Gagal menyimpan data.'); }
    } catch(err) { console.error(err); } finally { btn.disabled = false; btn.innerHTML = 'Simpan'; }
});
</script>
@endsection
