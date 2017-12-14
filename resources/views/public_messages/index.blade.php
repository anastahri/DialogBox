@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>user_id</th>
        <th>message</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($public_messages as $public_message)
      <tr>
        <td>{{$public_message->id}}</td>
        <td>{{$public_message->User->name}}</td>
        <td>{{$public_message->message}}</td>
        <td><a href="{{action('Public_messageController@edit', $public_message['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('Public_messageController@destroy', $public_message['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  
@endsection