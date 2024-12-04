@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tambah Data Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('asatidz.store_address') }}" method="POST">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Alamat Asatidz</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="alamat-lengkap">Alamat Lengkap</label>
                  <input type="text" class="form-control" id="alamat-lengkap" name="alamat_lengkap"
                    placeholder="Jl. nama jalan, nomor rumah"
                    value="{{ old('alamat_lengkap', session('form_address.alamat_lengkap')) }}">
                  @error('alamat_lengkap')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desa">Kelurahan / Desa</label>
                  <input type="text" class="form-control" id="desa" name="desa" placeholder=""
                    value="{{ old('desa', session('form_address.desa')) }}">
                  @error('desa')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rt">RT</label>
                  <input type="number" class="form-control" id="rt" placeholder="" name="rt"
                    value="{{ old('rt', session('form_address.rt')) }}">
                  @error('rt')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" placeholder="" name="kecamatan"
                    value="{{ old('kecamatan', session('form_address.kecamatan')) }}">
                  @error('kecamatan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rw">RW</label>
                  <input type="number" class="form-control" id="rw" name="rw" placeholder=""
                    value="{{ old('rw', session('form_address.rw')) }}">
                  @error('rw')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kabupaten">Kabupaten / Kota</label>
                  <input type="text" class="form-control" id="kabupaten" placeholder="" name="kota"
                    value="{{ old('kota', session('form_address.kota')) }}">
                  @error('kota')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('asatidz.create.biodata') }}" class="btn icon icon-right btn-danger me-2">
                  <i class="bi bi-arrow-left"></i>
                  Kembali </a>
                <button type="submit" class="btn icon icon-right btn-primary">
                  Selanjutnya <i class="bi bi-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
@endSection
