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
    <form action="{{ route('asatidz.store_biodata') }}" method="POST">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Asatidz</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama-lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama-lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap', session('form_biodata.nama_lengkap')) }}" placeholder="">
                  @error('nama_lengkap')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" placeholder=""
                    value="{{ old('tempat_lahir', session('form_biodata.tempat_lahir')) }}">
                  @error('tempat_lahir')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <select class="form-select" id="agama" name="agama">
                    <option value="Islam" {{ old('agama', session('form_biodata.agama')) == 'Islam' ? 'selected' : '' }}>
                      Islam</option>
                    <option value="Kristen"
                      {{ old('agama', session('form_biodata.agama')) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik"
                      {{ old('agama', session('form_biodata.agama')) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', session('form_biodata.agama')) == 'Hindu' ? 'selected' : '' }}>
                      Hindu</option>
                    <option value="Buddha"
                      {{ old('agama', session('form_biodata.agama')) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu"
                      {{ old('agama', session('form_biodata.agama')) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                  </select>
                  @error('agama')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <fieldset class="form-group">
                  <label for="pendidikan-terakhir">Pendidikan Terakhir</label>
                  <select class="form-select" id="pendidikan-terakhir" name="pendidikan_terakhir">
                    <option value="Tidak Ada"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'Tidak Ada' ? 'selected' : '' }}>
                      Tidak Ada</option>
                    <option value="SD Sederajat"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'SD Sederajat' ? 'selected' : '' }}>
                      SD Sederajat</option>
                    <option value="SMP Sederajat"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'SMP Sederajat' ? 'selected' : '' }}>
                      SMP Sederajat</option>
                    <option value="SMA Sederajat"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'SMA Sederajat' ? 'selected' : '' }}>
                      SMA Sederajat</option>
                    <option value="D3"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'D3' ? 'selected' : '' }}>
                      D3</option>
                    <option value="D4"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'D4' ? 'selected' : '' }}>
                      D4</option>
                    <option value="S1"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'S1' ? 'selected' : '' }}>
                      S1</option>
                    <option value="S2"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'S2' ? 'selected' : '' }}>
                      S2</option>
                    <option value="S3"
                      {{ old('pendidikan_terakhir', session('form_biodata.pendidikan_terakhir')) == 'S3' ? 'selected' : '' }}>
                      S3</option>
                  </select>
                  @error('pendidikan_terakhir')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </fieldset>

                <div class="form-group">
                  <label for="nkk">Nomor Kartu Keluarga</label>
                  <input type="number" class="form-control" id="nkk" name="nomor_kk" placeholder=""
                    value="{{ old('nomor_kk', session('form_biodata.nomor_kk')) }}">
                  @error('nomor_kk')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor-rekening">Nomor Rekening</label>
                  <input type="number" class="form-control" id="nomor-rekening" name="nomor_rekening" placeholder=""
                    value="{{ old('nomor_rekening', session('form_biodata.nomor_rekening')) }}">
                  @error('nomor_rekening')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama-ibu">Nama Ibu</label>
                  <input type="text" class="form-control" id="nama-ibu" name="nama_ibu" placeholder=""
                    value="{{ old('nama_ibu', session('form_biodata.nama_ibu')) }}">
                  @error('nama_ibu')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="NIK">NIK</label>
                  <input type="number" class="form-control" id="NIK" name="nik" placeholder=""
                    value="{{ old('nik', session('form_biodata.nik')) }}">
                  @error('nik')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tanggal-lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', session('form_biodata.tanggal_lahir')) }}">
                  @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder=""
                    value="{{ old('jabatan', session('form_biodata.jabatan')) }}">
                  @error('jabatan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder=""
                    value="{{ old('jurusan', session('form_biodata.jurusan')) }}">
                  @error('jurusan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kwn">Kewarganegaraan</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="kwn" name="kewarganegaraan">
                      <option value="WNI"
                        {{ old('kewarganegaraan', session('form_biodata.kewarganegaraan')) == 'WNI' ? 'selected' : '' }}>
                        WNI</option>
                      <option value="WNA"
                        {{ old('kewarganegaraan', session('form_biodata.kewarganegaraan')) == 'WNA' ? 'selected' : '' }}>
                        WNA</option>
                    </select>
                    @error('kewarganegaraan')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </fieldset>
                </div>

                <div class="form-group">
                  <label for="status-asatidz">Status Asatidz</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="status-asatidz" name="status">
                      <option value="Tetap"
                        {{ old('status', session('form_biodata.status')) == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                      <option value="Magang"
                        {{ old('status', session('form_biodata.status')) == 'Magang' ? 'selected' : '' }}>Magang</option>
                    </select>
                    @error('status')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </fieldset>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan <i>(optional)</i></label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan"
                    value="{{ old('keterangan', session('form_biodata.keterangan')) }}">
                  @error('keterangan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="nomor-pokok-anggota">Nomor Pokok Anggota</label>
                  <input type="number" class="form-control" id="nomor-pokok-anggota" name="nomor_pokok_anggota"
                    value="{{ old('nomor_pokok_anggota', session('form_biodata.nomor_pokok_anggota')) }}">
                  @error('nomor_pokok_anggota')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jenis-kelamin">Jenis Kelamin</label>
                  <fieldset class="form-group">
                    <select class="form-select" id="jenis-kelamin" name="jenis_kelamin">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </fieldset>
                </div>
                <div class="form-group">
                  <label for="npwp">NPWP</label>
                  <input type="number" class="form-control" id="npwp" name="npwp" placeholder=""
                    value="{{ old('npwp', session('form_biodata.npwp')) }}">
                  @error('npwp')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tahun-lulus">Tahun Lulus</label>
                  <input type="number" class="form-control" id="tahun-lulus" name="tahun_lulus" placeholder=""
                    value="{{ old('tahun_lulus', session('form_biodata.tahun_lulus')) }}">
                  @error('tahun_lulus')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor-jamsos">Nomor Jamsos</label>
                  <input type="number" class="form-control" id="nomor-jamsos" name="nomor_jamsos" placeholder=""
                    value="{{ old('nomor_jamsos', session('form_biodata.nomor_jamsos')) }}">
                  @error('nomor_jamsos')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="no-hp">Nomor Telepon (WA)</label>
                  <input type="number" class="form-control" id="no-hp" name="nomor_telepon" placeholder="08**"
                    value="{{ old('nomor_telepon', session('form_biodata.nomor_telepon')) }}">
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
