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
    <div class="row">
      <div class="col-md-6">
        <section class="section">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
                data-bs-target="#addRaporModal"><i data-feather="plus"></i> Tambah
                Rapor</button>
              {{-- <a href="{{ route('asatidz.account') }}" class="btn btn-secondary icon icon-left">
                <i class="bi bi-people"></i>
                Akun Asatidz
              </a> --}}
              {{-- <div class="btn-group">
                <div class="dropdown">
                  <button class="btn btn-success icon icon-left dropdown-toggle me-1" type="button"
                    id="dropdownMenuExportImport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    Import dan Export
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuExportImport">
                    <a class="dropdown-item" href="#">Import Data</a>
                    <a class="dropdown-item" href="#">Export Data</a>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
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
                      <td>{{ $data->tahun_ajaran }}</td>
                      <td>{{ $data->semester->nama }}</td>
                      <td>
                        <button type="button" class="btn d-inline-block icon" data-bs-toggle="modal"
                          data-bs-target="#editRaporModal{{ $data->id }}"><i class="bi bi-pencil"></i></button>
                        <form action="{{ route('rapor.destroy', ['id' => $data->id]) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>


                    {{-- Modal edit rapor start --}}
                    <form action="{{ route('rapor.update', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editRaporModal{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editRaporModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editRaporModalTitle">Edit Rapor
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <fieldset class="form-group">
                                <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
                                <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                                  <option value="{{ date('Y') - 1 . '/' . date('Y') }}"
                                    {{ $data->tahun_ajaran == date('Y') - 1 . '/' . date('Y') ? 'selected' : '' }}>
                                    {{ date('Y') - 1 }}
                                    /
                                    {{ date('Y') }}</option>
                                  <option value="{{ date('Y') . '/' . date('Y') + 1 }}"
                                    {{ $data->tahun_ajaran == date('Y') . '/' . date('Y') + 1 ? 'selected' : '' }}>
                                    {{ date('Y') }}
                                    /
                                    {{ date('Y') + 1 }}</option>
                                  <option value="{{ date('Y') + 1 . '/' . date('Y') + 2 }}"
                                    {{ $data->tahun_ajaran == date('Y') + 1 . '/' . date('Y') + 2 ? 'selected' : '' }}>
                                    {{ date('Y') + 1 }}
                                    /
                                    {{ date('Y') + 2 }}</option>
                                </select>
                                @error('tahun_ajaran')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="semester">Pilih Semester</label>
                                <select class="form-select" id="semester" name="semester_id" required>
                                  @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                      {{ $semester->id == $data->semester_id ? 'selected' : '' }}>
                                      {{ $semester->nama }}</option>
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
                    {{-- Modal edit rapor end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>

      <div class="col-md-6">
        <section class="section">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
                data-bs-target="#addRaporModal"><i data-feather="plus"></i> Tambah
                Rapor</button>
              {{-- <a href="{{ route('asatidz.account') }}" class="btn btn-secondary icon icon-left">
                <i class="bi bi-people"></i>
                Akun Asatidz
              </a> --}}
              {{-- <div class="btn-group">
                <div class="dropdown">
                  <button class="btn btn-success icon icon-left dropdown-toggle me-1" type="button"
                    id="dropdownMenuExportImport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    Import dan Export
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuExportImport">
                    <a class="dropdown-item" href="#">Import Data</a>
                    <a class="dropdown-item" href="#">Export Data</a>
                  </div>
                </div>
              </div> --}}
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
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
                      <td>{{ $data->tahun_ajaran }}</td>
                      <td>{{ $data->semester->nama }}</td>
                      <td>
                        <button type="button" class="btn d-inline-block icon" data-bs-toggle="modal"
                          data-bs-target="#editRaporModal{{ $data->id }}"><i class="bi bi-pencil"></i></button>
                        <form action="{{ route('rapor.destroy', ['id' => $data->id]) }}" method="POST"
                          class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>


                    {{-- Modal edit rapor start --}}
                    <form action="{{ route('rapor.update', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editRaporModal{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editRaporModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editRaporModalTitle">Edit Rapor
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <fieldset class="form-group">
                                <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
                                <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                                  <option value="{{ date('Y') - 1 . '/' . date('Y') }}"
                                    {{ $data->tahun_ajaran == date('Y') - 1 . '/' . date('Y') ? 'selected' : '' }}>
                                    {{ date('Y') - 1 }}
                                    /
                                    {{ date('Y') }}</option>
                                  <option value="{{ date('Y') . '/' . date('Y') + 1 }}"
                                    {{ $data->tahun_ajaran == date('Y') . '/' . date('Y') + 1 ? 'selected' : '' }}>
                                    {{ date('Y') }}
                                    /
                                    {{ date('Y') + 1 }}</option>
                                  <option value="{{ date('Y') + 1 . '/' . date('Y') + 2 }}"
                                    {{ $data->tahun_ajaran == date('Y') + 1 . '/' . date('Y') + 2 ? 'selected' : '' }}>
                                    {{ date('Y') + 1 }}
                                    /
                                    {{ date('Y') + 2 }}</option>
                                </select>
                                @error('tahun_ajaran')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="semester">Pilih Semester</label>
                                <select class="form-select" id="semester" name="semester_id" required>
                                  @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                      {{ $semester->id == $data->semester_id ? 'selected' : '' }}>
                                      {{ $semester->nama }}</option>
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
                    {{-- Modal edit rapor end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>



  {{-- Modal create rapor start --}}
  <form action="{{ route('rapor.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="addRaporModal" tabindex="-1" role="dialog" aria-labelledby="addRaporModalTitle"
      aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addRaporModalTitle">Tambah Rapor
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <div class="modal-body">
            <fieldset class="form-group">
              <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
              <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                <option value="{{ date('Y') - 1 . '/' . date('Y') }}">{{ date('Y') - 1 }}
                  /
                  {{ date('Y') }}</option>
                <option value="{{ date('Y') . '/' . date('Y') + 1 }}" selected>
                  {{ date('Y') }}
                  /
                  {{ date('Y') + 1 }}</option>
                <option value="{{ date('Y') + 1 . '/' . date('Y') + 2 }}">{{ date('Y') + 1 }}
                  /
                  {{ date('Y') + 2 }}</option>
              </select>
              @error('tahun_ajaran')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </fieldset>
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
              <span class="d-none d-sm-block">Tambah</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  {{-- Modal create rapor end --}}
@endSection
{{-- @push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
@endpush --}}
