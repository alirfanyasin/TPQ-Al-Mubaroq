@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Data Rapor</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Rapor</li>
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

          <button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
            data-bs-target="#changeSemesterModal">Update Semester</button>

          <a href="{{ route('rapors.import-view') }}" class="btn btn-secondary icon icon-left d-inline-block">Import</a>

          <div class="d-inline-block">
            <form action="/rapor/export-rapors" method="GET">
              @csrf
              <div class="input-group">
                <button class="btn btn-danger" type="submit" id="button-export">Export</button>
                <select class="form-select" name="kelas_id" aria-describedby="button-export">
                  @foreach ($classes as $class)
                    <option value="{{ $class->id }}">Kelas {{ $class->nama }}</option>
                  @endforeach
                </select>
              </div>
            </form>
          </div>

          <div class="d-inline-block">
            <form action="{{ route('rapor.print') }}" method="POST" target="_blank">
              @csrf
              <div class="input-group">
                <button class="btn btn-success" type="submit" id="button-print">Cetak</button>
                <select class="form-select" name="kelas" aria-describedby="button-print">
                  <option value="semua">Semua</option>
                  @foreach ($classes as $class)
                    <option value="{{ $class->id }}">Kelas {{ $class->nama }}</option>
                  @endforeach
                </select>
              </div>
            </form>
          </div>



        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Kelas</th>
                <th>Jilid</th>
                <th>Semester</th>
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
                  <td>{{ $data->santri->nama_lengkap }}</td>
                  <td>{{ $data->santri->kelas->nama }}</td>
                  <td>{{ $data->jilid->nama ?? '-' }}</td>
                  <td>{{ $data->semester->nama ?? '-' }}</td>
                  <td>
                    <a href="{{ route('rapor.show', ['id' => $data->id]) }}" class="btn icon" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Detail Rapor"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('rapor.item_penilaian', ['id' => $data->id]) }}" class="btn icon"
                      data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Rapor"><i
                        class="bi bi-person-lines-fill"></i></a>

                    {{-- <form action="{{ route('rapor.item_penilaian', ['id' => $data->id]) }}" method="POST"
                      class="d-inline">
                      @csrf

                      <button type="submit" class="btn icon" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Masukkan Nilai Rapor"><i class="bi bi-person-lines-fill"></i></button>
                    </form> --}}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>



  {{-- Modal update start --}}
  <form action="{{ route('rapor.update_semeter') }}" method="POST">
    @csrf
    <div class="modal fade" id="changeSemesterModal" tabindex="-1" role="dialog"
      aria-labelledby="changeSemesterModalTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changeSemesterModalTitle">Update Semester
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <div class="modal-body">
            <fieldset class="form-group">
              <label for="semester">Pilih Semester</label>
              <select class="form-select" id="semester" name="semester_id" required>
                @foreach ($semesters as $semester)
                  <option value="{{ $semester->id }}">{{ $semester->nama }}</option>
                @endforeach
              </select>
              @error('tahun_ajaran')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </fieldset>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Kembali</span>
            </button>
            <button type="submit" class="ml-1 btn btn-primary" data-bs-dismiss="modal">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Update</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  {{-- Modal update end --}}
@endSection
@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
@endpush
