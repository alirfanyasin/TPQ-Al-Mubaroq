@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Import Rapor</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Import Rapor</li>
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
              <div>
                <form action="{{ route('rapors.import-post') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="input-group">
                    <input type="file" class="form-control" name="file">
                    <button type="submit" class="btn btn-primary">Upload</button>
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
