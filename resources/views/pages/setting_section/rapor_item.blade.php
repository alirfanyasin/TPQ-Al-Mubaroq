<div class="tab-pane fade" id="rapor" role="tabpanel" aria-labelledby="rapor-tab">
  <section class="section">
    <div class="row" id="basic-table">
      <div class="card">
        <div class="text-end">
          <button type="button" class="btn btn-primary d-inline-block icon icon-left " data-bs-toggle="modal"
            data-bs-target="#addRaporItemModal"><i data-feather="plus"></i>
            Tambah</button>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Item Penilaian</th>
                    <th>Jenis Penilaian</th>
                    <th>Jilid</th>
                    <th>Semester</th>
                    <th width="200px">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($dataRaporItem as $data)
                    <tr>
                      <td class="text-bold-500">{{ $no++ }}</td>
                      <td class="text-bold-500">{{ $data->nama }}</td>
                      <td class="text-bold-500">{{ $data->jenis_penilaian }}</td>
                      <td class="text-bold-500">{{ $data->jilid->nama }}</td>
                      <td class="text-bold-500">{{ $data->semester->nama }}</td>
                      <td>
                        <button type="button" class="btn d-inline-block icon" data-bs-toggle="modal"
                          data-bs-target="#editRaporItemModal-{{ $data->id }}"><i class="bi bi-pencil"></i></button>

                        <form action="{{ route('setting.rapor.destroy_item', ['id' => $data->id]) }}" method="POST"
                          class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>

                    {{-- Modal edit rapor start --}}
                    <form action="{{ route('setting.rapor.update_item', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editRaporItemModal-{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editRaporItemModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editRaporItemModalTitle">Edit Rapor Item Penilaian
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="nama_item">Nama Item Penilaian</label>
                                <input type="text" class="form-control" id="nama_item" name="nama" required
                                  value="{{ $data->nama }}">
                                @error('nama')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                              <fieldset class="form-group">
                                <label for="jenis_penilaian">Pilih Jenis Penilaian</label>
                                <select class="form-select" id="jenis_penilaian" name="jenis_penilaian" required>
                                  <option value="BACA TULIS AL-QURAN">BACA TULIS AL-QURAN</option>
                                  <option value="HAFALAN DOA HARIAN">HAFALAN DOA HARIAN</option>
                                  <option value="HAFALAN SURAH PENDEK">HAFALAN SURAH PENDEK</option>
                                  <option value="PRAKTEK GERAKAN">PRAKTEK GERAKAN</option>
                                  <option value="HAFALAN HADIST">HAFALAN HADIST</option>
                                  <option value="TEORI WUDLU & SHOLAT">TEORI WUDLU & SHOLAT</option>
                                </select>
                                @error('jenis_penilaian')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="nama-jilid">Pilih Nama Jilid</label>
                                <select class="form-select" id="nama-jilid" name="jilid_id" required>
                                  @foreach ($dataJilid as $jilid)
                                    <option value="{{ $jilid->id }}"
                                      {{ $jilid->id === $data->jilid_id ? 'selected' : '' }}>{{ $jilid->nama }}
                                    </option>
                                  @endforeach
                                </select>
                                @error('jilid_id')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="semester">Pilih Semester</label>
                                <select class="form-select" id="semester" name="semester_id" required>
                                  <option value="1" {{ $data->semester_id == 1 ? 'selected' : '' }}>Ganjil
                                  </option>
                                  <option value="2" {{ $data->semester_id == 2 ? 'selected' : '' }}>Genap</option>
                                </select>
                                @error('semester_id')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Kembali</span>
                              </button>
                              <button type="submit" class="ml-1 btn btn-primary" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Update</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                    {{-- Modal edit rapor end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal create rapor start --}}
    <form action="{{ route('setting.rapor.store_item') }}" method="POST">
      @csrf
      <div class="modal fade" id="addRaporItemModal" tabindex="-1" role="dialog"
        aria-labelledby="addRaporItemModalTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addRaporItemModalTitle">Tambah Rapor
              </h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label for="nama_item">Nama Item Penilaian</label>
                <input type="text" class="form-control" id="nama_item" name="nama" required>
                @error('nama')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <fieldset class="form-group">
                <label for="jenis_penilaian">Pilih Jenis Penialaian</label>
                <select class="form-select" id="jenis_penilaian" name="jenis_penilaian" required>
                  <option value="BACA TULIS AL-QURAN">BACA TULIS AL-QURAN</option>
                  <option value="HAFALAN DOA HARIAN">HAFALAN DOA HARIAN</option>
                  <option value="HAFALAN SURAH PENDEK">HAFALAN SURAH PENDEK</option>
                  <option value="PRAKTEK GERAKAN">PRAKTEK GERAKAN</option>
                  <option value="HAFALAN HADIST">HAFALAN HADIST</option>
                  <option value="TEORI WUDLU & SHOLAT">TEORI WUDLU & SHOLAT</option>
                </select>
                @error('jenis_penilaian')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </fieldset>
              <fieldset class="form-group">
                <label for="nama-jilid">Pilih Nama Jilid</label>
                <select class="form-select" id="nama-jilid" name="jilid_id" required>
                  @foreach ($dataJilid as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                  @endforeach
                </select>
                @error('jilid_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </fieldset>
              <fieldset class="form-group">
                <label for="semester">Pilih Semester</label>
                <select class="form-select" id="semester" name="semester_id" required>
                  <option value="1">Ganjil</option>
                  <option value="2">Genap</option>
                </select>
                @error('semester_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </fieldset>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Kembali</span>
              </button>
              <button type="submit" class="ml-1 btn btn-primary" data-bs-dismiss="modal">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Tambah</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- Modal create rapor end --}}
  </section>
</div>
