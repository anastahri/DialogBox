@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                	<h1>DialogBox</h1>
                	<h2>Messaging App</h2>
                    <a href="{{ url('/login') }}">Log in</a> to continue.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
