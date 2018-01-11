@extends('layouts.app')

@section('title', 'Error 404')

@section('content')

    <div class="row">
        <section class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">Error</div>

                <div class="box-body">
                	<h1>DialogBox</h1>
                    <h2>Error 404 : Page not found. {{ $exception->getMessage() }}</h2>
                </div>
            </div>
        </section>
    </div>

@endsection