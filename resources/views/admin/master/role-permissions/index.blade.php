@extends('layouts/contentNavbarLayout')
@section('title', 'Hak Akses')
@section('vendor-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Hak Akses</h4>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar Role & Hak Akses</h5>
    <a href="{{ route('admin.master.roles.create') }}" class="btn btn-outline-primary btn-sm">
      <i class="mdi mdi-plus me-1"></i> Tambah Role Baru
    </a>
  </div>
  <div class="card-datatable table-responsive p-3">
    <table class="table table-bordered table-hover" id="dataTable">
      <thead>
        <tr>
          <th style="width:50px">No</th>
          <th>Kode</th>
          <th>Nama Role</th>
          <th class="text-center">Jumlah Menu</th>
          <th class="text-center" style="width:100px">Hak Akses</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><span class="badge bg-label-primary fs-6">{{ $role->code }}</span></td>
          <td class="fw-medium">{{ $role->name }}</td>
          <td class="text-center">
            <span class="badge bg-label-info">{{ $role->permissions_count }} Menu</span>
          </td>
          <td class="text-center">
            <a href="{{ route('admin.master.role-permissions.manage', $role->id) }}"
               class="btn btn-icon btn-primary btn-sm"
               title="Atur Hak Akses untuk {{ $role->name }}">
              <i class="mdi mdi-shield-account"></i>
            </a>
            <button type="button"
                    class="btn btn-icon btn-danger btn-sm btn-reset ms-1"
                    data-url="{{ route('admin.master.role-permissions.destroy', $role->id) }}"
                    title="Reset semua hak akses {{ $role->name }}">
              <i class="mdi mdi-shield-remove-outline"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('vendor-script')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@endsection

@section('page-script')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 4] }]
    });

    $('.btn-reset').on('click', async function() {
        if (!confirm('Reset SEMUA hak akses untuk role ini? Tindakan ini tidak dapat dibatalkan.')) return;
        const res = await fetch($(this).data('url'), {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
        });
        res.ok ? location.reload() : console.error(await res.text());
    });
});
</script>
@endsection
