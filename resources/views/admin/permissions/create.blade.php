@extends('layouts.app')

@section('title', 'Create Permission')

@section('content')
    
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">Create Permission</div>
                    <div class="box-body">
                        <a href="{{ url('/admin/users/permissions') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::open(['url' => '/admin/users/permissions', 'class' => 'form-horizontal']) !!}

                        @include ('admin.permissions.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </section>
        </div>
    
@endsection