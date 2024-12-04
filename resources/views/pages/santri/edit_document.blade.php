@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tambah Data Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data Santri</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('santri.update_document', ['id' => $data->id]) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Upload Dokumen</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="mb-4 overflow-hidden rounded-4 w-100" style="height: 300px;">
                    <img src="{{ asset('storage/' . $data->foto_santri) }}" alt="User Profile" class=" w-100 h-100"
                      style="object-fit: cover;">
                  </div>

                  <label for="foto-santri">Foto Santri</label>
                  <input type="file" class="form-control" id="foto-santri" placeholder="" name="foto_santri">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small> <br>
                  @error('foto_santri')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="mb-4 overflow-hidden rounded-4 w-100" style="height: 300px;">
                    <img src="{{ asset('storage/' . $data->kk_santri) }}" alt="User Profile" class=" w-100 h-100"
                      style="object-fit: cover;">
                  </div>
                  <label for="kk">Kartu Keluarga Santri</label>
                  <input type="file" class="form-control" id="kk" placeholder="" name="kk_santri">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small> <br>
                  @error('kk_santri')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('santri.edit_biodata_mother', ['id' => $data->id]) }}"
                  class="btn icon icon-right btn-danger me-2">
                  <i class="bi bi-arrow-left"></i>
                  Kembali </a>
                <button type="submit" class="btn icon icon-left btn-primary">
                  <i data-feather="check-circle"></i>
                  Simpan Data
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
@endSection
