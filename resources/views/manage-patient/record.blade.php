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
                                    @foreach ($patient_data->record as $record)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="padding:0;">
                                            <!-- /.Each Record -->
                                            <div class="card" style="margin:0;">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="font-weight:bold;">{{ $record->title ?? 'PlaceHolder001 - Monday, 22nd December, 2020. 12:33PM' }}</h3>
                        
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

                                                    <!-- General -->
                                                    @foreach ($record->appearance as $appearance)
                                                    <div class="card">
                                                        <div class="card-header d-flex justify-between">
                                                            <h4 class="card-title w-100">
                                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                                  <i class="fas fa-text-width"></i>
                                                                  {{ $appearance->title ?? 'PlaceHolder001' }}
                                                                </a>
                                                            </h4>
                                                            <a class="btn btn-primary" href="/portal/update/{{$appearance->id}}">Edit</a>
                                                          {{-- <h3 class="card-title">
                                                            <i class="fas fa-text-width"></i>
                                                            General
                                                          </h3> --}}
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                        <div class="card-body">
                                                          <dl class="row">

                                                            @if ($appearance->comment->count() > 0)
                                                            <dt class="col-sm-4">Comment</dt>
                                                            @foreach ($appearance->comment as $comment)
                                                                @if ($loop->first)
                                                                <dd class="col-sm-7">{{$comment->comment ?? ""}}</dd>
                                                                <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                    @method('delete')
                                                                    @csrf
                                                
                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                    <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                                </form>

                                                                @else
                                                                <dd class="col-sm-7 offset-sm-4">{{$comment->comment ?? ""}}</dd>
                                                                <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                    @method('delete')
                                                                    @csrf
                                                
                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                    <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                                </form>
                                                                @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->diagnosis->count() > 0)
                                                            <dt class="col-sm-4">Diagnosis</dt>
                                                            @foreach ($appearance->diagnosis as $diagnosis)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$diagnosis->diagnosis ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$diagnosis->diagnosis ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->treatment->count() > 0)
                                                            <dt class="col-sm-4">Treatment</dt>
                                                            @foreach ($appearance->treatment as $treatment)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$treatment->treatment ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="treatment_id" value="{{$treatment->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$treatment->treatment ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="treatment_id" value="{{$treatment->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->test->count() > 0)
                                                            <dt class="col-sm-4">Tests</dt>
                                                            @foreach ($appearance->test as $test)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$test->test ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="test_id" value="{{$test->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$test->test ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="test_id" value="{{$test->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->test_result->count() > 0)
                                                            <dt class="col-sm-4">Tests Result</dt>
                                                            @foreach ($appearance->test_result as $test_result)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$test_result->test_result ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="test_result_id" value="{{$test_result->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$test_result->test_result ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="test_result_id" value="{{$test_result->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->scan->count() > 0)
                                                            <dt class="col-sm-4">Scans</dt>
                                                            @foreach ($appearance->scan as $scan)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$scan->scan ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="scan_id" value="{{$scan->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$scan->scan ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="scan_id" value="{{$scan->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->scan_result->count() > 0)
                                                            <dt class="col-sm-4">Scans Result</dt>
                                                            @foreach ($appearance->scan_result as $scan_result)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$scan_result->scan_result ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="scan_result_id" value="{{$scan_result->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$scan_result->scan_result ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="scan_result_id" value="{{$scan_result->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->drug->count() > 0)
                                                            <dt class="col-sm-4">Drugs</dt>
                                                            @foreach ($appearance->drug as $drug)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$drug->drug ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="drug_id" value="{{$drug->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$drug->drug ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="drug_id" value="{{$drug->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->drug_available->count() > 0)
                                                            <dt class="col-sm-4">Drugs Available</dt>
                                                            @foreach ($appearance->drug_available as $drug_available)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$drug_available->drug_available ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="drug_available_id" value="{{$drug_available->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$drug_available->drug_available ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="drug_available_id" value="{{$drug_available->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                            @if($appearance->injection->count() > 0)
                                                            <dt class="col-sm-4">Injections</dt>
                                                            @foreach ($appearance->injection as $injection)
                                                            @if ($loop->first)
                                                            <dd class="col-sm-7">{{$injection->injection ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="injection_id" value="{{$injection->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>

                                                            @else
                                                            <dd class="col-sm-7 offset-sm-4">{{$injection->injection ?? ""}}</dd>
                                                            <form action="{{route('data.delete')}}" method="post" class="col-sm-1">
                                                                @method('delete')
                                                                @csrf
                                            
                                                                <input type="hidden" name="injection_id" value="{{$injection->id}}">
                                                                <button type="submit" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                                            </form>
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                          </dl>
                                                        </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                      </div>
                                                      @endforeach
                                                      <!-- /.card -->

                                                    <!-- Daily Treatment -->
                                                   
                                                    
                                                      <!-- /.card -->

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </td>
                                    </tr>
                                    @endforeach
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
