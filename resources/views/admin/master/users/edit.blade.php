@extends('layouts/contentNavbarLayout')
@section('title', 'Edit Pengguna')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data / <a href="{{ route('admin.master.users.index') }}">Pengguna</a> /</span> Edit</h4>
<div class="row"><div class="col-12">
  <div class="card mb-4">
    <h5 class="card-header">Form Edit Pengguna</h5>
    <div class="card-body">
      <form id="ajaxForm" action="{{ route('admin.master.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating form-floating-outline mb-4">
          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email" required />
          <label for="email">Email</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password baru (kosongkan jika tidak diubah)" />
          <label for="password">Password Baru</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" />
          <label for="password_confirmation">Konfirmasi Password</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select class="form-select" id="role_id" name="role_id">
            <option value="">— Tanpa Role —</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->code }} — {{ $role->name }}</option>
            @endforeach
          </select>
          <label for="role_id">Role</label>
        </div>
        <div class="mb-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }} />
            <label class="form-check-label" for="is_active">Akun Aktif</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
        if (res.ok) { window.location.href = data.redirect; } else { console.error(data); alert(data.message || data.error); }
    } catch(err) { console.error(err); } finally { btn.disabled = false; btn.innerHTML = 'Simpan Perubahan'; }
});
</script>
@endsection
