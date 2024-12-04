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
    <form action="{{ route('santri.update_biodata_father', ['id' => $data->id]) }}" method="POST">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Ayah</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama-lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama-lengkap" placeholder="" name="nama_lengkap_ayah"
                    value="{{ old('nama_lengkap_ayah', session('form_biodata_father.nama_lengkap_ayah', $data->nama_lengkap_ayah)) }}">
                  @error('nama_lengkap_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tgl-lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl-lahir" placeholder="" name="tanggal_lahir_ayah"
                    value="{{ old('tanggal_lahir_ayah', session('form_biodata_father.tanggal_lahir_ayah', $data->tanggal_lahir_ayah)) }}">
                  @error('tanggal_lahir_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="pekerjaan" placeholder="" name="pekerjaan_ayah"
                    value="{{ old('pekerjaan_ayah', session('form_biodata_father.pekerjaan_ayah', $data->pekerjaan_ayah)) }}">
                  @error('pekerjaan_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="NIK">NIK</label>
                  <input type="number" class="form-control" id="NIK" placeholder="" name="nik_ayah"
                    value="{{ old('nik_ayah', session('form_biodata_father.nik_ayah', $data->nik_ayah)) }}">
                  @error('nik_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="agama" name="agama_ayah">
                      <option value="Islam"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Islam' ? 'selected' : '' }}>
                        Islam</option>
                      <option value="Kristen"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Kristen' ? 'selected' : '' }}>
                        Kristen
                      </option>
                      <option value="Katolik"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Katolik' ? 'selected' : '' }}>
                        Katolik
                      </option>
                      <option value="Hindu"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Hindu' ? 'selected' : '' }}>
                        Hindu</option>
                      <option value="Buddha"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Buddha' ? 'selected' : '' }}>
                        Buddha
                      </option>
                      <option value="Konghucu"
                        {{ old('agama_ayah', session('form_biodata_father.agama_ayah', $data->agama_ayah)) == 'Konghucu' ? 'selected' : '' }}>
                        Konghucu
                      </option>
                    </select>
                  </fieldset>
                </div>
                <div class="form-group">
                  <label for="penghasilan">Penghasilan</label>
                  <input type="number" class="form-control" id="penghasilan" placeholder="Rp." name="penghasilan_ayah"
                    value="{{ old('penghasilan_ayah', session('form_biodata_father.penghasilan_ayah', $data->penghasilan_ayah)) }}">
                  @error('penghasilan_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat-lahir" placeholder="" name="tempat_lahir_ayah"
                    value="{{ old('tempat_lahir_ayah', session('form_biodata_father.tempat_lahir_ayah', $data->tempat_lahir_ayah)) }}">
                  @error('tempat_lahir_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <fieldset class="form-group">
                  <label for="status">Status</label>
                  <select class="form-select" id="status" name="status_ayah">
                    <option value="Masih Hidup"
                      {{ old('status_ayah', session('form_biodata_father.status_ayah', $data->status_ayah)) == 'Masih Hidup' ? 'selected' : '' }}>
                      Masih
                      Hidup</option>
                    <option value="Sudah Wafat"
                      {{ old('status_ayah', session('form_biodata_father.status_ayah', $data->status_ayah)) == 'Sudah Wafat' ? 'selected' : '' }}>
                      Sudah
                      Wafat</option>
                  </select>
                </fieldset>
                <div class="form-group">
                  <label for="no-hp">Nomor Telepon (WA)</label>
                  <input type="number" class="form-control" id="no-hp" placeholder="08**" name="nomor_telepon_ayah"
                    value="{{ old('nomor_telepon_ayah', session('form_biodata_father.nomor_telepon_ayah', $data->nomor_telepon_ayah)) }}">
                  @error('nomor_telepon_ayah')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('santri.edit_address', ['id' => $data->id]) }}"
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
