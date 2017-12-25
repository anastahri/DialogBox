@extends('layouts.app')

@section('title', 'Error 404')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Error</div>

                <div class="panel-body">
                	<h1>DialogBox</h1>
                    <h2>Error 404 : Page not found. {{ $exception->getMessage() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection