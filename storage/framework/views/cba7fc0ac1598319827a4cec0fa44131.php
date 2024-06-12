

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

<div class="container">
    <h2 class="mb-4">Edit Room</h2>
    <form action="<?php echo e(route('admin.rooms.update', $room->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="number">Room Number</label>
            <input type="text" name="number" class="form-control" value="<?php echo e($room->number); ?>" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="single" <?php echo e($room->type === 'single' ? 'selected' : ''); ?>>Single</option>
                <option value="double" <?php echo e($room->type === 'double' ? 'selected' : ''); ?>>Double</option>
                <option value="suite" <?php echo e($room->type === 'suite' ? 'selected' : ''); ?>>Suite</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="available" <?php echo e($room->status === 'available' ? 'selected' : ''); ?>>Available</option>
                <option value="pending" <?php echo e($room->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="booked" <?php echo e($room->status === 'booked' ? 'selected' : ''); ?>>Booked</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo e($room->price); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Room</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views\backend\roomEdit.blade.php ENDPATH**/ ?>