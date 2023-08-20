<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="cloud, peliculas, drive">
<title>Iniciar sesion</title>
<meta name="description" content="Registrate en cloudplayer">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/form.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="form">
  <div class="formheader">
    <h2>Iniciar sesion</h2>
    <a href="<?php echo e(route("registro")); ?>">Registrarse</a>
  </div>
  <form action="<?php echo e(route('iniciar')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" id="email_address" class="form-control" placeholder="Introduce tu correo" name="email" required autofocus>
    <?php if($errors->has('email')): ?>
    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
    <?php endif; ?>
    <input type="password" id="password" class="form-control" placeholder="Introduce tu contraseña"name="password" required>
    <?php if($errors->has('password')): ?>
    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
    <?php endif; ?>
    <button id="submit" type="submit">Iniciar sesion</button>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/auth/inicio.blade.php ENDPATH**/ ?>