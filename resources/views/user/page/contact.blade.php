@extends('user.layout.app')
@section('title', 'Hubungi Kami | BPR')

@section('content')

    <!-- 1. Hero Section Kontak -->
    <div class="hero-slant overlay" data-stellar-background-ratio="0.5"
         style="background-image: url(&quot;{{ asset('user/images/hero-min.jpg') }}&quot;)">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 intro text-center">
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Hubungi Kami</h1>
                    <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                        Kami siap melayani informasi produk, konsultasi simpanan/kredit, serta pengaduan nasabah dengan profesional.
                    </p>
                </div>
            </div>
        </div>

        <div class="slant" style="background-image: url(&quot;{{ asset('user/images/slant-grey.svg') }}&quot;);"></div>
    </div>

    <!-- 2. Informasi Kontak & Formulir Pengaduan -->
    <div class="section-grey bg-light py-5">
        <div class="container bg-white p-4 p-md-5 rounded shadow-sm">

            <!-- Alert Notifikasi Sukses -->
            @if(session('success'))
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
                                        <p class="small text-muted mb-0">{{ $companyProfile->address ?? 'Alamat Kantor Pusat BPR' }}</p>
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
                                        <p class="small text-muted mb-0">{{ $companyProfile->email ?? 'info@bpr.co.id' }}</p>
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
                                        <p class="small text-muted mb-0">{{ $companyProfile->phone ?? $companyProfile->whatsapp ?? '-' }}</p>
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
                                        <label class="text-black font-weight-bold" for="name">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="Nama Anda">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black font-weight-bold" for="email">Alamat Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="nama@email.com">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-black font-weight-bold" for="phone">Nomor Handphone / WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Contoh: 08123456789">
                            </div>

                            <div class="form-group">
                                <label class="text-black font-weight-bold" for="product_interest">Produk yang Diminati</label>
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
                                <label class="text-black font-weight-bold" for="message">Pesan / Pengaduan <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="5" required placeholder="Tuliskan pesan, pertanyaan, atau kendala Anda di sini..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block font-weight-bold py-3">Kirim Pesan Sekarang</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 3. Google Maps Kantor Pusat -->
    <div class="site-section bg-light pt-0">
        <div class="container">
            <div class="card border-0 shadow-sm p-2 rounded overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127164.2981328906!2d119.3820252!3d-5.1476651!2m3!1f0!0!f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf01a0cb32393f%3A0x3030bf43d0612f0!2sMakassar%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid" 
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

@endsection