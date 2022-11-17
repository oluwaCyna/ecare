@extends('user.layout.app')

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
                    <div class="direct-chat-msg 
                    @php
                    if ($message->sender_id == Auth::user()->id) {
                       echo '';
                    }else {
                      echo 'right';
                    }
                    @endphp ">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name 
                        @php
                    if ($message->sender_id == Auth::user()->id) {
                        echo 'float-left';
                    }else {
                        echo 'float-right';
                    }
                    @endphp ">
                    @php
                    if ($message->sender_id == Auth::user()->id) {
                        echo $sender->title." ".$sender->first_name." ".$sender->last_name;
                    }else {
                        echo $recipient->title." ".$recipient->first_name." ".$recipient->last_name;
                    }
                    @endphp
                    </span>
                        <span class="direct-chat-timestamp  @php
                        if ($message->sender_id == Auth::user()->id) {
                            echo 'float-right';
                        }else {
                            echo 'float-left';
                        }
                        @endphp ">{{$message->created_at}}</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      @php
                      if ($message->sender_id == Auth::user()->id) {
                       echo `<img class="direct-chat-img" src="@if($sender->image != null){{ asset('profile-picture/'.$sender->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" alt="message user image">`;
                      }else {
                        echo `<img class="direct-chat-img" src="@if($recipient->image != null){{ asset('profile-picture/'.$recipient->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" alt="message user image">`;
                      }
                      @endphp
                      <img class="direct-chat-img" src="@if($sender->image != null){{ asset('profile-picture/'.$sender->image) }} @else {{ asset('adminlte/dist/img/avatar5.png') }}@endif" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{$message->message}}
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
                  <form action="{{route('message.store')}}" method="post">
                    @csrf
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
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
@endsection

@section('script')

@endsection