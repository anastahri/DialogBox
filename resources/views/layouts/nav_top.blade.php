        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">{{ config('app.name', 'DialogBox') }}</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              @if(Auth::user())
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{ url('/images/avatars') }}/{{ Auth::user()->avatar }}" class="user-image" alt="User Image"/>
                      <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="{{ url('/images/avatars') }}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                        <p>
                          {{ Auth::user()->name }}
                          <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="pull-left">
                          <a href="{{ url('/profile')}}/{{Auth::user()->username }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                          <a class="btn btn-default btn-flat" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              @endif
            </nav>
        </header>