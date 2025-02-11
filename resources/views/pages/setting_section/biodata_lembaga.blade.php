  <div class="tab-pane fade show active" id="biodata-lembaga" role="tabpanel" aria-labelledby="biodata-lembaga-tab">
    <form action="{{ route('setting.biodata_lembaga.update') }}" method="POST">
      @csrf
      @method('PATCH')
      <section class="section">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Biodata Lembaga</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama-satuan">Nama Satuan</label>
                  <input type="text" class="form-control" id="nama-satuan" placeholder="" name="nama_satuan"
                    value="{{ $dataLembaga->nama_satuan }}">
                  @error('nama_satuan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="bentuk-pendidikan">Bentuk Pendidikan</label>
                  <input type="text" class="form-control" id="bentuk-pendidikan" placeholder=""
                    name="bentuk_pendidikan" value="{{ $dataLembaga->bentuk_pendidikan }}">
                  @error('bentuk_pendidikan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor-telepon-lembaga">Nomor Telepon Lembaga</label>
                  <input type="number" class="form-control" id="nomor-telepon-lembaga" placeholder=""
                    name="nomor_telepon_lembaga" value="{{ $dataLembaga->nomor_telepon_lembaga }}">
                  @error('nomor_telepon_lembaga')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor-rekening">Nomor Rekening</label>
                  <input type="number" class="form-control" id="nomor-rekening" placeholder="" name="nomor_rekening"
                    value="{{ $dataLembaga->nomor_rekening }}">
                  @error('nomor_rekening')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama-ketua-yayasan">Nama Ketua Yayasan</label>
                  <input type="text" class="form-control" id="nama-ketua-yayasan" placeholder=""
                    name="nama_ketua_yayasan" value="{{ $dataLembaga->nama_ketua_yayasan }}">
                  @error('nama_ketua_yayasan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="sumber-dana">Sumber Dana</label>
                  <input type="text" class="form-control" id="sumber-dana" placeholder="" name="sumber_dana"
                    value="{{ $dataLembaga->sumber_dana }}">
                  @error('sumber_dana')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tanggal-sk-pendirian">Tanggal SK Pendirian</label>
                  <input type="date" class="form-control" id="tanggal-sk-pendirian" placeholder=""
                    name="tanggal_sk_berdiri" value="{{ $dataLembaga->tanggal_sk_berdiri }}">
                  @error('tanggal_sk_berdiri')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jumlah-kelompok-belajar">Jumlah Kelompok Belajar</label>
                  <input type="number" class="form-control" id="jumlah-kelompok-belajar" placeholder=""
                    name="jumlah_kelompok_belajar" value="{{ $dataLembaga->jumlah_kelompok_belajar }}">
                  @error('jumlah_kelompok_belajar')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="npsn">NPSN</label>
                  <input type="number" class="form-control" id="npsn" placeholder="" name="npsn"
                    value="{{ $dataLembaga->npsn }}">
                  @error('npsn')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tempat-lembaga">Tempat Lembaga</label>
                  <input type="text" class="form-control" id="tempat-lembaga" placeholder="" name="tempat_lembaga"
                    value="{{ $dataLembaga->tempat_lembaga }}">
                  @error('tempat_lembaga')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="cabang-nomor-rekening">Cabang Nomor Rekening</label>
                  <input type="number" class="form-control" id="cabang-nomor-rekening" placeholder=""
                    name="cabang_nomor_rekening" value="{{ $dataLembaga->cabang_nomor_rekening }}">
                  @error('cabang_nomor_rekening')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama-nomor-rekening">Nama Nomor Rekening</label>
                  <input type="text" class="form-control" id="nama-nomor-rekening" placeholder=""
                    name="nama_nomor_rekening" value="{{ $dataLembaga->nama_nomor_rekening }}">
                  @error('nama_nomor_rekening')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kepemilikan-lembaga">Kepemilikan Lembaga</label>
                  <input type="text" class="form-control" id="kepemilikan-lembaga" placeholder=""
                    name="kepemilikan_lembaga" value="{{ $dataLembaga->kepemilikan_lembaga }}">
                  @error('kepemilikan_lembaga')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="status-kepemilikan">Status Kepemilikan</label>
                  <input type="text" class="form-control" id="status-kepemilikan" placeholder=""
                    name="status_kepemilikan" value="{{ $dataLembaga->status_kepemilikan }}">
                  @error('status_kepemilikan')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="metode-pembelajaran">Metode Pembelajaran</label>
                  <input type="text" class="form-control" id="metode-pembelajaran" placeholder=""
                    name="metode_pembelajaran" value="{{ $dataLembaga->metode_pembelajaran }}">
                  @error('metode_pembelajaran')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nomor-sk-pendirian">Nomor SK Pendirian</label>
                  <input type="number" class="form-control" id="nomor-sk-pendirian" placeholder=""
                    name="nomor_sk_pendirian" value="{{ $dataLembaga->nomor_sk_pendirian }}">
                  @error('nomor_sk_pendirian')
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
