<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/toko.css')); ?>">
        <?php echo $__env->yieldContent('title'); ?>
        <!-- ICON FONTAWESOM -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- font source sans pro -->
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php echo $__env->yieldContent('navbar'); ?>
        <?php echo $__env->yieldContent('content'); ?>

    <!-- Boostrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/toko.js')); ?>" type="text/javascript"></script>
  </body>
</html><?php /**PATH F:\d'jamu\resources\views/layouts/toko/master.blade.php ENDPATH**/ ?>