@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Penilaian Rapor</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Penilaian Rapor</li>
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
          <h4>{{ $rapor->santri->nama_lengkap }}</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('rapor.simpan_nilai', ['id' => $rapor->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
              @foreach ($datas as $item)
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="{{ $item->raporItem->nama }}">{{ $item->raporItem->nama }}</label>
                    <input type="number" class="form-control" id="{{ $item->raporItem->nama }}"
                      name="nilai[{{ $item->id }}]" value="{{ old('nilai.' . $item->id, $item->nilai) }}">
                    @error('nilai.' . $item->id)
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Simpan Nilai</button>
          </form>

        </div>
      </div>
    </section>
  </div>
@endSection
@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush
@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>
@endpush
