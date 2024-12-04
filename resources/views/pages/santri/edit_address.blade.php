@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Edit Data Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Santri</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('santri.update_address', ['id' => $data->id]) }}" method="POST">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Alamat Domisili Santri</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="alamat-lengkap">Alamat Lengkap</label>
                  <input type="text" class="form-control" id="alamat-lengkap" name="alamat_lengkap_domisili"
                    placeholder="Jl. nama jalan, nomor rumah"
                    value="{{ old('alamat_lengkap_domisili', session('form_address_santri.alamat_lengkap_domisili', $data->alamat_lengkap_domisili)) }}">
                  @error('alamat_lengkap_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desa">Kelurahan / Desa</label>
                  <input type="text" class="form-control" id="desa" name="desa_domisili" placeholder=""
                    value="{{ old('desa_domisili', session('form_address_santri.desa_domisili', $data->desa_domisili)) }}">
                  @error('desa_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rt">RT</label>
                  <input type="number" class="form-control" id="rt" name="rt_domisili"
                    placeholder=""value="{{ old('rt_domisili', session('form_address_santri.rt_domisili', $data->rt_domisili)) }}">
                  @error('rt_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" name="kecamatan_domisili"
                    placeholder=""value="{{ old('kecamatan_domisili', session('form_address_santri.kecamatan_domisili', $data->kecamatan_domisili)) }}">
                  @error('kecamatan_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rw">RW</label>
                  <input type="number" class="form-control" id="rw" name="rw_domisili"
                    placeholder=""value="{{ old('rw_domisili', session('form_address_santri.rw_domisili', $data->rw_domisili)) }}">
                  @error('rw_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kabupaten">Kabupaten / Kota</label>
                  <input type="text" class="form-control" id="kabupaten" name="kota_domisili" placeholder=""
                    value="{{ old('kota_domisili', session('form_address_santri.kota_domisili', $data->kota_domisili)) }}">
                  @error('kota_domisili')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Alamat KK Santri</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="alamat-lengkap">Alamat Lengkap</label>
                  <input type="text" class="form-control" id="alamat-lengkap" placeholder="Jl. nama jalan, nomor rumah"
                    name="alamat_lengkap_kk"
                    value="{{ old('alamat_lengkap_kk', session('form_address_santri.alamat_lengkap_kk', $data->alamat_lengkap_kk)) }}">
                  @error('alamat_lengkap_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desa">Kelurahan / Desa</label>
                  <input type="text" class="form-control" id="desa" placeholder="" name="desa_kk"
                    value="{{ old('desa_kk', session('form_address_santri.desa_kk', $data->desa_kk)) }}">
                  @error('desa_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rt">RT</label>
                  <input type="number" class="form-control" id="rt" placeholder="" name="rt_kk"
                    value="{{ old('rt_kk', session('form_address_santri.rt_kk', $data->rt_kk)) }}">
                  @error('rt_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" placeholder="" name="kecamatan_kk"
                    value="{{ old('kecamatan_kk', session('form_address_santri.kecamatan_kk', $data->kecamatan_kk)) }}">
                  @error('kecamatan_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="rw">RW</label>
                  <input type="number" class="form-control" id="rw" placeholder="" name="rw_kk"
                    value="{{ old('rw_kk', session('form_address_santri.rw_kk', $data->rw_kk)) }}">
                  @error('rw_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kabupaten">Kabupaten / Kota</label>
                  <input type="text" class="form-control" id="kabupaten" placeholder="" name="kota_kk"
                    value="{{ old('kota_kk', session('form_address_santri.kota_kk', $data->kota_kk)) }}">
                  @error('kota_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('santri.edit_biodata', ['id' => $data->id]) }}"
                  class="btn icon icon-right btn-danger me-2">
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
