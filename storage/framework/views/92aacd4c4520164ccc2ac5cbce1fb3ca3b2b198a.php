<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="cloud, peliculas, drive">
<title>Registrarse</title>
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
    <h2>Registro</h2>
    <a href="<?php echo e(route("inicio")); ?>">Iniciar sesion</a>
  </div>
  <form action="<?php echo e(route('registrar')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" id="name" class="form-control" name="name" placeholder="Introduce tu nombre" required autofocus>
    <?php if($errors->has('name')): ?>
    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>
    <input type="text" id="email_address" class="form-control" placeholder="Introduce tu correo" name="email" required autofocus>
    <?php if($errors->has('email')): ?>
    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
    <?php endif; ?>
    <input type="password" id="password" class="form-control" placeholder="Introduce tu contraseña"name="password" required>
    <?php if($errors->has('password')): ?>
    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
    <?php endif; ?>
    <button id="submit" type="submit">Registrarse</button>
    <div class="formfooter">
      <div id="ingresadatos" class="mensajealerta noVisible">
        <p>Debes ingresar el usuario y la contraseña</p>
      </div>
      <div id="datosincorrectos" class="mensajealerta noVisible">
        <p>Usuario y/o contraseña erronea</p>
      </div>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/auth/registro.blade.php ENDPATH**/ ?>