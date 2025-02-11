<div class="tab-pane fade" id="biodata-kepala" role="tabpanel" aria-labelledby="biodata-kepala-tab">
  <form action="{{ route('setting.biodata_kepala.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Biodata Kepala</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama-kepala">Nama Kepala</label>
                <input type="text" class="form-control" id="nama-kepala" placeholder="" name="nama_kepala"
                  value="{{ $dataLembaga->nama_kepala }}">
                @error('nama_kepala')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control" id="nik" placeholder="" name="nik_kepala"
                  value="{{ $dataLembaga->nik_kepala }}">
                @error('nik_kepala')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="nomor-telepon-kepala">Nomor Telepon Kepala</label>
                <input type="number" class="form-control" id="nomor-telepon-kepala" placeholder=""
                  name="nomor_telepon_kepala" value="{{ $dataLembaga->nomor_telepon_kepala }}">
                @error('nomor_telepon_kepala')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="alamat-kepala">Alamat</label>
                <input type="text" class="form-control" id="alamat-kepala" placeholder="" name="alamat_kepala"
                  value="{{ $dataLembaga->alamat_kepala }}">
                @error('alamat_kepala')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="number" class="form-control" id="npwp" placeholder="" name="npwp_kepala"
                  value="{{ $dataLembaga->npwp_kepala }}">
                @error('npwp_kepala')
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
