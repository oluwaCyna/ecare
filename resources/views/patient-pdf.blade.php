<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eCare') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="row justify-content-center">
        {{-- Personal Information --}}
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Personal Information</h3>
                </div>
                <!-- /.card-header -->
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

                                <strong> Patient ID</strong>

                                <p class="text-muted">
                                    {{ $patient_data->patient_id ?? "" }}
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
    </div>




    {{-- <div class="container my-5 mx-auto d-flex flex-column ">
        <div class="d-flex gap-3 mb-3"><h5>Email: </h5> <span class="">{{ $data->email }}</span></div>
        <div class="d-flex gap-3 mb-3"><h5>Password: </h5> <span>{{ $data->raw_password }}</span></div>     
        <h5>You are reset to change your password immediately <a href="{{ URL::to('/password/reset') }}">here</a>.</h5>        
    </div> --}}
</body>