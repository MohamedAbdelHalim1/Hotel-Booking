

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
    <form action="<?php echo e(route('admin.rooms.store' , $hotel)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Room Number</label>
            <input type="text" name="number" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text"  class="form-control" placeholder="<?php echo e($hotel_name->name); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" id="type" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="booked">Booked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/roomCreate.blade.php ENDPATH**/ ?>