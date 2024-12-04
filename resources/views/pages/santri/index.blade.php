@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Data Santri</h3>
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
      <div class="card">
        <div class="card-header">
          <a href="{{ route('santri.create_biodata') }}" class="btn btn-primary icon icon-left"><i
              data-feather="plus"></i> Tambah
            Santri</a>
          <div class="btn-group">
            <div class="dropdown">
              <button class="btn btn-success icon icon-left dropdown-toggle me-1" type="button"
                id="dropdownMenuExportImport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                Import dan Export
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuExportImport">
                <a class="dropdown-item" href="#">Import Data</a>
                <a class="dropdown-item" href="#">Export Data</a>
              </div>
            </div>
          </div>
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
                  <a href="#" class="btn icon"><i class="bi bi-eye"></i></a>
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
              <tr>
                <td>Nathaniel</td>
                <td>Perempuan</td>
                <td>(012165) 76278</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                  <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                  <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>Darius</td>
                <td>Laki-Laki</td>
                <td>0309 690 7871</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                  <a href="#" class="btn icon"><i class="bi bi-pencil"></i></a>
                  <a href="#" class="btn icon"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>Oleg</td>
                <td>Laki-Laki</td>
                <td>0500 441046</td>
                <td><span class="badge bg-danger">InActive</span></td>
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
