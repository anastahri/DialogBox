@extends('layouts.app')

@section('title', 'Error 401')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                	<h1>DialogBox</h1>
                    <h2>Error 401 : {{ $exception->getMessage() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
