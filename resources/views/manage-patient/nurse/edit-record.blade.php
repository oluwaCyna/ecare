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

                            <form method="POST" action="{{ route('daily.record.update.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="comment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Comment(s)') }}</label>

                                    <div class="col-md-6">
                                       
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
                                    <label for="treatment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Treatment') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('treatment') is-invalid @enderror" name="treatment"
                                        autocomplete="treatment"
                                        autofocus rows="3">{{ $patient_record['treatment'] ?? old('treatment') }}</textarea>

                                        @error('treatment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small><a href="" id="add-new-treatment">Add New Treatment</a></small><small><a href="" id="hide-new-treatment">Hide New Treatment</a></small>
                                    </div>
                                </div>

                                <div class="row mb-3" id="new-treatment">
                                    <label for="new_treatment"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Treatment') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('new_treatment') is-invalid @enderror" name="new_treatment"
                                        autocomplete="new_treatment"
                                        autofocus rows="3">{{ old('new_treatment') }}</textarea>

                                        @error('new_treatment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>for multiple treatment, please seperate them with a vertical bar |</small>
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

                                <input type="hidden" name="appearance_id" value="{{ $patient_record['appearance_id'] }}">

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
<script src="{{ asset('js/daily-update.js') }}"></script>
@endsection
