@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Bulk Tagihan Bulanan</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Bulk Tagihan Bulanan</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('tagihan.bulk.tagihan_bulanan.action') }}" method="POST">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <button type="submit" class="btn btn-primary icon icon-left">Simpan Pembayaran</button>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal</th>
                  <th>Tagihan Bulanan</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                  $currentMonthYear = \Carbon\Carbon::now()->format('M-Y');
                @endphp
                @foreach ($datas as $data)
                  @if (\Carbon\Carbon::parse($data->date)->format('M-Y') === $currentMonthYear)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->santri?->nama_lengkap ?? 'Nama Tidak Tersedia' }}</td>
                      <td>{{ $data->santri?->jenis_kelamin ?? 'Jenis Kelamin Tidak Tersedia' }}</td>
                      <td>
                        <span class="badge bg-secondary">
                          {{ \Carbon\Carbon::parse($data->date)->format('d-M-Y') }}
                        </span>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          Rp.
                          <input type="text" name="tagihan[{{ $data->id }}]" class="form-control tagihan-input"
                            value="{{ old('tagihan.' . $data->id, $tagihanSantri === '' ? 0 : $tagihanSantri) }}"
                            oninput="handleInputChange(this)">
                        </div>
                      </td>
                      <td></td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </form>
  </div>
@endSection
@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>

  <script>
    function handleInputChange(inputElement) {
      if (inputElement.value.trim() === '') {
        inputElement.value = 0;
      }
      inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    }
  </script>
@endpush
