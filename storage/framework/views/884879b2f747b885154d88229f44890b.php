

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Hotel Stuff</h2>
    <a href="<?php echo e(route('admin.stuff.create')); ?>" class="btn btn-warning btn-sm" style="float:right;">Add New Member</a><br>

    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stuff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stuff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($stuff->id); ?></td>
                    <td><?php echo e($stuff->name); ?></td>
                    <td><?php echo e($stuff->email); ?></td>
                    <td><?php echo e($stuff->role); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/stuff.blade.php ENDPATH**/ ?>