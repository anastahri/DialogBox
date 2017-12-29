<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">User Groups</div>
        <div class="panel-body">
            <ul class="nav" role="tablist">
                @foreach ($groupes as $grp) 
                <li role="presentation">
                    <a href="{{url('/group')}}/{{$grp->name}}">{{ $grp->label }}
                    @if (count($grp->subGoups())>0)
                    ->
                    @endif
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
