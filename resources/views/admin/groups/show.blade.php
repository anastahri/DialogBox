@extends('layouts.app')

@section('title')
    Group : {{ $group->label }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Group</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/groups') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/groups/' . $group->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/grougs', $group->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                        @if ($group->group)
                            {{ $group->group->label }} -> {{ $group->label }}
                        @endif
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th><th>Name</th><th>Label</th><th>Parent group</th><th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $group->id }}</td> 
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->label }}</td>
                                        <td>
                                            @if ($group->group)
                                                {{ $group->group->label }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td> {{ $group->description }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
