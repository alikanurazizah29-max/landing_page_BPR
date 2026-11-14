@extends('layouts/contentNavbarLayout')

@section('title', 'Profil Perusahaan')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Manajemen /</span> Pengaturan Profil Perusahaan
</h4>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Informasi & Identitas Resmi BPR</h5>
        <small class="text-muted">Data ini ditampilkan pada halaman depan, tentang kami, kontak, dan footer website.</small>
      </div>
      <div class="card-body">
        <form id="ajaxForm" action="{{ $companyProfile->exists ? route('admin.company-profiles.update', $companyProfile->id) : route('admin.company-profiles.store') }}" method="POST">
          @csrf
          @if($companyProfile->exists)
            @method('PUT')
          @endif

          <!-- 1. Identitas Utama -->
          <h6 class="fw-semibold text-primary mb-3"><i class="mdi mdi-office-building me-1"></i> Identitas Utama</h6>
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $companyProfile->company_name) }}" placeholder="Nama Perusahaan / BPR" required />
                <label for="company_name">Nama Perusahaan / BPR</label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('headline') is-invalid @enderror" id="headline" name="headline" value="{{ old('headline', $companyProfile->headline) }}" placeholder="Headline Beranda" required />
                <label for="headline">Headline Beranda</label>
              </div>
            </div>
          </div>

          <div class="mb-4">
            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-100 @error('subheadline') is-invalid @enderror" id="subheadline" name="subheadline" placeholder="Subheadline Beranda" required>{{ old('subheadline', $companyProfile->subheadline) }}</textarea>
              <label for="subheadline">Subheadline Beranda</label>
            </div>
          </div>

          <div class="mb-4">
            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-120 @error('about') is-invalid @enderror" id="about" name="about" placeholder="Tentang Perusahaan..." required>{{ old('about', $companyProfile->about) }}</textarea>
              <label for="about">Tentang Perusahaan (Profil Singkat)</label>
            </div>
          </div>

          <hr class="my-4">

          <!-- 2. Visi & Misi -->
          <h6 class="fw-semibold text-primary mb-3"><i class="mdi mdi-bullseye-arrow me-1"></i> Visi & Misi</h6>
          <div class="mb-4">
            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-100 @error('vision') is-invalid @enderror" id="vision" name="vision" placeholder="Visi Perusahaan">{{ old('vision', $companyProfile->vision) }}</textarea>
              <label for="vision">Visi Perusahaan</label>
            </div>
          </div>

          <div class="mb-4">
            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-120 @error('mission') is-invalid @enderror" id="mission" name="mission" placeholder="Misi Perusahaan">{{ old('mission', $companyProfile->mission) }}</textarea>
              <label for="mission">Misi Perusahaan</label>
            </div>
          </div>

          <hr class="my-4">

          <!-- 3. Kontak & Alamat Kantor -->
          <h6 class="fw-semibold text-primary mb-3"><i class="mdi mdi-phone-classic me-1"></i> Kontak & Lokasi Kantor Pusat</h6>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $companyProfile->phone) }}" placeholder="Nomor Telepon Kantor" />
                <label for="phone">Telepon Kantor</label>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $companyProfile->whatsapp) }}" placeholder="Nomor WhatsApp (Contoh: 628123...)" />
                <label for="whatsapp">WhatsApp Resmi</label>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $companyProfile->email) }}" placeholder="Email Kantor" />
                <label for="email">Email Kantor</label>
              </div>
            </div>
          </div>

          <div class="mb-4">
            <div class="form-floating form-floating-outline">
              <textarea class="form-control h-px-100 @error('address') is-invalid @enderror" id="address" name="address" placeholder="Alamat Kantor Pusat">{{ old('address', $companyProfile->address) }}</textarea>
              <label for="address">Alamat Kantor Pusat</label>
            </div>
          </div>

          <hr class="my-4">

          <!-- 4. Legalitas & Regulator Resmi -->
          <h6 class="fw-semibold text-primary mb-3"><i class="mdi mdi-shield-check me-1"></i> Kepatuhan & Regulator</h6>
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('ojk_text') is-invalid @enderror" id="ojk_text" name="ojk_text" value="{{ old('ojk_text', $companyProfile->ojk_text) }}" placeholder="Status Izin OJK" />
                <label for="ojk_text">Keterangan OJK (cth: Berizin dan diawasi oleh OJK)</label>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control @error('lps_text') is-invalid @enderror" id="lps_text" name="lps_text" value="{{ old('lps_text', $companyProfile->lps_text) }}" placeholder="Status Penjaminan LPS" />
                <label for="lps_text">Keterangan LPS (cth: Peserta penjaminan LPS)</label>
              </div>
            </div>
          </div>

          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2"><i class="mdi mdi-content-save me-1"></i> Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script>
document.getElementById('ajaxForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menyimpan...';
    
    try {
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        });
        const data = await response.json();
        
        if (response.ok) {
            sessionStorage.setItem('flash_message', data.message || 'Profil Perusahaan berhasil diperbarui.');
            window.location.reload();
        } else {
            console.error('Validation/Server Error:', data);
            let errMsg = data.message || data.error || 'Gagal menyimpan data.';
            if (data.errors) {
                const firstKey = Object.keys(data.errors)[0];
                if (firstKey && data.errors[firstKey][0]) {
                    errMsg = data.errors[firstKey][0];
                }
            }
            if (typeof showAlert === 'function') {
                showAlert('error', errMsg);
            } else {
                alert(errMsg);
            }
        }
    } catch(err) {
        console.error('Network Error:', err);
        if (typeof showAlert === 'function') {
            showAlert('error', 'Terjadi kesalahan jaringan.');
        } else {
            alert('Terjadi kesalahan jaringan.');
        }
    } finally {
        btn.disabled = false;
        btn.innerHTML = originalText;
    }
});
</script>
@endsection