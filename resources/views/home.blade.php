@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="container">
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
    
    @include ('public_messages.create')

    @foreach($pub_messages as $pub_message)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table>
                        <tr>
                            <td><a href="/profile/{{ $pub_message->User->username }}"><img class="avatar_img_small" src="{{ asset('/images/no_img.png') }}"></a></td>

                            <td rowspan="2" style="vertical-align: top; padding: 10px">
                                {{ $pub_message->message }}
                                @if(Auth::id() == $pub_message->User->id)
                                    
                                    <form action="{{action('Public_messageController@destroy', $pub_message['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{action('Public_messageController@edit', $pub_message->id)}}">Edit</a> - <a href="#" onclick="submit()">Delete</a>
                                    </form>
                                    
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <a href="/profile/{{ $pub_message->User->username }}">{{ $pub_message->User->name }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection