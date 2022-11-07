@extends('manage-patient.layout.app')

@section('scss-script')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PATIENT MANAGEMENT DASHBOARD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Patient</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Check Patient Record') }}</div>

                        <div class="card-body">

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif

                            <script>
                                $(".alert").alert();
                            </script>

                            <form method="POST" action="{{ route('patient.check') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="patient_key"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Patient Key') }}</label>

                                    <div class="col-md-6">
                                        <input id="patient_key" type="text"
                                            class="form-control @error('patient_key') is-invalid @enderror" name="patient_key"
                                            value="{{ $user->patient_key ?? old('patient_key') }}" autocomplete="patient_key"
                                            autofocus>

                                        @error('patient_key')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Check Record') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                {{-- Personal Information --}}
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Personal Information</h3>
                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                    data-source="widgets.html" data-source-selector="#card-refresh-content"
                                    data-load-on-init="false">
                                    <i class="fas fa-sync-alt"></i>
                                </button> --}}
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        @php
                        if (session('patient_key')) {
                        echo ('<div class="card-tools mt-1">
                        <a id="download" type="button" class="btn btn-primary" href="check-record/pdf">Download Info</a>
                        </div>'); }
                        @endphp

                        <div class="card-body">
                            <!-- About Me Box -->
                            <div class="card">
                                <div class="row card-body">
                                    <div class="col-md-6">
                                        <strong> First Name</strong>

                                        <p class="text-muted">
                                            {{ $patient_data->first_name ?? ''  }}
                                        </p>

                                        <hr>

                                        <strong> Last Name</strong>

                                        <p class="text-muted">
                                            {{ $patient_data->last_name ?? ''  }}
                                        </p>

                                        <hr>

                                        <strong> Address</strong>

                                        <p class="text-muted">{{ $patient_data->address ?? "" }}</p>

                                        <hr>

                                        <strong> Email</strong>

                                        <p class="text-muted">
                                            {{ $patient_data->email ?? "" }}
                                        </p>

                                        <hr>

                                        <strong> Phone Number</strong>

                                        <p class="text-muted">{{ $patient_data->phone ?? "" }}</p>

                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <strong> Date of Birth</strong>

                                        <p class="text-muted">
                                            ennessee Knoxville
                                        </p>

                                        <hr>

                                        <strong> Gender</strong>

                                        <p class="text-muted">{{ $patient_data->gender ?? "" }}</p>

                                        <hr>

                                        <strong> Height</strong>

                                        <p class="text-muted">
                                            {{ $patient_data->height ?? "" }}
                                        </p>

                                        <hr>

                                        <strong> Blood Group</strong>

                                        <p class="text-muted">{{ $patient_data->blood_group ?? "" }}</p>

                                        <hr>

                                        <strong> Patient Key</strong>

                                        <p class="text-muted">
                                            {{ $patient_data->patient_key ?? "" }}
                                        </p>

                                        <hr>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                {{-- Medical Records --}}
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Medical Records</h3>

                            <div class="card-tools">
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                    data-source="widgets.html" data-source-selector="#card-refresh-content"
                                    data-load-on-init="false">
                                    <i class="fas fa-sync-alt"></i>
                                </button> --}}
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-secondary">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Record Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td style="padding:0;">
                                            <!-- /.Each Record -->
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">Adesola001 - Monday, 22nd December, 2020. 12:33PM</h3>
                        
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body" style="padding:0;">
                                                    <div id="accordion">

                                                    <!-- Daily Treatment -->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title w-100">
                                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                                  <i class="fas fa-text-width"></i>
                                                                  General
                                                                </a>
                                                            </h4>
                                                          {{-- <h3 class="card-title">
                                                            <i class="fas fa-text-width"></i>
                                                            General
                                                          </h3> --}}
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                        <div class="card-body">
                                                          <dl class="row">
                                                            <dt class="col-sm-4">Comment</dt>
                                                            <dd class="col-sm-8">A description list is perfect for defining terms. <a class="text-danger" href="/comment/{id}"><i class="fa-solid fa-trash text-danger"></i></a></dd>
                                                            <dt class="col-sm-4">Diagnosis</dt>
                                                            <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                                            <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
                                                            <dt class="col-sm-4">Treatment</dt>
                                                            <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
                                                            <dt class="col-sm-4">Tests</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                            <dt class="col-sm-4">Drugs</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                            <dt class="col-sm-4">Injections</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                          </dl>
                                                        </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                      </div>
                                                      <!-- /.card -->

                                                    <!-- Daily Treatment -->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title w-100">
                                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                                  <i class="fas fa-text-width"></i>
                                                                  Day 1
                                                                </a>
                                                            </h4>
                                                          {{-- <h3 class="card-title">
                                                            <i class="fas fa-text-width"></i>
                                                            Day 1
                                                          </h3> --}}
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                                        <div class="card-body">
                                                          <dl class="row">
                                                            <dt class="col-sm-4">Comment</dt>
                                                            <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
                                                            <dt class="col-sm-4">Diagnosis</dt>
                                                            <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                                            <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
                                                            <dt class="col-sm-4">Treatment</dt>
                                                            <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
                                                            <dt class="col-sm-4">Tests</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                            <dt class="col-sm-4">Drugs</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                            <dt class="col-sm-4">Injections</dt>
                                                            <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                              sit amet risus.
                                                            </dd>
                                                          </dl>
                                                        </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                      </div>
                                                      <!-- /.card -->

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                        
                                    <tr>
                                        <td>2</td>
                                        <td style="padding:0;">
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">Adesola001 - Monday, 22nd December, 2020. 12:33PM</h3>
                        
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td style="padding:0;">
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">Adesola001 - Monday, 22nd December, 2020. 12:33PM</h3>
                        
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td style="padding:0;">
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">Adesola001 - Monday, 22nd December, 2020. 12:33PM</h3>
                        
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td style="padding:0;">
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">Adesola001 - Monday, 22nd December, 2020. 12:33PM</h3>
                        
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                                            <i class="fas fa-expand"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                    Adesola001 - Monday, 22nd December, 2020. 12:33PM
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Record Name</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
    {{-- </div> --}}
    <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- DataTables  & Plugins --> 
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte//plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  </script>
@endsection
