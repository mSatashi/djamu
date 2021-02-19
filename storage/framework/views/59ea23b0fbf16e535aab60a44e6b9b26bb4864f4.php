

    <?php $__env->startSection('content'); ?>        
        <div class="stars">
            <div class="custom-navbar">
                <div class="brand-logo">
                    <img src="<?php echo e(asset('img/logo.png')); ?>" width="80px">
                </div>
                <div class="navbar-links">
                    <ul>
                      <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#" class="btn-request">Toko</a></li>
                    </ul>
                </div>
            </div>
            <div class="central-body">
                <img class="image-404" src="<?php echo e(asset('img/404/404.svg')); ?>" width="300px">
                <a href="<?php echo e(url('/')); ?>" class="btn-go-home">GO BACK HOME</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="<?php echo e(asset('img/404/rocket.svg')); ?>" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="<?php echo e(asset('img/404/earth.svg')); ?>" width="100px">
                    <img class="object_moon" src="<?php echo e(asset('img/404/moon.svg')); ?>" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="<?php echo e(asset('img/404/astronaut.svg')); ?>" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>

            </div>

        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error.layouts-404', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/error/404.blade.php ENDPATH**/ ?>