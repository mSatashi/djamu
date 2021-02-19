

<?php $__env->startSection('title'); ?>
    <title><?php echo e($web->nama_web); ?> | Toko</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('img/logo.png')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.toko.navbar', ['web' => $web], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- tentang produk -->
  <section id="shop" class="shop" >
    <div class="container"> 
                            <div class="col-lg-12">
                                <?php if(count($errors) > 0): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="alert alert-danger">
                                            <?php echo e($error); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if(session('error')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
      <div class="row justify-content-center produk-isi">
        <div class="col text-end" data-aos="fade-left" data-aos-duration="1000">
          <img class="shadow rounded img-fluid"src="/storage/img/products/<?php echo e($myProduct->gambar1); ?>" alt="<?php echo e($myProduct->nama_produk); ?>">
        </div>
        <div class="col text-jutify belanja" data-aos="fade-right" data-aos-duration="1000">
          <h2><?php echo e($myProduct->nama_produk); ?></h2>
          <?php if($myProduct->harga2 != null): ?>
            <?php if($myProduct->harga3 != null): ?>
              <?php if($myProduct->harga4 != null): ?>
                <p>Rp. <?php echo e($myProduct->harga); ?> - Rp. <?php echo e($myProduct->harga4); ?></p>
              <?php else: ?>
                <p>Rp. <?php echo e($myProduct->harga); ?> - Rp. <?php echo e($myProduct->harga3); ?></p>
              <?php endif; ?>
            <?php else: ?>
              <p>Rp. <?php echo e($myProduct->harga); ?> - Rp. <?php echo e($myProduct->harga2); ?></p>
            <?php endif; ?>
          <?php else: ?>
            <p>Rp. <?php echo e($myProduct->harga); ?></p>
          <?php endif; ?>
          <br>
          <form action="<?php echo e(action('TokoController@store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo e($myProduct->id); ?>">
            </div>
            <div class="form-group">
                <select name="isi" id="isi">
                  <option value="">Pilih salah satu</option>
                  <?php if($myProduct->isi2 != null): ?>
                    <?php if($myProduct->isi3 != null): ?>
                      <?php if($myProduct->isi4 != null): ?>
                        <option value="<?php echo e($myProduct->isi); ?>">Isi <?php echo e($myProduct->isi); ?> ml Harganya Rp.<?php echo e($myProduct->harga); ?> </option>
                        <option value="<?php echo e($myProduct->isi2); ?>">Isi <?php echo e($myProduct->isi2); ?> ml Harganya Rp.<?php echo e($myProduct->harga2); ?></option>
                        <option value="<?php echo e($myProduct->isi3); ?>">Isi <?php echo e($myProduct->isi3); ?> ml Harganya Rp.<?php echo e($myProduct->harga3); ?></option>
                        <option value="<?php echo e($myProduct->isi4); ?>">Isi <?php echo e($myProduct->isi4); ?> ml Harganya Rp.<?php echo e($myProduct->harga4); ?></option>
                      <?php else: ?>
                        <option value="<?php echo e($myProduct->isi); ?>">Isi <?php echo e($myProduct->isi); ?> ml Harganya Rp.<?php echo e($myProduct->harga); ?> </option>
                        <option value="<?php echo e($myProduct->isi2); ?>">Isi <?php echo e($myProduct->isi2); ?> ml Harganya Rp.<?php echo e($myProduct->harga2); ?></option>
                        <option value="<?php echo e($myProduct->isi3); ?>">Isi <?php echo e($myProduct->isi3); ?> ml Harganya Rp.<?php echo e($myProduct->harga3); ?></option>
                      <?php endif; ?>
                    <?php else: ?>
                      <option value="<?php echo e($myProduct->isi); ?>">Isi <?php echo e($myProduct->isi); ?> ml Harganya Rp.<?php echo e($myProduct->harga); ?> </option>
                      <option value="<?php echo e($myProduct->isi2); ?>">Isi <?php echo e($myProduct->isi2); ?> ml Harganya Rp.<?php echo e($myProduct->harga2); ?></option>
                    <?php endif; ?>
                  <?php else: ?>
                    <option value="<?php echo e($myProduct->isi); ?>">Isi <?php echo e($myProduct->isi); ?> ml Harganya Rp.<?php echo e($myProduct->harga); ?> </option>
                  <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="jumlah" value="1" placeholder="Masukkan jumlahnya">
            </div>
            <div class="form-group">
                <button class="btn produk-btn" type="submit">Masukkan ke keranjang</button>
            </div>
          </form>
        </div>
      </div>
  
      <div class="row" style="margin: 5% 10%; height: 250px;"> <!-- kuu buat fix heightnya biar yang produk rekomendasi ga naik turun-->
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link produk-menu active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Deskripsi</button>
            <button class="nav-link produk-menu" id="nav-benefits-tab" data-bs-toggle="tab" data-bs-target="#nav-benefits" type="button" role="tab" aria-controls="nav-benefits" aria-selected="false">Manfaat</button>
            <button class="nav-link produk-menu" id="nav-composition-tab" data-bs-toggle="tab" data-bs-target="#nav-composition" type="button" role="tab" aria-controls="nav-composition" aria-selected="false">Komposisi</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab"><?php echo e($myProduct->deskripsi); ?></div>
          <div class="tab-pane fade" id="nav-benefits" role="tabpanel" aria-labelledby="nav-benefits-tab"><?php echo e($myProduct->manfaat); ?></div>
          <div class="tab-pane fade" id="nav-composition" role="tabpanel" aria-labelledby="nav-composition-tab"><?php echo e($myProduct->komposisi); ?></div>
        </div>
      </div>
    </div>
  </section>

     <?php echo $__env->make('layouts.toko.recommended', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->make('layouts.toko.footer', ['web' => $web], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
      $(document).ready(function(){
        $('select[name="isi"]').on('change', function(){
          // membuat variable hargaku untuk mendapatkan atribut harganya
          var pilihanku = $("#isi option:selected").attr("harganya");
          // name total harga di dapat dari inputan harga
          let jumlahnya = $("input[name=jumlah]").val();
          $("#total_harga").val(parseInt(pilihanku)*parseInt(jumlahnya));
        });

        $('input[name="jumlah"]').on('change', function(){
          var jumlah = $("input[name=jumlah]");
          // name total harga di dapat dari inputan harga
          let beratTotal = $("input[name=berat]").val();
          $("#berat").val(parseInt(jumlah)+parseInt(beratTotal));
        });
      });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.toko.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/toko/show.blade.php ENDPATH**/ ?>