<div class="tab-pane fade" id="jilid" role="tabpanel" aria-labelledby="jilid-tab">
  <section class="section">
    <div class="row" id="basic-table">
      <div class="card">
        <div class="text-end">
          <button type="button" class="btn icon icon-left btn-primary d-inline-block" data-bs-toggle="modal"
            data-bs-target="#tambahJilidModal"><i data-feather="plus"></i>
            Tambah
          </button>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th width="200px">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dataJilid as $data)
                    <tr>
                      <td class="text-bold-500">{{ $data->nama }}</td>
                      <td>
                        <button type="button" class="btn icon d-inline-block" data-bs-toggle="modal"
                          data-bs-target="#editJilidModal-{{ $data->id }}">
                          <i class="bi bi-pencil"></i>
                        </button>
                        <form action="{{ route('setting.destroy_jilid', ['id' => $data->id]) }}" method="POST"
                          class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn icon" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>


                    {{-- Modal edit start --}}
                    <form action="{{ route('setting.update_jilid', ['id' => $data->id]) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="modal fade" id="editJilidModal-{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editJilidModalTitle" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editJilidModalTitle">Edit Jilid
                              </h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="nama-jilid">Nama Jilid</label>
                                <input type="text" class="form-control" id="nama-jilid" name="nama" required
                                  value="{{ $data->nama }}">
                              </div>
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
                    {{-- Modal edit end --}}
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal create start --}}
    <form action="{{ route('setting.store_jilid') }}" method="POST">
      @csrf
      <div class="modal fade" id="tambahJilidModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahJilidModalTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahJilidModalTitle">Tambah Jilid
              </h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama-jilid">Nama Jilid</label>
                <input type="text" class="form-control" id="nama-jilid" name="nama" required>
              </div>
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
    {{-- Modal create end --}}
  </section>
</div>
