<div class="tab-pane fade" id="operasional-lembaga" role="tabpanel" aria-labelledby="operasional-lembaga-tab">
  <form action="{{ route('setting.operasional_lembaga.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Operasional Lembaga</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jam-operasional">Jam Operasional</label>
                <input type="time" class="form-control" id="jam-operasional" placeholder="" name="jam_operasional"
                  value="{{ $dataLembaga->jam_operasional }}">
                @error('jam_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="tanggal-izin-operasional">Tanggal Izin Operasional</label>
                <input type="date" class="form-control" id="tanggal-izin-operasional" placeholder=""
                  name="tanggal_izin_operasional" value="{{ $dataLembaga->tanggal_izin_operasional }}">
                @error('tanggal_izin_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="tanggal-mulai-izin-operasional">Tanggal Mulai Izin Operasional</label>
                <input type="date" class="form-control" id="tanggal-mulai-izin-operasional" placeholder=""
                  name="tanggal_mulai_izin_operasional" value="{{ $dataLembaga->tanggal_mulai_izin_operasional }}">
                @error('tanggal_mulai_izin_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="hari-operasional">Hari Operasional</label>
                <input type="text" class="form-control" id="hari-operasional" placeholder="" name="hari_operasional"
                  value="{{ $dataLembaga->hari_operasional }}">
                @error('hari_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="biaya-operasional">Biaya Operasional</label>
                <input type="number" class="form-control" id="biaya-operasional" placeholder=""
                  name="biaya_operasional" value="{{ $dataLembaga->biaya_operasional }}">
                @error('biaya_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="nomor-izin-operasional">Nomor Izin Operasional</label>
                <input type="number" class="form-control" id="nomor-izin-operasional" placeholder=""
                  name="nomor_izin_operasional" value="{{ $dataLembaga->nomor_izin_operasional }}">
                @error('nomor_izin_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="tanggal-selesai-operasional">Tanggal Selesai Izin Operasional</label>
                <input type="date" class="form-control" id="tanggal-selesai-operasional" placeholder=""
                  name="tanggal_selesai_izin_operasional" value="{{ $dataLembaga->tanggal_selesai_izin_operasional }}">
                @error('tanggal_selesai_izin_operasional')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="nomor-statistik">Nomor Statistik</label>
                <input type="number" class="form-control" id="nomor-statistik" placeholder="" name="nomor_statistik"
                  value="{{ $dataLembaga->nomor_statistik }}">
                @error('nomor_statistik')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="justify-content-end d-flex">
              <button type="submit" class="btn icon icon-left btn-primary"><i data-feather="check-circle"></i>
                Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
