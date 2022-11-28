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


@vite(['resources/sass/app.scss', 'resources/js/app.js'])
{{-- @vite('resources/js/app.js') --}}


@yield('scss-script')

<style>
  span.blink {
  display: block;
  width: 15px;
  height: 15px;
  
  opacity: 0.7;
  border-radius: 50%;
  
  animation: blink 1s linear infinite;
}

/*Animations*/

@keyframes blink {
  100% { transform: scale(2, 2); 
          opacity: 0;
        }
}

</style>
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
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px" v-pre>
          <div class="d-flex justify-content-between align-items-center"><span @if (Auth::user()->status == 'online') style="background-color:#0fcc45" @else style="background-color:#e61a0b" @endif class="blink"></span> {{ Auth::user()->status }}</div>
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"
               onclick="event.preventDefault();
                             document.getElementById('online-form').submit();">
              {{ __('Online') }}
            </a>
            <a class="dropdown-item" href="#"
               onclick="event.preventDefault();
                             document.getElementById('offline-form').submit();">
              {{ __('Offline') }}
            </a>

            <form id="online-form" action="{{ route('status.update') }}" method="POST" class="d-none">
                @csrf
                @method('put')
                <input type="hidden" value="online" name="status">
            </form>
            <form id="offline-form" action="{{ route('status.update') }}" method="POST" class="d-none">
              @csrf
              @method('put')
              <input type="hidden" value="offline" name="status">
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
          {{-- <img src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" class="img-circle elevation-2" style="height: 35px;" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->title." ".Auth::user()->first_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <span>Status:</span>
          <!-- Rounded switch -->
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
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
              {{-- <form class="form-inline" action="{{route(status)}}" method="post">
                @csrf
                @method('put')
                <span>Status:</span>
                  <!-- Rounded switch -->
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </form> --}}
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ Route('doctor.update') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Details</p>
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
                <a href="{{ Route('user.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
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
                <a href="{{ Route('user.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
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
                <a href="{{ Route('user.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Message</p>
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
