@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Dashboard</h3>
      <p class="text-subtitle text-muted">Halo, selamat datang {{ auth()->user()->name }}</p>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-8">
        <div class="row">
          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="px-4 card-body py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="mb-2 stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="font-semibold text-muted">Total Santri</h6>
                    <h6 class="mb-0 font-extrabold">{{ $total_santri }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="px-4 card-body py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="mb-2 stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="font-semibold text-muted">Total Asatidz</h6>
                    <h6 class="mb-0 font-extrabold">{{ $total_asatidz }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
              <div class="px-4 card-body py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="mb-2 stats-icon red">
                      <i class="iconly-boldBookmark"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="font-semibold text-muted">Total Kelas</h6>
                    <h6 class="mb-0 font-extrabold">{{ $total_kelas }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tagihan Bulanan</h4>
              </div>
              <div class="card-body">
                <div id="chart-profile-visit"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <h4>Aktifitas Terakhir</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-lg">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Aktifitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($activity_logs as $activity)
                        <tr>
                          <td class="col-3">
                            <div class="d-flex align-items-center">
                              <div class="avatar avatar-md">
                                <img src="/template/assets/images/faces/5.jpg">
                              </div>
                              <p class="mb-0 font-bold ms-3">{{ $activity->user->name }}</p>
                            </div>
                          </td>
                          <td class="col-auto">
                            <p class="mb-0 ">{{ $activity->description }}</p>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Pengguna Aktif</h4>
          </div>
          <div class="pb-4 card-content">
            <div class="px-4 py-3 recent-message d-flex">
              <div class="avatar avatar-lg">
                <img src="/template/assets/images/faces/4.jpg">
              </div>
              <div class="name ms-4">
                <h5 class="mb-1">Hank Schrader</h5>
                <h6 class="mb-0 text-muted">@johnducky</h6>
              </div>
            </div>
            <div class="px-4 py-3 recent-message d-flex">
              <div class="avatar avatar-lg">
                <img src="/template/assets/images/faces/5.jpg">
              </div>
              <div class="name ms-4">
                <h5 class="mb-1">Dean Winchester</h5>
                <h6 class="mb-0 text-muted">@imdean</h6>
              </div>
            </div>
            <div class="px-4 py-3 recent-message d-flex">
              <div class="avatar avatar-lg">
                <img src="/template/assets/images/faces/1.jpg">
              </div>
              <div class="name ms-4">
                <h5 class="mb-1">John Dodol</h5>
                <h6 class="mb-0 text-muted">@dodoljohn</h6>
              </div>
            </div>
            <div class="px-4">
              <button class='mt-3 font-bold btn btn-block btn-xl btn-outline-primary'>Start Conversation</button>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Visitors Profile</h4>
          </div>
          <div class="card-body">
            <div id="chart-visitors-profile"></div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
  <script src="/template/assets/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="/template/assets/js/pages/dashboard.js"></script>
@endpush
