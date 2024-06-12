

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Bookings</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Room</th>
                <th>User</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>price/day</th>
                <th>Total price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($booking->id); ?></td>
                    <td><?php echo e($booking->room->number); ?></td>
                    <td><?php echo e($booking->user->name); ?></td>
                    <td><?php echo e($booking->start_date); ?></td>
                    <td><?php echo e($booking->end_date); ?></td>
                    <td><?php echo e($booking->room->price); ?></td>
                    <td><?php echo e($booking->total_price); ?></td>
                    <td><?php echo e($booking->status); ?></td>

                    <td>
                        <a href="<?php echo e(route('admin.booking.edit', $booking->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('admin.bookings.destroy', $booking->id)); ?>" method="POST" style="display:inline-block;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/bookings.blade.php ENDPATH**/ ?>