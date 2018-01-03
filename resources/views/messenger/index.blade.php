@extends('layouts.app')
@section('title', 'Messages')
@section('content')
<div class="container">

@include ('alert')

<div class="row">    
	@include('home_sidebar')
    <div class="col-md-9">    
    	<div class="panel panel-default">
    		<div class="panel-heading">Conversations</div>
			
			   @if (count($threads) > 0)
				<table class="table table-hover table-condensed">
					
					<thead>
					<tr class="bg-primary">
						<th><input type="checkbox"></th>
						<th></th>
						<th>Subject</th>
						<th>Last message</th>
						<th>Sent</th>
						<th>Other participant(s)</th>
					</tr>
					</thead>
					
					<tbody>
					@foreach ($threads as $thread)
						@if ($thread->isUnread(Auth::id()))
						<tr class="info" data-href="{{ route('messages.show', $thread->id) }}">
						@else
						<tr data-href="{{ route('messages.show', $thread->id) }}">
						@endif
							<td><input type="checkbox"></td>
							
							<td>
							{!! Form::open([
							    'method' => 'DELETE',
							    'url' => ['messages', $thread->id],
							    'style' => 'display:inline'
							]) !!}
							    {!! Form::button('', array(
							            'type' => 'submit',
							            'class' => 'oi oi-trash',
							            'title' => 'Delete User',
							            'onclick'=>'return confirm("Confirm delete?")'
							    )) !!}
							{!! Form::close() !!}

							</td>
							
							<td class="td-click"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}
        						
        						@if ($thread->userUnreadMessagesCount(Auth::id()))
        						({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
        						@endif

        					</a></td>
							<td class="td-click"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">
								{{ $thread->latestMessage->body }}
							</a></td>
							<td class="td-click"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">
								@if ($thread->latestMessage->created_at->diffInMinutes(Carbon\Carbon::now())<60)
									{{ $thread->latestMessage->created_at->diffForHumans() }}
								@elseif ($thread->latestMessage->created_at->isToday())
									{{$thread->latestMessage->created_at->format('H:i:s')}}
								@elseif ($thread->latestMessage->created_at->isYesterday())
									yesterday
								@else
									{{$thread->latestMessage->created_at->format('d/m/y')}}
								@endif
							</a></td>
							<td class="td-click">
								<a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">{{ $thread->participantsString2(Auth::id()) }}</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			   
			   @else
				@include('messenger.partials.no-threads')
			   @endif
			
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script>
		$('*[data-href]').on("click",function(){
		  window.location = $(this).data('href');
		  return false;
		});
		$("td > a").on("click",function(e){
		  e.stopPropagation();
		});
	</script>
@endsection