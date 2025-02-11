@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Absensi Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Absensi Asatidz</li>
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
            <h5 class="card-title text-uppercase text-muted mb-0">Tanggal Absensi:</h5>
            <span class="h2 font-weight-bold mb-0">{{ $date }}</span>
          </div>
        </div>
        <form action="{{ route('absensi.update', $absensiH->id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="card-body">
            <input type="hidden" name="tanggal" value="{{ $date }}">
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
                    <td class="text-center">{{ $row->asatidz_id }}</td>
                    <td>{{ $row->asatidz->nama_lengkap }}</td>
                    <td class="text-center">{{ $row->asatidz->status }}</td>
                    <td class="text-center">
                      <input min="0" type="number" name="absensi[{{ $row->asatidz_id }}][jumlah_sesi]"
                        value="{{ $row->jumlah_sesi }}" class="form-control text-center">
                    </td>
                    <td class="text-center">
                      <input type="radio" name="absensi[{{ $row->asatidz_id }}][status]" value="masuk" class="form-check-input"
                        @if (isset($row['jumlah_masuk']) && $row['jumlah_masuk']) checked @endif>
                    </td>
                    <td class="text-center">
                      <input type="radio" name="absensi[{{ $row->asatidz_id }}][status]" value="tidak_masuk" class="form-check-input" 
                        @if (isset($row['jumlah_tidak']) && $row['jumlah_tidak']) checked @endif>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Edit Absensi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      // Add an event listener to the radio buttons
      $('input[type="radio"]').change(function() {
        if ($(this).val() === 'masuk') {
          $(this).closest('tr').find('input[type="number"]').val(1); // Set Jumlah Sesi value to 1
        }else if ($(this).val() === 'tidak_masuk') {
          $(this).closest('tr').find('input[type="number"]').val(0); // Clear Jumlah Sesi value for Tidak Masuk
        }
      });
    });
  </script>  
@endpush
