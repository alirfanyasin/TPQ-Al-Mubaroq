@extends('layouts.auth')
@section('auth-content')
  <div id="auth-left">
    <div class="auth-logo">
      <a href="index.html"><img src="/template/assets/images/logo/logo.svg" alt="Logo"></a>
    </div>
    <h1 class="auth-title">Log in.</h1>
    <p class="mb-5 auth-subtitle">Selamat Datang Di TPQ AL-Mubarok.</p>

    <form action="{{ route('autenticate') }}" method="POST">
      @csrf
      <div class="mb-4 form-group position-relative has-icon-left">
        <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
        <div class="form-control-icon">
          <i class="bi bi-person"></i>
        </div>
      </div>
      <div class="mb-4 form-group position-relative has-icon-left">
        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
        <div class="form-control-icon">
          <i class="bi bi-shield-lock"></i>
        </div>
      </div>
      <button type="submit" class="mt-3 shadow-lg btn btn-primary btn-block btn-lg">Log in</button>
    </form>
    <div class="mt-3 text-lg text-center fs-4">
      <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
    </div>
  </div>
@endsection
