<form method="post" action="{{url('public_messages')}}">
  {{csrf_field()}}
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add a post</div>
        <div class="panel-body">
          <div class="form-group"><textarea name="message" class="form-control" style="resize: vertical;"></textarea></div>
          <div align="right"><button type="submit" class="btn btn-primary" style="margin-left:38px">Add Message</button></div>
        </div>
      </div>
    </div>
  </div>
</form>