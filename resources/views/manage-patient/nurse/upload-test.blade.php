@extends('manage-patient.layout.app')

@section('scss-script')
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
                        <li class="breadcrumb-item active">Test Result</li>
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
                        <div class="card-header">{{ __('Upload Test Result(s)') }}</div>

                        <div class="card-body">
                                {{-- @php 
                                    echo($patient_record['comment']);
                                    dd($patient_record)@endphp --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif

                            <script>
                                $(".alert").alert();
                            </script>

                            <form method="POST" action="{{ route('upload.test.nurse.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

                                <div class="row mb-4">
                                    <label for="test"
                                        class="col-md-2 col-form-label text-md-end">{{ __('Test(s)') }}</label>

                                    <div class="col-md-8 original">
                                        <div class="input-group mb-2">
                                            <input class="form-control @error('test') is-invalid @enderror" type="file" name="test[]" >
                                            <button class="btn btn-success" type="button"><i class="fa-solid fa-plus"></i> Add</button>
                                        </div>
                                        
                                    </div>
                                   <div class="col-md-8 offset-md-2 mb-2 clone hide">
                                        <div class="input-group col-md-8 offset-md-2 mb-2" >
                                            <input class="form-control @error('test') is-invalid @enderror" type="file" name="test[]" >
                                            <button class="btn btn-danger" type="button"><i class="fa-solid fa-minus"></i> Remove</button>
                                        </div>

                                    </div>
                                </div>

                                

                                <input type="hidden" name="appearance_id" value="{{ $appearance_id }}">

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-7">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Record') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ asset('js/uploads.js') }}"></script>
@endsection
