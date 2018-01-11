@include('layouts.header')

@include('layouts.nav_top')

@include('layouts.sidebar')

      <div class="app">
        <div class="content-wrapper">
          <section class="content">

	@include ('alert')
	@yield('content')

          </section><!-- /.content -->
        </div>

      </div>
        
@include('layouts.footer')