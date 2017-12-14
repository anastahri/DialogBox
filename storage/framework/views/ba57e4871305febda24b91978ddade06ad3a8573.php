<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <?php echo Form::label('email', 'Email: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
    <?php echo Form::label('password', 'Password: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::password('password', ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('roles') ? ' has-error' : ''); ?>">
    <?php echo Form::label('role', 'Role: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]); ?>

    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']); ?>

    </div>
</div>
