<div class="tab-pane fade" id="rapor" role="tabpanel" aria-labelledby="rapor-tab">
  <section class="section">
    <div class="row" id="basic-table">
      <div class="card">
        <div class="text-end">
          <button type="button" class="btn btn-primary d-inline-block icon icon-left " data-bs-toggle="modal"
            data-bs-target="#addRaporModal"><i data-feather="plus"></i>
            Tambah</button>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th width="200px">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($dataRapor as $data)
                    <tr>
                      <td class="text-bold-500">{{ $no++ }}</td>
                      <td class="text-bold-500">{{ $data->tahun_ajaran }}</td>
                      <td class="text-bold-500">{{ $data->semester == 0 ? 'Genap' : 'Ganjil' }}</td>
                      <td>
                        <button type="button" class="btn d-inline-block icon" data-bs-toggle="modal"
                          data-bs-target="#editRaporModal-{{ $data->id }}"><i class="bi bi-pencil"></i></button>

                        <form action="{{ route('setting.destroy_rapor', ['id' => $data->id]) }}" method="POST"
                          class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>

                    {{-- Modal edit rapor start --}}
                    <form action="{{ route('setting.update_rapor', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editRaporModal-{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editRaporModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editRaporModalTitle">Edit Rapor
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <fieldset class="form-group">
                                <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
                                <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                                  <option value="{{ date('Y') - 1 . '/' . date('Y') }}"
                                    {{ $data->tahun_ajaran == date('Y') - 1 . '/' . date('Y') ? 'selected' : '' }}>
                                    {{ date('Y') - 1 }}
                                    /
                                    {{ date('Y') }}</option>
                                  <option value="{{ date('Y') . '/' . date('Y') + 1 }}"
                                    {{ $data->tahun_ajaran == date('Y') . '/' . date('Y') + 1 ? 'selected' : '' }}>
                                    {{ date('Y') }}
                                    /
                                    {{ date('Y') + 1 }}</option>
                                  <option value="{{ date('Y') + 1 . '/' . date('Y') + 2 }}"
                                    {{ $data->tahun_ajaran == date('Y') + 1 . '/' . date('Y') + 2 ? 'selected' : '' }}>
                                    {{ date('Y') + 1 }}
                                    /
                                    {{ date('Y') + 2 }}</option>
                                </select>
                                @error('tahun_ajaran')
                                  <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="semester">Pilih Semester</label>
                                <select class="form-select" id="semester" name="semester" required>
                                  <option value="0" {{ $data->semester == 0 ? 'selected' : '' }}>Genap</option>
                                  <option value="1" {{ $data->semester == 1 ? 'selected' : '' }}>Ganjil</option>
                                </select>
                                @error('tahun_ajaran')
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
    <form action="{{ route('setting.store_rapor') }}" method="POST">
      @csrf
      <div class="modal fade" id="addRaporModal" tabindex="-1" role="dialog" aria-labelledby="addRaporModalTitle"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addRaporModalTitle">Tambah Rapor
              </h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <div class="modal-body">
              <fieldset class="form-group">
                <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
                <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                  <option value="{{ date('Y') - 1 . '/' . date('Y') }}">{{ date('Y') - 1 }}
                    /
                    {{ date('Y') }}</option>
                  <option value="{{ date('Y') . '/' . date('Y') + 1 }}" selected>
                    {{ date('Y') }}
                    /
                    {{ date('Y') + 1 }}</option>
                  <option value="{{ date('Y') + 1 . '/' . date('Y') + 2 }}">{{ date('Y') + 1 }}
                    /
                    {{ date('Y') + 2 }}</option>
                </select>
                @error('tahun_ajaran')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </fieldset>
              <fieldset class="form-group">
                <label for="semester">Pilih Semester</label>
                <select class="form-select" id="semester" name="semester" required>
                  <option value="0">Genap</option>
                  <option value="1">Ganjil</option>
                </select>
                @error('tahun_ajaran')
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
