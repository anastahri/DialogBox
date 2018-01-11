@extends('layouts.app')

@section('title')
{{ $group->label }}
@endsection
@section('content')

    <div class="row">
        <section class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">Group : <b>{{ $group->label }}</b></div>
                <div class="box-body">
                    
                    @if (count($group_array))
                        <ul class="breadcrumb">
                            @foreach ($group_array as $gr)
                            <li class="breadcrumb-item"><a href="{{ url('/group') }}/{{$gr->name}}">{{ $gr->label }}</a></li>
                            @endforeach
                            <li class="breadcrumb-item active">{{ $group->label }}</li>
                        </ul>
                    @endif

                    <h4>Description :</h4>
                    <p>{{ $group->description }}</p>
                    
                    @if (count($sub_groups))
                    <h4>Subgroups :</h4>
                    <ul>
                    @foreach ($sub_groups as $sub_group)
                        <li><a href="{{ url('/group') }}/{{$sub_group->name}}">{{ $sub_group->label }}</a></li>
                    @endforeach
                    </ul>
                    @endif

                    @if (count($group_users))
                    <h4>Members :</h4>
                    <ul>
                    @foreach ($group_users as $group_user)
                        <li><a href="{{ url('/profile') }}/{{$group_user->username}}">{{ $group_user->name }}</a></li>
                    @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection