@extends('layouts.app')

@section('title', 'Create New Group')

@section('content')

    <div class="row">

            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">Create New Group</div>
                    <div class="box-body">
                        <a href="{{ url('admin/users/groups') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        
                        <form class="form-horizontal" method="POST" action="{{ url('/admin/users/groups') }}">
                            
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="label" class="col-md-4 control-label">Label</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="label" id="label" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" id="description" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="group_id" class="col-md-4 control-label">Parent Group</label>
                                <div class="col-md-6">
                                    <select name="group_id" id="group_id">
                                        <option value="" selected>No Parent Group...</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->label }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input type="submit" class="btn btn-primary" value="Create">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </section>
    
    </div>

@endsection
