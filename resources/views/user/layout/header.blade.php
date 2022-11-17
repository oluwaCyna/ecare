<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
@vite('resources/js/app.js')


@yield('scss-script')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
               <!-- Doctors -->
          @switch(Auth::user()->role)
          @case('doctor')
          <li class="nav-item">
            <a href="{{ Route('doctor') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DOCTORS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('doctor.update') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('doctor.doctor.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('doctor.nurse.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Nurses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('doctor.lab.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Labs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('doctor.pharmacy.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Pharms</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('portal') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('user.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
                </a>
              </li>
            </ul>
          </li>
          @break
          
          @case('nurse')
          <!--- Nurses -->
          <li class="nav-item">
            <a href="{{ Route('nurse') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                NURSES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('nurse.update') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('nurse.doctor.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('portal') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Patient</p>
                </a>
              </li>
            </ul>
          </li>
          @break

          @case('laboratory')
          <!--- Lab -->
          <li class="nav-item">
            <a href="{{ Route('laboratory') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                LABORATORY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('laboratory.update') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('laboratory.nurse.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Nurses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('laboratory.add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Test Result</p>
                </a>
              </li>
            </ul>
          </li>
          @break

          @case('pharmacy')
          <!--- Phamarcy -->
          <li class="nav-item">
            <a href="{{ Route('pharmacy') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                PHARMACY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('pharmacy.update') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('pharmacy.nurse.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Nurses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('pharmacy.add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Available Drugs </p>
                </a>
              </li>
            </ul>
          </li>
          @break

          @case('patient')
           <!--- Patient -->
           <li class="nav-item">
            <a href="{{ Route('patient') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                PATIENT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('patient.records') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Detail</p>
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
