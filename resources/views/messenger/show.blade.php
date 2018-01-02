@extends('layouts.app')
@section('title', $thread->subject)
@section('content')
    
<div class="container">

    @include ('alert')
    
    <div class="row">    
        @include('home_sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Subject :</b> {{ $thread->subject }}</div>
                @each('messenger.partials.messages', $thread->messages, 'message')
                <div class="panel-body"> 
                    <b>Members : </b>
                    You
                    @foreach ($participants as $participant)
                        @if ($participant->id != Auth::id())
                        , <a href="{{ url('/profile') }}/{{ $participant->username }}">{{ $participant->name }}</a>
                        @endif
                    @endforeach
                    <br>
                    @include('messenger.partials.form-message')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
