@if (isset($errors) && $errors->any())
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
@endif

@if (\Session::has('error'))
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <ul>
        <li>{{ \Session::get('error') }}</li>
      </ul>
    </div>
  </div>
</div>
@endif

@if (\Session::has('success'))
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p>{{ \Session::get('success') }}</p>
    </div>
  </div>
</div>
@endif