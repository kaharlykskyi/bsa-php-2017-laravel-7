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
        <div class="panel-heading">Rent car</div>
        <div class="panel-body">
            <form action=" <?php echo e(URL::route('rent.save', $car['id'])); ?> " class="form-horizontal" role="form" method="POST">
                <?php echo e(csrf_field()); ?>


                
                <div class="form-group">
                    <label for="user" class="col-md-3 control-label">User</label>

                    <div class="col-md-6">
                        <input id="user" type="text" class="form-control" name="user" value="<?php echo e($user->last_name); ?> <?php echo e($user->first_name); ?>" readonly>
                    </div>
                </div>

                 
                <div class="form-group">
                    <label for="car" class="col-md-3 control-label">Selected car</label>

                    <div class="col-md-6">
                        <input id="car" type="text" class="form-control" name="car" value="<?php echo e($car->model); ?>" readonly>
                    </div>
                </div>

                 
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Accept rent
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cars.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>