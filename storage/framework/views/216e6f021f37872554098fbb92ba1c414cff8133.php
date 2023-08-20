<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset("js/init.js")); ?>"></script>
<script src="<?php echo e(asset("js/parser.js")); ?>"></script>
<script src="<?php echo e(asset("js/ui.js")); ?>"></script>
<script src="<?php echo e(asset("js/themoviedb.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/tabs.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/app.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/navbar.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="containerPeliculas ">
        <div class="" id="peliculas">
            <div class="nav-tabs" id="myTabMovies"> </div>
            <div class="tab-content " id="myTabContent"> </div>
        </div>
    </div>
</div>
<script>
    init();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/principal.blade.php ENDPATH**/ ?>