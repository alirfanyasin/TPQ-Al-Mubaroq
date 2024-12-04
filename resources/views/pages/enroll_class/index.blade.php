@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Enroll Kelas</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Santri</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">

    <section class="section">
      <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="px-4 card-body py-4-5">
              <div class="row position-relativ">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
                  <div class="mb-2 stats-icon red">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-8 e">
                  <h6 class="font-semibold text-muted">1A - Jilid 1</h6>
                  <h6 class="mb-0 font-extrabold">23</h6>

                  <div class="px-1 text-white position-absolute rounded-pill bg-primary"
                    style="right: 10px; bottom: 10px;">
                    <a href="" class="text-white"><i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="px-4 card-body py-4-5">
              <div class="row position-relativ">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
                  <div class="mb-2 stats-icon red">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-8 e">
                  <h6 class="font-semibold text-muted">1A - Jilid 1</h6>
                  <h6 class="mb-0 font-extrabold">23</h6>

                  <div class="px-1 text-white position-absolute rounded-pill bg-primary"
                    style="right: 10px; bottom: 10px;">
                    <a href="" class="text-white"><i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="px-4 card-body py-4-5">
              <div class="row position-relativ">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
                  <div class="mb-2 stats-icon red">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-8 e">
                  <h6 class="font-semibold text-muted">1A - Jilid 1</h6>
                  <h6 class="mb-0 font-extrabold">23</h6>

                  <div class="px-1 text-white position-absolute rounded-pill bg-primary"
                    style="right: 10px; bottom: 10px;">
                    <a href="" class="text-white"><i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="px-4 card-body py-4-5">
              <div class="row position-relativ">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
                  <div class="mb-2 stats-icon red">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-8 e">
                  <h6 class="font-semibold text-muted">1A - Jilid 1</h6>
                  <h6 class="mb-0 font-extrabold">23</h6>

                  <div class="px-1 text-white position-absolute rounded-pill bg-primary"
                    style="right: 10px; bottom: 10px;">
                    <a href="" class="text-white"><i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Santri Belum Memiliki Kelas</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon (WA)</th>
                <th>Menu</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Graiden</td>
                <td>Laki-Laki</td>
                <td>076 4820 8838</td>
                <td>
                  <a href="#" class="btn btn-primary">Enroll</a>
                </td>
              </tr>
              <tr>
                <td>Dale</td>
                <td>Perempuan</td>
                <td>0500 527693</td>
                <td>
                  <a href="#" class="btn btn-primary">Enroll</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
@endSection
@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
@endpush
