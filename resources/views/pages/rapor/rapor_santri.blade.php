@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Rapor Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Rapor Santri</li>
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
            <div class="col-md-4">
              <div>
                <h5 class="mb-3">Foto Santri</h5>
                <div class="overflow-hidden rounded-4 w-100">
                  {{-- <img src="{{ asset($data->santri->foto_santri) }}" alt="User Profile" class="object-cover w-100 h-100"> --}}
                  <img src="{{ asset('storage/' . $data->santri->foto_santri) }}" alt="User Profile"
                    class="object-cover w-100 h-100">
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="mb-5">
                <h5>Informasi</h5>
                <hr>
                <table>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->santri->nama_lengkap }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Induk</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->santri->nomor_induk }}</td>
                  </tr>
                  <tr>
                    <td>Kelas</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->santri->kelas->nama }}</td>
                  </tr>
                  <tr>
                    <td>Jilid</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->jilid->nama }}</td>
                  </tr>
                  <tr>
                    <td>Wali Kelas</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->santri->kelas->asatidz->nama_lengkap }}</td>
                  </tr>
                  <tr>
                    <td>Tahun Ajaran</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ date('Y') . '/' . date('Y') + 1 }}</td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td style="padding: 0 10px;">:</td>
                    <td>{{ $data->semester->nama }}</td>
                  </tr>
                </table>
              </div>

              <div class="mb-3">
                <h5>Nilai</h5>
                <hr>

                @if ($data->raporNilai->isEmpty())
                  <p>Data Nilai Belum Ada</p>
                @else
                  <div class="row">
                    @foreach ($groupedData as $jenisPenilaian => $nilaiGroup)
                      <div class="mb-4 col-md-6">
                        <h6 class="">{{ $jenisPenilaian }}</h6>
                        <table>
                          <tbody>
                            @foreach ($nilaiGroup as $nilai)
                              <tr>
                                <td>{{ $nilai->raporItem->nama }}</td>
                                <td style="padding: 0 10px;"> : </td>
                                <td>{{ $nilai->nilai }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <table class="w-100">
                        <tr style="border-bottom: 1px solid white;">
                          <td class="h6" style="width: 160px;">Total Nilai</td>
                          <td class="h6">:</td>
                          <td class="h6">{{ number_format($totalNilai, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td class="h6" style="width: 160px;">Rata-Rata Nilai</td>
                          <td class="h6">:</td>
                          <td class="h6">{{ number_format($totalNilai / $totalRow, 1) }}</td>
                        </tr>
                        <tr>
                          <td class="h6" style="width: 160px;">Grade</td>
                          <td class="h6">:</td>
                          <td class="h6">{{ $grade }}</td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <p class="">Keterangan : </p>
                      <table class="w-100">
                        <tr>
                          <td style="width: 160px;">A</td>
                          <td>:</td>
                          <td>100-90</td>
                        </tr>
                        <tr>
                          <td style="width: 160px;">B+</td>
                          <td>:</td>
                          <td>89-80</td>
                        </tr>
                        <tr>
                          <td style="width: 160px;">B</td>
                          <td>:</td>
                          <td>79-70</td>
                        </tr>
                        <tr>
                          <td style="width: 160px;">C</td>
                          <td>:</td>
                          <td>69-60</td>
                        </tr>
                        <tr>
                          <td style="width: 160px;">D</td>
                          <td>:</td>
                          <td>59-0</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                @endif

              </div>
            </div>
          </div>
          @if (!$data->raporNilai->isEmpty())
            <div class="row">
              <div class="col d-flex justify-content-end">
                <a href="{{ route('rapor.print_one', ['id' => $data->id]) }}" target="_blank"
                  class="btn btn-primary">Cetak
                  / Print</a>
              </div>
            </div>
          @endif
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
