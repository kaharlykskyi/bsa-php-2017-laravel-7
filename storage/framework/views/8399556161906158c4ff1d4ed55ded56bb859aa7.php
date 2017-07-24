<li>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="<?php echo e(route('cars.show', ['id' => $car['id']])); ?>"><?php echo e($car['model']); ?></a></div>
        <div class="panel-body">
            <p><span class="text-muted">Color:</span>&nbsp;<?php echo e($car['color']); ?></p>
            <p><span class="text-muted">Price:</span>&nbsp;<?php echo e($car['price']); ?></p>
        </div>
    </div>
</li>