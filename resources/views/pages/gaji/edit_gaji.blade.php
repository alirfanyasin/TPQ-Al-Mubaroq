@extends('layouts.app')
@section('breadcrumb')
<div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
        <h3>Edit Gaji Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">App</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gaji.asatidz.index') }}">Gaji Asatidz</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Gaji</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
  <div class="page-content">
    <section class="section">
      <form method="POST" action="{{ route('gaji-asatidz.update', $asatidz->id) }}">
        @csrf
        @method('PATCH')
      <div class="card">
        <div class="card-header">
          <input type="hidden" name="bulan_filter" value="{{ $bulanFilter }}">
          <h4 class="card-title">Edit Gaji - {{ $asatidz->nama_lengkap }}</h4>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
              <div class="col-md-5 mb-3">
                <div class="mb-4">
                  <h5 class="mb-3">Foto Asatidz</h5>
                  <div class="overflow-hidden rounded-4 w-100">
                    <img src="{{ asset('storage/' . $asatidz->foto_asatidz) }}" alt="User Profile"
                      class="object-cover w-100 h-100">
                  </div>
                </div>
                <div class="col-md-7">
                  <h4 class="text-center">Informasi Asatidz</h4>
                  <table>
                    <tr>
                      <td>Jabatan</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>{{ $asatidz->jabatan }}</td>
                    </tr>
                      <tr>
                      <td>Status</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>{{ $asatidz->status }}</td>
                    </tr>
                    <tr>
                      <td>Jumlah Hari Efektif</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>{{ $hari_aktif_bulan_ini }}</td>
                    </tr>
                    <tr>
                      <td>Jam Sesi Lembur</td>
                      <td style="padding: 0 10px;">:</td>
                      <td>{{ $gaji->lembur }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              
              <div class="col-md-7 mb-3">
                <div class="mb-3">
                  <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                  <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ old('gaji_pokok', $gaji->gaji_pokok) }}" required>
                </div>
                <div class="mb-3">
                  <label for="tunjangan_jabatan" class="form-label">Tunjangan Jabatan</label>
                  <input type="number" name="tunjangan_jabatan" id="tunjangan_jabatan" class="form-control" value="{{ old('tunjangan_jabatan', $gaji->tunjangan_jabatan) }}" required>
                </div>
                <div class="mb-3">
                  <label for="tunjangan_operasional" class="form-label">Tunjangan Operasional</label>
                  <input type="number" name="tunjangan_operasional" id="tunjangan_operasional" class="form-control" value="{{ old('tunjangan_operasional', $gaji->tunjangan_operasional) }}" required>
                </div>
                <div class="mb-3">
                  <label for="extra" class="form-label">Bonus</label>
                  <input type="number" name="extra" id="extra" class="form-control" value="{{ old('bonus', $gaji->extra) }}">
                </div>
                <div class="mb-3">
                  <label for="kasbon" class="form-label">Kasbon</label>
                  <input type="number" name="kasbon" id="kasbon" class="form-control" value="{{ old('kasbon', $gaji->kasbon) }}">
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('gaji.asatidz.index') }}" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </form>
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