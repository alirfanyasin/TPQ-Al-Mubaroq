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
          <div class="d-flex justify-content-between align-items-center">
            <!-- Tombol Absensi -->
            <div class="d-flex align-items-center">
              @if ($absensiHistory)
                <button id="absensiButton" class="btn btn-primary me-2" style="margin-top: 20px" type="button">Sudah Absensi Hari ini</button>
              @else
                <a href="{{ route('absensi.store') }}" class="btn btn-primary me-2" style="margin-top: 20px">Input Absensi Baru</a>
              @endif
        
              <!-- Filter Bulan -->
              <form action="{{ route('absensi.index') }}" method="POST" class="d-flex align-items-center" style="margin-top: 20px">
                @csrf
                <div class="input-group">
                  <button class="btn btn-success" type="submit" id="button-filter">Filter Bulan</button>
                  <select class="form-select" name="bulan" id="bulan" aria-describedby="button-filter">
                      <option value="Semua" {{ request('bulan') == 'Semua' ? 'selected' : '' }}>Semua</option>
                      @foreach ($bulan as $item)
                        <option value="{{ $item }}" {{ request('bulan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                      @endforeach
                  </select>
                </div>
              </form>
            </div>
        
            <!-- Tanggal Hari Ini -->
            <div>
              <h5 class="card-title text-uppercase text-muted mb-0">Tanggal Hari ini:</h5>
              <span class="h2 font-weight-bold mb-0">{{ $date }}</span>
            </div>
          </div>
        </div>

        <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Hari, Tanggal</th>
              <th class="text-center">Jumlah Sesi</th>
              <th class="text-center">Jumlah Masuk</th>
              <th class="text-center">Jumlah Tidak Masuk</th>
              <th class="text-center">Menu</th>
            </tr>
          <thead>
          <tbody>
            @foreach ($absensi as $row)
              <tr>
                <td class="text-center">{{$row->id }}</td>
                <td class="text-center">{{$row->tanggal }}</td>
                <td class="text-center">{{$row->jumlah_sesi }}</td>
                <td class="text-center">{{$row->jumlah_masuk }}</td>
                <td class="text-center">{{$row->jumlah_tidak }}</td>
                <td class="text-center edit">
                    <button class="btn icon" title="edit" onclick="event.stopPropagation(); window.location.href='{{ route('absensi.edit', ['id' => $row->id]) }}'" style="cursor: pointer">
                    <i class="bi bi-pencil"></i>
                  </button>
                </td>
              </tr>
            @endforeach   
          </tbody>
        </table>
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
@endpush
