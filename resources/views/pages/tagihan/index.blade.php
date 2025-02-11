@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tagihan Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tagihan Santri</li>
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
          <a href="{{ route('santri.history_tagihan_bulanan') }}" class="btn btn-primary icon icon-left">Riwayat Tagihan
            Bulanan</a>
          {{-- <div class="btn-group">
            <div class="dropdown">
              <button class="btn btn-success icon icon-left dropdown-toggle me-1" type="button"
                id="dropdownMenuExportImport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                Import dan Export
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuExportImport">
                <a class="dropdown-item" href="{{ route('santri.donwload_template') }}">Import Data</a>
                <a class="dropdown-item" href="{{ route('santri.export') }}">Export Data</a>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tagihan Pendaftaran</th>
                <th>Tagihan Seragam</th>
                <th>Tagihan Bulanan</th>
                <th>Menu</th>
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
                  <td>{{ $data->jenis_kelamin }}</td>
                  <td><span
                      class="badge {{ $data->tagihanPendaftaran->status == 'Belum Lunas' ? 'bg-danger' : 'bg-success' }}">{{ $data->tagihanPendaftaran->status }}</span>
                  </td>
                  <td><span
                      class="badge {{ $data->tagihanSeragam->status == 'Belum Lunas' ? 'bg-danger' : 'bg-success' }}">{{ $data->tagihanSeragam->status }}</span>
                  </td>
                  <td>
                    @if ($data->tagihanBulanIni)
                      <!-- Menampilkan tagihan bulan ini yang statusnya 'Belum Lunas' -->
                      <span
                        class="badge {{ $data->tagihanBulanIni->status == 'Belum Lunas' ? 'bg-danger' : 'bg-success' }}">
                        {{ $data->tagihanBulanIni->status }}
                      </span>

                      <span class="badge bg-secondary">
                        {{ \Carbon\Carbon::parse($data->tagihanBulanIni->date)->format('d-M-Y') }}
                      </span>
                    @else
                      <span
                        class="badge {{ $data->tagihanBulanan->status == 'Belum Lunas' ? 'bg-danger' : 'bg-success' }}">{{ $data->tagihanBulanan->status }}</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('santri.show', ['id' => $data->id]) }}" class="btn icon" title="Detail Santri"><i
                        class="bi bi-eye"></i></a>
                    <a href="{{ route('tagihan.pembayaran', ['id' => $data->id, 'nama_lengkap' => $data->nama_lengkap]) }}"
                      class="btn icon" title="Bayar Tagihan"><i class="bi bi-cash-coin"></i></a>
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
