<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('old_password') ? ' has-error' : ''}}">
    {!! Form::label('old_password', 'Old password: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('old_password', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('old_password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('new_password_1') ? ' has-error' : ''}}">
    {!! Form::label('new_password_1', 'New password: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('new_password_1', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('new_password_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('new_password_2') ? ' has-error' : ''}}">
    {!! Form::label('new_password_2', 'Confirm new password: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('new_password_2', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('new_password_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit('Modify', ['class' => 'btn btn-primary']) !!}
    </div>
</div>