@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Kelas</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kelas</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection

@section('content')
  <div class="page-content">
    <section class="section">
      <div class="row">
        @foreach ($dataKelas as $class)
          <div class="col-6 col-lg-3 col-md-6">
            <a href="{{ route('class.room', ['id' => $class->id, 'nama' => $class->nama]) }}" class="text-white">
              <div class="card">
                <div class="px-4 card-body py-4-5">
                  <div class="row position-relativ">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
                      <div class="mb-2 stats-icon red">
                        <i class="iconly-boldProfile"></i>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-8 e">
                      <h6 class="font-semibold text-muted">{{ $class->nama }} - Jilid {{ $class->jilid->nama }}</h6>
                      <h6 class="mb-0 font-extrabold">{{ $class->santri_count }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </section>

    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Santri Belum Memiliki Kelas</h4>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enrollModal">Enroll</button>
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon (WA)</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($dataSantri as $data)
                <tr>
                  <td><input type="checkbox" class="santri-checkbox" value="{{ $data->id }}"></td>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama_lengkap }}</td>
                  <td>{{ $data->jenis_kelamin }}</td>
                  <td>{{ $data->nomor_telepon }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="enrollForm" action="{{ route('class.enroll') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="enrollModalLabel">Pilih Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="selected_santri" id="selectedSantri">
            <div class="form-group">
              <label for="kelas_id">Kelas</label>
              <select name="kelas_id" id="kelas_id" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($dataKelas as $class)
                  <option value="{{ $class->id }}">{{ $class->nama }} - Jilid {{ $class->jilid->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Enroll</button>
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

  <script>
    document.getElementById('selectAll').addEventListener('click', function() {
      const checkboxes = document.querySelectorAll('.santri-checkbox');
      checkboxes.forEach(cb => cb.checked = this.checked);
    });

    document.querySelector('[data-bs-target="#enrollModal"]').addEventListener('click', function() {
      const selectedSantri = Array.from(document.querySelectorAll('.santri-checkbox:checked'))
        .map(cb => cb.value);
      document.getElementById('selectedSantri').value = selectedSantri.join(',');
    });
  </script>
@endpush
