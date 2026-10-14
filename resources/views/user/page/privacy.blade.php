@extends('user.layout.app')
@section('title', 'Kebijakan Privasi & Pengaduan Nasabah (WBS) | BPR')

@section('content')

    <!-- Hero Banner -->
    <div class="hero-slant overlay" style="background-image: url('{{ asset('user/images/hero-min.jpg') }}');">
        <div class="container text-center py-5">
            <h1 class="text-white font-weight-bold">Kebijakan Privasi &amp; Pengaduan Nasabah</h1>
            <p class="text-white-50">Komitmen perlindungan data pribadi dan transparansi layanan perbankan.</p>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    
                    <!-- Bagian 1: Kebijakan Privasi (UU PDP) -->
                    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5">
                        <h3 class="font-weight-bold text-dark mb-4 border-bottom pb-3">Pernyataan Kebijakan Privasi</h3>
                        <p class="text-secondary leading-relaxed">
                            PT BPR berkomitmen penuh untuk melindungi kerahasiaan dan keamanan Data Pribadi Nasabah sesuai dengan Undang-Undang Perlindungan Data Pribadi (UU PDP) serta ketentuan Otoritas Jasa Keuangan (OJK).
                        </p>
                        <h5 class="font-weight-bold text-dark mt-4 mb-2">1. Pengumpulan &amp; Penggunaan Data</h5>
                        <p class="text-secondary small">
                            Data pribadi seperti Nama, NIK KTP, Alamat, Nomor Telepon, dan Dokumen Keuangan yang Anda berikan hanya digunakan untuk keperluan verifikasi identitas, proses pembukaan rekening, analisis kelayakan kredit, serta pemenuhan kewajiban regulasi perbankan.
                        </p>
                        <h5 class="font-weight-bold text-dark mt-3 mb-2">2. Kerahasiaan &amp; Keamanan Data</h5>
                        <p class="text-secondary small">
                            BPR tidak akan menjual, menyewakan, atau memberikan Data Pribadi Anda kepada pihak ketiga tanpa persetujuan tertulis dari Anda, kecuali diwajibkan oleh ketentuan hukum atau perintah pengadilan/regulator (OJK, Bank Indonesia, LPS).
                        </p>
                    </div>

                    <!-- Bagian 2: Whistleblowing System (WBS) & Pengaduan Nasabah -->
                    <div class="card border-0 shadow-sm p-4 p-md-5 bg-light">
                        <h3 class="font-weight-bold text-dark mb-4 border-bottom pb-3">Saluran Pengaduan Konsumen &amp; WBS</h3>
                        <p class="text-secondary leading-relaxed">
                            Jika Anda menemukan indikasi pelanggaran, tindakan kecurangan (*fraud*), pencucian uang, atau merasa dirugikan terkait pelayanan BPR, Anda dapat menyampaikan pengaduan melalui saluran resmi Whistleblowing System (WBS) kami:
                        </p>

                        <div class="row my-4">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-white rounded border">
                                    <h6 class="font-weight-bold text-primary mb-1"><i class="feather-phone mr-2"></i>Telepon / WA CS</h6>
                                    <p class="small text-muted mb-0">{{ $companyProfile->phone ?? $companyProfile->whatsapp ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-white rounded border">
                                    <h6 class="font-weight-bold text-primary mb-1"><i class="feather-mail mr-2"></i>Email WBS</h6>
                                    <p class="small text-muted mb-0">pengaduan@{{ strtolower(str_replace(' ', '', $companyProfile->company_name ?? 'bpr')) }}.co.id</p>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info border-0 rounded p-3 mb-0 small">
                            <strong><i class="feather-info mr-2"></i>Informasi Hak Nasabah:</strong><br>
                            Apabila pengaduan Anda belum memperoleh penyelesaian yang memuaskan dari pihak BPR, Anda memiliki hak untuk meneruskan pengaduan tersebut kepada <strong>Kontak OJK 157</strong> (Telepon: 157 / WhatsApp: 081-157-157-157).
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection