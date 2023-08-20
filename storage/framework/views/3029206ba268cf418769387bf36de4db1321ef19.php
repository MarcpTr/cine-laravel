<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/bootstrap.min.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/carpetas.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/form.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset("js/jquery-3.1.1.js")); ?>"></script>
<script src="<?php echo e(asset("js/init.js")); ?>"></script>
<script src="<?php echo e(asset("js/configuracion.js")); ?>"></script>
<script type="text/javascript">
     
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="carpetas" id="carpetas">
    <div class="formheader">
        <h2>Lista carpetas <?php echo e(Auth::user()->name); ?></h2>
    </div>
    <form action="<?php echo e(route('anadirCarpeta')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" id="carpeta" class="form-control" placeholder="Id carpeta" name="carpeta" required autofocus>
        <?php if($errors->has('carpeta')): ?>
        <span class="text-danger"><?php echo e($errors->first('carpeta')); ?></span>
        <?php endif; ?>
        <input type="text" id="nombre" class="form-control" placeholder="nombre carpeta" name="nombre"
            required>
        <?php if($errors->has('nombre')): ?>
        <span class="text-danger"><?php echo e($errors->first('nombre')); ?></span>
        <?php endif; ?>
        <button id="submit" type="submit">Guardar</button>
    </form>
    <div id="listacarpetas">
    </div>
    <button id="refresh">refresh</button>
    <div id="datosincorrectos" class="mensajealerta noVisible">
        <p>La carpeta ya esta en uso.</p>
    </div>
</div>
<script>
    refresh();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/configuracion.blade.php ENDPATH**/ ?>