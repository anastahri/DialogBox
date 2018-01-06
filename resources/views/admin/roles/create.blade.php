@extends('layouts.app')

@section('title', 'Create New Role')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Role</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal']) !!}

                        @include ('admin.roles.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
