<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    @if($users->count() > 0)
        <div class="form-group">
            <b>Add (optional)</b>
            <div class="checkbox">
                <b>Users :</b>
                @foreach($users as $user)
                    <label title="{{ $user->name }}">
                        <input type="checkbox" name="user_recipients[]" value="{{ $user->id }}">{{ $user->name }}
                    </label>
                @endforeach
            </div>
            <div class="checkbox">
                <b>Groups :</b>
                @foreach($user_groups as $user_group)
                    <label title="{{ $user_group->name }}">
                        <input type="checkbox" name="group_recipients[]" value="{{ $user_group->id }}">{{ $user_group->label }}
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    <div class="form-group" style="display: flex;">
        <textarea name="message" class="form-control" style="flex: 1 auto; border-radius: 0;" placeholder="Type a message..." required>{{ old('message') }}</textarea>
        <button type="submit" class="btn btn-primary" style="border-radius: 0;">Send</button>
    </div>
    
</form>