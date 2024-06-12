

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Add Hotel</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('admin.hotels.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" id="city" required>
        </div>
        <div class="form-group">
            <label for="stars">Stars</label>
            <input type="number" name="stars" class="form-control" id="stars" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Hotel</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/hotelCreate.blade.php ENDPATH**/ ?>