<!-- produuk rekomendasi -->
    <section id="Produk" class="Produk pb-4" style=" background-color:#ffeabd;">
      <div class="container">
          <div class="row">
              <div class="col text-center my-5">
              <h1 style="font-family: playfair display; font-weight: bold; font-size: 30px;">Produk Rekomendasi</h1>
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
                      </div></a>
                  </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      </div>
    </section><?php /**PATH F:\d'jamu\resources\views/layouts/toko/recommended.blade.php ENDPATH**/ ?>