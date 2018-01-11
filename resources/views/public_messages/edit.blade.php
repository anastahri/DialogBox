@extends('layouts.app')

@section('title', 'Edit post')

@section('content')


    <div class="row">
        <section class="col-lg-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">Edit A Public Message</div>
                <div class="box-body">
                        <form method="post" action="{{action('Public_messageController@update', $id)}}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group">
                            <textarea name="message" class="form-control" style="resize: vertical;">{{$pub_message->message}}</textarea>
                        </div>
                        <div align="right">
                            <button type="submit" class="btn btn-success" style="margin-left:38px">Update Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection