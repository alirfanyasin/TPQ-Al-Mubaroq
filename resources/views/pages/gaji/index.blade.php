@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Gaji Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Gaji Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="container-fluid">
    @include('pages.gaji.partials.menu')
  </div>
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <div class="mt-3">
                <button class="btn btn-primary icon icon-left dropdown-toggle " type="button"
                  id="dropdownMenuExportImport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  Import dan Export Gaji
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuExportImport">
                  <a class="dropdown-item" href="{{ route('gaji.donwload_template') }}">Import Data</a>
                  <a class="dropdown-item" href="{{ route('gaji.export') }}">Export Data .xlxs</a>
                  <a class="dropdown-item" href="{{ route('gaji.pdf', ['bulan_tahun' => request('bulan', $selectedBulan)])}}" >Export Data PDF</a>              
                </div>
              </div>
            
              <!-- Filter Bulan -->
              <form action="{{ route('gaji.asatidz.index') }}" method="POST" class="d-flex align-items-center mt-3">
                @csrf
                <div class="input-group ms-2">
                  <button class="btn btn-success" type="submit" id="button-filter">Filter Bulan</button>
                  <select name="bulan" id="bulan" class="form-control">
                    @foreach ($bulan as $bulanTahun)
                      <option value="{{ $bulanTahun }}" {{ $selectedBulan == $bulanTahun ? 'selected' : '' }}>
                          {{ $bulanTahun }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </form>
            </div>
            <div>
              <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan TPQ Bulan {{ $date }}</h5>
              <span class="h3 font-weight-bold mb-0">{{ $total_bulan_ini }}</span>
            </div>
          </div>
          </div>
            <div class="card-body">
            <table class="table table-striped" id="table1">
              <thead>
              <tr>
                <th class="text-center" style="font-size: 0.9em;">No</th>
                <th class="text-center" style="font-size: 0.9em;">Nama</th>
                <th class="text-center" style="font-size: 0.9em;">Status Keanggotaan</th>
                <th class="text-center" style="font-size: 0.9em;">Gaji Bulan Ini</th>
                <th class="text-center" style="font-size: 0.9em;">Total Jam Kerja</th>
                <th class="text-center" style="font-size: 0.9em;">Gaji Bruto</th>
                <th class="text-center" style="font-size: 0.9em;">Gaji Tambahan</th>
                <th class="text-center" style="font-size: 0.9em;">Gaji Lembur</th>
                <th class="text-center" style="font-size: 0.9em;">Kabon</th>
                <th class="text-center" style="font-size: 0.9em;">Sembako</th>
                <th class="text-center" style="font-size: 0.9em;">Menu</th>
              </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($asatidzModel as $row)
                  @php
                    $lembur = 0;
                    $gajiPokok = 0;
                    // dd($row->status);
                    if ($row->status == 'Magang') {
                      $lembur = $setting->lembur_magang * $row->Gaji->lembur;
                      if ($row->Gaji->jumlah_hari_efektif < $totalHariAktif) {
                        $gajiPokok = $row->Gaji->jumlah_hari_efektif * $setting->lembur_magang;
                      } else {
                        $gajiPokok = $setting->gaji_magang;
                      }
                      $total_gaji = $gajiPokok + $row->Gaji->tunjangan_jabatan + $row->Gaji->tunjangan_operasional + $lembur + $row->Gaji->extra - $row->Gaji->kasbon;
                    } else {
                      $lembur = $setting->lembur_tetap * $row->lembur;
                      if ($row->Gaji->jumlah_hari_efektif < $totalHariAktif) {
                        $gajiPokok = $row->Gaji->jumlah_hari_efektif * $setting->lembur_tetap;
                      } else {
                        $gajiPokok = $setting->gaji_tetap;
                      }
                      $total_gaji = $gajiPokok + $row->Gaji->tunjangan_jabatan + $row->Gaji->tunjangan_operasional + $lembur + $row->Gaji->extra + $setting->kenaikan - $row->Gaji->kasbon;
                    }
                    
                    $gaji_bruto = $gajiPokok + $row->Gaji->tunjangan_jabatan + $row->Gaji->tunjangan_operasional;
                    
                  @endphp
                    <tr role="button" onclick="window.location.href='{{ route('asatidz.show', $row->id) }}'" style="cursor: pointer">
                    <td class="text-center">{{ $no++ }}</td>
                    <td style="font-size: 0.9em;">{{ $row->nama_lengkap }}</td>
                    <td class="status text-center">
                      @if ($row->status != 'Magang')
                      <span class="badge bg-success">Tetap</span>
                      @else
                      <span class="badge bg-danger">Magang</span>
                      @endif
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      Rp. {{ number_format($total_gaji, 0, ',', '.') }}
                      </span>
                    </td>
                    <td class="mnony text-center">
                      @php
                      $tot_sesi = $row->Gaji->jumlah_hari_efektif;
                      @endphp
                      <span class="badge bg-primary">{{ $tot_sesi }}</span>
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      Rp. {{ number_format($gaji_bruto, 0, ',', '.') }}
                      </span>
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      Rp. {{ number_format($row->Gaji->extra, 0, ',', '.') }}
                      </span>
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      Rp. {{ number_format($lembur, 0, ',', '.') }}
                      </span>
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      Rp. {{ number_format($row->kasbon, 0, ',', '.') }}
                      </span>
                    </td>
                    <td class="mnony text-center">
                      <span class="badge bg-primary">
                      {{ ($row->Gaji->jumlah_hari_efektif / $totalHariAktif) * 100 > 80 ? 'YA' : 'TIDAK' }}
                      </span>
                    </td>
                    <td class="edit text-center">
                      <form action="{{ route('gaji-asatidz.edit', $row->id) }}" method="GET">
                        <input type="hidden" name="bulan" value="{{ request('bulan', now()->format('F Y')) }}">
                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="bi bi-pencil"></i>
                        </button>
                      </form>
                    </td>                  
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div> 
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
