

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User</div>
                    <div class="panel-body">
                        <a href="<?php echo e(url('/admin/users')); ?>" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="<?php echo e(url('admin/users')); ?>/<?php echo e($user->id); ?>" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name" value="<?php echo e($user->name); ?>" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Username: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="username" type="text" id="username" value="<?php echo e($user->username); ?>" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="email" type="email" id="email" value="<?php echo e($user->email); ?>" required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password: (If changing)</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="password" type="password" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group_id" class="col-md-4 control-label">User Group: </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="group_id" id="group_id">
                                        <?php if($user->group_id): ?>
                                        <option value="">No Group</option>
                                        <?php else: ?>
                                        <option value="" selected>No Group Yet...</option>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($user->group_id == $group->id): ?>
                                        <option value="<?php echo e($group->id); ?>" selected>
                                            <?php echo e($group->label); ?>

                                        </option>
                                        <?php else: ?>
                                        <option value="<?php echo e($group->id); ?>">
                                            <?php echo e($group->label); ?>

                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles" class="col-md-4 control-label">Role(s): </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="roles[]" id="roles" multiple>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(in_array($role->name, $user_roles)): ?>
                                        <option value="<?php echo e($role->name); ?>" selected><?php echo e($role->label); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->label); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </div>
                            </div>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script>
    $(window).on("load", function() {
        $('#username').val('<?php echo e($user->username); ?>');
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>