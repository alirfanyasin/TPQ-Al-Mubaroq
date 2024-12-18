<div class="row">
    <div class="col-xl-4">
      {{-- No. Rumah dan Nama Jalan --}}
      <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="no-rumah-nama-jalan">No. Rumah dan Nama Jalan</label>
        <input type="text" name="alamat" id="no-rumah-nama-jalan"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
          value="{{ old('alamat', $data->alamat) }}"
               style="color: black" required>
  
        @if ($errors->has('alamat'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('alamat') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Rt --}}
      <div class="form-group{{ $errors->has('rt') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="rt">Rt</label>
        <input type="number" name="rt" id="rt"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('rt') ? ' is-invalid' : '' }}"
          value="{{ old('rt', $data->rt) }}"
               style="color: black" required>
  
        @if ($errors->has('rt'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('rt') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Rw --}}
      <div class="form-group{{ $errors->has('rw') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="rw">Rw</label>
        <input type="number" name="rw" id="rw"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('rw') ? ' is-invalid' : '' }}"
          value="{{ old('rw', $data->rw) }}"
               style="color: black" required>
  
        @if ($errors->has('rw'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('rw') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Kelurahan atau Desa --}}
      <div class="form-group{{ $errors->has('kelurahan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="kelurahan-desa">Kelurahan atau Desa</label>
        <input type="text" name="kelurahan" id="kelurahan-desa"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('kelurahan') ? ' is-invalid' : '' }}"
          value="{{ old('kelurahan', $data->kelurahan) }}"
               style="color: black" required>
  
        @if ($errors->has('kelurahan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('kelurahan') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-xl-4">
      {{-- Kecamatan --}}
      <div class="form-group{{ $errors->has('kecamatan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="kecamatan">Kecamatan</label>
        <input type="text" name="kecamatan" id="kecamatan"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
          value="{{ old('kecamatan', $data->kecamatan) }}"
               style="color: black" required>
  
        @if ($errors->has('kecamatan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('kecamatan') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Kabupaten --}}
      <div class="form-group{{ $errors->has('kabupaten') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="kabupaten">Kabupaten</label>
        <input type="text" name="kabupaten" id="kabupaten"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('kabupaten') ? ' is-invalid' : '' }}"
          value="{{ old('kabupaten', $data->kabupaten) }}"
               style="color: black" required>
  
        @if ($errors->has('kabupaten'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('kabupaten') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Garis Bujur --}}
      <div class="form-group{{ $errors->has('bujur') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="garis-bujur">Garis Bujur</label>
        <input type="text" name="bujur" id="garis-bujur"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('bujur') ? ' is-invalid' : '' }}"
          value="{{ old('bujur', $data->bujur) }}"
               style="color: black" required>
  
        @if ($errors->has('bujur'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('bujur') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Garis Lintang --}}
      <div class="form-group{{ $errors->has('lintang') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="garis-lintang">Garis Lintang</label>
        <input type="text" name="lintang" id="garis-lintang"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('lintang') ? ' is-invalid' : '' }}"
          value="{{ old('lintang', $data->lintang) }}"
               style="color: black" required>
  
        @if ($errors->has('lintang'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('lintang') }}</strong>
          </span>
        @endif
      </div>
  
    </div>
  </div>
  