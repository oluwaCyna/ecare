<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eCare</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
<!-- My style -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
{{-- @vite(['resources/js/app.js']) --}}


@yield('scss-script')
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
{{-- <body class="hold-transition sidebar-mini layout-fixed"> --}}
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="adminlte/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->first_name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  {{-- Authentication for each role --}}


  {{-- @case('admin') --}}
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><i>e</i>Care</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="d-flex flex-column">
        <div class="user-panel pb-3 d-flex">
          {{-- <div class="image">
            <img src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" class="img-circle elevation-2" style="height: 35px;" alt="User Image">
          </div> --}}
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->title." ".Auth::user()->first_name }}</a>
          </div>
        </div>
        <div class="user-panel mt-3 d-flex">
          @if (Auth::user()->role == 'nurse')
          <a href="{{ Route('nurse') }}"  class="info">
            @elseif (Auth::user()->role == 'doctor')
            <a href="{{ Route('doctor') }}"  class="info">
              @else
              <a href="{{ Route('home') }}"  class="info">
            @endif
            <p class="d-block">Return to Dashboard</p>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--- Manage Patient -->
          <li class="nav-item">
            <div class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                MANAGE PATIENT
                <i class="right fas fa-angle-left"></i>
              </p>
            </div>
            @switch(Auth::user()->role)
            @case('doctor')
              <ul class="nav">
                <li class="nav-item">
                  <a href="{{ Route('patient.check') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check Record</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ Route('patient.list') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Patient List</p>
                  </a>
                </li>
              </ul>
            </li>
            @break

            @case('nurse')
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('patient.check') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check Record</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('patient.personal.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('patient.id.check') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('patient.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient List</p>
                </a>
              </li>
            </ul>
          </li>
          @break

         
          @default
          @endswitch
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
      <div class="nav-item dropdown">
        <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
        <div class="dropdown-menu mt-0">
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
        </div>
      </div>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
      <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
      <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
    </div>
    <div class="tab-content">
      <div class="tab-empty">
        <h2 class="display-4">No tab selected!</h2>
      </div>
      <div class="tab-loading">
        <div>
          <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->


 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script> --}}
</body>
</html>