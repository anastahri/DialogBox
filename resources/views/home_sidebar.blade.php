<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">User Groups</div>
        <div class="panel-body">
            <ul class="nav" role="tablist">
                @foreach ($groupes as $grp) 
                
                @if (count($grp->subGoups())>0)
                
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="{{url('/group')}}/{{$grp->name}}">{{ $grp->label }} <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="left: 100px;">
                            @foreach ($grp->subGoups() as $subgrp)
                            <li><a href="{{url('/group')}}/{{$subgrp->name}}">{{$subgrp->label}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                @else
                    <li><a href="{{url('/group')}}/{{$grp->name}}">{{ $grp->label }}</a></li>
                @endif

                @endforeach
            </ul>
        </div>
    </div>
</div>

@section ('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".dropdown, .btn-group").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });     
</script>
@endsection