<div class="tab-pane fade" id="tagihan-santri" role="tabpanel" aria-labelledby="tagihan-santri-tab">
  <form action="{{ route('santri.student_bill') }}" method="POST">
    @csrf
    @method('PATCH')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tagihan Santri</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="tagihan-pendaftaran">Tagihan Pendaftaran</label>
                <input type="number" class="form-control" id="tagihan-pendaftaran" placeholder="Rp."
                  name="tagihan_pembayaran" value="{{ $dataTagihanSantri->tagihan_pembayaran }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tagihan-biaya-bulanan">Tagihan Biaya Bulanan</label>
                <input type="number" class="form-control" id="tagihan-biaya-bulanan" placeholder="Rp."
                  name="tagihan_bulanan" value="{{ $dataTagihanSantri->tagihan_bulanan }}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="biaya-seragam">Biaya Seragam</label>
                <input type="number" class="form-control" id="biaya-seragam" placeholder="Rp."
                  name="tagihan_biaya_seragam" value="{{ $dataTagihanSantri->tagihan_biaya_seragam }}">
              </div>
            </div>
            <div class="justify-content-end d-flex">
              <button class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
