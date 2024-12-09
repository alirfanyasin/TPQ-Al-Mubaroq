@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Import Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Import Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="mb-5 alert alert-warning"><i class="bi bi-exclamation-triangle"></i> Jika belum memiliki
                template
                untuk import data asatidz, silahkan download terlebih dahulu dengan klik tombol <b>Download Template</b>.
                <br> <a href="{{ asset('storage/template_import/template_data_asatidz.xlsx') }}"
                  class="mt-3 btn btn-primary d-inline-block">Donwload Template</a>
              </div>
              <div>
                <form action="{{ route('asatidz.import') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="input-group">
                    <input type="file" class="form-control" name="file" id="inputGroupFile04"
                      aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button type="submit" class="btn btn-primary" id="inputGroupFileAddon04">Upload</button>
                  </div>
                  @error('file')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endSection
