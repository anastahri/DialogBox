<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <ul>
                    <?php $__currentLoopData = $pub_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>"<?php echo e($pub_message->message); ?>" - <em><?php echo e($pub_message->User->name); ?></em></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <a href="/public_messages/create">post message</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>