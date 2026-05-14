@extends('layouts/contentNavbarLayout')

@section('title', 'Daftar Berita & Artikel')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Manajemen /</span> Daftar Berita & Artikel</h4>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar Berita & Artikel</h5>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary"><i class="mdi mdi-plus me-1"></i> Tambah Data</a>
  </div>
  <div class="card-datatable table-responsive p-3">
    <table class="table table-bordered table-hover" id="dataTable">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th>Judul Artikel</th>
          <th>Slug (URL)</th>
          <th style="width: 100px;">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($articles as $article)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><span class="fw-medium">{{ $article->title }}</span></td>
          <td><span class="fw-medium">{{ $article->slug }}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.articles.edit', $article->id) }}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                <button type="button" class="dropdown-item btn-delete" data-url="{{ route('admin.articles.destroy', $article->id) }}">
                  <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                </button>
              </div>
            </div>
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
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
      },
      "order": [],
      "columnDefs": [
        { "orderable": false, "targets": [0, 3] }
      ]
    });

    $('.btn-delete').on('click', async function() {
        if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            const url = $(this).data('url');
            try {
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                if(response.ok) {
                    window.location.reload();
                } else {
                    console.error('Delete failed:', await response.text());
                }
            } catch(e) {
                console.error('Error:', e);
            }
        }
    });
  });
</script>
@endsection
