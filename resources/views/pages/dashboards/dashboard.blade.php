@extends('layouts.app')

@section('content')
  @include('pages.dashboards.maps')
  <div class="page-content">
    <h3>Ringkasan</h3>
    <section class="row">
      <div class="col-12 col-lg-8">
        <div class="row">
          <div class="col-6 col-lg-5 col-md-6">
            <div class="card">
              <div class="px-4 card-body py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="mb-2 stats-icon purple">
                      <i class="iconly-boldShow"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h5 class="border font-semibold text-muted">Total Santri</h5>
                    <h5 class="mb-0 font-extrabold">{{ $santri_total }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-5 col-md-6">
            <div class="card">
              <div class="px-4 card-body py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="mb-2 stats-icon blue">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h5 class="border font-semibold text-muted">Total Asatidz</h5>
                    <h5 class="mb-0 font-extrabold">{{ $asatidz_total }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <div class="card">
    <div class="row p-4">
      <h3>Biodata</h3>
      <div class="col-xl-4">
        <div>
          <label class="form-control-label">Nama Satuan</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->nama_satuan ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">NPSN</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->npsn ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Bentuk Pendidikan</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->bentuk_pendidikan ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor Telepon</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->no_telp ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Cabang Nomor Rekening</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->cabang_norek ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor Rekening</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->norek ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nama Nomor Rekening</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->nama_norek ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">NPWP</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->npwp ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nama Kepala</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->nama_kepala ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">NIK Kepala</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->nik_kepala ?? '-' }}</p>
        </div>
      </div>
      <div class="col-xl-4">
        <div>
          <label class="form-control-label">Alamat Kepala</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->alamat_kepala ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor Handphone Kepala</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->no_hp_kepala ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nama Ketua Yayasan</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->nama_ketua_yayasan ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Kepemilikan Lembaga</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->kepemilikan_lembaga ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Status Kepemilikan</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->status_kepemilikan ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Tempat Lembaga</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->tempat_lembaga ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Biaya Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->biaya_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Sumber Dana</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->sumber_dana ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Jumlah Kelompok Belajar</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->jumlah_kelompok_belajar ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Metode Pembelajaran</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->metode_pembelajaran ?? '-' }}</p>
        </div>
      </div>
      <div class="col-xl-4">
        <div>
          <label class="form-control-label">Jam Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->jam_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Hari Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->hari_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Tanggal SK Pendirian</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->tgl_sk_pendirian ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor SK Pendirian</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->no_sk_pendirian ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor Izin Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->no_izin_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Nomor Statistik</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->no_statistik ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Tanggal Mulai Izin Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->tgl_mulai_izin_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Tanggal Izin Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->tgl_izin_operasional ?? '-' }}</p>
        </div>
        <div>
          <label class="form-control-label">Tanggal Selesai Operasional</label>
          <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->tgl_selesai_izin_operasional ?? '-' }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content">
    <section class="row">
      <div class="col-12 col-lg-10">
        <div class="card">
          <div class="row p-4">
            <h3>Alamat</h3>
            <div class="col-xl-6">
              <div>
                <label class="form-control-label">No. Rumah dan Nama Jalan</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->alamat ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">RT</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->rt ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">RW</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->rw ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">Kelurahan atau Desa</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->kelurahan ?? '-' }}</p>
              </div>
            </div>
            <div class="col-xl-6">
              <div>
                <label class="form-control-label">Kecamatan</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->kecamatan ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">Kabupaten</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->kabupaten ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">Garis Bujur</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->bujur ?? '-' }}</p>
              </div>
              <div>
                <label class="form-control-label">Garis Lintang</label>
                <p class="border font-semibold text-black bg-light px-3 py-2 rounded">{{ $data->lintang ?? '-' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="d-flex justify-content-center my-5">
    <a href="{{ route('edit.dashboard', $data->id) }}" class="btn btn-primary">
      <i class="bi bi-pencil-square me-2"></i>Edit Biodata dan Alamat data
    </a>
  </div>
@endsection

@push('js')
  <script src="/template/assets/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="/template/assets/js/pages/dashboard.js"></script>
@endpush
