@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Pengaturan</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
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
              @include('pages.setting_section.biodata_lembaga')
              {{-- Lembaga End --}}


              {{-- Biodata Kepala Start --}}
              @include('pages.setting_section.biodata_kepala')
              {{-- Biodata Kepala End --}}


              {{-- Operasional Lembaga Start --}}
              @include('pages.setting_section.operasional_lembaga')
              {{-- Operasional Lembaga End --}}


              {{-- Alamat Lembaga Start --}}
              @include('pages.setting_section.alamat_lembaga')
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
