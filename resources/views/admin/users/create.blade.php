@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New User</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="{{ url('admin/users') }}" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name: </label>
                                <div class="col-md-6">
                                    <input class="form-control" required="required" name="name" type="text" id="name">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Username: </label>
                                <div class="col-md-6">
                                    <input class="form-control" required="required" name="username" type="text" id="username">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email: </label>
                                <div class="col-md-6">
                                    <input class="form-control" required="required" name="email" type="email" id="email">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password: </label>
                                <div class="col-md-6">
                                    <input class="form-control" required="required" name="password" type="password" value="" id="password">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group_id" class="col-md-4 control-label">User Group: </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="group_id" id="group_id">
                                        <option value="" selected>No Group Yet...</option>
                                        @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles" class="col-md-4 control-label">Role(s): </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="roles[]" id="roles" multiple>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Create">
                                </div>
                            </div>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
