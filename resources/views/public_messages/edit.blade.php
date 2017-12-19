<!-- create.blade.php -->
@extends('layouts.app')

@section('title', 'Edit post')

@section('content')

<div class="container">

@include ('alert')

  <h2>Edit A Public Message</h2><br  />
  <form method="post" action="{{action('Public_messageController@update', $id)}}">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
    <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="price">Message:</label>
        <textarea name="message" class="form-control">{{$pub_message->message}}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Update Message</button>
      </div>
    </div>
  </form>
</div>

@endsection