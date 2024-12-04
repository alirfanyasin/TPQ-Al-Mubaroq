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
    <form action="{{ route('asatidz.store_document') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Upload Dokumen</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="foto-asatidz">Foto Asatidz</label>
                  <input type="file" class="form-control" id="foto-asatidz" name="foto_asatidz">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small>
                  @error('foto_asatidz')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="kk">Kartu Keluarga Asatidz</label>
                  <input type="file" class="form-control" id="kk" name="kk_asatidz">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small>
                  @error('kk_asatidz')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('asatidz.create.address') }}" class="btn icon icon-right btn-danger me-2">
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
