@extends('layouts/contentNavbarLayout')
@section('title', 'Hak Akses — ' . $role->name)

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Master Data / <a href="{{ route('admin.master.role-permissions.index') }}">Hak Akses</a> /</span>
  <i class="mdi mdi-shield-account text-primary me-1"></i> {{ $role->name }}
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">

      {{-- Header Card --}}
      <div class="card-header d-flex align-items-center gap-3">
        <div class="avatar avatar-sm">
          <span class="avatar-initial rounded-circle bg-label-primary">
            <i class="mdi mdi-shield-account mdi-20px"></i>
          </span>
        </div>
        <div>
          <h5 class="mb-0">Roles &amp; Permissions</h5>
          <small class="text-muted">Mengatur hak akses untuk role: <strong>{{ $role->code }} — {{ $role->name }}</strong></small>
        </div>
        <div class="ms-auto d-flex gap-2">
          <button type="button" id="checkAll" class="btn btn-sm btn-outline-success">
            <i class="mdi mdi-check-all me-1"></i> Centang Semua
          </button>
          <button type="button" id="uncheckAll" class="btn btn-sm btn-outline-secondary">
            <i class="mdi mdi-close me-1"></i> Hapus Semua
          </button>
        </div>
      </div>

      {{-- Permission Matrix --}}
      <div class="card-body">
        <form id="permissionForm" action="{{ route('admin.master.role-permissions.save', $role->id) }}" method="POST">
          @csrf

          @if($menus->isEmpty())
            <div class="alert alert-warning">
              Belum ada data Menu. <a href="{{ route('admin.master.menus.create') }}">Tambah menu terlebih dahulu.</a>
            </div>
          @else

          {{-- Group menus: root dan children --}}
          @php
            $rootMenus  = $menus->whereNull('parent_id')->values();
            $childMenus = $menus->whereNotNull('parent_id')->groupBy('parent_id');
            $permLabels = ['can_read' => 'Baca', 'can_create' => 'Tambah', 'can_update' => 'Ubah', 'can_delete' => 'Hapus', 'can_report' => 'Laporan'];
          @endphp

          <div class="table-responsive">
            <table class="table align-middle" style="min-width: 650px;">
              <thead>
                <tr class="border-bottom">
                  <th class="ps-0" style="width: 35%">Menu</th>
                  @foreach($permLabels as $key => $label)
                  <th class="text-center">{{ $label }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($rootMenus as $parent)
                {{-- ── Baris Parent ── --}}
                <tr class="table-light">
                  <td class="ps-0" {{ !$parent->path ? 'colspan=' . (count($permLabels) + 1) : '' }}>
                    <span class="fw-bold text-dark">
                      @if($parent->icon)<i class="{{ $parent->icon }} me-1 text-primary"></i>@endif
                      {{ $parent->name }}
                    </span>
                    @if($parent->path)
                      <br><small class="text-muted ms-4"><code>{{ $parent->path }}</code></small>
                    @endif
                  </td>
                  @if($parent->path)
                    @php $parentPerm = $existingPermissions[$parent->id] ?? null; @endphp
                    @foreach($permLabels as $permKey => $permLabel)
                    <td class="text-center">
                      <div class="perm-checkbox-wrap d-inline-flex align-items-center justify-content-center"
                           style="width: 32px; height: 32px; border-radius: 6px; cursor: pointer; border: 2px solid #e0e0e0; transition: all .2s;"
                           onclick="toggleCheck(this)">
                        <input type="checkbox"
                               name="{{ $permKey }}_{{ $parent->id }}"
                               class="perm-checkbox d-none"
                               {{ ($parentPerm && $parentPerm->$permKey) ? 'checked' : '' }} />
                        <i class="mdi mdi-check fs-5" style="display: {{ ($parentPerm && $parentPerm->$permKey) ? 'block' : 'none' }};"></i>
                      </div>
                    </td>
                    @endforeach
                  @endif
                </tr>

                {{-- ── Baris Child (dengan checkbox) ── --}}
                @foreach($childMenus->get($parent->id, collect()) as $menu)
                @php $perm = $existingPermissions[$menu->id] ?? null; @endphp
                <tr class="border-bottom">
                  <td class="ps-0">
                    <span class="ms-3 text-body">
                      <i class="mdi mdi-subdirectory-arrow-right me-1 text-muted"></i>
                      {{ $menu->name }}
                    </span>
                    @if($menu->path)
                      <br><small class="text-muted ms-4"><code>{{ $menu->path }}</code></small>
                    @endif
                  </td>
                  @foreach($permLabels as $permKey => $permLabel)
                  <td class="text-center">
                    <div class="perm-checkbox-wrap d-inline-flex align-items-center justify-content-center"
                         style="width: 32px; height: 32px; border-radius: 6px; cursor: pointer; border: 2px solid #e0e0e0; transition: all .2s;"
                         onclick="toggleCheck(this)">
                      <input type="checkbox"
                             name="{{ $permKey }}_{{ $menu->id }}"
                             class="perm-checkbox d-none"
                             {{ ($perm && $perm->$permKey) ? 'checked' : '' }} />
                      <i class="mdi mdi-check fs-5" style="display: {{ ($perm && $perm->$permKey) ? 'block' : 'none' }};"></i>
                    </div>
                  </td>
                  @endforeach
                </tr>
                @endforeach

                @endforeach
              </tbody>
            </table>
          </div>

          @endif

          <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary" id="saveBtn">
              <i class="mdi mdi-content-save me-1"></i> Simpan Hak Akses
            </button>
            <a href="{{ route('admin.master.role-permissions.index') }}" class="btn btn-outline-secondary">
              <i class="mdi mdi-arrow-left me-1"></i> Kembali
            </a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection

@section('page-style')
<style>
  .perm-checkbox-wrap {
    background: #f5f5f5;
    color: transparent;
  }
  .perm-checkbox-wrap.checked {
    background: #28c76f;
    border-color: #28c76f !important;
    color: #fff;
  }
  .perm-checkbox-wrap:hover {
    border-color: #28c76f !important;
    opacity: 0.85;
  }
</style>
@endsection

@section('page-script')
<script>
function toggleCheck(el) {
    const checkbox = el.querySelector('.perm-checkbox');
    const icon     = el.querySelector('.mdi-check');
    const isNowChecked = !checkbox.checked;

    checkbox.checked = isNowChecked;
    icon.style.display = isNowChecked ? 'block' : 'none';
    el.classList.toggle('checked', isNowChecked);
}

// Init state on load
document.querySelectorAll('.perm-checkbox-wrap').forEach(el => {
    const cb = el.querySelector('.perm-checkbox');
    if (cb.checked) el.classList.add('checked');
});

document.getElementById('checkAll')?.addEventListener('click', function() {
    document.querySelectorAll('.perm-checkbox-wrap').forEach(el => {
        el.querySelector('.perm-checkbox').checked = true;
        el.querySelector('.mdi-check').style.display = 'block';
        el.classList.add('checked');
    });
});

document.getElementById('uncheckAll')?.addEventListener('click', function() {
    document.querySelectorAll('.perm-checkbox-wrap').forEach(el => {
        el.querySelector('.perm-checkbox').checked = false;
        el.querySelector('.mdi-check').style.display = 'none';
        el.classList.remove('checked');
    });
});

document.getElementById('permissionForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="mdi mdi-loading mdi-spin me-1"></i> Menyimpan...';

    try {
        const res = await fetch(this.action, {
            method: 'POST',
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
            body: new FormData(this)
        });
        const data = await res.json();

        if (res.ok) {
            sessionStorage.setItem('flash_message', data.message || 'Hak akses berhasil disimpan.');
            window.location.href = '{{ route("admin.master.role-permissions.index") }}';
        } else {
            console.error('Error:', data);
            showAlert('error', 'Gagal menyimpan hak akses.');
        }
    } catch (err) {
        console.error('Network Error:', err);
    } finally {
        btn.disabled = false;
        btn.innerHTML = '<i class="mdi mdi-content-save me-1"></i> Simpan Hak Akses';
    }
});
</script>
@endsection
