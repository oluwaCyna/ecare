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
                        <li class="breadcrumb-item active">Edit Record</li>
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
                        <div class="card-header bg-warning">{{ __('Edit without adding new entries, they won\'t be saved if you do. To add new entries, use the designated button') }}</div>
                        <div class="card-header">{{ __('Add New Record') }}</div>

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

                            <form method="POST" action="{{ route('general.record.update.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="comment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Comment(s)') }}</label>

                                    <div class="col-md-6">
                                    <input type="up">
                                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment"
                                        autocomplete="comment"
                                        autofocus rows="3">{{ $patient_record['comment'] ?? old('comment') }}</textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-comment">Add New Comment(s)</a></small><small><a href="" id="hide-new-comment">Hide New Comment(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-comment">
                                    <label for="new_comment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Comment(s)') }}</label>

                                    <div class="col-md-6">
                                       
                                    <textarea class="form-control @error('new_comment') is-invalid @enderror" name="new_comment"
                                        autocomplete="new_comment"
                                        autofocus rows="3">{{ old('new_comment') }}</textarea>

                                        @error('new_comment')
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
                                        autocomplete="diagnosis"
                                        autofocus rows="3">{{ $patient_record['diagnosis'] ?? old('diagnosis') }}</textarea>

                                        @error('diagnosis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-diagnosis">Add New Diagnosis</a></small><small><a href="" id="hide-new-diagnosis">Hide New Diagnosis</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-diagnosis">
                                    <label for="new_diagnosis"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Diagnosis') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_diagnosis') is-invalid @enderror" name="new_diagnosis"
                                        autocomplete="new_diagnosis"
                                        autofocus rows="3">{{ old('new_diagnosis') }}</textarea>

                                        @error('new_diagnosis')
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
                                        <textarea class="form-control @error('test') is-invalid @enderror" name="test" autocomplete="test"
                                        autofocus rows="2">{{ $patient_record['test'] ?? old('test') }}</textarea>

                                        @error('test')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-test">Add New Test(s)</a></small><small><a href="" id="hide-new-test">Hide New Test(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-test">
                                    <label for="new_test"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Test(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_test') is-invalid @enderror" name="new_test" autocomplete="new_test"
                                        autofocus rows="2">{{ old('new_test') }}</textarea>

                                        @error('new_test')
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
                                        <textarea class="form-control @error('scan') is-invalid @enderror" name="scan" autocomplete="scan"
                                        autofocus rows="2">{{ $patient_record['scan'] ?? old('scan') }}</textarea>

                                        @error('scan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-scan">Add New Scan(s)</a></small><small><a href="" id="hide-new-scan">Hide New Scan(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-scan">
                                    <label for="new_scan"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Scan(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_scan') is-invalid @enderror" name="new_scan" autocomplete="new_scan"
                                        autofocus rows="2">{{ old('new_scan') }}</textarea>

                                        @error('new_scan')
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
                                        <textarea class="form-control @error('drip') is-invalid @enderror" name="drip" autocomplete="drip"
                                        autofocus rows="2">{{ $patient_record['drip'] ?? old('drip') }}</textarea>

                                        @error('drip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-drip">Add New Drip(s)</a></small><small><a href="" id="hide-new-drip">Hide New Drip(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-drip">
                                    <label for="new_drip"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Drip(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_drip') is-invalid @enderror" name="new_drip" autocomplete="new_drip"
                                        autofocus rows="2">{{ old('new_drip') }}</textarea>

                                        @error('new_drip')
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
                                        <textarea class="form-control @error('drug') is-invalid @enderror" name="drug" autocomplete="drug"
                                        autofocus rows="2">{{ $patient_record['drug'] ?? old('drug') }}</textarea>

                                        @error('drug')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-drug">Add New Drug(s)</a></small><small><a href="" id="hide-new-drug">Hide New Drug(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-drug">
                                    <label for="new_drug"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Drug(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('drug') is-invalid @enderror" name="new_drug" autocomplete="new_drug"
                                        autofocus rows="2">{{ old('new_drug') }}</textarea>

                                        @error('new_drug')
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
                                        <textarea class="form-control @error('injection') is-invalid @enderror" name="injection" autocomplete="injection"
                                        autofocus rows="2">{{ $patient_record['injection'] ?? old('injection') }}</textarea>

                                        @error('injection')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-injection">Add New Injection(s)</a></small><small><a href="" id="hide-new-injection">Hide New Injection(s)</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-injection">
                                    <label for="new_injection"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Injection(s)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_injection') is-invalid @enderror" name="new_injection" autocomplete="new_injection"
                                        autofocus rows="2">{{ old('new_injection') }}</textarea>

                                        @error('new_injection')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple injections, please seperate them with a coma.</small>
                                    </div>
                                </div>

                                {{-- <input type="hidden" name="appearance_id" value="{{ $patient_record['appearance_id'] }}"> --}}

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
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
<script src="{{ asset('js/general-update.js') }}"></script>
@endsection
