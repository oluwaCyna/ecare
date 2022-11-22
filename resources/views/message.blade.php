@extends('user.layout.app')

@section('scss-script')
<style>
    #file {
        display:none ;
        /* width: 1px; */
    }
    .file-icon {
        padding: 10px;
        font-size: 16px;
        /* border: 1px solid #007bff; */
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}

                   

                    <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title">Direct Chat</h3>
  
                  <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fas fa-comments"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 60vh">
                    <!-- Message. Default to the left -->
                    @foreach ($message as $message)
                    <div class="direct-chat-msg  @if ($message->sender_id == Auth::user()->id) @else right @endif ">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name 
                            @if ($message->sender_id == Auth::user()->id) float-left @else float-right @endif ">
                            @if ($message->sender_id == Auth::user()->id) {{$sender->title." ".$sender->first_name." ".$sender->last_name}}
                            @else {{$recipient->title." ".$recipient->first_name." ".$recipient->last_name}} @endif
                        </span>
                        <span class="direct-chat-timestamp @if ($message->sender_id == Auth::user()->id) float-right @else float-left @endif ">{{$message->created_at}}</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      @if ($message->sender_id == Auth::user()->id) 
                        <img class="direct-chat-img" src="@if($sender->image != null){{ asset('profile-picture/'.$sender->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" alt="message user image">
                        @else 
                        <img class="direct-chat-img" src="@if($recipient->image != null){{ asset('profile-picture/'.$recipient->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" alt="message user image">
                      @endif
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        @if ($message->type == 'text') 
                            {{ $message->message }}
                        @endif
                        @if ($message->type == 'file') 
                            <a class="@if ($message->sender_id == Auth::user()->id) text-dark @else text-white @endif" href="{{ asset('chat-attachment/'.$message->message) }}" target="_blank">{{$message->message}}</a>
                        @endif 
                       
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    @endforeach
                  </div>
                  <!--/.direct-chat-messages-->                  
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="{{route('message.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <label for="file">
                        <i class="fa-solid fa-paperclip file-icon"></i>
                        </label>
                      <input class="" type="file" name="file" id="file" >
                      <input type="hidden" name="sender_id" value="{{$sender->user_id}}">
                      <input type="hidden" name="recipient_id" value="{{$recipient->user_id}}">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
              <!--/.direct-chat -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://js.pusher.com/4.1/pusher.min.js"></script> --}}
      
    <script>
      
      Echo.channel('notification')
      .listen('MessageNotification', (e) => {
          alert('e.message.message');
      });
    </script>
@endsection

@section('script')

@endsection