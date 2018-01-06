<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('admin'))
                    <li><a href="{{ url('/admin') }}">Dashboard <span class="sr-only">(current)</span></a></li>
                    @endif
                    <li><a href="/messages">Conversations @include('messenger.unread-count')</a></li>
                    <li><a href="/messages/create">New Message</a></li>
                @else
                    &nbsp;
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img class="avatar_nav_dropdown" src="{{ url('/images/avatars') }}/{{ Auth::user()->avatar }}">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/profile')}}/{{Auth::user()->username }}"><i class="fa fa-btn fa-user"></i> Your profile</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>