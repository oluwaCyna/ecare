@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Credentials') }}</div>

                <div class="card-body">
                    <p>User has been created successfully @if(config('custom_values.app_mode') == 'online') and the login credential has been emailled to the registered emaill address @endif</p>
                    @if(config('custom_values.app_mode') == 'offline') <a id="download" type="button" class="btn btn-primary" href="{{ URL::to('/credential/pdf') }}" onclick="logout()">Download Credential</a> @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // function logout() {
    //     setTimeout(() => {
    //         document.getElementById('logout-form').submit()
    //     }, 10000);
    //             };
            
            if (!document.getElementById('download')) {
                setTimeout(() => {
                document.getElementById('logout-form').submit()
                 }, 3000);
            }
</script>
@endsection
