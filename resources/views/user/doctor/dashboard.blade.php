@extends('user.layout.app')

@section('scss-script')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DOCTORS DASHBOARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row row-full-col">
          <div class="col-md-5 ">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="@if($user->image != null){{ asset('profile-picture/'.$user->image)@else asset('adminlte/dist/img/avatar5.png') }}@endif"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->title." ".$user->first_name." ".$user->last_name }}</h3>

                <p class="text-muted text-center">{{ $user->gender }}</p>
                
                <p class="text-muted text-center">{{ $user->specialization }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Patients Treated</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Patients on Treatment</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Days since starting</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

            <!-- About Me Box -->
            <div class="col-md-7">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About {{ $user->title." ".$user->first_name }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  {{ $user->education }}
                </p>

                <hr>

                <strong><i class="fa-solid fa-hand-sparkles mr-1"></i> Specialization</strong>

                <p class="text-muted">{{ $user->specialization }}</p>

                <hr>

                <strong><i class="fa-solid fa-snowflake mr-1"></i></i> Speciality</strong>

                {{-- <p class="text-muted">
                  <span class="tag tag-danger">Allergy and Immunology</span>
                  <span class="tag tag-success">Anesthesiology</span>
                  <span class="tag tag-info">Dermatology</span>
                  <span class="tag tag-warning">Diagnostic radiology</span>
                  <span class="tag tag-primary">Emergency medicine</span>
                </p> --}}
                <p class="text-muted">{{ $user->speciality }}</p>

                <hr>

                <strong><i class="fa-solid fa-language mr-1"></i> Languages</strong>

                <p class="text-muted">{{ $user->language }}</p>

                <hr>

                <strong><i class="fa-solid fa-phone mr-1"></i> Phone</strong>

                <p class="text-muted">{{ $user->phone }}</p>

                <hr>

                <strong><i class="fa-solid fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted">{{ $user->email }}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                {{-- <p class="text-muted">{{ $user->address }}</p> --}}

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                <p class="text-muted">{{ $user->bio }}.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')

@endsection