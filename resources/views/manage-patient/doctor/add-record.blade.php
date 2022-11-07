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
                        <div class="card-header">{{ __('Add New Record') }}</div>

                        <div class="card-body">

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

                            <form method="POST" action="{{ route('general.record.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="patient_key"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Patint ID') }}</label>

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
                                
                                <div class="row mb-3">
                                    <label for="comment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Comment(s)') }}</label>

                                    <div class="col-md-6">
                                       
                                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment"
                                        value="{{ $user->comment ?? old('comment') }}" autocomplete="comment"
                                        autofocus rows="3"></textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple comments, please seperate them with a vertical bar |</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="diagnosis"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Diagnosis') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis"
                                        value="{{ $user->diagnosis ?? old('diagnosis') }}" autocomplete="diagnosis"
                                        autofocus rows="3"></textarea>

                                        @error('diagnosis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple diagnosis, please seperate them with a vertical bar |</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="test"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Test(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('test') is-invalid @enderror" name="test"
                                        value="{{ $user->test ?? old('test') }}" autocomplete="test"
                                        autofocus rows="2"></textarea>

                                        @error('test')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple tests, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="scan"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Scan(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('scan') is-invalid @enderror" name="scan"
                                        value="{{ $user->scan ?? old('scan') }}" autocomplete="scan"
                                        autofocus rows="2"></textarea>

                                        @error('scan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple scans, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="drip"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Drip(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('drip') is-invalid @enderror" name="drip"
                                        value="{{ $user->drip ?? old('drip') }}" autocomplete="drip"
                                        autofocus rows="2"></textarea>

                                        @error('drip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple drips, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="drug"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Drug(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('drug') is-invalid @enderror" name="drug"
                                        value="{{ $user->drug ?? old('drug') }}" autocomplete="drug"
                                        autofocus rows="2"></textarea>

                                        @error('drug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple drugs, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="injection"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Injection(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('injection') is-invalid @enderror" name="injection"
                                        value="{{ $user->injection ?? old('injection') }}" autocomplete="injection"
                                        autofocus rows="2"></textarea>

                                        @error('injection')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple injections, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Record') }}
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
    @endsection
