<?php $__env->startSection('title', 'Car list'); ?>

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
    <?php if(count($cars) === 0): ?>
        <div class="alert alert-warning" role="alert">
            <h3 class="alert-heading">No cars</h3>
        </div>
    <?php else: ?>
        <?php if($message != null): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="alert-heading"><?php echo e($message); ?></h5>
            </div>
        <?php endif; ?>
        <ul class="list-unstyled">
            <?php echo $__env->renderEach('cars/list-item', $cars, 'car'); ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cars.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>