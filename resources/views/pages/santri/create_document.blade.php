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
    <form action="{{ route('santri.store_document') }}" method="POST" enctype="multipart/form-data">
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
                  <label for="kk">Kartu Keluarga Santri</label>
                  <input type="file" class="form-control" id="kk" placeholder="" name="kk_santri">
                  <small>Jenis: JPG, PNG, JPEG | Maks: 3 MB</small> <br>
                  @error('kk_santri')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <a href="{{ route('santri.create_biodata_mother') }}" class="btn icon icon-right btn-danger me-2">
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
