@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Data Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Asatidz</li>
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
          <a href="{{ route('asatidz.create.biodata') }}" class="btn btn-primary icon icon-left"><i
              data-feather="plus"></i> Tambah
            Asatidz</a>
          <a href="" class="btn btn-secondary icon icon-left">
            <i class="bi bi-people"></i>
            Akun Asatidz
          </a>
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
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($datas as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama_lengkap }}</td>
                  <td>{{ $data->user->username }}</td>
                  <td>{{ $data->user->email }}</td>
                </tr>
              @endforeach
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
