

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="results-section py-5" id="table-container" style="margin-left:50px;">
        <div class="row">
            <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Room:</strong> <?php echo e($room->number); ?></h5>
                            <p class="card-text">
                                <strong>Price/Day:</strong> <?php echo e($room->price); ?><br>
                                <strong><?php echo e($room->type); ?></strong> Type<br>
                                <strong>Status:</strong> <?php echo e($room->status); ?>

                            </p>
                            <a href="<?php echo e(route('room.book', $room->id)); ?>" class="btn btn-primary book-room-btn">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/show-hotel-rooms.blade.php ENDPATH**/ ?>