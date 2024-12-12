@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Pembayaran Tagihan Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pembayaran Tagihan Santri</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="page-content">
    <form action="{{ route('tagihan.store_pembayaran', ['id' => $tagihanSantri->id]) }}" method="POST">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tagihan {{ $tagihanSantri->nama_lengkap }}</h4>
          </div>
          <hr>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="mb-4">
                  <h4>Biaya Pendaftaran</h4>
                  <p>Biaya pendaftaran sebesar <b>Rp. {{ number_format($data->tagihan_pendaftaran, 0, ',', '.') }}</b>,
                    silahkan input pembayaran
                    santri dibawah ini</p>
                  <div class="form-group">
                    <label for="pembayaran-awal-pendaftaran">Pembayaran Awal</label>
                    <input type="number" class="form-control" id="pembayaran-awal-pendaftaran" placeholder="Rp."
                      name="tagihan_pendaftaran" value="{{ $tagihanSantri->tagihanPendaftaran->bayar }}">
                  </div>
                </div>

                <div class="mb-4">
                  <h4>Biaya Bulanan</h4>
                  <p>Biaya bulanan sebesar <b>Rp. {{ number_format($data->tagihan_bulanan, 0, ',', '.') }}</b>, silahkan
                    input pembayaran santri
                    dibawah ini</p>
                  <div class="form-group">
                    <label for="pembayaran-awal-bulanan">Pembayaran Awal</label>
                    <input type="text" class="form-control" id="pembayaran-awal-bulanan" placeholder="Rp."
                      name="tagihan_bulanan" value="{{ $tagihanBulananSantri->bayar }}">
                  </div>
                </div>

                <div class="mb-4">
                  <h4>Biaya Seragam</h4>
                  <p>Biaya seragam sebesar <b>Rp. {{ number_format($data->tagihan_biaya_seragam, 0, ',', '.') }}</b>,
                    silahkan input pembayaran santri
                    dibawah ini</p>
                  <div class="form-group">
                    <label for="pembayaran-awal-seragam">Pembayaran Awal</label>
                    <input type="number" class="form-control" id="pembayaran-awal-seragam" placeholder="Rp."
                      name="tagihan_seragam" value="{{ $tagihanSantri->tagihanSeragam->bayar }}">
                  </div>
                  <div class="form-check">
                    <div class="checkbox">
                      <input type="checkbox" id="lewati" class="form-check-input">
                      <label for="lewati">Lewati pembayaran seragam</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <h4 class="text-center">Total Tagihan Santri</h4>
                  <hr>
                  <div class="card-body">
                    <div class="mb-3">
                      <h5>Biaya Pendaftaran</h5>
                      <hr>
                      <table>
                        <tr>
                          <td>Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($data->tagihan_pendaftaran, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Pembayaran Awal</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($tagihanSantri->tagihanPendaftaran->bayar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Sisa Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp.
                            {{ number_format($data->tagihan_pendaftaran - $tagihanSantri->tagihanPendaftaran->bayar, 0, ',', '.') }}
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td style="padding: 0 10px;">:</td>
                          <td> <span
                              class="badge {{ $data->tagihan_pendaftaran - $tagihanSantri->tagihanPendaftaran->bayar > 0 ? 'bg-danger' : 'bg-success' }}">
                              {{ $data->tagihan_pendaftaran - $tagihanSantri->tagihanPendaftaran->bayar > 0 ? 'Belum Lunas' : 'Lunas' }}
                            </span>
                          </td>
                        </tr>
                      </table>
                    </div>


                    <div class="mb-3">
                      <h5>Biaya Bulanan</h5>
                      <hr>
                      <table>
                        <tr>
                          <td>Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($data->tagihan_bulanan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Pembayaran Awal</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($tagihanSantri->tagihanBulanan->bayar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Sisa Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp.
                            {{ number_format($data->tagihan_bulanan - $tagihanSantri->tagihanBulanan->bayar, 0, ',', '.') }}
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td style="padding: 0 10px;">:</td>
                          <td> <span
                              class="badge {{ $data->tagihan_bulanan - $tagihanSantri->tagihanBulanan->bayar > 0 ? 'bg-danger' : 'bg-success' }}">{{ $data->tagihan_bulanan - $tagihanSantri->tagihanBulanan->bayar > 0 ? 'Belum Lunas' : 'Lunas' }}</span>
                          </td>
                        </tr>
                      </table>
                    </div>

                    <div class="mb-3">
                      <h5>Biaya Seragam</h5>
                      <hr>
                      <table>
                        <tr>
                          <td>Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($data->tagihan_biaya_seragam, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Pembayaran Awal</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp. {{ number_format($tagihanSantri->tagihanSeragam->bayar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                          <td>Sisa Tagihan</td>
                          <td style="padding: 0 10px;">:</td>
                          <td>Rp.
                            {{ number_format($data->tagihan_biaya_seragam - $tagihanSantri->tagihanSeragam->bayar, 0, ',', '.') }}
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td style="padding: 0 10px;">:</td>
                          <td> <span
                              class="badge {{ $data->tagihan_biaya_seragam - $tagihanSantri->tagihanSeragam->bayar > 0 ? 'bg-danger' : 'bg-success' }}">{{ $data->tagihan_biaya_seragam - $tagihanSantri->tagihanSeragam->bayar > 0 ? 'Belum Lunas' : 'Lunas' }}</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-3 justify-content-end d-flex">
                <button type="submit" class="btn icon icon-left btn-primary">
                  <i data-feather="check-circle"></i>
                  Simpan Data
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
@endSection
