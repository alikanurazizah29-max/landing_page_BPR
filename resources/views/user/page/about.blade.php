@extends('user.layout.app')
@section('title', 'Tentang Kami | ' . ($companyProfile->company_name ?? 'BPR'))

@section('content')

    <!-- 1. Hero Banner Tentang Kami -->
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
         style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 intro text-center">
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">
                        Tentang Kami
                    </h1>
                    <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                        Mengenal lebih dekat lembaga keuangan terpercaya yang senantiasa tumbuh bersama masyarakat dan UMKM.
                    </p>
                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant-grey.svg') }}&quot;);"></div>
    </div>

    <!-- 2. Profil & Sejarah Singkat -->
    <div class="site-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Profil Perusahaan</span>
                    <h2 class="font-weight-bold text-dark mb-4">Komitmen Memberikan Solusi Keuangan Terbaik</h2>
                    <p class="text-secondary leading-relaxed">
                        {{ $companyProfile->about ?? 'PT Bank Perekonomian Rakyat (BPR) hadir untuk melayani kebutuhan masyarakat melalui produk tabungan yang aman dijamin LPS, deposito berjangka dengan bunga kompetitif, serta fasilitas kredit yang mendukung pengembangan usaha mikro, kecil, dan menengah.' }}
                    </p>
                    <p class="text-secondary leading-relaxed">
                        Dengan memegang teguh prinsip kehati-hatian (*prudential banking*) dan profesionalisme, kami berkomitmen untuk terus berkontribusi positif bagi perekonomian daerah.
                    </p>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('user/images/img_v_3-min.jpg') }}" alt="Gedung BPR" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Visi & Misi BPR -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                <div class="col-lg-7">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Arah & Tujuan</span>
                    <h2 class="heading font-weight-bold">Visi &amp; Misi Perusahaan</h2>
                </div>
            </div>
            <div class="row">
                <!-- Visi -->
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm p-4 h-100" style="border-top: 4px solid #007bff;">
                        <div class="d-flex align-items-center mb-3">
                            <span class="feather-eye display-4 text-primary mr-3"></span>
                            <h4 class="font-weight-bold text-dark mb-0">Visi Kami</h4>
                        </div>
                        <p class="text-muted leading-relaxed mb-0">
                            "Menjadi Bank Perekonomian Rakyat yang sehat, terpercaya, profesional, dan menjadi mitra pilihan utama bagi masyarakat serta pelaku UMKM."
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm p-4 h-100" style="border-top: 4px solid #28a745;">
                        <div class="d-flex align-items-center mb-3">
                            <span class="feather-target display-4 text-success mr-3"></span>
                            <h4 class="font-weight-bold text-dark mb-0">Misi Kami</h4>
                        </div>
                        <ul class="text-muted leading-relaxed pl-3 mb-0 small">
                            <li class="mb-2">Memberikan pelayanan perbankan yang prima, ramah, dan cepat kepada nasabah.</li>
                            <li class="mb-2">Mendukung pertumbuhan usaha mikro dan kecil melalui pembiayaan kredit yang mudah dan fleksibel.</li>
                            <li class="mb-2">Menerapkan tata kelola perusahaan yang baik (GCG) serta manajemen risiko yang efektif.</li>
                            <li>Memberikan nilai tambah yang optimal bagi seluruh pemangku kepentingan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Prinsip Tata Kelola Perusahaan (GCG) -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                <div class="col-lg-7">
                    <span class="sub-title text-primary font-weight-bold text-uppercase">Standar Perbankan</span>
                    <h2 class="heading font-weight-bold">Tata Kelola Perusahaan (GCG)</h2>
                    <p class="text-muted">Komitmen penerapan prinsip Good Corporate Governance secara konsisten:</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h5 class="font-weight-bold text-primary mb-2">1. Transparansi</h5>
                        <p class="small text-muted mb-0">Keterbukaan informasi keuangan dan operasional secara akurat serta tepat waktu.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h5 class="font-weight-bold text-primary mb-2">2. Akuntabilitas</h5>
                        <p class="small text-muted mb-0">Kejelasan fungsi dan pertanggungjawaban organ bank dalam pengelolaan usaha.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h5 class="font-weight-bold text-primary mb-2">3. Pertanggungjawaban</h5>
                        <p class="small text-muted mb-0">Kesesuaian operasional bank dengan peraturan perundang-undangan dan prinsip perbankan sehat.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h5 class="font-weight-bold text-primary mb-2">4. Independensi</h5>
                        <p class="small text-muted mb-0">Pengelolaan bank secara profesional tanpa benturan kepentingan atau tekanan pihak lain.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="p-4 border rounded shadow-sm h-100 bg-white">
                        <h5 class="font-weight-bold text-primary mb-2">5. Kewajaran</h5>
                        <p class="small text-muted mb-0">Keadilan dan kesetaraan dalam memenuhi hak-hak seluruh pemangku kepentingan (*stakeholders*).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection