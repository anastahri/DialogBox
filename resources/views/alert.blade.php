@if (\Session::has('error'))
  <div class="alert alert-danger">
    <ul>
      <li>{{ \Session::get('error') }}</li>
    </ul>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if (\Session::has('success'))
  <div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
  </div>
@endif