<div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
  <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>
    Wajib membuat data jilid terlebih dahulu sebelum membuat kelas
  </div>

  <section class="section">
    <div class="row" id="basic-table">
      <div class="card">
        <div class="text-end">
          <button type="button" class="btn btn-primary d-inline-block icon icon-left " data-bs-toggle="modal"
            data-bs-target="#tambahKelasModal"><i data-feather="plus"></i>
            Tambah</button>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Nama Jilid</th>
                    <th>Nama Asatid (Wali Kelas) </th>
                    <th width="200px">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($dataKelas as $data)
                    <tr>
                      <td class="text-bold-500">{{ $no++ }}</td>
                      <td class="text-bold-500">{{ $data->nama }}</td>
                      <td class="text-bold-500">{{ $data->jilid->nama }}</td>
                      <td class="text-bold-500">{{ $data->asatidz->nama_lengkap }}</td>
                      <td>
                        <button type="button" class="btn d-inline-block icon" data-bs-toggle="modal"
                          data-bs-target="#editKelasModal-{{ $data->id }}"><i class="bi bi-pencil"></i></button>

                        <form action="{{ route('setting.destroy_kelas', ['id' => $data->id]) }}" method="POST"
                          class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>


                    {{-- Modal edit wali kelas start --}}
                    <form action="{{ route('setting.update_kelas', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editKelasModal-{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editKelasModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editKelasModalTitle">Edit Kelas
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="nama-kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama-kelas" name="nama"
                                  value="{{ $data->nama }}" required>
                              </div>
                              <fieldset class="form-group">
                                <label for="nama-jilid">Pilih Nama Jilid</label>
                                <select class="form-select" id="nama-jilid" name="jilid_id" required>
                                  @foreach ($dataJilid as $jilid)
                                    <option value="{{ $jilid->id }}"
                                      {{ $jilid->id == $data->jilid_id ? 'selected' : '' }}>
                                      {{ $jilid->nama }}
                                    </option>
                                  @endforeach
                                </select>
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="nama-asatidz">Pilih Nama Asatidz</label>
                                <select class="form-select" id="nama-asatidz" name="asatidz_id" required>
                                  @foreach ($dataAsatidz as $asatidz)
                                    <option value="{{ $asatidz->id }}"
                                      {{ $asatidz->id == $data->asatidz_id ? 'selected' : '' }}>
                                      {{ $asatidz->nama_lengkap }}</option>
                                  @endforeach
                                </select>
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

                    {{-- Modal edit wali kelas end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal create wali kelas start --}}
    <form action="{{ route('setting.store_kelas') }}" method="POST">
      @csrf
      <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahKelasModalTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahKelasModalTitle">Tambah Kelas
              </h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama-kelas">Nama Kelas</label>
                <input type="text" class="form-control" id="nama-kelas" name="nama" required>
                @error('nama')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <fieldset class="form-group">
                <label for="nama-jilid">Pilih Nama Jilid</label>
                <select class="form-select" id="nama-jilid" name="jilid_id" required>
                  @foreach ($dataJilid as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                  @endforeach
                </select>
              </fieldset>
              <fieldset class="form-group">
                <label for="nama-asatidz">Pilih Nama Asatidz (Wali Kelas)</label>
                <select class="form-select" id="nama-asatidz" name="asatidz_id" required>
                  @foreach ($dataAsatidz as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_lengkap }}</option>
                  @endforeach
                </select>
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
    {{-- Modal create wali kelas end --}}
  </section>
</div>
