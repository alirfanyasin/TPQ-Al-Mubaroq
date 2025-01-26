<div class="tab-pane fade" id="penggajian" role="tabpanel" aria-labelledby="penggajian-tab">
    <form action="{{ route('asatidz.salary') }}" method="POST">
        @csrf
        @method('PATCH')
        <section class="section">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Penggajian Asatidz Tetap</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gaji-pokok">Gaji Pokok</label>
                            <input type="number" class="form-control" id="gaji-pokok" placeholder="Rp." name="gaji_tetap" value="{{ $dataGajian->gaji_tetap }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gaji-per-sesi">Gaji Per Sesi</label>
                            <input type="number" class="form-control" id="gaji-per-sesi" placeholder="Rp." name="lembur_tetap" value="{{ $dataGajian->lembur_tetap }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Penggajian Asatidz Magang</h4>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="gaji-pokok">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gaji-pokok" placeholder="Rp." name="gaji_magang" value="{{ $dataGajian->gaji_magang }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="gaji-per-sesi">Gaji Per Sesi</label>
                    <input type="number" class="form-control" id="gaji-per-sesi" placeholder="Rp." name="lembur_magang" value="{{ $dataGajian->lembur_magang }}">
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <label for="kenaikan-gaji">Kenaikan Gaji Asatidz</label>
                    <input type="number" class="form-control" id="kenaikan-gaji" placeholder="Rp." name="kenaikan" value="{{ $dataGajian->kenaikan }}">
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