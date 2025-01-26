@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Gaji Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Gaji Asatidz</li>
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
          <a href="" class="btn btn-primary icon icon-left">History Pembayaran Gaji Bulanan</a>
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Bulan Tahun</th>
                <th class="text-center">Jumlah Hari Aktif</th>
                <th class="text-center">Menu</th>
              </tr>
            </thead>
            <tbody>
              @php
                use Carbon\Carbon;
                $currentMonthYear = Carbon::now()->format('F Y');
              @endphp

              @foreach ($hari_aktif as $row)
                <tr style="{{ $row->bulan_tahun === $currentMonthYear ? 'background-color: #f0f0f0;' : '' }}">
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $row->bulan_tahun }}</td>
                  <td class="text-center">{{ $row->jumlah_hari }}</td>
                  <td class="text-center">
                    <button class="btn icon" type="button" onclick="openModalHariAktif('{{ $row->id }}', '{{ $row->jumlah_hari }}');">
                      <i class="bi bi-pencil"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  {{-- Modal untuk Input Hari Aktif --}}
  <div class="modal fade" id="modalInputHariAktif" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('hari_aktif.update') }}">
      @csrf
      @method('PUT')
      <input type="hidden" id="hari_aktif_id" name="id">

      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Hari Aktif</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="jumlah_hari">Total Hari Aktif</label>
              <input
                type="number" min="0" max="31" id="jumlah_hari" name="hari_aktif" 
                class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button id="submit-btn" type="submit" class="btn btn-primary" onclick="submitForm()">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="/template/assets/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/template/assets/css/pages/simple-datatables.css">
@endpush

@push('js')
  <script src="/template/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/template/assets/js/pages/simple-datatables.js"></script>

  {{-- Modal Handling --}}
  <script>
    function openModalHariAktif(id, jumlah_hari) {
      const modal = document.getElementById('modalInputHariAktif');
      const hariAktifIdInput = modal.querySelector('#hari_aktif_id');
      const jumlahHariInput = modal.querySelector('#jumlah_hari');

      // Set input values
      hariAktifIdInput.value = id;
      jumlahHariInput.value = jumlah_hari;

      // Show modal
      const bootstrapModal = new bootstrap.Modal(modal);
      bootstrapModal.show();
    }

    function submitForm() {
      $('#modalInputHariAktif').submit();
    }
  </script>
@endpush
