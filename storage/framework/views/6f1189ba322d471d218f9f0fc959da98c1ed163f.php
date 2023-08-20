<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset("css/app.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("css/navbar.css")); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldContent('js'); ?>
    <script src="<?php echo e(asset("js/jquery-3.1.1.js")); ?>"></script>
    <script src="<?php echo e(asset("js/navbar.js")); ?>"></script>
    <?php echo $__env->yieldContent('meta'); ?>
</head>
<body>
    <?php if( $viewActual !="video"): ?>
    <nav class="navbar" id="navbarId">
        <div class="navHeader">
            <a href="/">Cloudplayer</a>
            <a href="javascript:void(0);" class="navButton" onclick="showNavbar()">
                <img class="" style="width: 25px" src="<?php echo e(asset("img/icons/menu-white-18dp.svg")); ?>"></a>
        </div>
        <div id="navElementsId" class="navElements noVisible">
            <a class="active" href="/">Inicio</a>
            <?php if(auth()->guard()->check()): ?>
            <a href="configuracion" href="">Configuracion</a>
            <a href="/logout">Desconectarse</a>
            <?php endif; ?>
        </div>
    </nav>
    <?php endif; ?>
    <?php echo $__env->yieldContent("content"); ?>
</body>
</html><?php /**PATH D:\Marc\Descargas\CloudPlayerLaravel-main\resources\views/templates/layout.blade.php ENDPATH**/ ?>