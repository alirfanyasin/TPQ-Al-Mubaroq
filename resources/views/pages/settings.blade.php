@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Settings</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <a class="nav-link active" id="biodata-lembaga-tab" data-bs-toggle="pill" href="#biodata-lembaga"
                role="tab" aria-controls="biodata-lembaga" aria-selected="true">Biodata Lembaga</a>

              <a class="nav-link" id="biodata-kepala-tab" data-bs-toggle="pill" href="#biodata-kepala" role="tab"
                aria-controls="biodata-kepala" aria-selected="false">Biodata Kepala</a>

              <a class="nav-link" id="operasional-lembaga-tab" data-bs-toggle="pill" href="#operasional-lembaga"
                role="tab" aria-controls="operasional-lembaga" aria-selected="false">Operasional Lembaga</a>

              <a class="nav-link" id="alamat-lembaga-tab" data-bs-toggle="pill" href="#alamat-lembaga" role="tab"
                aria-controls="alamat-lembaga" aria-selected="false">Alamat Lembaga</a>

              <a class="nav-link" id="tagihan-santri-tab" data-bs-toggle="pill" href="#tagihan-santri" role="tab"
                aria-controls="tagihan-santri" aria-selected="false">Tagihan Santri</a>


              <a class="nav-link" id="penggajian-tab" data-bs-toggle="pill" href="#penggajian" role="tab"
                aria-controls="penggajian" aria-selected="false">Penggajian Asatidz</a>

              <a class="nav-link" id="jilid-tab" data-bs-toggle="pill" href="#jilid" role="tab" aria-controls="jilid"
                aria-selected="false">Jilid</a>

              <a class="nav-link" id="kelas-tab" data-bs-toggle="pill" href="#kelas" role="tab" aria-controls="kelas"
                aria-selected="false">Pengaturan Kelas</a>

              <a class="nav-link" id="kelas-tab" data-bs-toggle="pill" href="#rapor" role="tab" aria-controls="rapor"
                aria-selected="false">Pengaturan Item Penilaian Rapor</a>

            </div>
          </div>
          <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
              {{-- Lembaga Start --}}
              <div class="tab-pane fade show active" id="biodata-lembaga" role="tabpanel"
                aria-labelledby="biodata-lembaga-tab">
                <section class="section">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Biodata Lembaga</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nama-satuan">Nama Satuan</label>
                            <input type="text" class="form-control" id="nama-satuan" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="bentuk-pendidikan">Bentuk Pendidikan</label>
                            <input type="text" class="form-control" id="bentuk-pendidikan" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-telepon-lembaga">Nomor Telepon Lembaga</label>
                            <input type="text" class="form-control" id="nomor-telepon-lembaga" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-rekening">Nomor Rekening</label>
                            <input type="text" class="form-control" id="nomor-rekening" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nama-ketua-yayasan">Nama Ketua Yayasan</label>
                            <input type="text" class="form-control" id="nama-ketua-yayasan" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="sumber-dana">Sumber Dana</label>
                            <input type="text" class="form-control" id="sumber-dana" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="tanggal-sk-pendirian">Tanggal SK Pendirian</label>
                            <input type="text" class="form-control" id="tanggal-sk-pendirian" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="jumlah-kelompok-belajar">Jumlah Kelompok Belajar</label>
                            <input type="text" class="form-control" id="jumlah-kelompok-belajar" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="npsn">NPSN</label>
                            <input type="text" class="form-control" id="npsn" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="tempat-lembaga">Tempat Lembaga</label>
                            <input type="text" class="form-control" id="tempat-lembaga" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="cabang-nomor-rekening">Cabang Nomor Rekening</label>
                            <input type="text" class="form-control" id="cabang-nomor-rekening" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nama-nomor-rekening">Nama Nomor Rekening</label>
                            <input type="text" class="form-control" id="nama-nomor-rekening" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="kepemilikan-lembaga">Kepemilikan Lembaga</label>
                            <input type="text" class="form-control" id="kepemilikan-lembaga" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="status-kepemilikan">Status Kepemilikan</label>
                            <input type="text" class="form-control" id="status-kepemilikan" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="metode-pembelajaran">Metode Pembelajaran</label>
                            <input type="text" class="form-control" id="metode-pembelajaran" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-sk-pendirian">Nomor SK Pendirian</label>
                            <input type="text" class="form-control" id="nomor-sk-pendirian" placeholder="">
                          </div>
                        </div>
                        <div class="justify-content-end d-flex">
                          <a href="#" class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                            Simpan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              {{-- Lembaga End --}}


              {{-- Biodata Kepala Start --}}
              <div class="tab-pane fade" id="biodata-kepala" role="tabpanel" aria-labelledby="biodata-kepala-tab">
                <section class="section">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Biodata Kepala</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nama-kepala">Nama Kepala</label>
                            <input type="text" class="form-control" id="nama-kepala" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-telepon-kepala">Nomor Telepon Kepala</label>
                            <input type="text" class="form-control" id="nomor-telepon-kepala" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="alamat-kepala">Alamat</label>
                            <input type="text" class="form-control" id="alamat-kepala" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" placeholder="">
                          </div>
                        </div>
                        <div class="justify-content-end d-flex">
                          <a href="#" class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                            Simpan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              {{-- Biodata Kepala End --}}


              {{-- Operasional Lembaga Start --}}
              <div class="tab-pane fade" id="operasional-lembaga" role="tabpanel"
                aria-labelledby="operasional-lembaga-tab">
                <section class="section">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Operasional Lembaga</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jam-operasional">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam-operasional" placeholder="">
                          </div>

                          <div class="form-group">
                            <label for="tanggal-izin-operasional">Tanggal Izin Operasional</label>
                            <input type="text" class="form-control" id="tanggal-izin-operasional" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="tanggal-mulai-izin-operasional">Tanggal Mulai Izin Operasional</label>
                            <input type="text" class="form-control" id="tanggal-mulai-izin-operasional"
                              placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="hari-operasional">Hari Operasional</label>
                            <input type="text" class="form-control" id="hari-operasional" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="biaya-operasional">Biaya Operasional</label>
                            <input type="text" class="form-control" id="biaya-operasional" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-izin-operasional">Nomor Izin Operasional</label>
                            <input type="text" class="form-control" id="nomor-izin-operasional" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="tanggal-selesai-operasional">Tanggal Selesai Operasional</label>
                            <input type="text" class="form-control" id="tanggal-selesai-operasional"
                              placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="nomor-statistik">Nomor Statistik</label>
                            <input type="text" class="form-control" id="nomor-statistik" placeholder="">
                          </div>
                        </div>
                        <div class="justify-content-end d-flex">
                          <a href="#" class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                            Simpan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              {{-- Operasional Lembaga End --}}


              {{-- Alamat Lembaga Start --}}
              <div class="tab-pane fade" id="alamat-lembaga" role="tabpanel" aria-labelledby="alamat-lembaga-tab">
                <section class="section">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Alamat Lembaga</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="detail-alamat">Detail Alamat</label>
                            <input type="text" class="form-control" id="detail-alamat"
                              placeholder="Jl. nama jalan, No.00">
                          </div>
                          <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" id="rt" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="garis-bujur">Garis Bujur</label>
                            <input type="text" class="form-control" id="garis-bujur" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelurahan-atau-desa">Kelurahan / Desa</label>
                            <input type="text" class="form-control" id="kelurahan-atau-desa" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" id="rw" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="garis-lintang">Garis Lintang</label>
                            <input type="text" class="form-control" id="garis-lintang" placeholder="">
                          </div>
                        </div>
                        <div class="justify-content-end d-flex">
                          <a href="#" class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                            Simpan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              {{-- Alamat Lembaga End --}}


              {{-- Tagihan Santri Start --}}
              @include('pages.setting_section.tagihan_santri')
              {{-- Tagihan Santri End --}}


              {{-- Penggajian Asatidz Start --}}
              @include('pages.setting_section.gaji')
              {{-- Penggajian Asatidz End --}}


              {{-- Jilid Start --}}
              @include('pages.setting_section.jilid')
              {{-- Jilid End --}}


              {{-- Kelas Start --}}
              @include('pages.setting_section.kelas')
              {{-- Kelas End --}}

              {{-- Rapor Start --}}
              @include('pages.setting_section.rapor_item')
              {{-- Rapor End --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
