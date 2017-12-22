<?php $__env->startSection('title', 'Homepage'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

<?php echo $__env->make('alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('public_messages.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__currentLoopData = $pub_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table>
                        <tr>
                            <td><a href="<?php echo e(url('/profile')); ?>/<?php echo e($pub_message->User->username); ?>"><img class="avatar_img_small" src="<?php echo e(url('/images/avatars')); ?>/<?php echo e($pub_message->user->avatar); ?>"></a></td>
                            <td rowspan="2" style="vertical-align: top; padding: 10px">
                                <?php echo e($pub_message->message); ?>

                                <?php if(Auth::id() == $pub_message->User->id): ?>
                                    <form action="<?php echo e(action('Public_messageController@destroy', $pub_message['id'])); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="<?php echo e(action('Public_messageController@edit', $pub_message->id)); ?>">Edit</a> - <a href="#" onclick="submit()">Delete</a>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <a href="/profile/<?php echo e($pub_message->User->username); ?>"><?php echo e($pub_message->User->name); ?></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>