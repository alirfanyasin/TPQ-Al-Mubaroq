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
                aria-selected="false">Kelas</a>

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
              <div class="tab-pane fade" id="penggajian" role="tabpanel" aria-labelledby="penggajian-tab">
                <section class="section">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Penggajian Asatidz Tetap</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gaji-pokok">Gaji Pokok</label>
                            <input type="number" class="form-control" id="gaji-pokok" placeholder="Rp.">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gaji-per-sesi">Gaji Per Sesi</label>
                            <input type="number" class="form-control" id="gaji-per-sesi" placeholder="Rp.">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Penggajian Asatidz Magang</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gaji-pokok">Gaji Pokok</label>
                            <input type="number" class="form-control" id="gaji-pokok" placeholder="Rp.">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gaji-per-sesi">Gaji Per Sesi</label>
                            <input type="number" class="form-control" id="gaji-per-sesi" placeholder="Rp.">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="kenaikan-gaji">Kenaikan Gaji Asatidz</label>
                            <input type="number" class="form-control" id="kenaikan-gaji" placeholder="Rp.">
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
              {{-- Penggajian Asatidz End --}}


              {{-- Jilid Start --}}
              @include('pages.setting_section.jilid')
              {{-- Jilid End --}}


              {{-- Kelas Start --}}
              <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
                <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>
                  Wajib membuat data jilid terlebih dahulu sebelum membuat kelas
                </div>

                <section class="section">
                  <div class="row" id="basic-table">
                    <div class="card">
                      <div class="text-end">
                        <button type="button" class="btn btn-primary d-inline-block icon icon-left "
                          data-bs-toggle="modal" data-bs-target="#tambahKelasModal"><i data-feather="plus"></i>
                          Tambah</button>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-lg">
                              <thead>
                                <tr>
                                  <th>Nama Kelas</th>
                                  <th>Nama Jilid</th>
                                  <th>Nama Asatid (Wali Kelas) </th>
                                  <th width="200px">Menu</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="text-bold-500">2A</td>
                                  <td class="text-bold-500">1</td>
                                  <td class="text-bold-500">Muhammad</td>
                                  <td>
                                    <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-bold-500">2B</td>
                                  <td class="text-bold-500">1</td>
                                  <td class="text-bold-500">Agus Hendoko</td>
                                  <td>
                                    <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-bold-500">1A</td>
                                  <td class="text-bold-500">Qur'an</td>
                                  <td class="text-bold-500">Agus Hendoko</td>
                                  <td>
                                    <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-bold-500">8A</td>
                                  <td class="text-bold-500">Hadist</td>
                                  <td class="text-bold-500">Rahman Hidayatullah</td>
                                  <td>
                                    <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-bold-500">8B</td>
                                  <td class="text-bold-500">Hadist</td>
                                  <td class="text-bold-500">Muarif Hermawan</td>
                                  <td>
                                    <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Modal start --}}
                  <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog"
                    aria-labelledby="tambahKelasModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="tambahKelasModalTitle">Tambah Kelas
                          </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama-kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama-kelas">
                          </div>
                          <fieldset class="form-group">
                            <label for="nama-jilid">Pilih Nama Jilid</label>
                            <select class="form-select" id="nama-jilid">
                              <option>1</option>
                              <option>2</option>
                              <option>Qur'an</option>
                              <option>Hadist</option>
                            </select>
                          </fieldset>
                          <fieldset class="form-group">
                            <label for="nama-asatidz">Pilih Nama Asatidz</label>
                            <select class="form-select" id="nama-asatidz">
                              <option>Muhammad</option>
                              <option>Agus Hendoko</option>
                              <option>Rahman Hidayatullah</option>
                              <option>Muarif Hermawan</option>
                            </select>
                          </fieldset>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                          </button>
                          <button type="button" class="ml-1 btn btn-primary" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- Modal end --}}
                </section>
              </div>
              {{-- Kelas End --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
