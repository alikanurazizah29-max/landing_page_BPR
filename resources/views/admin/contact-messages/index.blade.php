@extends('layouts/contentNavbarLayout')

@section('title', 'Daftar Pesan Masuk')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Manajemen /</span> Daftar Pesan Masuk</h4>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>
      <h5 class="mb-0">Daftar Pesan & Pengaduan Nasabah</h5>
      <small class="text-muted">Pesan yang dikirimkan oleh pengunjung melalui formulir kontak website.</small>
    </div>
    <a href="{{ route('admin.contact-messages.create') }}" class="btn btn-primary"><i class="mdi mdi-plus me-1"></i> Tambah Data</a>
  </div>
  <div class="card-datatable table-responsive p-3">
    <table class="table table-bordered table-hover align-middle" id="dataTable">
      <thead>
        <tr>
          <th style="width: 50px;">No</th>
          <th>Pengirim & Waktu</th>
          <th>Kontak</th>
          <th>Minat Layanan</th>
          <th>Isi Pesan</th>
          <th>Status</th>
          <th style="width: 140px;">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($contact_messages as $contactMessage)
        @php
            $rawPhone = $contactMessage->phone ?? '';
            $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
            if (str_starts_with($cleanPhone, '0')) {
                $cleanPhone = '62' . substr($cleanPhone, 1);
            }
        @endphp
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <span class="fw-bold text-dark d-block">{{ $contactMessage->name }}</span>
            <small class="text-muted">
              <i class="mdi mdi-clock-outline me-1"></i>{{ \Carbon\Carbon::parse($contactMessage->created_at)->isoFormat('D MMM Y, HH:mm') }}
            </small>
          </td>
          <td>
            <div><i class="mdi mdi-phone text-primary me-1"></i>{{ $contactMessage->phone }}</div>
            @if($contactMessage->email)
              <div class="small text-muted"><i class="mdi mdi-email text-secondary me-1"></i>{{ $contactMessage->email }}</div>
            @endif
            @if($cleanPhone)
              <a href="https://api.whatsapp.com/send?phone={{ $cleanPhone }}&text={{ urlencode('Halo Bapak/Ibu ' . $contactMessage->name . ', terima kasih telah menghubungi kami mengenai ' . ($contactMessage->product_interest ?? 'layanan BPR') . '.') }}" 
                 target="_blank" rel="noopener noreferrer" 
                 class="badge bg-success text-white mt-1 d-inline-block text-decoration-none">
                <i class="mdi mdi-whatsapp me-1"></i> Chat WhatsApp
              </a>
            @endif
          </td>
          <td>
            <span class="badge bg-label-info">{{ $contactMessage->product_interest ?? 'Umum / Lainnya' }}</span>
          </td>
          <td>
            <p class="mb-0 text-muted small" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; max-width: 250px;">
              {{ $contactMessage->message ?? '-' }}
            </p>
          </td>
          <td>
            @if($contactMessage->status == 'followed_up')
              <span class="badge bg-label-success">Ditindaklanjuti</span>
            @elseif($contactMessage->status == 'read')
              <span class="badge bg-label-warning">Dibaca</span>
            @else
              <span class="badge bg-label-danger">Belum Dibaca</span>
            @endif
          </td>
          <td>
            <div class="d-flex align-items-center">
              <!-- Tombol Baca Cepat Modal -->
              <button type="button" class="btn btn-sm btn-outline-primary me-2" 
                      data-bs-toggle="modal" data-bs-target="#viewMessageModal{{ $contactMessage->id }}" title="Baca Pesan">
                <i class="mdi mdi-eye-outline me-1"></i> Baca
              </button>

              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('admin.contact-messages.edit', $contactMessage->id) }}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <button type="button" class="dropdown-item btn-delete" data-url="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}">
                    <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                  </button>
                </div>
              </div>
            </div>

            <!-- Modal Baca Pesan Lengkap -->
            <div class="modal fade" id="viewMessageModal{{ $contactMessage->id }}" tabindex="-1" aria-labelledby="modalTitle{{ $contactMessage->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle{{ $contactMessage->id }}">
                      <i class="mdi mdi-email-open-outline me-2 text-primary"></i> Detail Pesan Masuk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-2 mb-3">
                      <div class="col-6">
                        <small class="text-muted d-block">Nama Pengirim</small>
                        <strong class="text-dark">{{ $contactMessage->name }}</strong>
                      </div>
                      <div class="col-6">
                        <small class="text-muted d-block">Waktu Pengiriman</small>
                        <span class="text-dark">{{ \Carbon\Carbon::parse($contactMessage->created_at)->isoFormat('dddd, D MMMM Y - HH:mm') }} WITA</span>
                      </div>
                      <div class="col-6">
                        <small class="text-muted d-block">Nomor Telepon / WA</small>
                        <span class="text-dark">{{ $contactMessage->phone }}</span>
                      </div>
                      <div class="col-6">
                        <small class="text-muted d-block">Alamat Email</small>
                        <span class="text-dark">{{ $contactMessage->email ?? '-' }}</span>
                      </div>
                      <div class="col-12">
                        <small class="text-muted d-block">Minat Layanan / Produk</small>
                        <span class="badge bg-label-info">{{ $contactMessage->product_interest ?? 'Umum' }}</span>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold text-dark">Isi Pesan / Pengaduan:</label>
                      <div class="p-3 bg-light rounded border text-secondary" style="white-space: pre-line; line-height: 1.7; font-size: 0.95rem;">
                        {{ $contactMessage->message ?? 'Tidak ada pesan tertulis.' }}
                      </div>
                    </div>

                    <!-- Ubah Status Cepat -->
                    <div class="mb-2">
                      <label class="form-label fw-bold text-dark">Ubah Status Tindak Lanjut:</label>
                      <select class="form-select form-select-sm status-select" data-id="{{ $contactMessage->id }}">
                        <option value="unread" {{ $contactMessage->status == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                        <option value="read" {{ $contactMessage->status == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                        <option value="followed_up" {{ $contactMessage->status == 'followed_up' ? 'selected' : '' }}>Sudah Ditindaklanjuti</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-between">
                    <div>
                      @if($cleanPhone)
                        <a href="https://api.whatsapp.com/send?phone={{ $cleanPhone }}&text={{ urlencode('Halo ' . $contactMessage->name . ', menindaklanjuti pesan Anda...') }}" 
                           target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">
                          <i class="mdi mdi-whatsapp me-1"></i> Balas WhatsApp
                        </a>
                      @endif
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
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
        { "orderable": false, "targets": [0, 4, 6] }
      ]
    });

    // Handle Ubah Status Cepat via AJAX
    $('.status-select').on('change', async function() {
        const id = $(this).data('id');
        const status = $(this).val();
        const url = `/admin/contact-messages/${id}/status`;

        try {
            const response = await fetch(url, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: status })
            });

            const data = await response.json();
            if (response.ok && data.success) {
                sessionStorage.setItem('flash_message', 'Status pesan berhasil diperbarui.');
                window.location.reload();
            } else {
                alert(data.error || 'Gagal mengubah status pesan.');
            }
        } catch (e) {
            console.error('Error status update:', e);
            alert('Terjadi kesalahan sistem saat memperbarui status.');
        }
    });

    $('.btn-delete').on('click', async function() {
        if (await window.confirmDelete()) {
            const url = $(this).data('url');
            try {
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
                if(response.ok) { sessionStorage.setItem('flash_message', 'Berhasil menghapus data.'); window.location.reload(); } else {
                    console.error('Delete failed:', await response.text()); showAlert('error', 'Gagal menghapus data.');
                }
            } catch(e) {
                console.error('Error:', e); showAlert('error', 'Terjadi kesalahan sistem.');
            }
        }
    });
  });
</script>
@endsection
