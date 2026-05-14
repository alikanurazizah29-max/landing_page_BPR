@extends('layouts/blankLayout')

@section('title', 'Login - Admin BPR')

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Login Card -->
      <div class="card p-2">

        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 20, 'withbg' => 'fill: #fff;'])</span>
            <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->

        <div class="card-body mt-2">
          <h4 class="mb-2">Selamat Datang! 👋</h4>
          <p class="mb-4 text-muted">Masuk ke panel admin BPR untuk mengelola konten website.</p>

          {{-- Error global --}}
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible mb-3" role="alert">
            <i class="mdi mdi-alert-circle-outline me-1"></i>
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          {{-- Session status (misal setelah logout) --}}
          @if (session('status'))
          <div class="alert alert-success mb-3">{{ session('status') }}</div>
          @endif

          <form id="formAuthentication" class="mb-3"
                action="{{ route('login.submit') }}"
                method="POST">
            @csrf

            <!-- Email -->
            <div class="form-floating form-floating-outline mb-3">
              <input type="email"
                     class="form-control @error('email') is-invalid @enderror"
                     id="email"
                     name="email"
                     placeholder="admin@bpr.com"
                     value="{{ old('email') }}"
                     autofocus required />
              <label for="email">Email</label>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="password"
                           id="password"
                           class="form-control"
                           name="password"
                           placeholder="············"
                           required />
                    <label for="password">Password</label>
                  </div>
                  <span class="input-group-text cursor-pointer">
                    <i class="mdi mdi-eye-off-outline"></i>
                  </span>
                </div>
              </div>
            </div>

            <!-- Remember Me -->
            <div class="mb-3 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                <label class="form-check-label" for="remember-me">Ingat saya</label>
              </div>
            </div>

            <!-- Submit -->
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">
                <i class="mdi mdi-login me-1"></i> Masuk
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Login Card -->

      <img src="{{ asset('assets/img/illustrations/tree-3.png') }}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{ asset('assets/img/illustrations/auth-basic-mask-light.png') }}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{ asset('assets/img/illustrations/tree.png') }}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection
