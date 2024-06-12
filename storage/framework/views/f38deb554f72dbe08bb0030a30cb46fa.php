

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Hotel Details</h2>
    <div class="card">
        <div class="card-header">
            <?php echo e($hotel->name); ?>

        </div>
        <div class="card-body">
            <p><strong>City:</strong> <?php echo e($hotel->city); ?></p>
            <p><strong>Stars:</strong> <?php echo e($hotel->stars); ?></p>
        </div>
    </div>
    <a href="<?php echo e(route('admin.hotels')); ?>" class="btn btn-secondary mt-3">Back to List</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views\backend\hotelShow.blade.php ENDPATH**/ ?>