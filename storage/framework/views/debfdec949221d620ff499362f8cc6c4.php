

<?php $__env->startSection('content'); ?>

<div class="container">
    <h2 class="mb-4">Bookings</h2>
    <a href="<?php echo e(route('admin.hotels.create')); ?>" class="btn btn-warning btn-sm" style="float:right;">Add New Hotel</a><br>

    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Stars</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($hotel->id); ?></td>
                    <td><?php echo e($hotel->name); ?></td>
                    <td><?php echo e($hotel->city); ?></td>
                    <td><?php echo e($hotel->stars); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.hotels.show', $hotel->id)); ?>" class="btn btn-warning btn-sm">Show</a>
                        <a href="<?php echo e(route('admin.hotels.edit', $hotel->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo e(route('admin.rooms.index', $hotel->id)); ?>" class="btn btn-primary btn-sm">Rooms</a>
                        <form action="<?php echo e(route('admin.hotels.destroy', $hotel->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views\backend\hotels.blade.php ENDPATH**/ ?>