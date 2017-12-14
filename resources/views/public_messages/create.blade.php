<!-- create.blade.php -->
@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <div class="container">

      <h2>Create A Message</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
      <form method="post" action="{{url('public_messages')}}">
        {{csrf_field()}}

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">Message:</label>
              <textarea name="message" class="form-control"></textarea>
            </div>
          </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Add Message</button>
          </div>
        </div>
      </form>
    </div>
@endsection