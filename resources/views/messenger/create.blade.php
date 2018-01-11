@extends('layouts.app')
@section('title', 'New message')
@section('content')
    
    <div class="row">    
        <section class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">New message</div>
                <div class="box-body"> 
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
        </section>
    </div>

@endsection