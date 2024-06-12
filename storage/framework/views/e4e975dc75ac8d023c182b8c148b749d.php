<div class="row">
            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($hotel->name); ?></h5>
                            <p class="card-text">
                                <strong>City:</strong> <?php echo e($hotel->city); ?><br>
                                <strong><?php echo e($hotel->stars); ?></strong> Stars<br>
                                <strong>Number of Rooms:</strong> <?php echo e($hotel->rooms->count()); ?>

                            </p>
                            <a href="<?php echo e(route('show.hotel', $hotel->id)); ?>" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><?php /**PATH C:\laragon\www\tqnia\resources\views\search-result.blade.php ENDPATH**/ ?>