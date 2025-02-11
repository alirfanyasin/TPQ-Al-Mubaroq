<div class="tab-pane fade" id="alamat-lembaga" role="tabpanel" aria-labelledby="alamat-lembaga-tab">
  <form action="{{ route('setting.alamat_lembaga.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Alamat Lembaga</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="detail-alamat">Detail Alamat</label>
                <input type="text" class="form-control" id="detail-alamat" placeholder="" name="detail_alamat"
                  value="{{ $dataLembaga->detail_alamat }}">
                @error('detail_alamat')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="rt">RT</label>
                <input type="text" class="form-control" id="rt" placeholder="" name="rt"
                  value="{{ $dataLembaga->rt }}">
                @error('rt')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" placeholder="" name="kecamatan"
                  value="{{ $dataLembaga->kecamatan }}">
                @error('kecamatan')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="garis-bujur">Garis Bujur</label>
                <input type="text" class="form-control" id="garis-bujur" placeholder="" name="garis_bujur"
                  value="{{ $dataLembaga->garis_bujur }}">
                @error('garis_bujur')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kelurahan-atau-desa">Kelurahan / Desa</label>
                <input type="text" class="form-control" id="kelurahan-atau-desa" placeholder=""
                  name="kelurahan_or_desa" value="{{ $dataLembaga->kelurahan_or_desa }}">
                @error('kelurahan_or_desa')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="rw">RW</label>
                <input type="text" class="form-control" id="rw" placeholder="" name="rw"
                  value="{{ $dataLembaga->rw }}">
                @error('rw')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="kabupaten">Kabupaten / Kota</label>
                <input type="text" class="form-control" id="kabupaten" placeholder="" name="kabupaten"
                  value="{{ $dataLembaga->kabupaten }}">
                @error('kabupaten')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="garis-lintang">Garis Lintang</label>
                <input type="text" class="form-control" id="garis-lintang" placeholder="" name="garis_lintang"
                  value="{{ $dataLembaga->garis_lintang }}">
                @error('garis_lintang')
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
