<?php $__env->startSection('title', $car['model']); ?>
<?php $__env->startSection('list-active','active'); ?>

<?php $__env->startSection('header'); ?>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo e(URL::route('index')); ?>">Car hire service</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deleteCar', App\Entity\Car::class)): ?>
                            <li class="<?php echo $__env->yieldContent('create-active'); ?>"><a href="<?php echo e(URL::route('cars.create')); ?>">Add</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(URL::route('cars.index')); ?>">Cars list</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo e($car['model']); ?></div>
        <div class="panel-body">
            <p><span class="text-muted">Color:</span>&nbsp;<?php echo e($car['color']); ?></p>
            <p><span class="text-muted">Price:</span>&nbsp;<?php echo e($car['price']); ?></p>
            <p><span class="text-muted">Year:</span>&nbsp;<?php echo e($car['year']); ?></p>
            <p><span class="text-muted">Registration number:</span>&nbsp;<?php echo e($car['registration_number']); ?></p>
            <p><span class="text-muted">Mileage:</span>&nbsp;<?php echo e($car['mileage']); ?></p>
            <p><span class="text-muted">Owner:</span>&nbsp;<?php echo e($owner); ?></p>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editCar', $carObj)): ?>
            <div class="panel-footer">
                <a href="<?php echo e(URL::route('cars.edit', $car['id'])); ?>" class="btn btn-warning edit-button">Edit</a>
                <form id="delete" action="<?php echo e(route('cars.destroy', $car['id'])); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="delete">
                    <button role="button" class="btn btn-danger delete-button">Delete</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cars.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>