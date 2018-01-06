@extends('layouts.app')

@section('title', 'Edit a Group')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit a Group</div>
                    <div class="panel-body">
                        <a href="{{ url('admin/groups') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        
                        <form class="form-horizontal" method="POST" action="{{ url('/admin/groups') }}/{{ $group->id }}">
                            
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $group->name }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-md-4 control-label">Label</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="label" id="label" value="{{ $group->label }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" id="description" value="{{ $group->description }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="group_id" class="col-md-4 control-label">Parent Group</label>
                                <div class="col-md-6">
                                    <select name="group_id" id="group_id">
                                        @if ($group->group_id)
                                        <option value="">No Parent Group</option>
                                        @else
                                        <option value="" selected>No Parent Group...</option>
                                        @endif
                                    @foreach ($groupes as $groupe)
                                        @if ($groupe->id == $group->group_id)
                                        <option value="{{ $groupe->id }}" selected>
                                        @else
                                        <option value="{{ $groupe->id }}">
                                        @endif
                                            {{ $groupe->label }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
