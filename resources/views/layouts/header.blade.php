<header class='mb-3'>
  <nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item dropdown me-3">
            <a class="text-gray-600 nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
              data-bs-display="static" aria-expanded="false">
              <i class='bi bi-bell bi-sub fs-4'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-header">
                <h6>Notifications</h6>
              </li>
              <li class="dropdown-item notification-item">
                <a class="d-flex align-items-center" href="#">
                  <div class="notification-icon bg-primary">
                    <i class="bi bi-cart-check"></i>
                  </div>
                  <div class="notification-text ms-4">
                    <p class="font-bold notification-title">Successfully check out</p>
                    <p class="text-sm font-thin notification-subtitle">Order ID #256</p>
                  </div>
                </a>
              </li>
              <li class="dropdown-item notification-item">
                <a class="d-flex align-items-center" href="#">
                  <div class="notification-icon bg-success">
                    <i class="bi bi-file-earmark-check"></i>
                  </div>
                  <div class="notification-text ms-4">
                    <p class="font-bold notification-title">Homework submitted</p>
                    <p class="text-sm font-thin notification-subtitle">Algebra math homework</p>
                  </div>
                </a>
              </li>
              <li>
                <p class="py-2 mb-0 text-center"><a href="#">See all notification</a></p>
              </li>
            </ul>
          </li>
        </ul>
        <div class="dropdown">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                @role('admin')
                  <p class="mb-0 text-sm text-gray-600">Administrator</p>
                @endrole
                @role('asatidz')
                  <p class="mb-0 text-sm text-gray-600">Asatidz</p>
                @endrole
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                  <img src="/template/assets/images/faces/1.jpg">
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="icon-mid bi bi-gear me-2"></i>
                Settings</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
