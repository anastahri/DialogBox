@extends('layouts.app')

@section('title')
{{ $user->name }}
@endsection
@section('content')
    
    <div class="row">
        <section class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">{{ $user->name }}'s profile</div>
                <div class="box-body text-center">
                    <img class="avatar_img" src="{{ url('/images/avatars') }}/{{ $user->avatar }}">
                    <h2>{{ $user->name }}</h2>
                    <h4>Group : 
                        @foreach ($group_array as $group)
                        <a href="{{ url('/group') }}/{{$group->name}}">{{ $group->label }}</a>
                        @if ($group->id != $group_array[$group_count - 1]->id)
                        <i class="fa fa-caret-right"></i>
                        @endif
                        @endforeach
                    </h4>
                    <h4>{{ $user->email }}</h4>
                    <h4>Membre since : {{ $user->created_at->format('l j F Y') }}</h4>
                    @if(Auth::id() == $user->id) 
                        <a href="{{ url('/profile/info/edit') }}" class="btn btn-warning">Modify profile</a>
                        <a href="{{ url('/profile/password/edit/') }}" class="btn btn-warning">Modify password</a>
                    @else 
                        <a href="#" class="btn btn-primary">Send a message</a>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection