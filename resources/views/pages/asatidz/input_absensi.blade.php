@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Input Absensi Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Input Absensi Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-body pb-0">
          <div>
            <h5 class="card-title text-uppercase text-muted mb-1">Tanggal Hari ini:</h5>
            <span class="h2 font-weight-bold mb-0">{{ $date }}</span>
          </div>
        </div>
        <form method="POST" action="{{ route('absensi.store') }}">
          @csrf
          <div class="card-body">
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Status Keanggotaan</th>
                  <th class="text-center">Jumlah Sesi</th>
                  <th class="text-center">Masuk</th>
                  <th class="text-center">Tidak Masuk</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($absensi as $row)
                  <tr>
                    <td class="text-center">{{ $row->id }}</td>
                    <td>{{ $row->nama_lengkap }}</td>
                    <td class="text-center">{{ $row->status }}</td>
                    <td class="text-center">
                      <input min="0" type="number" name="absensi[{{ $row->id }}][jumlah_sesi]"
                      value="1" class="form-control text-center">
                    </td>
                    <td class="text-center">
                      <input type="radio" name="absensi[{{ $row->id }}][status]" value="masuk"
                      class="form-check-input" checked>
                    </td>
                    <td class="text-center">
                      <input type="radio" name="absensi[{{ $row->id }}][status]" value="tidak_masuk"
                      class="form-check-input">
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="text-center mb-4">
            <button type="submit" class="btn btn-primary">Submit Absensi</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on('change', 'input[type="radio"]', function() {
        const jumlahSesiInput = $(this).closest('tr').find('input[type="number"]');
        jumlahSesiInput.val($(this).val() === 'masuk' ? 1 : 0); // Update value based on selection
      });
    });
  </script>
@endpush
