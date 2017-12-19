@extends('layouts.app')

@section('title','Edit your profile')

@section('content')

<div class="container">
    @include ('alert')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile of {{ $user->name }}</div>
                <div class="panel-body text-center">
                    <img class="avatar_img" src="{{ asset('/images/no_img.png') }}"><br>
                    <p><a href="#">Change your avatar</a></p>
                    <form method="POST" action="/profile/edit/{{ $user->username }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">Email:</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                <input type="submit" name="Modify" class="btn btn-warning"  value="Modify">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection