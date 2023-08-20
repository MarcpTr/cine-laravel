<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/info.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/bootstrap.min.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset("js/parser.js")); ?>"></script>
<script src="<?php echo e(asset("js/ui.js")); ?>"></script>
<script src="<?php echo e(asset("js/themoviedb.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="info">
</div>
<script>
  crearInfoPeliculas();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/informacion.blade.php ENDPATH**/ ?>