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
                    <td>Irfan Yasin</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>12021873978427</td>
                  </tr>
                  <tr>
                    <td>Nomor Induk</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>0927343423</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Surabaya, 13 November 2024</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Laki-Laki</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Islam</td>
                  </tr>
                  <tr>
                    <td>Jenis Tempat Tinggal</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Rumah</td>
                  </tr>
                  <tr>
                    <td>Anak ke-</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>Anak Berkebutuhan Khsusu</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Tidak</td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>WNI</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>094230482398</td>
                  </tr>
                  <tr>
                    <td>Tanggal Masuk</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>12 November 2024</td>
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
                    <td>Jl. wonokromo, blok J, No. 11</td>
                  </tr>
                  <tr>
                    <td>RT / RW</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>002/004</td>
                  </tr>
                  <tr>
                    <td>Kelurahan / Desa</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Wonokromo</td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Wonokromo</td>
                  </tr>
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Laki-Laki</td>
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
                    <td>Jl. wonokromo, blok J, No. 11</td>
                  </tr>
                  <tr>
                    <td>RT / RW</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>002/004</td>
                  </tr>
                  <tr>
                    <td>Kelurahan / Desa</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Wonokromo</td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Wonokromo</td>
                  </tr>
                  <tr>
                    <td>Kabupaten / Kota</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Laki-Laki</td>
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
                    <td>John Doe</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>123432423423</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Surabaya, 23 Juni 2024</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Islam</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Masih Hidup</td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Programmer</td>
                  </tr>
                  <tr>
                    <td>Penghasilan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Rp. 10.000.000</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>084827384723</td>
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
                    <td>Alisya Alexandra</td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>123432423423</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Surabaya, 23 Juni 2024</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Islam</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Masih Hidup</td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Programmer</td>
                  </tr>
                  <tr>
                    <td>Penghasilan</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>Rp. 8.000.000</td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon (WA)</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>084827384723</td>
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
