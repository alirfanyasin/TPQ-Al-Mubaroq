@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tambah Data Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('asatidz.update_document', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                  <div class="mb-4 overflow-hidden rounded-4 w-100">
                    <img src="{{ asset('storage/' . $data->foto_asatidz) }}" alt="User Profile"
                      class="object-cover w-100 h-100">
                  </div>
                  <label for="foto-asatidz">Foto Asatidz</label>
                  <input type="file" class="form-control" id="foto-asatidz" name="foto_asatidz">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small> <br>
                  @error('foto_asatidz')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="mb-4 overflow-hidden rounded-4 w-100">
                    <img src="{{ asset('storage/' . $data->kk_asatidz) }}" alt="User Profile"
                      class="object-cover w-100 h-100">
                  </div>
                  <label for="kk">Kartu Keluarga Asatidz</label>
                  <input type="file" class="form-control" id="kk" name="kk_asatidz">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small> <br>
                  @error('kk_asatidz')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('asatidz.edit_address', ['id' => $data->id]) }}"
                  class="btn icon icon-right btn-danger me-2">
                  <i class="bi bi-arrow-left"></i>
                  Kembali </a>

                <button type="submit" class="btn icon icon-right btn-primary">
                  Simpan Data <i class="bi bi-floppy"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>

  </div>
@endSection
