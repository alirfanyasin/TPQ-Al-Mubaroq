@extends('layouts.auth')
@section('auth-content')
  <div id="auth-left">
    <div class="auth-logo" style="margin-bottom: 1rem;">
      <a href="index.html" class="d-inline-block">
        <div class="" style="display: flex; justify-content: center; width: 100px; height: 100px">
          <img src="/template/assets/images/logo/logo.png" alt="Logo" style="width: 100%; height: 100%">
        </div>
      </a>
    </div>


    <h1 class="text-black auth-title">Log in.</h1>
    <p class="mb-5 auth-subtitle">Selamat Datang Di TPQ AL-Mubarok.</p>

    @if ($errors->has('errors'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-message">
          <strong>Warning!</strong> {{ $errors->first('errors') }}
        </div>
      </div>
    @endif


    <form action="{{ route('authenticate') }}" method="POST">
      @csrf
      <div class="mb-4 form-group position-relative has-icon-left">
        <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
        <div class="form-control-icon">
          <i class="bi bi-person"></i>
        </div>
        @error('username')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-4 form-group position-relative has-icon-left">
        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
        <div class="form-control-icon">
          <i class="bi bi-shield-lock"></i>
        </div>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <button type="submit" class="mt-3 shadow-lg btn btn-warning btn-block btn-lg">Log in</button>
    </form>
    <div class="mt-3 text-lg text-center fs-4">
      <p><a class="font-bold text-black" href="">Forgot password?</a>.</p>
    </div>
  </div>
@endsection
