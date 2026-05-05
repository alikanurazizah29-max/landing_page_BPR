<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $profile->company_name ?? 'Company Profile BPR' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #003b8e);
            color: white;
            padding: 90px 0;
        }

        .section {
            padding: 70px 0;
        }

        .card {
            border: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
            border-radius: 18px;
        }

        .icon-box {
            font-size: 38px;
            color: #0d6efd;
        }

        .footer {
            background: #082247;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">{{ $profile->company_name }}</a>
            <div>
                <a href="#produk" class="btn btn-link">Produk</a>
                <a href="#tentang" class="btn btn-link">Tentang</a>
                <a href="#kontak" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold">{{ $profile->headline }}</h1>
                    <p class="lead mt-3">{{ $profile->subheadline }}</p>
                    <a href="#kontak" class="btn btn-light btn-lg mt-3">Ajukan Sekarang</a>
                    <a href="https://wa.me/{{ $profile->whatsapp }}" class="btn btn-outline-light btn-lg mt-3">Chat
                        WhatsApp</a>
                </div>
                <div class="col-lg-5 text-center">
                    <i class="bi bi-bank2" style="font-size: 180px;"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light">
        <div class="container text-center">
            <strong>{{ $profile->ojk_text }}</strong> • <strong>{{ $profile->lps_text }}</strong>
        </div>
    </section>

    <section id="produk" class="section">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Produk & Layanan</h2>
            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card p-4 h-100 text-center">
                            <i class="bi {{ $product->icon }} icon-box"></i>
                            <h4 class="mt-3">{{ $product->title }}</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="tentang" class="section bg-light">
        <div class="container">
            <h2 class="fw-bold">Tentang Kami</h2>
            <p>{{ $profile->about }}</p>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>Visi</h5>
                    <p>{{ $profile->vision }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Misi</h5>
                    <p>{{ $profile->mission }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Mengapa Memilih Kami?</h2>
            <div class="row g-4">
                @foreach ($benefits as $benefit)
                    <div class="col-md-4">
                        <div class="card p-4 h-100">
                            <i class="bi {{ $benefit->icon }} icon-box"></i>
                            <h5 class="mt-3">{{ $benefit->title }}</h5>
                            <p>{{ $benefit->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Proses Pengajuan</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4>1. Isi Data</h4>
                    <p>Kirim kebutuhan Anda melalui form.</p>
                </div>
                <div class="col-md-4">
                    <h4>2. Verifikasi</h4>
                    <p>Tim kami akan menghubungi Anda.</p>
                </div>
                <div class="col-md-4">
                    <h4>3. Proses Lanjut</h4>
                    <p>Pengajuan diproses sesuai ketentuan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Testimoni Nasabah</h2>
            <div class="row g-4">
                @foreach ($testimonials as $testimoni)
                    <div class="col-md-6">
                        <div class="card p-4">
                            <p>"{{ $testimoni->message }}"</p>
                            <strong>{{ $testimoni->name }}</strong>
                            <small>{{ $testimoni->job }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Pertanyaan Umum</h2>
            <div class="accordion" id="faqAccordion">
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#faq{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="faq{{ $faq->id }}" class="accordion-collapse collapse">
                            <div class="accordion-body">{{ $faq->answer }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="kontak" class="section">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Hubungi Kami</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="card p-4">
                @csrf
                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap" required>
                <input type="text" name="phone" class="form-control mb-3" placeholder="Nomor HP / WhatsApp"
                    required>
                <select name="product_interest" class="form-control mb-3">
                    <option value="">Pilih Produk</option>
                    <option value="Kredit">Kredit</option>
                    <option value="Tabungan">Tabungan</option>
                    <option value="Deposito">Deposito</option>
                </select>
                <textarea name="message" class="form-control mb-3" placeholder="Pesan"></textarea>
                <button class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <h5>{{ $profile->company_name }}</h5>
            <p>{{ $profile->address }}</p>
            <p>Telp: {{ $profile->phone }} | Email: {{ $profile->email }}</p>
            <p>{{ $profile->ojk_text }} • {{ $profile->lps_text }}</p>
        </div>
    </footer>

    <a href="https://wa.me/{{ $profile->whatsapp }}" class="btn btn-success position-fixed bottom-0 end-0 m-4">
        <i class="bi bi-whatsapp"></i> WhatsApp
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
