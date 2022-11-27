@extends('user.layout.app')

@section('scss-script')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
              <li class="breadcrumb-item active">Doctor's list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Doctors</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Nurses</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pharmacists</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Lab Scientists</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="doctor" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor as $user)
                                        <tr>
                                            <td>{{$user->title." ".$user->first_name." ".$user->last_name}}</td>
                                            <td>{{$user->Specialization}}</td>
                                            <td>
                                                <img class="  img-circle" height="50" width="50"
                                                    src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif"
                                                    alt="User profile picture">
                                            </td>
                                            <td><div class="d-flex justify-content-start align-items-center"><span @if ($user->user->status == 'online') style="background-color:#0fcc45" @else style="background-color:#e61a0b" @endif class="blink mr-2"></span> {{ $user->user->status }}</div></td>
                                            <td><a href="/message/{{$user->user_id}}" class="btn btn-primary">Message</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Phone Number</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>

                      <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="nurse" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nurse as $user)
                                        <tr>
                                            <td>{{$user->title." ".$user->first_name." ".$user->last_name}}</td>
                                            <td>{{$user->Specialization}}</td>
                                            <td>
                                                <img class="  img-circle" height="50" width="50"
                                                    src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif"
                                                    alt="User profile picture">
                                            </td>
                                            <td><div class="d-flex justify-content-start align-items-center"><span @if ($user->user->status == 'online') style="background-color:#0fcc45" @else style="background-color:#e61a0b" @endif class="blink mr-2"></span> {{ $user->user->status }}</div></td>
                                            <td><a href="/message/{{$user->user_id}}" class="btn btn-primary">Message</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Phone Number</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>

                      <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="phar" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pharmacy as $user)
                                        <tr>
                                            <td>{{$user->title." ".$user->first_name." ".$user->last_name}}</td>
                                            <td>{{$user->Specialization}}</td>
                                            <td>
                                                <img class="  img-circle" height="50" width="50"
                                                    src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif"
                                                    alt="User profile picture">
                                            </td>
                                            <td><div class="d-flex justify-content-start align-items-center"><span @if ($user->user->status == 'online') style="background-color:#0fcc45" @else style="background-color:#e61a0b" @endif class="blink mr-2"></span> {{ $user->user->status }}</div></td>
                                            <td><a href="/message/{{$user->user_id}}" class="btn btn-primary">Message</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Phone Number</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>

                      <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="lab" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Picture</th>
                                            <th><div class="d-flex justify-content-start align-items-center"><span @if ($user->user->status == 'online') style="background-color:#0fcc45" @else style="background-color:#e61a0b" @endif class="blink mr-2"></span> {{ $user->user->status }}</div></th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laboratory as $user)
                                        <tr>
                                            <td>{{$user->title." ".$user->first_name." ".$user->last_name}}</td>
                                            <td>{{$user->Specialization}}</td>
                                            <td>
                                                <img class="  img-circle" height="50" width="50"
                                                    src="@if($user->image != null){{ asset('profile-picture/'.$user->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif"
                                                    alt="User profile picture">
                                            </td>
                                            <td>Online</td>
                                            <td><a href="/message/{{$user->user_id}}" class="btn btn-primary">Message</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
            </div>

<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
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

<!-- Page specific script -->
<script>
//   $("#doctor").DataTable({
//     "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

//   $("#nurse").DataTable({
//     "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

//   $("#phar").DataTable({
//     "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

//   $("#lab").DataTable({
//     "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
@endsection