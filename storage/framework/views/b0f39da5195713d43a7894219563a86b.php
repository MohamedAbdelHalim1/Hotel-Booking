<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Search Section -->
    <div class="search-section py-5 bg-gray">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Search Hotels</h2>
                <form id="search-form">
                    <?php echo csrf_field(); ?> 
                    <div class="input-group">
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter city name" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="filter_data()">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr/>

    <div class="results-section py-5" id="table-container">
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
        </div>
    </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function filter_data() {
        var city = $('#city').val(); 

        $.ajax({
            url: '<?php echo e(route("search.hotels")); ?>',
            type: 'POST',
            data: {
                city: city
            },
            success: function(response) {
                $('#table-container').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tqnia\resources\views\home.blade.php ENDPATH**/ ?>