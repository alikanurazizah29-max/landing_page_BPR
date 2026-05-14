@extends('layouts/contentNavbarLayout')
@section('title', 'Tambah Hak Akses')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data / <a href="{{ route('admin.master.role-permissions.index') }}">Hak Akses</a> /</span> Tambah</h4>
<div class="row"><div class="col-12">
  <div class="card mb-4">
    <h5 class="card-header">Form Tambah Hak Akses</h5>
    <div class="card-body">
      <form id="ajaxForm" action="{{ route('admin.master.role-permissions.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-floating form-floating-outline mb-4">
              <select class="form-select" id="role_id" name="role_id" required>
                <option value="">Pilih Role</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->code }} — {{ $role->name }}</option>
                @endforeach
              </select>
              <label for="role_id">Role</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating form-floating-outline mb-4">
              <select class="form-select" id="menu_id" name="menu_id" required>
                <option value="">Pilih Menu</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
              </select>
              <label for="menu_id">Menu</label>
            </div>
          </div>
        </div>
        <label class="form-label fw-semibold">Hak Akses</label>
        <div class="row mb-4">
          @foreach(['can_read' => 'Baca', 'can_create' => 'Tambah', 'can_update' => 'Ubah', 'can_delete' => 'Hapus', 'can_report' => 'Laporan'] as $key => $label)
          <div class="col-auto">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="{{ $key }}" name="{{ $key }}" value="1" checked />
              <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
            </div>
          </div>
          @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.master.role-permissions.index') }}" class="btn btn-outline-secondary">Batal</a>
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
