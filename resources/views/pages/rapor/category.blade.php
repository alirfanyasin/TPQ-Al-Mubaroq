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

    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link {{ Request::is('rapor') ? 'active' : '' }}" id="home-tab"
              href="{{ route('rapor.index') }}" role="tab" aria-controls="rapor" aria-selected="true">Rapor</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="category-tab" href="{{ route('rapor.category') }}" role="tab"
              aria-controls="category" aria-selected="false">category</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
              aria-controls="contact" aria-selected="false">Contact</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade {{ Request::is('rapor') ? 'show active' : '' }}" id="rapor" role="tabpanel"
            aria-labelledby="rapor-tab">
            <section class="section">
              <div class="card">
                <div class="card-header">
                  <button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
                    data-bs-target="#addRaporModal"><i data-feather="plus"></i> Tambah
                    Rapor</button>
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

          <div class="tab-pane fade {{ Request::is('rapor.category') ? 'show active' : '' }}" id="category"
            role="tabpanel" aria-labelledby="category-tab">
            Integer interdum diam eleifend metus lacinia, quis gravida eros mollis. Fusce non sapien
            sit amet magna dapibus
            ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis a mauris ex.
            Ut finibus risus sed massa
            mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer pretium dolor
            at sapien laoreet ultricies.
            Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie finibus. In nec
            odio tincidunt eros finibus
            ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu accumsan
            lacus felis at odio. Sed lacus
            quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel
            massa pretium ullamcorper vitae eu
            tortor.
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <p class="mt-2">Duis ultrices purus non eros fermentum hendrerit. Aenean ornare interdum
              viverra. Sed ut odio velit. Aenean eu diam
              dictum nibh rhoncus mattis quis ac risus. Vivamus eu congue ipsum. Maecenas id
              sollicitudin ex. Cras in ex vestibulum,
              posuere orci at, sollicitudin purus. Morbi mollis elementum enim, in cursus sem
              placerat ut.</p>
          </div>
        </div>
      </div>
    </div>


  </div>
@endSection
