@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    @include('public_messages.create')

    @foreach($pub_messages as $pub_message)
        <div class="row">
          <section class="col-lg-12">               
            <div class="box box-primary">
              <div class="box-header">
                <div class="box-tools pull-right">
                  
                  @if(Auth::id()==$pub_message->User->id)
                      
                      {!! Form::open([
                          'id' => 'delete_form',
                          'method' => 'DELETE',
                          'url' => ['/public_messages', $pub_message->id],
                          'style' => 'display:inline',
                          'onsubmit' => 'return confirm("Confirm delete?")'
                      ]) !!}
                          <a href="{{ url('/public_messages/' . $pub_message->id . '/edit') }}" title="Edit Post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          <a id="trash_post" href="#" title="Delete Post"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      {!! Form::close() !!}

                    @endif
                
                  
                  <button style="margin-top: 0; margin-bottom: 4px;padding: 0;" class="btn btn-box-tool" data-widget="remove" title="Hide"><a href="#"><i class="fa fa-times"></i></a></button>
                </div>
              </div>
              
              <div class="box-body chat">
                <div class="item">
                  <img alt="user image"  {{-- class="offline" --}} src="{{ url('/images/avatars') }}/{{ $pub_message->user->avatar }}">
                  <p class="message">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o" title="Last update at : {{ $pub_message->updated_at }}"></i><b> 
                      {{ $pub_message->Time() }}
                    </b></small>
                    <a  class="name" href="/profile/{{ $pub_message->User->username }}">
                      {{ $pub_message->User->name }}
                    </a>
                    {{ $pub_message->message }}
                  </p>
                </div>
              </div>
              
            </div>
          </section>
        </div>
    @endforeach

@endsection

@section('scripts')
<script>
$(document).ready(function() { 
    $('#trash_post').click(function() {
        $('#delete_form').submit();
    });
});
</script>
@endsection