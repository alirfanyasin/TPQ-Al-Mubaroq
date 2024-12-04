@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Detail Data Asatidz</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Data Asatidz</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="mb-4 col-xl-4 col-md-3">
              <div class="overflow-hidden rounded-4 w-100">
                <img src="{{ asset('storage/' . $data->foto_asatidz) }}" alt="User Profile"
                  class="object-cover w-100 h-100">
              </div>
              <div class="mt-5">
                <h5>Kartu Keluarga</h5>
                <div class="mb-4 overflow-hidden rounded-4 w-100" style="height: 220px;">
                  <img src="{{ asset('storage/' . $data->kk_asatidz) }}" alt="Kartu Keluarga"
                    class="object-cover w-100 h-100">
                </div>
              </div>
            </div>

            <div class="col-xl-8 col-md-9">
              {{-- Biodata start --}}
              <div class="mb-3">
                <h5>Biodata</h5>
                <hr>
                <table>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nama_lengkap }}</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nik }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Pokok Anggota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_pokok_anggota }}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->agama }}</td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->jabatan }}</td>
                  </tr>
                  <tr>
                    <td>NPWP</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->npwp }}</td>
                  </tr>
                  <tr>
                    <td>Pendidikan Terakhir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->pendidikan_terakhir }}</td>
                  </tr>
                  <tr>
                    <td>Jurusan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->jurusan }}</td>
                  </tr>
                  <tr>
                    <td>Tahun Lulus</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->tahun_lulus }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_kk }}</td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kewarganegaraan }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Jamson</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_jamsos }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Rekening</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_rekening }}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->status }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_telepon }}</td>
                  </tr>
                  <tr>
                    <td>Nama Ibu</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nama_ibu }}</td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->keterangan ?? '-' }}</td>
                  </tr>
                </table>
              </div>
              {{-- Biodata end --}}



              {{-- Address start --}}
              <div class="mb-3">
                <h5>Alamat</h5>
                <hr>
                <table>
                  <tr>
                    <td>Alamat Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->alamat_lengkap }}</td>
                  </tr>
                  <tr>
                    <td>RT / RW</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->rt }}/{{ $data->rw }}</td>
                  </tr>
                  <tr>
                    <td>Kelurahan / Desa</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->desa }}</td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kecamatan }}</td>
                  </tr>
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kota }}</td>
                  </tr>
                </table>
              </div>
              {{-- Address end --}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endSection
