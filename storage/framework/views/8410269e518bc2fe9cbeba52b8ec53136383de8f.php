

<?php $__env->startSection('title'); ?>
    <title><?php echo e($web->nama_web); ?> | Toko</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('img/logo.png')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.toko.navbar', ['web' => $web], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PRODUK -->
    <section id="Produk" class="Produk pb-4" style=" background-color:transparent;">
        <div class="container">
            <!-- search -->
            <div class="row my-5 pencarian">
                <form url="/" class="d-flex" method="GET" role="search">
                    <input class="form-control me-2" type="text" placeholder="Search" name="search" aria-label="Search" id="search">
                    <button class="btn btn2" type="submit"><i class="fa fa-search" style="font-size:20px"></i></button>
                </form>
            </div>
            
            <div class="row mb-5">
                <div class="col text-center">
                    <h1 style="font-family: playfair display; font-weight: bold; font-size: 30px;">Produk D'Jamu</h1>
                </div>
            </div>
            <!-- shop -->
            <div class="row mb-3 row-cols-2 row-cols-sm-2 row-cols-md-4">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col mb-3">
                    <div class="card">
                        <a href="/toko/produk/<?php echo e($product->nama_produk); ?>">
                            <img class="card-img-top rounded-top img-fluid img-thumbnail" src="/storage/img/products/<?php echo e($product->gambar1); ?>" alt="<?php echo e($product->nama_produk); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->nama_produk); ?></h5>
                                <?php if($product->harga2 != null): ?>
                                    <?php if($product->harga3 != null): ?>
                                        <?php if($product->harga4 != null): ?>
                                            <p>Rp. <?php echo e($product->harga); ?> - Rp. <?php echo e($product->harga4); ?></p>
                                        <?php else: ?>
                                            <p>Rp. <?php echo e($product->harga); ?> - Rp. <?php echo e($product->harga3); ?></p>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <p>Rp. <?php echo e($product->harga); ?> - Rp. <?php echo e($product->harga2); ?></p>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <p>Rp. <?php echo e($product->harga); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
            <?php echo e($products->links()); ?>

    </section>

     <?php echo $__env->make('layouts.toko.footer', ['web' => $web], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.toko.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/toko/index.blade.php ENDPATH**/ ?>