@extends('layouts.app')
@section('title', $thread->subject)
@section('content')
    
<div class="row">    
    <section class="col-lg-12">    
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <b>Topic :</b> {{ $thread->subject }} 
                {{-- <form method="POST" action="" style="padding: 0; margin: 0; display: inline;"><button type="submit" class="pull-right btn btn-danger btn-xs" style="padding: 2px;">Report</button></form> --}}
            </div>
            @each('messenger.partials.messages', $thread->messages, 'message')
            <div class="box-body"> 
                <b>Members : </b>
                You
                @foreach ($participants as $participant)
                    @if ($participant->id != Auth::id())
                    , <a href="{{ url('/profile') }}/{{ $participant->username }}">{{ $participant->name }}</a>
                    @endif
                @endforeach
                <br>
                @include('messenger.partials.form-message')
            </div>
        </div>
    </section>
</div>

@endsection