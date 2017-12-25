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
                    <img class="avatar_img" src="{{ url('/images/avatars') }}/{{ $user->avatar }}">
                    <br /><br />
                    <form enctype="multipart/form-data" action="/profile/avatar/edit" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : ''}}">
                            <div style="width: 0.1px; margin: auto;"><input id="avatar" type="file" name="avatar" class="form-control" style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;" required></div>
                            <label for="avatar">Choose new profile image</label>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Change profile image">
                    </form><br /><br />
                    <form method="POST" action="/profile/info/edit" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label for="name" class="col-md-4 control-label">Name:</label>
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">Email:</label>
                            <div class="col-md-6">
                                <input id="email" type="email" name="email" class="form-control" value="{{ $user->email }}" required>
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