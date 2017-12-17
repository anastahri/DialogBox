@extends('layouts.app')

@section('title')
{{ $user->name }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile of {{ $user->name }}</div>

                <div class="panel-body text-center">
                    <img class="avatar_img" src="{{ asset('/images/no_img.png') }}">
                    <h2>{{ $user->name }}</h2>
                    <h4>{{ $user->email }}</h4>
                    <h4>Membre since : {{ $user->created_at->format('l j F Y') }}</h4>
                    @if(Auth::id() == $user->id) 
                        <button class="btn btn-success">Modify profile</button>
                    @else 
                        <button class="btn btn-success">Send a message</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection