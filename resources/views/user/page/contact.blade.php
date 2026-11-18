@extends('user.layout.app')
@section('title', 'Hubungi Kami | ' . ($companyProfile->company_name ?? 'BPR'))
@section('content')

    <!-- 1. Hero Section Kontak -->
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 intro text-center">
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Hubungi Kami</h1>
                    <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                        Kami siap melayani informasi produk, konsultasi simpanan/kredit, serta pengaduan nasabah dengan
                        profesional.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- 2. Informasi Kontak & Formulir Pengaduan -->
    <div class="section-grey bg-light py-5">
        <div class="container bg-white p-4 p-md-5 rounded shadow-sm">

            <!-- Alert Notifikasi Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="block">
                <div class="row justify-content-center mb-5">
                    <!-- Kartu Info Kontak Dinamis -->
                    <div class="col-md-12 col-lg-12 pb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">
                            <!-- Alamat Kantor -->
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <div class="service-2 no-shadow link horizontal d-flex p-3 border rounded h-100 bg-light">
                                    <div class="service-icon color-1 mr-3 text-primary">
                                        <span class="feather-map-pin" style="font-size: 24px;"></span>
                                    </div>
                                    <div class="service-contents">
                                        <h6 class="font-weight-bold mb-1">Alamat Kantor</h6>
                                        <p class="small text-muted mb-0">
                                            {{ $companyProfile->address ?? 'Alamat Kantor Pusat BPR' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Resmi -->
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <div class="service-2 no-shadow link horizontal d-flex p-3 border rounded h-100 bg-light">
                                    <div class="service-icon color-1 mr-3 text-primary">
                                        <span class="feather-mail" style="font-size: 24px;"></span>
                                    </div>
                                    <div class="service-contents">
                                        <h6 class="font-weight-bold mb-1">Email Resmi</h6>
                                        <p class="small text-muted mb-0">{{ $companyProfile->email ?? 'info@bpr.co.id' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Telepon / WhatsApp -->
                            <div class="col-lg-4">
                                <div class="service-2 no-shadow link horizontal d-flex p-3 border rounded h-100 bg-light">
                                    <div class="service-icon color-1 mr-3 text-primary">
                                        <span class="feather-phone" style="font-size: 24px;"></span>
                                    </div>
                                    <div class="service-contents">
                                        <h6 class="font-weight-bold mb-1">Layanan Telepon / WA</h6>
                                        <p class="small text-muted mb-0">
                                            {{ $companyProfile->phone ?? ($companyProfile->whatsapp ?? '-') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulir Kirim Pesan -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h3 class="font-weight-bold mb-4 text-center">Kirimkan Pesan atau Pertanyaan</h3>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black font-weight-bold" for="name">Nama Lengkap <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            placeholder="Nama Anda">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black font-weight-bold" for="email">Alamat Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            placeholder="nama@email.com">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-black font-weight-bold" for="phone">Nomor Handphone / WhatsApp <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" required
                                    placeholder="Contoh: 08123456789">
                            </div>

                            <div class="form-group">
                                <label class="text-black font-weight-bold" for="product_interest">Produk yang
                                    Diminati</label>
                                <select name="product_interest" class="form-control mb-3">
                                    <option value="">-- Pilih Layanan (Opsional) --</option>
                                    <option value="Kredit UMKM / Modal Kerja">Kredit UMKM / Modal Kerja</option>
                                    <option value="Kredit Konsumtif / Multiguna">Kredit Konsumtif / Multiguna</option>
                                    <option value="Tabungan BPR">Tabungan BPR</option>
                                    <option value="Deposito Berjangka">Deposito Berjangka</option>
                                    <option value="Pengaduan Nasabah">Pengaduan Nasabah / WBS</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="text-black font-weight-bold" for="message">Pesan / Pengaduan <span
                                        class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="5" required
                                    placeholder="Tuliskan pesan, pertanyaan, atau kendala Anda di sini..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block font-weight-bold py-3">Kirim Pesan
                                Sekarang</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 3. Jaringan Kantor Pelayanan (Creative Split Modern Layout) -->
    <div class="site-section bg-white py-5">
        <div class="container py-4">
            <div class="row align-items-start">

                <!-- Kolom Kiri: Informasi & Judul (Sticky saat di-scroll pada desktop) -->
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
                    <div class="sticky-top" style="top: 100px; z-index: 10;">
                        <div class="d-inline-flex align-items-center px-3 py-1 mb-3 rounded-pill text-primary font-weight-bold text-uppercase"
                            style="font-size: 0.75rem; letter-spacing: 2px; background-color: rgba(0, 123, 255, 0.08);">
                            <i class="feather-compass mr-2"></i> Jaringan Luas
                        </div>
                        <h2 class="heading font-weight-bold text-dark mb-3" style="font-size: 2.5rem; line-height: 1.2;">
                            Temukan Kantor Layanan Kami</h2>
                        <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.7;">
                            Kami selalu siap melayani kebutuhan finansial Anda mulai dari pembukaan tabungan, deposito,
                            hingga konsultasi kredit melalui jaringan kantor yang tersebar strategis.
                        </p>

                        <!-- Quick Stats / Highlight Banner kecil -->
                        <div class="p-3 rounded-xl bg-light border-0 d-flex align-items-center shadow-none">
                            <div class="icon-box bg-primary text-white rounded-circle p-3 mr-3 d-flex align-items-center justify-content-center"
                                style="width: 45px; height: 45px;">
                                <i class="feather-headphones" style="font-size: 20px;"></i>
                            </div>
                            <div>
                                <h6 class="font-weight-bold text-dark mb-0" style="font-size: 0.9rem;">Butuh Bantuan
                                    Cepat?</h6>
                                <span class="text-muted small">Hubungi layanan call center atau WhatsApp kami.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: List Kantor Bergaya Modern List-Card -->
                <div class="col-lg-8">
                    <div class="row">
                        @if (isset($branches) && $branches->count() > 0)
                            @foreach ($branches as $branch)
                                @php
                                    $isPusat = $branch->type == 'pusat';
                                    $isCabang = $branch->type == 'cabang';
                                    $badgeColor = $isPusat
                                        ? 'badge-danger'
                                        : ($isCabang
                                            ? 'badge-primary'
                                            : 'badge-success');
                                    $accentColor = $isPusat ? '#dc3545' : ($isCabang ? '#007bff' : '#28a745');
                                @endphp

                                <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                    <div class="branch-card p-4 rounded-xl bg-white position-relative transition-all"
                                        style="border: 1px solid #eaeaea; border-left: 6px solid {{ $accentColor }}; border-radius: 14px; transition: all 0.3s ease;">

                                        <div class="row align-items-center">
                                            <!-- Info Utama Kantor -->
                                            <div class="col-md-7 mb-3 mb-md-0">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span
                                                        class="badge {{ $badgeColor }} px-2 py-1 text-uppercase font-weight-bold mr-2"
                                                        style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                                        Kantor {{ ucfirst($branch->type) }}
                                                    </span>
                                                </div>
                                                <h4 class="font-weight-bold text-dark mb-2" style="font-size: 1.15rem;">
                                                    {{ $branch->name }}</h4>
                                                <p class="text-muted small mb-0 d-flex align-items-start"
                                                    style="line-height: 1.5;">
                                                    <i class="feather-map-pin text-primary mr-2 mt-1 flex-shrink-0"></i>
                                                    <span>{{ $branch->address }}</span>
                                                </p>
                                            </div>

                                            <!-- Kontak & Tombol Aksi di Kanan -->
                                            <div class="col-md-5 text-md-right border-top-mobile pt-3 pt-md-0">
                                                <div class="d-flex flex-column align-items-md-end justify-content-center">
                                                    @if ($branch->phone)
                                                        <div class="small text-dark font-weight-medium mb-1">
                                                            <i class="feather-phone text-primary mr-1"></i>
                                                            {{ $branch->phone }}
                                                        </div>
                                                    @endif

                                                    @if ($branch->whatsapp)
                                                        @php
                                                            $bWa = preg_replace('/[^0-9]/', '', $branch->whatsapp);
                                                            if (str_starts_with($bWa, '0')) {
                                                                $bWa = '62' . substr($bWa, 1);
                                                            }
                                                        @endphp
                                                        <div class="small mb-2">
                                                            <a href="https://api.whatsapp.com/send?phone={{ $bWa }}"
                                                                target="_blank" rel="noopener noreferrer" class="text-success font-weight-bold">
                                                                <i class="feather-message-circle mr-1"></i> WA:
                                                                {{ $branch->whatsapp }}
                                                            </a>
                                                        </div>
                                                    @endif

                                                    @if ($branch->maps_url)
                                                        <a href="{{ $branch->maps_url }}" target="_blank"
                                                            class="btn btn-outline-dark btn-sm font-weight-bold rounded-pill px-3 mt-2 d-inline-flex align-items-center"
                                                            style="font-size: 0.75rem;">
                                                            <i class="feather-navigation mr-1 text-primary"></i> Buka Peta
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Fallback jika cabang kosong --}}
                            <div class="col-12" data-aos="fade-up">
                                <div class="branch-card p-4 rounded-xl bg-white position-relative"
                                    style="border: 1px solid #eaeaea; border-left: 6px solid #dc3545; border-radius: 14px;">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <span class="badge badge-danger px-2 py-1 text-uppercase font-weight-bold mb-2"
                                                style="font-size: 0.65rem;">Kantor Pusat</span>
                                            <h4 class="font-weight-bold text-dark mb-2" style="font-size: 1.15rem;">Kantor
                                                Pusat {{ $companyProfile->company_name ?? 'BPR' }}</h4>
                                            <p class="text-muted small mb-0">
                                                <i class="feather-map-pin text-primary mr-1"></i>
                                                {{ $companyProfile->address ?? 'Alamat Kantor Pusat BPR' }}
                                            </p>
                                        </div>
                                        <div class="col-md-5 text-md-right mt-3 mt-md-0">
                                            @if ($companyProfile->phone ?? false)
                                                <div class="small text-dark font-weight-medium mb-1"><i
                                                        class="feather-phone text-primary mr-1"></i>
                                                    {{ $companyProfile->phone }}</div>
                                            @endif
                                            @if ($companyProfile->whatsapp ?? false)
                                                <div class="small"><a
                                                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyProfile->whatsapp) }}"
                                                        target="_blank" class="text-success font-weight-bold"><i
                                                            class="feather-message-circle mr-1"></i> WA:
                                                        {{ $companyProfile->whatsapp }}</a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Custom CSS Tambahan untuk Efek Interaktif -->
    <style>
        .branch-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border-color: #d6d6d6 !important;
        }

        @media (max-width: 767.98px) {
            .border-top-mobile {
                border-top: 1px solid #f1f1f1;
                margin-top: 15px;
            }
        }
    </style>

    <!-- 3. Google Maps Kantor Pusat -->
    <div class="site-section bg-light pt-4"> <!-- Diubah dari pt-0 menjadi pt-4 (atau pt-5 untuk jarak yang lebih jauh) -->
        <div class="container">
            <div class="card border-0 shadow-sm p-2 rounded overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127164.2981328906!2d119.3820252!3d-5.1476651!2m3!1f0!0!f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf01a0cb32393f%3A0x3030bf43d0612f0!2sMakassar%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

@endsection
