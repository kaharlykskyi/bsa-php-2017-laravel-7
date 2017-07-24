<?php $__env->startSection('title', 'Edit car'); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading">Edit <span class="text-success"><?php echo e($car['model']); ?></span></div>
        <div class="panel-body">
            <form action="<?php echo e(URL::route('cars.update', $car['id'])); ?>" class="form-horizontal" role="form" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PUT">

                
                <div class="form-group <?php echo e($errors->has('model') ? 'has-error' : ''); ?>">
                    <label for="model" class="col-md-3 control-label">Model</label>

                    <div class="col-md-6">
                        <input id="model" type="text" class="form-control" name="model" value="<?php echo e(old('model') ?: $car['model']); ?>" autofocus>

                        <?php if($errors->has('model')): ?>
                            <span class="help-block"><?php echo e($errors->first('model')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('color') ? 'has-error' : ''); ?>">
                    <label for="color" class="col-md-3 control-label">Color</label>

                    <div class="col-md-6">
                        <input id="color" type="text" class="form-control" name="color" value="<?php echo e(old('color') ?: $car['color']); ?>">

                        <?php if($errors->has('color')): ?>
                            <span class="help-block"><?php echo e($errors->first('color')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('registration_number') ? 'has-error' : ''); ?>">
                    <label for="registration_number" class="col-md-3 control-label">Registration number</label>

                    <div class="col-md-6">
                        <input id="registration_number" type="text" class="form-control" name="registration_number" value="<?php echo e(old('registration_number') ?: $car['registration_number']); ?>">

                        <?php if($errors->has('registration_number')): ?>
                            <span class="help-block"><?php echo e($errors->first('registration_number')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('year') ? 'has-error' : ''); ?>">
                    <label for="year" class="col-md-3 control-label">Year</label>

                    <div class="col-md-6">
                        <input id="year" type="text" class="form-control" name="year" value="<?php echo e(old('year') ?: $car['year']); ?>">

                        <?php if($errors->has('year')): ?>
                            <span class="help-block"><?php echo e($errors->first('year')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                    <label for="price" class="col-md-3 control-label">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control" name="price" value="<?php echo e(old('price') ?: $car['price']); ?>">

                        <?php if($errors->has('price')): ?>
                            <span class="help-block"><?php echo e($errors->first('price')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('mileage') ? 'has-error' : ''); ?>">
                    <label for="mileage" class="col-md-3 control-label">Mileage</label>

                    <div class="col-md-6">
                        <input id="mileage" type="text" class="form-control" name="mileage" value="<?php echo e(old('mileage') ?: $car['mileage']); ?>">

                        <?php if($errors->has('mileage')): ?>
                            <span class="help-block"><?php echo e($errors->first('mileage')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group <?php echo e($errors->has('user') ? 'has-danger' : ''); ?>">
                    <label class="col-md-3 control-label" for="user">Select car owner</label>
                    <div class="col-sm-6">
                        <select name="user" id="user" class="form-control <?php echo e($errors->has('user') ? 'form-control-danger' : ''); ?>">
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($usr['id']); ?>"
                                        <?php echo e($usr['id'] == old('user')
                                            ||
                                            (empty(old('user')) && !is_null($car['user']) && $usr['id'] == $car['user']->id)
                                            ? 'selected="selected"'
                                            : ""); ?>

                                ><?php echo e($usr['first_name']); ?> <?php echo e($usr['last_name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('user')): ?>
                            <div class="form-control-feedback"><?php echo e($errors->first('user')); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cars.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>