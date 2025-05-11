@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tambah Data Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data Santri</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('santri.store_biodata') }}" method="POST">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Santri</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama-lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama-lengkap" name="nama_lengkap" placeholder=""
                    value="{{ old('nama_lengkap', session('form_biodata_santri.nama_lengkap')) }}">
                  @error('nama_lengkap')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" placeholder=""
                    value="{{ old('tempat_lahir', session('form_biodata_santri.tempat_lahir')) }}">
                  @error('tempat_lahir')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="agama" name="agama">
                      <option value="Islam"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Islam' ? 'selected' : '' }}>
                        Islam</option>
                      <option value="Kristen"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Kristen' ? 'selected' : '' }}>Kristen
                      </option>
                      <option value="Katolik"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Katolik' ? 'selected' : '' }}>Katolik
                      </option>
                      <option value="Hindu"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Hindu' ? 'selected' : '' }}>
                        Hindu</option>
                      <option value="Buddha"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Buddha' ? 'selected' : '' }}>Buddha
                      </option>
                      <option value="Konghucu"
                        {{ old('agama', session('form_biodata_santri.agama')) == 'Konghucu' ? 'selected' : '' }}>Konghucu
                      </option>
                    </select>
                  </fieldset>
                  @error('agama')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="abk">Anak Berkebutuhan Khusus</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="abk" name="abk">
                      <option value="Tidak"
                        {{ old('abk', session('form_biodata_santri.abk')) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                      <option value="Iya"
                        {{ old('abk', session('form_biodata_santri.abk')) == 'Iya' ? 'selected' : '' }}>Iya</option>
                    </select>
                  </fieldset>
                  @error('abk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="NIK">NIK</label>
                  <input type="number" class="form-control" id="NIK" name="nik" placeholder=""
                    value="{{ old('nik', session('form_biodata_santri.nik')) }}">
                  @error('nik')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tgl-lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl-lahir" name="tanggal_lahir" placeholder=""
                    value="{{ old('tanggal_lahir', session('form_biodata_santri.tanggal_lahir')) }}">
                  @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jenis-tinggal">Jenis Tempat Tinggal</label>
                  <input type="text" class="form-control" id="jenis-tinggal" name="jenis_tempat_tinggal"
                    placeholder="Rumah / Apartemen / Kontrakan"
                    value="{{ old('jenis_tempat_tinggal', session('form_biodata_santri.jenis_tempat_tinggal')) }}">
                  @error('jenis_tempat_tinggal')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kwn">Kewarganegaraan</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="kwn" name="kewarganegaraan">
                      <option value="WNI"
                        {{ old('kewarganegaraan', session('form_biodata_santri.kewarganegaraan')) == 'WNI' ? 'selected' : '' }}>
                        WNI</option>
                      <option value="WNA"
                        {{ old('kewarganegaraan', session('form_biodata_santri.kewarganegaraan')) == 'WNA' ? 'selected' : '' }}>
                        WNA</option>
                    </select>
                  </fieldset>
                  @error('kewarganegaraan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="nomor-induk">NIS</label>
                  <input type="number" class="form-control" id="nomor-induk" name="nomor_induk" placeholder=""
                    value="{{ old('nomor_induk', session('form_biodata_santri.nomor_induk') ?? $data_nis->nomor_induk + 1) }}" readonly>
                  @error('nomor_induk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jenis-kelamin">Jenis Kelamin</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="jenis-kelamin" name="jenis_kelamin">
                      <option value="Laki-Laki"
                        {{ old('jenis_kelamin', session('form_biodata_santri.jenis_kelamin')) == 'Laki-Laki' ? 'selected' : '' }}>
                        Laki-Laki</option>
                      <option value="Perempuan"
                        {{ old('jenis_kelamin', session('form_biodata_santri.jenis_kelamin')) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan</option>
                    </select>
                  </fieldset>
                  @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="anak-ke">Anak Ke-</label>
                  <input type="number" class="form-control" id="anak-ke" name="anak_ke" placeholder=""
                    value="{{ old('anak_ke', session('form_biodata_santri.anak_ke')) }}">
                  @error('anak_ke')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="no-hp">Nomor Telepon (WA)</label>
                  <input type="number" class="form-control" id="no-hp" name="nomor_telepon" placeholder="08**"
                    value="{{ old('nomor_telepon', session('form_biodata_santri.nomor_telepon')) }}">
                  @error('nomor_telepon')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="mt-3 justify-content-end d-flex">
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
