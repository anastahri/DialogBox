<!-- create.blade.php -->


<?php $__env->startSection('title', 'Edit post'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <h2>Edit A Public Message</h2><br  />
  <?php if($errors->any()): ?>
  <div class="alert alert-danger">
      <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
  </div><br />
  <?php endif; ?>
  <form method="post" action="<?php echo e(action('Public_messageController@update', $id)); ?>">
    <?php echo e(csrf_field()); ?>

    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
    <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="price">Message:</label>
        <textarea name="message" class="form-control"><?php echo e($pub_message->message); ?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Update Message</button>
      </div>
    </div>
  </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>