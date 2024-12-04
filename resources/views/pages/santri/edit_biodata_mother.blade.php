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
    <form action="{{ route('santri.update_biodata_mother', ['id' => $data->id]) }}" method="POST">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Ibu</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama-lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama-lengkap" placeholder="" name="nama_lengkap_ibu"
                    value="{{ old('nama_lengkap_ibu', session('form_biodata_mother.nama_lengkap_ibu', $data->nama_lengkap_ibu)) }}">
                  @error('nama_lengkap_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tgl-lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl-lahir" placeholder="" name="tanggal_lahir_ibu"
                    value="{{ old('tanggal_lahir_ibu', session('form_biodata_mother.tanggal_lahir_ibu', $data->tanggal_lahir)) }}">
                  @error('tanggal_lahir_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="pekerjaan" placeholder="" name="pekerjaan_ibu"
                    value="{{ old('pekerjaan_ibu', session('form_biodata_mother.pekerjaan_ibu', $data->pekerjaan_ibu)) }}">
                  @error('pekerjaan_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="NIK">NIK</label>
                  <input type="number" class="form-control" id="NIK" placeholder="" name="nik_ibu"
                    value="{{ old('nik_ibu', session('form_biodata_mother.nik_ibu', $data->nik)) }}">
                  @error('nik_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="agama" name="agama_ibu">
                      <option value="Islam"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Islam' ? 'selected' : '' }}>
                        Islam</option>
                      <option value="Kristen"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Kristen' ? 'selected' : '' }}>
                        Kristen
                      </option>
                      <option value="Katolik"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Katolik' ? 'selected' : '' }}>
                        Katolik
                      </option>
                      <option value="Hindu"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Hindu' ? 'selected' : '' }}>
                        Hindu</option>
                      <option value="Buddha"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Buddha' ? 'selected' : '' }}>
                        Buddha
                      </option>
                      <option value="Konghucu"
                        {{ old('agama_ibu', session('form_biodata_mother.agama_ibu', $data->agama_ibu)) == 'Konghucu' ? 'selected' : '' }}>
                        Konghucu
                      </option>
                    </select>
                  </fieldset>
                </div>
                <div class="form-group">
                  <label for="penghasilan">Penghasilan</label>
                  <input type="number" class="form-control" id="penghasilan" placeholder="Rp." name="penghasilan_ibu"
                    value="{{ old('penghasilan_ibu', session('form_biodata_mother.penghasilan_ibu', $data->penghasilan_ibu)) }}">
                  @error('penghasilan_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat-lahir" placeholder="" name="tempat_lahir_ibu"
                    value="{{ old('tempat_lahir_ibu', session('form_biodata_mother.tempat_lahir_ibu', $data->tempat_lahir_ibu)) }}">
                  @error('tempat_lahir_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <fieldset class="form-group">
                  <label for="status">Status</label>
                  <select class="form-select" id="status" name="status_ibu">
                    <option value="Masih Hidup"
                      {{ old('status_ibu', session('form_biodata_mother.status_ibu', $data->status_ibu)) == 'Masih Hidup' ? 'selected' : '' }}>
                      Masih
                      Hidup</option>
                    <option value="Sudah Wafat"
                      {{ old('status_ibu', session('form_biodata_mother.status_ibu', $data->status_ibu)) == 'Sudah Wafat' ? 'selected' : '' }}>
                      Sudah
                      Wafat</option>
                  </select>
                </fieldset>
                <div class="form-group">
                  <label for="no-hp">Nomor Telepon (WA)</label>
                  <input type="number" class="form-control" id="no-hp" placeholder="08**" name="nomor_telepon_ibu"
                    value="{{ old('nomor_telepon_ibu', session('form_biodata_mother.nomor_telepon_ibu', $data->nomor_telepon)) }}">
                  @error('nomor_telepon_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('santri.edit_biodata_father', ['id' => $data->id]) }}"
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
