

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Add New Member</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%;">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('admin.stuff.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">email</label>
            <input type="email" name="email" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">password</label>
            <input type="password" name="password" class="form-control"  required>
        </div>
        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views/backend/stuffCreate.blade.php ENDPATH**/ ?>