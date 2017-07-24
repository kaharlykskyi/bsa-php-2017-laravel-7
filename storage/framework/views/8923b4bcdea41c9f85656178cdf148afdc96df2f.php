<?php
    use App\Entity\Car;
    $car = Car::orderBy('id', 'desc')->take(1)->first();
?>



<?php $__env->startSection('content'); ?>

    <span class="text-success">New car in our service: </span>
    <a href="<?php echo e(route('cars.show', ['id' => $car['id']])); ?>">
        <?php echo e($car['model']); ?>

    </a>
    <p><b>Color:</b>&nbsp;<?php echo e($car['color']); ?></p>
    <p><b>Price:</b>&nbsp;<?php echo e($car['price']); ?></p>
    <p><b>Year:</b>&nbsp;<?php echo e($car['year']); ?></p>
    <p><b>Registration number:</b>&nbsp;<?php echo e($car['registration_number']); ?></p>
    <p><b>Mileage:</b>&nbsp;<?php echo e($car['mileage']); ?></p>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('cars.email.base-email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>