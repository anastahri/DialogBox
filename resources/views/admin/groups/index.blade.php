@extends('layouts.app')

@section('title', 'Manage Permissions')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/groups/create') }}" class="btn btn-success btn-sm" title="Add New Group">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Label</th><th>Parent group</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->name }}</a></td>
                                        <td>{{ $group->label }}</td>
                                        <td>
                                            @if ($group->group)
                                                {{ $group->group->label }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/groups/' . $group->id) }}" title="View Group"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/groups/' . $group->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['admin/groups', $group->id],
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
            </div>
        </div>
    </div>
@endsection
