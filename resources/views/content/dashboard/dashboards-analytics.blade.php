@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard BPR')

@section('content')
<div class="row gy-4">

  <!-- 1. Welcome Card Banner (Sneat Style with Real BPR Data) -->
  <div class="col-12">
    <div class="card position-relative overflow-hidden">
      <div class="card-body p-4 p-md-5">
        <div class="row align-items-center">
          <div class="col-md-8 col-lg-8 position-relative" style="z-index: 2;">
            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
              <span class="badge bg-label-primary text-uppercase fw-semibold" style="letter-spacing: 0.5px;">
                {{ $companyProfile->company_name ?? 'Bank Perekonomian Rakyat' }}
              </span>
              @if($unreadMessagesCount > 0)
                <span class="badge bg-label-danger rounded-pill">
                  <i class="mdi mdi-bell-ring-outline me-1"></i> {{ $unreadMessagesCount }} Pesan Baru
                </span>
              @endif
            </div>

            <h3 class="card-title text-primary fw-bold mb-2">
              Selamat Datang, {{ Auth::user()->name }}! 👋
            </h3>

            <p class="text-muted mb-3" style="max-width: 650px; font-size: 0.95rem; line-height: 1.6;">
              {{ $companyProfile->headline ?? 'Sistem Manajemen & Publikasi Informasi Resmi BPR.' }}
              Kelola produk perbankan, suku bunga, publikasi berita/edukasi, serta pantau dan tindaklanjuti pesan nasabah secara terintegrasi.
            </p>

            <!-- Status Kepatuhan Resmi (OJK & LPS) -->
            <div class="d-flex flex-wrap gap-2 mb-4">
              <span class="badge bg-label-info rounded-pill">
                <i class="mdi mdi-shield-check-outline me-1"></i> {{ $companyProfile->ojk_text ?? 'Berizin & Diawasi oleh OJK' }}
              </span>
              <span class="badge bg-label-success rounded-pill">
                <i class="mdi mdi-check-decagram-outline me-1"></i> {{ $companyProfile->lps_text ?? 'Peserta Penjaminan LPS' }}
              </span>
            </div>

            <div class="d-flex flex-wrap gap-2">
              <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
                <i class="mdi mdi-open-in-new me-1"></i> Kunjungi Website Utama
              </a>
              <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="mdi mdi-email-outline me-1"></i> Buka Kotak Pesan
                @if($unreadMessagesCount > 0)
                  <span class="badge bg-danger ms-1 text-white">{{ $unreadMessagesCount }}</span>
                @endif
              </a>
            </div>
          </div>

          <!-- Kolom Ilustrasi Kanan (Bebas dari tumpukan teks) -->
          <div class="col-md-4 col-lg-4 text-center text-md-end mt-4 mt-md-0 position-relative" style="z-index: 2;">
            <img src="{{asset('assets/img/illustrations/trophy.png')}}" class="scaleX-n1-rtl img-fluid" style="max-height: 140px;" alt="trophy">
          </div>
        </div>
      </div>
      <!-- Sneat Decorative Background Elements -->
      <img src="{{asset('assets/img/icons/misc/triangle-light.png')}}" class="scaleX-n1-rtl position-absolute bottom-0 end-0 opacity-25" width="220" alt="triangle background">
    </div>
  </div>
  <!--/ Welcome Card Banner -->

  <!-- 2. Ringkasan Metrik Cepat (4 Stat Cards Asli Sneat) -->
  <!-- Card 1: Pesan Masuk / Pengaduan -->
  <div class="col-sm-6 col-lg-3">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-{{ $unreadMessagesCount > 0 ? 'danger' : 'primary' }} rounded shadow-xs">
              <i class="mdi mdi-email-outline mdi-24px"></i>
            </div>
          </div>
          <span class="badge bg-label-{{ $unreadMessagesCount > 0 ? 'danger' : 'success' }} rounded-pill">
            {{ $unreadMessagesCount > 0 ? $unreadMessagesCount . ' Belum Dibaca' : 'Semua Terbaca' }}
          </span>
        </div>
        <div class="small mb-1 text-muted">Pesan & Pengaduan</div>
        <h4 class="mb-1 fw-bold">{{ $totalMessagesCount }}</h4>
        <a href="{{ route('admin.contact-messages.index') }}" class="small text-primary fw-medium d-inline-flex align-items-center">
          Buka Pesan Masuk <i class="mdi mdi-chevron-right ms-1"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Card 2: Produk & Layanan -->
  <div class="col-sm-6 col-lg-3">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-success rounded shadow-xs">
              <i class="mdi mdi-cash-multiple mdi-24px"></i>
            </div>
          </div>
          <span class="badge bg-label-success rounded-pill">Aktif</span>
        </div>
        <div class="small mb-1 text-muted">Produk & Layanan</div>
        <h4 class="mb-1 fw-bold">{{ $activeProductsCount }}</h4>
        <a href="{{ route('admin.products.index') }}" class="small text-primary fw-medium d-inline-flex align-items-center">
          Kelola Produk <i class="mdi mdi-chevron-right ms-1"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Card 3: Berita & Artikel -->
  <div class="col-sm-6 col-lg-3">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-info rounded shadow-xs">
              <i class="mdi mdi-newspaper-variant-outline mdi-24px"></i>
            </div>
          </div>
          <span class="badge bg-label-info rounded-pill">Terbit</span>
        </div>
        <div class="small mb-1 text-muted">Berita & Edukasi</div>
        <h4 class="mb-1 fw-bold">{{ $activeArticlesCount }}</h4>
        <a href="{{ route('admin.articles.index') }}" class="small text-primary fw-medium d-inline-flex align-items-center">
          Kelola Artikel <i class="mdi mdi-chevron-right ms-1"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Card 4: Jaringan Kantor -->
  <div class="col-sm-6 col-lg-3">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded shadow-xs">
              <i class="mdi mdi-office-building-marker-outline mdi-24px"></i>
            </div>
          </div>
          <span class="badge bg-label-warning rounded-pill">Jaringan</span>
        </div>
        <div class="small mb-1 text-muted">Jaringan Kantor Cabang</div>
        <h4 class="mb-1 fw-bold">{{ $activeBranchesCount }}</h4>
        <a href="{{ route('admin.branches.index') }}" class="small text-primary fw-medium d-inline-flex align-items-center">
          Kelola Kantor <i class="mdi mdi-chevron-right ms-1"></i>
        </a>
      </div>
    </div>
  </div>
  <!--/ Ringkasan Metrik Cepat -->

  <!-- 3. Bagian Tengah (Tabel Pesan Masuk & Profil BPR) -->
  <!-- Kolom Kiri: Tabel Pesan Masuk Terbaru -->
  <div class="col-lg-8">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div>
          <h5 class="card-title m-0 me-2">Pesan & Pengaduan Terbaru</h5>
          <small class="text-muted">Pesan masuk dari calon nasabah melalui formulir kontak website</small>
        </div>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-outline-primary">
          Lihat Semua Pesan
        </a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Pengirim</th>
              <th>Minat Layanan</th>
              <th>Status</th>
              <th>Waktu</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse($recentMessages as $msg)
              @php
                $cleanPhone = preg_replace('/[^0-9]/', '', $msg->phone);
                if (str_starts_with($cleanPhone, '0')) {
                    $cleanPhone = '62' . substr($cleanPhone, 1);
                }
              @endphp
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm me-3">
                      <span class="avatar-initial rounded-circle bg-label-primary fw-bold">
                        {{ strtoupper(substr($msg->name, 0, 2)) }}
                      </span>
                    </div>
                    <div>
                      <h6 class="mb-0 text-truncate">{{ $msg->name }}</h6>
                      <small class="text-muted">{{ $msg->phone }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-label-info">{{ $msg->product_interest ?? 'Umum' }}</span>
                </td>
                <td>
                  @if($msg->status === 'followed_up')
                    <span class="badge bg-label-success rounded-pill">Ditindaklanjuti</span>
                  @elseif($msg->status === 'read')
                    <span class="badge bg-label-warning rounded-pill">Dibaca</span>
                  @else
                    <span class="badge bg-label-danger rounded-pill">Belum Dibaca</span>
                  @endif
                </td>
                <td>
                  <small class="text-muted">{{ $msg->created_at ? $msg->created_at->diffForHumans() : '-' }}</small>
                </td>
                <td class="text-center">
                  <div class="d-inline-flex gap-1">
                    @if($cleanPhone)
                      <a href="https://api.whatsapp.com/send?phone={{ $cleanPhone }}" target="_blank" class="btn btn-sm btn-icon btn-outline-success" title="Hubungi via WhatsApp">
                        <i class="mdi mdi-whatsapp"></i>
                      </a>
                    @endif
                    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-icon btn-outline-primary" title="Buka Detail">
                      <i class="mdi mdi-eye-outline"></i>
                    </a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-5 text-muted">
                  <div class="my-2">
                    <i class="mdi mdi-email-check-outline text-muted" style="font-size: 3rem;"></i>
                    <p class="mt-2 mb-1 fw-medium">Belum ada pesan masuk dari pengunjung website</p>
                    <small class="text-muted">Pesan dari formulir kontak website nasabah akan otomatis tampil di sini.</small>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Kolom Kiri: Tabel Pesan Masuk Terbaru -->

  <!-- Kolom Kanan: Identitas & Informasi Resmi BPR -->
  <div class="col-lg-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0">Profil Lembaga BPR</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="profileOpt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileOpt">
            <a class="dropdown-item" href="{{ route('admin.company-profiles.index') }}">Edit Profil Perusahaan</a>
            <a class="dropdown-item" href="{{ route('home') }}" target="_blank">Buka Website Utama</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <div class="avatar avatar-md me-3">
            <div class="avatar-initial bg-label-primary rounded shadow-xs">
              <i class="mdi mdi-bank mdi-24px"></i>
            </div>
          </div>
          <div>
            <h6 class="mb-0 fw-bold">{{ $companyProfile->company_name ?? 'Bank Perekonomian Rakyat' }}</h6>
            <small class="text-muted">{{ $companyProfile->phone ?? 'Telepon belum diatur' }}</small>
          </div>
        </div>

        <ul class="list-unstyled mb-3">
          <li class="d-flex mb-2 pb-1 align-items-start">
            <i class="mdi mdi-map-marker-outline text-primary me-2 mt-1"></i>
            <small class="text-muted">{{ $companyProfile->address ?? 'Alamat kantor pusat belum diatur.' }}</small>
          </li>
          <li class="d-flex mb-2 pb-1 align-items-center">
            <i class="mdi mdi-email-outline text-primary me-2"></i>
            <small class="text-muted">{{ $companyProfile->email ?? 'Email resmi belum diatur' }}</small>
          </li>
          <li class="d-flex mb-2 pb-1 align-items-center">
            <i class="mdi mdi-whatsapp text-success me-2"></i>
            <small class="text-muted">{{ $companyProfile->whatsapp ?? 'WhatsApp belum diatur' }}</small>
          </li>
        </ul>

        <div class="border-top pt-3">
          <div class="small fw-semibold text-uppercase text-muted mb-3" style="font-size: 0.72rem; letter-spacing: 0.5px;">Ringkasan Konten Aktif</div>
          
          <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
            <div class="d-flex align-items-center">
              <i class="mdi mdi-image-multiple-outline me-2 text-primary"></i>
              <span class="small">Banner Promo Aktif</span>
            </div>
            <span class="badge bg-label-primary rounded-pill">{{ $activeHeroBanners }} Banner</span>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
            <div class="d-flex align-items-center">
              <i class="mdi mdi-comment-quote-outline me-2 text-success"></i>
              <span class="small">Testimoni Nasabah</span>
            </div>
            <span class="badge bg-label-success rounded-pill">{{ $activeTestimonials }} Ulasan</span>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
            <div class="d-flex align-items-center">
              <i class="mdi mdi-help-circle-outline me-2 text-warning"></i>
              <span class="small">Pertanyaan FAQ</span>
            </div>
            <span class="badge bg-label-warning rounded-pill">{{ $activeFaqs }} Tanya Jawab</span>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
              <i class="mdi mdi-percent-outline me-2 text-info"></i>
              <span class="small">Suku Bunga Aktif</span>
            </div>
            <span class="badge bg-label-info rounded-pill">{{ $activeRatesCount }} Durasi</span>
          </div>

          <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-outline-primary btn-sm w-100">
            <i class="mdi mdi-pencil-outline me-1"></i> Edit Profil Perusahaan
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--/ Kolom Kanan: Identitas & Informasi Resmi BPR -->

  <!-- 4. Publikasi Berita & Artikel Terbaru (Recent Articles) -->
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div>
          <h5 class="card-title m-0 me-2">Publikasi Berita & Artikel Terbaru</h5>
          <small class="text-muted">Artikel edukasi keuangan dan berita resmi yang diterbitkan untuk nasabah</small>
        </div>
        <div class="d-flex gap-2">
          <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline-primary">
            Kelola Semua
          </a>
          <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">
            <i class="mdi mdi-plus me-1"></i> Tulis Artikel Baru
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="row g-4">
          @forelse($recentArticles as $art)
            <div class="col-md-6 col-lg-3">
              <div class="card h-100 border shadow-none">
                @if($art->image_path)
                  <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                @else
                  <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 150px;">
                    <i class="mdi mdi-image-outline mdi-36px text-secondary"></i>
                  </div>
                @endif
                <div class="card-body d-flex flex-column p-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="badge bg-label-primary">{{ $art->category ?? 'Berita' }}</span>
                    <small class="text-muted">{{ $art->created_at ? $art->created_at->format('d M Y') : '-' }}</small>
                  </div>
                  <h6 class="card-title mb-1 text-truncate" title="{{ $art->title }}">{{ $art->title }}</h6>
                  <p class="card-text small text-muted mb-3 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $art->excerpt ?? strip_tags($art->content) }}
                  </p>
                  <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                    @if($art->is_published)
                      <span class="badge bg-label-success rounded-pill">Terbit</span>
                    @else
                      <span class="badge bg-label-secondary rounded-pill">Draf</span>
                    @endif
                    <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn btn-xs btn-outline-primary">
                      <i class="mdi mdi-pencil-outline me-1"></i> Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <div class="my-2">
                <i class="mdi mdi-newspaper-variant-outline text-muted" style="font-size: 3rem;"></i>
                <p class="mt-2 mb-1 fw-medium">Belum ada artikel yang diterbitkan</p>
                <small class="text-muted d-block mb-3">Tulis artikel atau edukasi keuangan pertama Anda untuk ditampilkan di website.</small>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">
                  <i class="mdi mdi-plus me-1"></i> Buat Artikel Sekarang
                </a>
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  <!--/ 4. Publikasi Berita & Artikel Terbaru -->

</div>
@endsection
