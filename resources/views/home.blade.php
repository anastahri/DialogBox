@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                    @foreach($pub_messages as $pub_message)
                        <li>"{{ $pub_message->message }}" - <em>{{ $pub_message->User->name }}</em></li>
                    @endforeach
                    </ul>
                    <a href="/public_messages/create">post message</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection