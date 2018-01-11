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
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  
                  <div class="box-body chat">
                    <div class="item">
                      <img alt="user image"  class="offline" src="{{ url('/images/avatars') }}/{{ $pub_message->user->avatar }}">
                      <p class="message">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i><b> 
                          @if ($pub_message->updated_at->diffInMinutes(Carbon\Carbon::now())<60)
                            {{ $pub_message->updated_at->diffForHumans() }}
                          @elseif ($pub_message->updated_at->isToday())
                            {{$pub_message->updated_at->format('H:i')}}
                          @elseif ($pub_message->updated_at->isYesterday())
                            Yesterday
                          @else
                            {{$pub_message->updated_at->format('d/m/y')}}
                          @endif
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