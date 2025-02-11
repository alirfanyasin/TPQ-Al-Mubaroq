<div class="row">
    <div class="col-xl-4">
      {{-- Nama Satuan --}}
      <div class="form-group{{ $errors->has('nama_satuan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nama-satuan">Nama Satuan</label>
        <input type="text" name="nama_satuan" id="nama-satuan "
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('nama_satuan') ? ' is-invalid' : '' }}"
          value="{{ old('nama_satuan', $data->nama_satuan) }}" style="color: black" required>
  
        @if ($errors->has('nama_satuan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nama_satuan') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- NPSN --}}
      <div class="form-group{{ $errors->has('npsn') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="npsn">NPSN</label>
        <input type="number" name="npsn" id="npsn"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('npsn') ? ' is-invalid' : '' }}"
          value="{{ old('npsn', $data->npsn) }}" style="color: black" required>
  
        @if ($errors->has('npsn'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('npsn') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Bentuk Pendidikan --}}
      <div class="form-group{{ $errors->has('bentuk_pendidikan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="bentuk-pendidikan">Bentuk Pendidikan</label>
        <input type="text" name="bentuk_pendidikan" id="bentuk-pendidikan"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('bentuk_pendidikan') ? ' is-invalid' : '' }}"
          value="{{ old('bentuk_pendidikan', $data->bentuk_pendidikan) }}" style="color: black" required>
  
        @if ($errors->has('bentuk_pendidikan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('bentuk_pendidikan') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor Telepon --}}
      <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nomor-telepon">Nomor Telepon</label>
        <input type="number" name="no_telp" id="nomor-telepon"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
          value="{{ old('no_telp', $data->no_telp) }}" style="color: black" required>
  
        @if ($errors->has('no_telp'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_telp') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Cabang Nomor Rekening --}}
      <div class="form-group{{ $errors->has('cabang_norek') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="cabang-nomor-rekening">Cabang Nomor Rekening</label>
        <input type="number" name="cabang_norek" id="cabang-nomor-rekening"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('cabang_norek') ? ' is-invalid' : '' }}"
          value="{{ old('cabang_norek', $data->cabang_norek) }}" style="color: black" required>
  
        @if ($errors->has('cabang_norek'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cabang_norek') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor Rekening --}}
      <div class="form-group{{ $errors->has('norek') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nomor-rekening">Nomor Rekening</label>
        <input type="number" name="norek" id="nomor-rekening"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('norek') ? ' is-invalid' : '' }}"
          value="{{ old('norek', $data->norek) }}" style="color: black" required>
  
        @if ($errors->has('norek'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('norek') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nama Nomor Rekening --}}
      <div class="form-group{{ $errors->has('nama_norek') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nama-nomor-rekening">Nama Nomor Rekening</label>
        <input type="text" name="nama_norek" id="nama-nomor-rekening"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('nama_norek') ? ' is-invalid' : '' }}"
          value="{{ old('nama_norek', $data->nama_norek) }}" style="color: black" required>
  
        @if ($errors->has('nama_norek'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nama_norek') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- NPWP --}}
      <div class="form-group{{ $errors->has('npwp') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="npwp">NPWP</label>
        <input type="number" name="npwp" id="npwp"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('npwp') ? ' is-invalid' : '' }}"
          value="{{ old('npwp', $data->npwp) }}" style="color: black" required>
  
        @if ($errors->has('npwp'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('npwp') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nama Kepala --}}
      <div class="form-group{{ $errors->has('nama_kepala') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nama-kepala">Nama Kepala</label>
        <input type="text" name="nama_kepala" id="nama-kepala"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('nama_kepala') ? ' is-invalid' : '' }}"
          value="{{ old('nama_kepala', $data->nama_kepala) }}" style="color: black" required>
  
        @if ($errors->has('nama_kepala'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nama_kepala') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- NIK Kepala --}}
      <div class="form-group{{ $errors->has('nik_kepala') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nik-kepala">NIK Kepala</label>
        <input type="number" name="nik_kepala" id="nik-kepala"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('nik_kepala') ? ' is-invalid' : '' }}"
          value="{{ old('nik_kepala', $data->nik_kepala) }}" style="color: black" required>
  
        @if ($errors->has('nik_kepala'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nik_kepala') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-xl-4">
      {{-- Alamat Kepala --}}
      <div class="form-group{{ $errors->has('alamat_kepala') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="alamat-kepala">Alamat Kepala</label>
        <input type="text" name="alamat_kepala" id="alamat-kepala"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('alamat_kepala') ? ' is-invalid' : '' }}"
          value="{{ old('alamat_kepala', $data->alamat_kepala) }}" style="color: black" required>
  
        @if ($errors->has('alamat_kepala'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('alamat_kepala') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor Handphone Kepala --}}
      <div class="form-group{{ $errors->has('no_hp_kepala') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nomor-handphone-kepala">Nomor Handphone Kepala</label>
        <input type="number" name="no_hp_kepala" id="nomor-handphone-kepala"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('no_hp_kepala') ? ' is-invalid' : '' }}"
          value="{{ old('no_hp_kepala', $data->no_hp_kepala) }}" style="color: black" required>
  
        @if ($errors->has('no_hp_kepala'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_hp_kepala') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nama Ketua Yayasan --}}
      <div class="form-group{{ $errors->has('nama_ketua_yayasan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nama-ketua-yayasan">Nama Ketua Yayasan</label>
        <input type="text" name="nama_ketua_yayasan" id="nama-ketua-yayasan"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('nama_ketua_yayasan') ? ' is-invalid' : '' }}"
          value="{{ old('nama_ketua_yayasan', $data->nama_ketua_yayasan) }}" style="color: black" required>
  
        @if ($errors->has('nama_ketua_yayasan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nama_ketua_yayasan') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Kepemilikan Lembaga --}}
      <div class="form-group{{ $errors->has('kepemilikan_lembaga') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="kepemilikan-lembaga">Kepemilikan Lembaga</label>
        <input type="text" name="kepemilikan_lembaga" id="kepemilikan-lembaga"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('kepemilikan_lembaga') ? ' is-invalid' : '' }}"
          value="{{ old('kepemilikan_lembaga', $data->kepemilikan_lembaga) }}" style="color: black" required>
  
        @if ($errors->has('kepemilikan_lembaga'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('kepemilikan_lembaga') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Status Kepemilikan --}}
      <div class="form-group{{ $errors->has('status_kepemilikan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="status-kepemilikan">Status Kepemilikan</label>
        <input type="text" name="status_kepemilikan" id="status-kepemilikan"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('status_kepemilikan') ? ' is-invalid' : '' }}"
          value="{{ old('status_kepemilikan', $data->status_kepemilikan) }}" style="color: black" required>
  
        @if ($errors->has('status_kepemilikan'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('status_kepemilikan') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Tempat Lembaga --}}
      <div class="form-group{{ $errors->has('tempat_lembaga') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="tempat-lembaga">Tempat Lembaga</label>
        <input type="text" name="tempat_lembaga" id="tempat-lembaga"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('tempat_lembaga') ? ' is-invalid' : '' }}"
          value="{{ old('tempat_lembaga', $data->tempat_lembaga) }}" style="color: black" required>
  
        @if ($errors->has('tempat_lembaga'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tempat_lembaga') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Biaya Operasional --}}
      <div class="form-group{{ $errors->has('biaya_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="biaya-operasional">Biaya Operasional</label>
        <input type="number" name="biaya_operasional" id="biaya-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('biaya_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('biaya_operasional', $data->biaya_operasional) }}" style="color: black" required>
  
        @if ($errors->has('biaya_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('biaya_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Sumber Dana --}}
      <div class="form-group{{ $errors->has('sumber_dana') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="sumber-dana">Sumber Dana</label>
        <input type="text" name="sumber_dana" id="sumber-dana"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('sumber_dana') ? ' is-invalid' : '' }}"
          value="{{ old('sumber_dana', $data->sumber_dana) }}" style="color: black" required>
  
        @if ($errors->has('sumber_dana'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sumber_dana') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Jumlah Kelompok Belajar --}}
      <div class="form-group{{ $errors->has('jumlah_kelompok_belajar') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="jumlah-kelompok-belajar">Jumlah Kelompok Belajar</label>
        <input type="number" name="jumlah_kelompok_belajar" id="jumlah-kelompok-belajar"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('jumlah_kelompok_belajar') ? ' is-invalid' : '' }}"
          value="{{ old('jumlah_kelompok_belajar', $data->jumlah_kelompok_belajar) }}" style="color: black" required>
  
        @if ($errors->has('jumlah_kelompok_belajar'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('jumlah_kelompok_belajar') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Metode Pembelajaran --}}
      <div class="form-group{{ $errors->has('metode_pembelajaran') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="metode-pembelajaran">Metode Pembelajaran</label>
        <input type="text" name="metode_pembelajaran" id="metode-pembelajaran"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('metode_pembelajaran') ? ' is-invalid' : '' }}"
          value="{{ old('metode_pembelajaran', $data->metode_pembelajaran) }}" style="color: black" required>
  
        @if ($errors->has('metode_pembelajaran'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('metode_pembelajaran') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-xl-4">
      {{-- Jam Operasional --}}
      <div class="form-group{{ $errors->has('jam_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="jam-operasional">Jam Operasional</label>
        <input type="text" name="jam_operasional" id="jam-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('jam_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('jam_operasional', $data->jam_operasional) }}" style="color: black" required>
  
        @if ($errors->has('jam_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('jam_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Hari Operasional --}}
      <div class="form-group{{ $errors->has('hari_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="hari-operasional">Hari Operasional</label>
        <input type="text" name="hari_operasional" id="hari-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('hari_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('hari_operasional', $data->hari_operasional) }}" style="color: black" required>
  
        @if ($errors->has('hari_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('hari_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Tanggal SK Pendirian --}}
      <div class="form-group{{ $errors->has('tgl_sk_pendirian') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="tgl-sk-pendirian">Tanggal SK Pendirian</label>
        <input type="date" name="tgl_sk_pendirian" id="tgl-sk-pendirian"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('tgl_sk_pendirian') ? ' is-invalid' : '' }}"
          value="{{ old('tgl_sk_pendirian', $data->tgl_sk_pendirian) }}" style="color: black" required>
  
        @if ($errors->has('tgl_sk_pendirian'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tgl_sk_pendirian') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor SK Pendirian --}}
      <div class="form-group{{ $errors->has('no_sk_pendirian') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="no-sk-pendirian">Nomor SK Pendirian</label>
        <input type="text" name="no_sk_pendirian" id="no-sk-pendirian"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('no_sk_pendirian') ? ' is-invalid' : '' }}"
          value="{{ old('no_sk_pendirian', $data->no_sk_pendirian) }}" style="color: black" required>
  
        @if ($errors->has('no_sk_pendirian'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_sk_pendirian') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor Izin Operasional --}}
      <div class="form-group{{ $errors->has('no_izin_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nomor-izin-operasional">Nomor Izin Operasional</label>
        <input type="text" name="no_izin_operasional" id="nomor-izin-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('no_izin_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('no_izin_operasional', $data->no_izin_operasional) }}" style="color: black" required>
  
        @if ($errors->has('nomor_izin_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nomor_izin_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Nomor Statistik --}}
      <div class="form-group{{ $errors->has('no_statistik') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="nomor-statistik">Nomor Statistik</label>
        <input type="text" name="no_statistik" id="nomor-statistik"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('no_statistik') ? ' is-invalid' : '' }}"
          value="{{ old('no_statistik', $data->no_statistik) }}" style="color: black" required>
  
        @if ($errors->has('no_statistik'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_statistik') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Tanggal Mulai Izin Operasional --}}
      <div class="form-group{{ $errors->has('tgl_mulai_izin_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="tanggal-mulai-izin-operasional">Tanggal Mulai Izin Operasional</label>
        <input type="date" name="tgl_mulai_izin_operasional" id="tanggal-mulai-izin-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('tgl_mulai_izin_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('tgl_mulai_izin_operasional', $data->tgl_mulai_izin_operasional) }}" style="color: black"
          required>
  
        @if ($errors->has('tgl_mulai_izin_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tgl_mulai_izin_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Tanggal Izin Operasional --}}
      <div class="form-group{{ $errors->has('tgl_izin_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="tanggal-izin-operasional">Tanggal Izin Operasional</label>
        <input type="date" name="tgl_izin_operasional" id="tanggal-izin-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('tgl_izin_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('tgl_izin_operasional', $data->tgl_izin_operasional) }}" style="color: black" required>
  
        @if ($errors->has('tgl_izin_operasional'))x
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tgl_izin_operasional') }}</strong>
          </span>
        @endif
      </div>
  
      {{-- Tanggal Selesai Operasional --}}
      <div class="form-group{{ $errors->has('tgl_selesai_operasional') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="tanggal-selesai-operasional">Tanggal Selesai Operasional</label>
        <input type="date" name="tgl_selesai_operasional" id="tanggal-selesai-operasional"
          class="font-semibold text-black bg-light form-control form-control-alternative{{ $errors->has('tgl_selesai_operasional') ? ' is-invalid' : '' }}"
          value="{{ old('tgl_selesai_operasional', $data->tgl_selesai_izin_operasional) }}" style="color: black"
          required>
  
        @if ($errors->has('tgl_selesai_operasional'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tgl_selesai_operasional') }}</strong>
          </span>
        @endif
      </div>
  
    </div>
  </div>
  