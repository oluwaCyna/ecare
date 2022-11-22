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
            <h1>NURSES DASHBOARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
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
                        <div class="card-header">{{ __('Update Profile') }}</div>
        
                        <div class="card-body">

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif

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

                            <form method="POST" action="{{ route('nurse.update.save') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $user->title ?? old('title') }}"  autocomplete="title" autofocus>
        
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name ?? old('first_name') }}"  autocomplete="first_name" autofocus>
        
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name ?? old('last_name') }}"  autocomplete="last_name" autofocus>
        
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
        
                                    <div class="col-md-6">
                                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender ?? old('gender') }}" >
                                            <option selected disabled>select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                          </select>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone ?? old('phone') }}"  autocomplete="phone" autofocus>
        
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}"  autocomplete="email" readonly>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address ?? old('address') }}"  autocomplete="address">
        
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="education" class="col-md-4 col-form-label text-md-end">{{ __('Education') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" value="{{ $user->education ?? old('education') }}" name="education"  autocomplete="education">
        
                                        @error('education')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="specialization" class="col-md-4 col-form-label text-md-end">{{ __('Specialization') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="text" type="text" class="form-control @error('specialization') is-invalid @enderror" value="{{ $user->specialization ?? old('specialization') }}" name="specialization"  autocomplete="specialization">
        
                                        @error('specialization')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="speciality" class="col-md-4 col-form-label text-md-end">{{ __('Speciality') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="text" type="text" class="form-control @error('speciality') is-invalid @enderror" name="speciality" value="{{ $user->speciality ?? old('speciality') }}"  autocomplete="speciality">
        
                                        @error('speciality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small id="specialityHelpBlock" class="form-text text-muted">
                                            please seperate each of your speciality with a <b>coma</b>.
                                        </small>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="language" class="col-md-4 col-form-label text-md-end">{{ __('Languages') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="language" type="text" class="form-control" name="language" value="{{ $user->language ?? old('language') }}"  autocomplete="language">
                                    

                                        @error('language')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small id="languageHelpBlock" class="form-text text-muted">
                                            please seperate each of your languages with a <b>comma</b>.
                                        </small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Biography') }}</label>
        
                                    <div class="col-md-6">
                                        <textarea id="bio" type="text" class="form-control" name="bio"  autocomplete="bio" rows="3">{{ $user->bio ?? old('bio') }}</textarea>

                                        @error('bio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small id="languageHelpBlock" class="form-text text-muted">
                                            Must not be more than <b>150 characters</b>.
                                        </small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture') }}</label>
        
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="image" id="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')

@endsection