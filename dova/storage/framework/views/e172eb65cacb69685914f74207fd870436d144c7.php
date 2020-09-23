<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
    <div class="col-lg-1">
        <div class="id"><?php echo e($fl->id); ?></div>
    </div>
    <div class="col=lg-11">
        <div class="name"><?php echo e($fl->name); ?></div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>