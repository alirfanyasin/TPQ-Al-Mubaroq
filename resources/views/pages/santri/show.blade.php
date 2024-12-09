@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Detail Data Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Data Santri</li>
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
              <div>
                <h5 class="mb-3">Foto Santri</h5>
                <div class="overflow-hidden rounded-4 w-100">
                  <img src="{{ asset('storage/' . $data->foto_santri) }}" alt="User Profile"
                    class="object-cover w-100 h-100">
                </div>
              </div>


              <div class="mt-5">
                <h5 class="mb-3">Kartu Keluarga</h5>
                <div class="overflow-hidden rounded-4 w-100">
                  <img src="{{ asset('storage/' . $data->kk_santri) }}" alt="User Profile"
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
                    <td>Nomor Induk</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_induk }}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->tempat_lahir }}, {{ date('d F Y', strtotime($data->tanggal_lahir)) ?? 'Belum ada' }}
                    </td>
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
                    <td>Jenis Tempat Tinggal</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->jenis_tempat_tinggal }}</td>
                  </tr>
                  <tr>
                    <td>Anak ke-</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->anak_ke }}</td>
                  </tr>
                  <tr>
                    <td>Anak Berkebutuhan Khsusu</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->abk }}</td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kewarganegaraan }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_telepon }}</td>
                  </tr>
                  <tr>
                    <td>Tanggal Masuk</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ date('d F Y', strtotime($data->tanggal_masuk)) ?? 'Belum ada' }}</td>
                  </tr>
                </table>
              </div>
              {{-- Biodata end --}}

              {{-- Domisili start --}}
              <div class="mb-3">
                <h5>Alamat Domisili</h5>
                <hr>
                <table>
                  <tr>
                    <td>Alamat Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->alamat_lengkap_domisili }}</td>
                  </tr>
                  <tr>
                    <td>RT / RW</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->rt_domisili }}/{{ $data->rw_domisili }}</td>
                  </tr>
                  <tr>
                    <td>Kelurahan / Desa</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->desa_domisili }}</td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kecamatan_domisili }}</td>
                  </tr>
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kota_domisili }}</td>
                  </tr>
                </table>
              </div>
              {{-- Domisili end --}}

              {{-- Address KK start --}}
              <div class="mb-3">
                <h5>Alamat Kartu Keluagra</h5>
                <hr>
                <table>
                  <tr>
                    <td>Alamat Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->alamat_lengkap_kk }}</td>
                  </tr>
                  <tr>
                    <td>RT / RW</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->rt_kk }}/{{ $data->rw_kk }}</td>
                  </tr>
                  <tr>
                    <td>Kelurahan / Desa</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->desa_kk }}</td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kecamatan_kk }}</td>
                  </tr>
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->kota_kk }}</td>
                  </tr>
                </table>
              </div>
              {{-- Address KK end --}}

              {{-- Biodata Father start --}}
              <div class="mb-3">
                <h5>Biodata Ayah</h5>
                <hr>
                <table>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nama_lengkap_ayah }}</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nik_ayah }}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->tempat_lahir_ayah }},
                      {{ date('d F Y', strtotime($data->tanggal_lahir_ayah)) ?? 'Belum ada' }}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->agama_ayah }}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->status_ayah }}</td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->pekerjaan_ayah }}</td>
                  </tr>
                  <tr>
                    <td>Penghasilan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Rp. {{ number_format($data->penghasilan_ayah, 0, ',', '.') }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_telepon_ayah }}</td>
                  </tr>
                </table>
              </div>
              {{-- Biodata Father end --}}

              {{-- Biodata mother start --}}
              <div class="mb-3">
                <h5>Biodata Ibu</h5>
                <hr>
                <table>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nama_lengkap_ibu }}</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nik_ibu }}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->tempat_lahir_ibu }},
                      {{ date('d F Y', strtotime($data->tanggal_lahir_ibu)) ?? 'Belum ada' }}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->agama_ibu }}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->status_ibu }}</td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->pekerjaan_ibu }}</td>
                  </tr>
                  <tr>
                    <td>Penghasilan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Rp. {{ number_format($data->penghasilan_ibu, 0, ',', '.') }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->nomor_telepon_ibu }}</td>
                  </tr>
                </table>
              </div>
              {{-- Biodata mother end --}}

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endSection
