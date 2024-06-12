

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

<div class="container">
    <h2 class="mb-4">Edit Booking Status</h2>
    <form action="<?php echo e(route('admin.booking.update', $id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="accepted" <?php echo e($status === 'accepted' ? 'selected' : ''); ?>>Accepted</option>
                <option value="rejected" <?php echo e($status === 'rejected' ? 'selected' : ''); ?>>Rejected</option>
            </select>
        </div>

      
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/bookingEdit.blade.php ENDPATH**/ ?>