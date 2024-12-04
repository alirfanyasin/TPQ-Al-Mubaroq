<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Title' }} | TPQ Al-Mubarok</title>

  <link rel="stylesheet" href="/template/assets/css/main/app.css">
  <link rel="stylesheet" href="/template/assets/css/main/app-dark.css">
  <link rel="shortcut icon" href="/template/assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="/template/assets/images/logo/favicon.png" type="image/png">
  <link rel="stylesheet" href="/template/assets/css/shared/iconly.css">

  @stack('css')
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

  @stack('js')

</body>

</html>
