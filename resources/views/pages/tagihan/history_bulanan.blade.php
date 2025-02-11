@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>History Tagihan Bulanan</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">History Tagihan Bulanan</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-header d-flex">
          <form action="{{ route('santri.history_tagihan_bulanan') }}" method="POST">
            @csrf
            <div class="d-inline-block">
              <div class="input-group">
                <button class="btn btn-success" type="submit" id="button-print">Filter Bulan</button>
                <select class="form-select" name="bulan" aria-describedby="button-print">
                  <option value="Semua" {{ old('bulan', $bulan ?? 'Semua') == 'Semua' ? 'selected' : '' }}>Semua</option>
                  <option value="01" {{ old('bulan', $bulan ?? '') == '01' ? 'selected' : '' }}>Januari</option>
                  <option value="02" {{ old('bulan', $bulan ?? '') == '02' ? 'selected' : '' }}>Februari</option>
                  <option value="03" {{ old('bulan', $bulan ?? '') == '03' ? 'selected' : '' }}>Maret</option>
                  <option value="04" {{ old('bulan', $bulan ?? '') == '04' ? 'selected' : '' }}>April</option>
                  <option value="05" {{ old('bulan', $bulan ?? '') == '05' ? 'selected' : '' }}>Mei</option>
                  <option value="06" {{ old('bulan', $bulan ?? '') == '06' ? 'selected' : '' }}>Juni</option>
                  <option value="07" {{ old('bulan', $bulan ?? '') == '07' ? 'selected' : '' }}>Juli</option>
                  <option value="08" {{ old('bulan', $bulan ?? '') == '08' ? 'selected' : '' }}>Agustus</option>
                  <option value="09" {{ old('bulan', $bulan ?? '') == '09' ? 'selected' : '' }}>September</option>
                  <option value="10" {{ old('bulan', $bulan ?? '') == '10' ? 'selected' : '' }}>Oktober</option>
                  <option value="11" {{ old('bulan', $bulan ?? '') == '11' ? 'selected' : '' }}>November</option>
                  <option value="12" {{ old('bulan', $bulan ?? '') == '12' ? 'selected' : '' }}>Desember</option>
                </select>
              </div>
            </div>
          </form>

        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tagihan Bulanan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($datas as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->santri->nama_lengkap }}</td>
                  <td>{{ $data->santri->jenis_kelamin }}</td>
                  <td><span class="badge bg-secondary">
                      {{ \Carbon\Carbon::parse($data->date)->format('d-M-Y') }}</span>
                  </td>
                  <td><span class="badge {{ $data->status == 'Belum Lunas' ? 'bg-danger' : 'bg-success' }}">
                      {{ $data->status }}</span>
                  </td>
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
