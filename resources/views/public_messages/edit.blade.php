@extends('layouts.app')

@section('title', 'Edit post')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-flush">
                <form method="post" action="{{action('Public_messageController@update', $id)}}">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
            
                    <div class="panel-heading">Edit A Public Message</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <textarea name="message" class="form-control" style="resize: vertical;">{{$pub_message->message}}</textarea>
                        </div>
                        <div align="right">
                            <button type="submit" class="btn btn-success" style="margin-left:38px">Update Message</button>
                        </div>
                    </div>
                </form>
            </div>
      </div>
  </div>
</div>

@endsection