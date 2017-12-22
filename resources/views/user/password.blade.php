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
                    <form method="POST" action="/profile/password/edit/" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : ''}}">
                            <label for="old_password" class="col-md-4 control-label">Old password:</label>
                            <div class="col-md-6">
                                <input id="old_password" type="password" name="old_password" class="form-control" required>
                                {!! $errors->first('old_password', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : ''}}">
                            <label for="new_password" class="col-md-4 control-label">New password:</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" name="new_password" class="form-control" required>
                                {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : ''}}">
                            <label for="new_password_confirmation" class="col-md-4 control-label">Confirm new password:</label>
                            <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="form-control" required>
                                {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
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