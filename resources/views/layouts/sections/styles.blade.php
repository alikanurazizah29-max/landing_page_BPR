<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Custom Form & UI Styles -->
<style>
  .image-preview-wrapper {
    margin-top: 12px;
    padding: 12px;
    background: #f8f9fa;
    border: 2px dashed #d9dee3;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    max-width: 100%;
    transition: all 0.2s ease;
  }
  .image-preview-wrapper:hover {
    border-color: #666cff;
    background: #f4f5fb;
  }
  .image-preview-wrapper img {
    height: 70px;
    width: 90px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
  }
  .image-preview-info {
    font-size: 0.85rem;
    color: #566a7f;
  }
  .image-preview-info .file-name {
    font-weight: 600;
    color: #384551;
    word-break: break-all;
  }
  .image-preview-info .file-size {
    font-size: 0.75rem;
    color: #8592a3;
  }
  .btn-remove-preview {
    background: #ffe0e0;
    color: #ff3e1d;
    border: none;
    border-radius: 6px;
    padding: 4px 8px;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
  }
  .btn-remove-preview:hover {
    background: #ff3e1d;
    color: #fff;
  }
  .form-floating > .invalid-feedback {
    margin-top: 4px;
    font-size: 0.82rem;
  }
</style>

<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
