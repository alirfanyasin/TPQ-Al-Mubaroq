@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Tambah Data Santri</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data Santri</li>
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
          <h4 class="card-title">Pembayaran</h4>
        </div>
        <hr>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <div class="mb-4">
                <h4>Biaya Pendaftaran</h4>
                <p>Biaya pendaftaran sebesar <b>Rp. 120.000</b>, silahkan input pembayaran santri dibawah ini</p>
                <div class="form-group">
                  <label for="nfoto-santri">Pembayaran Awal</label>
                  <input type="number" class="form-control" id="foto-santri" placeholder="Rp.">
                </div>
              </div>

              <div class="mb-4">
                <h4>Biaya Bulanan</h4>
                <p>Biaya bulanan sebesar <b>Rp. 100.000</b>, silahkan input pembayaran santri dibawah ini</p>
                <div class="form-group">
                  <label for="nfoto-santri">Pembayaran Awal</label>
                  <input type="number" class="form-control" id="foto-santri" placeholder="Rp.">
                </div>
              </div>

              <div class="mb-4">
                <h4>Biaya Seragam</h4>
                <p>Biaya seragam sebesar <b>Rp. 100.000</b>, silahkan input pembayaran santri dibawah ini</p>
                <div class="form-group">
                  <label for="nfoto-santri">Pembayaran Awal</label>
                  <input type="number" class="form-control" id="foto-santri" placeholder="Rp.">
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
                        <td>Rp. 120.000</td>
                      </tr>
                      <tr>
                        <td>Pembayaran Awal</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 0</td>
                      </tr>
                      <tr>
                        <td>Sisa Tagihan</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 120.000</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td style="padding: 0 10px;">:</td>
                        <td> <span class="badge bg-danger">Belum Lunas</span></td>
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
                        <td>Rp. 100.000</td>
                      </tr>
                      <tr>
                        <td>Pembayaran Awal</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 100.000</td>
                      </tr>
                      <tr>
                        <td>Sisa Tagihan</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 0</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td style="padding: 0 10px;">:</td>
                        <td> <span class="badge bg-success">Lunas</span></td>
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
                        <td>Rp. 100.000</td>
                      </tr>
                      <tr>
                        <td>Pembayaran Awal</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 100.000</td>
                      </tr>
                      <tr>
                        <td>Sisa Tagihan</td>
                        <td style="padding: 0 10px;">:</td>
                        <td>Rp. 0</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td style="padding: 0 10px;">:</td>
                        <td> <span class="badge bg-success">Lunas</span></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-3 justify-content-end d-flex">
              <a href="{{ route('santri.create_document') }}" class="btn icon icon-right btn-danger me-2">
                <i class="bi bi-arrow-left"></i>
                Kembali </a>
              <a href="{{ route('santri.create.payment') }}" class="btn icon icon-right btn-primary">
                Simpan Data <i class="bi bi-floppy"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endSection
