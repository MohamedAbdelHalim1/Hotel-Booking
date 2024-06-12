

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="results-section py-5 ml-5" id="table-container" style="margin-left:50px;">
        <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Room:</strong> <?php echo e($room->number); ?></h5>
                            <p class="card-text">
                                <strong>Price/Day:</strong> <?php echo e($room->price); ?><br>
                                <strong><?php echo e($room->type); ?></strong> Type<br>
                                <strong>Status:</strong> <?php echo e($room->status); ?>

                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <hr />
    <form method="post" action="<?php echo e(route('confirm.booking' , $room->id)); ?>" style="margin-left:50px;">
        <?php echo csrf_field(); ?>
        <h2>Choose Starting Date :</h2>
        <div class="input-group">
            <input type="date" name="start_date" required>
        </div>
        <h2>Choose Ending Date :</h2>
        <div class="input-group">
            <input type="date" name="end_date" required>
        </div><br>
        <button class="btn btn-primary" type="submit">Confirm</button>
    </form>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views\room-to-book.blade.php ENDPATH**/ ?>