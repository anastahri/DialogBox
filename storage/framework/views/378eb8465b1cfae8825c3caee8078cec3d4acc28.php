<?php $__env->startSection('title', 'All public posts'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-md-9">
              <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>user_id</th>
                  <th>message</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $public_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($public_message->id); ?></td>
                  <td><?php echo e($public_message->User->name); ?></td>
                  <td><?php echo e($public_message->message); ?></td>
                  <td><a href="<?php echo e(action('Public_messageController@edit', $public_message['id'])); ?>" class="btn btn-warning">Edit</a></td>
                  <td>
                    <form action="<?php echo e(action('Public_messageController@destroy', $public_message['id'])); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>