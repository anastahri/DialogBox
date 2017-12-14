<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('label') ? ' has-error' : ''); ?>">
    <?php echo Form::label('label', 'Label: ', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('label', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('label', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']); ?>

    </div>
</div>