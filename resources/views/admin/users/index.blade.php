@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    
        <div class="row">

            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <form method="GET" action="/admin/users/users" class="navbar-form navbar-right" role="search" style="padding: 0;margin: 0">
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
                        <a href="{{ url('/admin/users/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Username</th><th>Name</th><th>Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($users as $item)
                                    @if ($item->state != 1)
                                    <tr style="color: red">
                                    @else
                                    <tr>
                                    @endif
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td><a href="{{ url('/admin/users/users', $item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/users/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/users/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete User',
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