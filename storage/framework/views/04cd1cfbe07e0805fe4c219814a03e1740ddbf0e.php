<!doctype html>
<html lang="en">
  	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	    <!-- CSS -->
	    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
	    <title>Homepage</title>
	    <!-- aos -->
	    <link rel="stylesheet" href="<?php echo e(asset('/css/aos.css')); ?>" />
	    <!-- icon star -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!-- font source sans pro -->
	    <link rel="preconnect" href="https://fonts.gstatic.com"> 
	    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
  	</head>
        <?php echo $__env->yieldContent('content'); ?>

	    <!-- Boostrap Bundle -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	    <script src="<?php echo e(asset('js/main.js')); ?>" type="text/javascript"></script>
	    <script src="<?php echo e(asset('js/aos.js')); ?>"></script>
	    <script>
	      AOS.init();
	    </script>
  	</body>
</html><?php /**PATH F:\d'jamu\resources\views/layouts/landing-page/master.blade.php ENDPATH**/ ?>