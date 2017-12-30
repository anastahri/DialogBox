@extends('layouts.backend')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="{{ url('admin/users') }}/{{$user->id}}" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name" value="{{$user->name}}" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Username: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="username" type="text" id="username" value="{{$user->username}}" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="email" type="email" id="email" value="{{$user->email}}" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password: (If changing)</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="password" type="password" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group_id" class="col-md-4 control-label">User Group: </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="group_id" id="group_id">
                                        @if ($user->group_id)
                                        <option value="">No Group</option>
                                        @else
                                        <option value="" selected>No Group Yet...</option>
                                        @endif
                                        @foreach ($groups as $group)
                                        @if ($user->group_id == $group->id)
                                        <option value="{{ $group->id }}" selected>
                                            {{ $group->label }}
                                        </option>
                                        @else
                                        <option value="{{ $group->id }}">
                                            {{ $group->label }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles" class="col-md-4 control-label">Role(s): </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="roles[]" id="roles" multiple>
                                        @foreach ($roles as $role)
                                        @if (in_array($role->name, $user_roles))
                                        <option value="{{ $role->name }}" selected>{{ $role->label }}</option>
                                        @else
                                        <option value="{{ $role->name }}">{{ $role->label }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </div>
                            </div>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    <script type="text/javascript" src="jquery.min.js"></script>
    <script>
    $(window).on("load", function() {
        $('#username').val('{{ $user->username }}');
    });
    </script>
@endsection
