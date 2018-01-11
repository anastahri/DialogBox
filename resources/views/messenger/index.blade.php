@extends('layouts.app')
@section('title', 'Messages')
@section('content')

<div class="row">    
    <section class="col-lg-12">  
		<div class="box box-solid box-primary">
            <div class="box-header with-border">Conversations</div>
			   @if (count($threads) > 0)
				<table class="table table-hover table-condensed">
					<thead>
					<tr style="background-color: #AED6F1">
						<th><input type="checkbox" id="mainCheckbox" value="0"></th>
						<th>
							<Form method="DELETE" action="messages/thread->id" style="display:inline;">
							    <button class="fa fa-trash-o" type="submit" title="Delete Selected Threads" onclick='return confirm("Confirm delete?")'></button>
							</form>
						</th>
						<th>Topic</th>
						<th>Replies</th>
						<th>Activity</th>
						<th>Other participant(s)</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($threads as $thread)
						@if ($thread->isUnread(Auth::id()))
						<tr class="info">
						@else
						<tr>
						@endif
							<td><input type="checkbox" class="listCheckbox" value="{{$thread->id}}"></td>
							<td>
							{!! Form::open([
							    'method' => 'DELETE',
							    'url' => ['messages', $thread->id],
							    'style' => 'display:inline'
							]) !!}
							    {!! Form::button('', array(
							            'type' => 'submit',
							            'class' => 'fa fa-trash-o',
							            'title' => 'Delete User',
							            'onclick'=>'return confirm("Confirm delete?")'
							    )) !!}
							{!! Form::close() !!}
							</td>
							<td class="td-click"  data-href="{{ route('messages.show', $thread->id) }}"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}
        						
        						@if ($thread->userUnreadMessagesCount(Auth::id()))
        						({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
        						@endif

        					</a></td>
							<td class="td-click"  data-href="{{ route('messages.show', $thread->id) }}"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">
								{{ App\Message::whereThread_id($thread->id)->count() - 1 }}
							</a></td>
							<td class="td-click"  data-href="{{ route('messages.show', $thread->id) }}"><a class="clickable-row-a" href="{{ route('messages.show', $thread->id) }}">
								@if ($thread->latestMessage->created_at->diffInMinutes(Carbon\Carbon::now())<60)
									{{ $thread->latestMessage->created_at->diffForHumans() }}
								@elseif ($thread->latestMessage->created_at->isToday())
									{{$thread->latestMessage->created_at->format('H:i')}}
								@elseif ($thread->latestMessage->created_at->isYesterday())
									Yesterday
								@else
									{{$thread->latestMessage->created_at->format('d/m/y')}}
								@endif
							</a></td>
							<td class="td-click"  data-href="{{ route('messages.show', $thread->id) }}">
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
	</section>
</div>
@endsection

@section('scripts')
	<script src="/js/jquery.multicheck.js"></script>
    <script>
        ( function( $ ) {
            $( '#mainCheckbox' ).multicheck( $( '.listCheckbox' ) );
        })( jQuery );

        $('*[data-href]').on("click",function(){
          window.location = $(this).data('href');
          return false;
        });
        $("td > a").on("click",function(e){
          e.stopPropagation();
        });
    </script>
@endsection