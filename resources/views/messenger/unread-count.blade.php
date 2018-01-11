@if(Auth::user())
	<?php $count = Auth::user()->newThreadsCount2(); ?>
	@if($count > 0)
	    <span class="label label-danger">{{ $count }}</span>
	@endif
@endif