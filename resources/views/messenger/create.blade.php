@extends('layouts.app')
@section('title', 'New message')
@section('content')
    
<div class="container">
    
    <div class="row">    
        @include('home_sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">New message</div>
                <div class="panel-body"> 
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <!-- Subject Form Input -->
                        @if($users->count() > 0)
                        <div class="form-group">
                            <b>To</b>
                            <div class="checkbox">
                                Users :
                                @foreach($users as $user)
                                    <label title="{{ $user->name }}">
                                        <input type="checkbox" name="user_recipients[]" value="{{ $user->id }}">{{ $user->name }}
                                    </label>
                                @endforeach
                            </div>
                            <div class="checkbox">
                                Groups :
                                @foreach($user_groups as $user_group)
                                    <label title="{{ $user_group->name }}">
                                        <input type="checkbox" name="group_recipients[]" value="{{ $user_group->id }}">{{ $user_group->label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        {{-- TODO (has to look like facebook add someone to conversation) --}}
                        {{-- <div class="form-group">
                            <input type="text" class="form-control" name="user" id="user">
                            <button type="submit" class="btn btn-success" style="border-radius: 0;">+</button>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="group" id="group">
                            <button type="submit" class="form-control btn btn-success" style="border-radius: 0;">+</button>
                        </div> --}}

                        @endif

                        <div class="form-group">
                            <label class="control-label" for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            <label class="control-label" for="message">Message</label>
                            <div  style="display: flex;">
                                <textarea name="message" class="form-control" style="flex: 1 auto; border-radius: 0;" id="message" required>{{ old('message') }}</textarea>
                                <button type="submit" class="btn btn-primary" style="border-radius: 0;">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section ('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endsection
