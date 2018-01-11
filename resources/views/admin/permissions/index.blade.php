@extends('layouts.app')

@section('title', 'Manage Permissions')

@section('content')
    
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permissions</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <form method="GET" action="/admin/users/permissions" class="navbar-form navbar-right" role="search" style="padding: 0;margin: 0">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="search" placeholder="Search...">
                                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button></span>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <a href="{{ url('/admin/users/permissions/create') }}" class="btn btn-success btn-sm" title="Add New Permission">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Label</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/users/permissions', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/permissions/' . $item->id) }}" title="View Permission"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/users/permissions/' . $item->id . '/edit') }}" title="Edit Permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/users/permissions', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Permission',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    
@endsection
