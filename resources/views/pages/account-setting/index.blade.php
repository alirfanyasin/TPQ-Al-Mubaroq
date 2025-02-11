@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Akun Saya</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <form action="{{ route('account.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card">
          <div class="card-body">
            <div class="row">
              {{-- <div class="col-md-4 col-12">
                <h5>Foto Profile</h5>
                <div class="mb-3 d-flex justify-content-center">
                  <div class="p-1 border border-1 rounded-3" style="width: 100%; min-height: 340px;">
                    <img src="" alt="">
                  </div>
                </div>
                <div class="input-group">
                  <input type="file" class="form-control" name="file">
                </div>
                @error('file')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div> --}}
              <div class="col-md-12 col-12">
                <div class="mb-3">
                  <label for="name" class="d-block">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="{{ Auth::user()->name }}">
                  @error('name')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="username" class="d-block">Username</label>
                  <input type="text" class="form-control" id="username" name="username"
                    value="{{ Auth::user()->username }}">
                  @error('username')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="email" class="d-block">Email</label>
                  <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::user()->email }}">
                  @error('email')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="Password" class="d-block">Password</label>
                  <input type="password" class="form-control" id="Password" name="password"
                    value="{{ Auth::user()->password }}">
                  @error('password')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>

          </div>
        </div>
      </form>
    </section>
  </div>
@endSection
{{-- 
<div>
  <form action="{{ route('rapors.import-post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input-group">
      <input type="file" class="form-control" name="file">
      <button type="submit" class="btn btn-primary">Upload</button>
    </div>
    @error('file')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </form>

</div> --}}
