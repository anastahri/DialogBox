@extends('layouts.app')

@section('title', 'Manage Posts')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
              <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div class="panel-body">
                  <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Author</th>
                      <th>Message</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($public_messages as $public_message)
                    <tr>
                      <td>{{$public_message->id}}</td>
                      <td>{{$public_message->User->name}}</td>
                      <td>{{$public_message->message}}</td>
                      <td><a href="{{action('Public_messageController@edit', $public_message['id'])}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        <form style="display:inline;" action="{{action('Public_messageController@destroy', $public_message['id'])}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>

                </div>
              </div>
            </div>
        </div>
    </div>
@endsection