<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="text-success">New car in our service: </span>
                    <a href="<?php echo e(route('cars.show', ['id' => $car['id']])); ?>">
                        <?php echo e($car['model']); ?>

                    </a>
                </div>
                    <div class="panel-body">
                        <p><span class="text-muted">Color:</span>&nbsp;<?php echo e($car['color']); ?></p>
                        <p><span class="text-muted">Price:</span>&nbsp;<?php echo e($car['price']); ?></p>
                        <p><span class="text-muted">Year:</span>&nbsp;<?php echo e($car['year']); ?></p>
                        <p><span class="text-muted">Registration number:</span>&nbsp;<?php echo e($car['registration_number']); ?></p>
                        <p><span class="text-muted">Mileage:</span>&nbsp;<?php echo e($car['mileage']); ?></p>
                    </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('cars.email.base-email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>