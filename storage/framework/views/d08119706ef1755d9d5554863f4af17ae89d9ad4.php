<?php $__env->startSection('title', '404 Error'); ?>

<?php $__env->startSection('content'); ?>
    <div id="error" class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="alert-heading text-center"><strong>OOPS!</strong> 404 <span class="not-found">Page Not Found</span></h4>
        <div id="back-btn">
            <a class="btn btn-success" href="<?php echo e(route('index')); ?>">Back</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>