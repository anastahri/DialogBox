@extends('layouts.app')

@section('title', 'Create New Role')

@section('content')
    
        <div class="row">

            <section class="col-lg-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">Create New Role</div>
                    <div class="box-body">
                        <a href="{{ url('/admin/users/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::open(['url' => '/admin/users/roles', 'class' => 'form-horizontal']) !!}

                        @include ('admin.roles.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </section>
        </div>
    
@endsection