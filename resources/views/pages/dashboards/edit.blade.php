@extends('layouts.app')
@section('breadcrumb')
  <div class="row">
    <div class="order-last col-12 col-md-6 order-md-1">
      <h3>Edit Data dashboard</h3>
    </div>
    <div class="order-first col-12 col-md-6 order-md-2">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">App</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection
@section('content')
  <div class="container-fluid mt-6">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card mb-5">
          <div class="card-body">
            <form id="dashboardForm" action="{{ route('update.dashboard', ['id' => $data->id]) }}" method="POST">
              @csrf
              @method('PUT')
              
              <h2 class="mb-2">Biodata</h2>
              @include('pages.dashboards.partials.form_biodata')

              <h2 class="mt-3 mb-2">Alamat TPQ</h2>
              @include('pages.dashboards.partials.form_alamat')

              <div class="form-check mb-3" style="margin-top: 30px">
                <input class="form-check-input" id="customCheck5" type="checkbox" required>
                <label class="form-check-label" for="customCheck5">Data yang saya inputkan sudah benar</label>
              </div>

              <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-light btn-lg me-2" href="/">
                  Kembali ke Halaman Sebelumnya
                </a>
                <button class="btn btn-warning btn-lg" type="button" onclick="checkAndOpenModal()">
                  Submit Biodata dan Alamat TPQ
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Submit Edit --}}
  <div class="modal fade" id="confirmSubmit" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <h4 class="text-center mx-5 mt-5">
          Apakah anda yakin untuk mensubmit data yang telah dimasukkan?
        </h4>
        <button type="button" class="btn btn-secondary mx-5 mb-4 mt-4" onclick="submitForm()">
          Yakin, Submit Data Sekarang!
        </button>
        <button type="button" class="btn btn-primary mx-5 mb-5" data-bs-dismiss="modal">
          Aku cek lagi aja deh
        </button>
      </div>
    </div>
  </div>

  {{-- Modal Required --}}
  <div class="modal fade" id="alertModal" tabindex="1" role="dialog" aria-labelledby="alertModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <svg class="mt-4" width="100" height="100" viewBox="0 0 126 126" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_167_5463)">
            <path
              d="M63 0C28.2082 0 0 28.2082 0 63C0 97.7918 28.2082 126 63 126C97.7918 126 126 97.7918 126 63C126 28.2082 97.7918 0 63 0ZM94.1614 83.0261L83.0261 94.1614L63 74.1352L42.9739 94.1614L31.8386 83.0261L51.8647 63L31.8386 42.9739L42.9739 31.8386L63 51.8647L83.0261 31.8386L94.1614 42.9739L74.1352 63L94.1614 83.0261Z"
              fill="#991218" />
          </g>
          <defs>
            <clipPath id="clip0_167_5463">
              <rect width="126" height="126" fill="white" />
            </clipPath>
          </defs>
        </svg>
        <h3 class="text-center mx-5 mt-1">
          Mohon Maaf :(
        </h3>

        <h6 class="text-center mx-5" id="ErrrMM"></h6>

        <button type="button" class="btn btn-primary mx-5 mb-5 mt-2" data-bs-dismiss="modal">
          Aku cek lagi aja deh
        </button>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Function to check the checkbox status and open the modal
    function checkAndOpenModal() {
      // Check if the form is valid and filled
      if ($('#dashboardForm')[0].checkValidity() && $('#customCheck5').is(':checked')) {
        openModalSubmit();
      } else {
        const pesan = $('#dashboardForm')[0].checkValidity() ? 'Mohon centang checkbox' : 'Mohon isi semua form';
        openModalAlert(pesan);
      }
    }

    // Function to open modal
    function openModal() {
      $('.modal')
        .on('show.bs.modal', function() {
          if (!$(this).parent().is('body')) {
            $(this).appendTo('body');
          }

          $(this).removeClass('blur');

          $('body').children().not(this).addClass('blur');
        })

        .on('hide.bs.modal', function() {
          var modal = $('.modal.show').not(this);
          modal = modal.eq(modal.length - 1);

          var blurItems = $('body').children().not(this);

          if (modal.length) {
            modal.removeClass('blur');
          } else {
            blurItems.removeClass('blur');
          }
        });
    }

    // Function to open modal for form submission
    function openModalSubmit() {
      openModal();
      $('#confirmSubmit').modal('show');
    }

    // open modal alert
    function openModalAlert(pesan) {
      $('#ErrrMM').text(pesan);
      $('#alertModal').modal('show');
    }

    // Function to submit the form
    function submitForm() {
      $('#dashboardForm').submit();
    }
  </script>
@endpush
