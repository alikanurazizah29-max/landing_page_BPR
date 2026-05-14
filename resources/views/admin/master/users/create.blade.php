@extends('layouts/contentNavbarLayout')
@section('title', 'Tambah Pengguna')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data / <a href="{{ route('admin.master.users.index') }}">Pengguna</a> /</span> Tambah</h4>
<div class="row"><div class="col-12">
  <div class="card mb-4">
    <h5 class="card-header">Form Tambah Pengguna</h5>
    <div class="card-body">
      <form id="ajaxForm" action="{{ route('admin.master.users.store') }}" method="POST">
        @csrf
        <div class="form-floating form-floating-outline mb-4">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
          <label for="email">Email</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
          <label for="password">Password</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required />
          <label for="password_confirmation">Konfirmasi Password</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select class="form-select" id="role_id" name="role_id">
            <option value="">— Tanpa Role —</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->code }} — {{ $role->name }}</option>
            @endforeach
          </select>
          <label for="role_id">Role</label>
        </div>
        <div class="mb-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked />
            <label class="form-check-label" for="is_active">Akun Aktif</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.master.users.index') }}" class="btn btn-outline-secondary">Batal</a>
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
        if (res.ok) { sessionStorage.setItem('flash_message', data.message); sessionStorage.setItem('flash_message', data.message || 'Data berhasil disimpan.'); window.location.href = data.redirect; } else { console.error(data); console.error(data.message || data.error); showAlert('error', 'Gagal menyimpan data.'); }
    } catch(err) { console.error(err); } finally { btn.disabled = false; btn.innerHTML = 'Simpan'; }
});
</script>
@endsection
