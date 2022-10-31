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
    <div class="container my-5 mx-auto d-flex flex-column ">
        <div class="d-flex gap-3 mb-3"><h5>Email: </h5> <span class="">{{ $data->email }}</span></div>
        <div class="d-flex gap-3 mb-3"><h5>Password: </h5> <span>{{ $data->raw_password }}</span></div>     
        <h5>You are reset to change your password immediately <a href="{{ URL::to('/password/reset') }}">here</a>.</h5>        
    </div>
</body>