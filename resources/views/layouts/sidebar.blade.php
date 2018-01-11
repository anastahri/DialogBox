      <aside class="main-sidebar">
      
        <section class="sidebar">       
      
          <ul class="sidebar-menu">
           @if(Auth::check() && Auth::user()->hasRole('admin'))
            <li class="header">Dashboard</li>
            <li class="treeview @php 
                    echo Request::is('admin/users/*') ? 'active' : '';
                    @endphp">
              <a href="#">
                <i class="fa fa-circle-o text-danger"></i> <span>User Manager</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="@php 
                    echo Request::is('admin/users/users') ? 'active' : '';
                    @endphp"><a href="{{ url('/admin/users/users') }}"><i class="fa fa-circle-o"></i> Users</a></li>
                <li class="@php 
                    echo Request::is('admin/users/roles') ? 'active' : '';
                    @endphp"><a href="{{ url('/admin/users/roles') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
                <li class="@php 
                    echo Request::is('admin/users/groups') ? 'active' : '';
                    @endphp"><a href="{{ url('/admin/users/groups') }}"><i class="fa fa-circle-o"></i> Groups</a></li>
                <li class="@php 
                    echo Request::is('admin/users/permissions') ? 'active' : '';
                    @endphp"><a href="{{ url('/admin/users/permissions') }}"><i class="fa fa-circle-o"></i> Permissions</a></li>
              </ul>
            </li>
            <li class="treeview @php 
                    echo Request::is('admin/public_messages') ? 'active' : '';
                    @endphp">
              <a href="#">
                <i class="fa fa-circle-o text-danger"></i> <span>Public Discusion</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/admin/public_messages') }}"><i class="fa fa-circle-o"></i> Posts</a></li>
              </ul>
            </li>
           @endif
            <li class="header">MAIN NAVIGATION</li>
            <li @php 
                    echo Request::is('messages/create') ? 'class="active"' : '';
                    @endphp><a href="{{ url('/messages/create') }}"><i class="fa fa-circle-o text-success"></i> New Message</a></li>
            <li @php 
                    if(!(Request::is('messages/create')) && (Request::is('messages') || Request::is('messages/*')))
                    echo 'class="active"';
                    @endphp><a href="{{ url('/messages') }}"><i class="fa fa-circle-o text-info"></i> Conversations @include('messenger.unread-count')</a></li>
            
            <li class="header">USER GROUPS</li>
            
           @foreach (App\Group::whereGroup_id(null)->get() as $grp) 
            @if (count($grp->subGoups())>0)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle-o text-info"></i> <span>{{ $grp->label }}</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @foreach ($grp->subGoups() as $subgrp)
                <li><a href="{{url('/group')}}/{{$subgrp->name}}"><i class="fa fa-circle-o"></i> {{$subgrp->label}}</a></li>
                @endforeach
              </ul>
            </li>

            @else
            <li><a href="{{url('/group')}}/{{$grp->name}}"><i class="fa fa-circle-o text-success"></i> {{ $grp->label }}</a></li>
            @endif

           @endforeach                
          </ul>

        </section>
      </aside>