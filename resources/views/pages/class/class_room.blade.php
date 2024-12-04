@extends('layouts.app')

@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Kelas {{ $dataKelas->nama }} - Jilid {{ $dataKelas->jilid->nama }}</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kelas</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection

@section('content')
  <div class="page-content">
    <form action="{{ route('class.leave_multiple') }}" method="POST">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4>{{ $dataKelas->asatidz->nama_lengkap }}</h4>
            <button type="submit" class="btn btn-danger">Keluarkan</button>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"></th>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Nomor Telepon (WA)</th>
                  <th>Kelas</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($datas as $data)
                  <tr>
                    <td><input type="checkbox" name="selected_santri[]" value="{{ $data->id }}"></td>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->nomor_telepon }}</td>
                    <td>{{ $data->kelas->nama }}</td>
                    <td>
                      <a href="{{ route('santri.show', ['id' => $data->id]) }}" class="btn icon"><i
                          class="bi bi-eye"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </form>
  </div>
@endsection

{{-- @push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush --}}

@push('js')
  {{-- <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script> --}}
  <script>
    document.getElementById('select_all').addEventListener('click', function(e) {
      let checkboxes = document.querySelectorAll('input[name="selected_santri[]"]');
      checkboxes.forEach(checkbox => {
        checkbox.checked = e.target.checked;
      });
    });
  </script>
@endpush
