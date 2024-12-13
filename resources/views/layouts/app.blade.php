<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Title' }} | TPQ Al-Mubarok</title>

  <link rel="stylesheet" href="/template/assets/css/main/app.css">
  <link rel="stylesheet" href="/template/assets/css/main/app-dark.css">
  <link rel="shortcut icon" href="/template/assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="/template/assets/images/logo/favicon.png" type="image/png">
  <link rel="stylesheet" href="/template/assets/css/shared/iconly.css">
  <link rel="stylesheet" href="/template/assets/extensions/sweetalert2/sweetalert2.min.css">
  @stack('css')
  <style>
    .swal2-popup {
      background-color: white;
      /* Default untuk mode terang */
    }
  </style>
</head>

<body>
  <div id="app">
    @include('layouts.sidebar')
    <div id="main" class='layout-navbar'>
      @include('layouts.header')
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            @yield('breadcrumb')
          </div>
          @yield('content')
        </div>
        {{-- @include('layouts.footer') --}}
      </div>
    </div>
  </div>
  <script src="/template/assets/js/bootstrap.js"></script>
  <script src="/template/assets/js/app.js"></script>
  <script src="/template/assets/extensions/sweetalert2/sweetalert2.min.js"></script>>
  <script src="/template/assets/js/pages/sweetalert2.js"></script>>

  @stack('js')
  @include('sweetalert::alert')


</body>

</html>
