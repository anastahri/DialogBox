@extends('layouts.app')

@section('title')
    Permission : {{ $permission->label }}
@endsection

@section('content')
    
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">Permission</div>
                    <div class="box-body">

                        <a href="{{ url('/admin/users/permissions') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/users/permissions/' . $permission->id . '/edit') }}" title="Edit Permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/users/permissions', $permission->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Permission',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th> <th>Name</th><th>Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $permission->id }}</td> <td> {{ $permission->name }} </td><td> {{ $permission->label }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    
@endsection