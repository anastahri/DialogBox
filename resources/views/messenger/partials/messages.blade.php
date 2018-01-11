<div class="box-body"> 
    <div class="media">
        <a class="pull-left" href="{{ url('/profile')}}/{{ $message->user->username }}"><img class="avatar_img_small" src="{{ url('/images/avatars') }}/{{ $message->user->avatar }}" alt="{{ $message->user->name }}"><div class="text-center">{{ $message->user->name }}</div></a>
        <div class="media-body">
            <p>{{ $message->body }}</p>
            <div class="text-muted">
                <small>Posted 
				@if ($message->created_at->diffInMinutes(Carbon\Carbon::now())<60)
					{{ $message->created_at->diffForHumans() }}
				@elseif ($message->created_at->isToday())
					{{$message->created_at->format('H:i:s')}}
				@elseif ($message->created_at->isYesterday())
					yesterday at {{$message->created_at->format('H:i:s')}}
				@else
					{{$message->created_at->format('d/m/y \a\t H:i:s')}}
				@endif
				</small>
            </div>
        </div>
    </div>
</div>
<hr />