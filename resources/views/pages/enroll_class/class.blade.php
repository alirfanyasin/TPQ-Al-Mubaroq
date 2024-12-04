@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Kelas 2A - Jilid 1</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kelas</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Hermin Agustiningsih, S.Pd</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon (WA)</th>
                <th>Status</th>
                <th>Menu</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Graiden</td>
                <td>Laki-Laki</td>
                <td>076 4820 8838</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                  {{-- <a href="#" class="btn icon"><i class="bi bi-eye"></i></a> --}}
                  <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                  <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>Dale</td>
                <td>Perempuan</td>
                <td>0500 527693</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                  <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                  <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
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
