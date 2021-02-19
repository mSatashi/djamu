<!-- HEADER -->
    <div class="header">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light" id="navbar">
            <div class="container-fluid" style="margin: 0 5%;">
                <a class="navbar-brand" href="#"><img src="/storage/img/config/<?php echo e($web->logo); ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" style="color:#F9C600;" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#About" id="navlink">Tentang kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#Produk" id="navlink">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3" href="#kontak" id="navlink">Kontak</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="/toko"><button class="btn">Toko</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Carousel -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <?php $no = 0 ?>
              <?php $__currentLoopData = $jumboslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jumbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $no++ ?>
                <?php if($no == 1): ?>
                  <div class="carousel-item active" data-bs-interval="10000">
                      <div class="caption">
                        <h1><?php echo e($jumbo->judul); ?></h1>
                        <p><?php echo e($jumbo->isi); ?> </p>
                        <a href="<?php echo e($jumbo->link); ?>"><button class="btn btn2"><?php echo e($jumbo->tulisan_link); ?></button></a>
                    </div>
                    <div class="hal1">
                        <img src="/storage/img/jumboslider/<?php echo e($jumbo->gambar); ?>" alt="">
                    </div>
                  </div>
                  <?php else: ?>
                  <div class="carousel-item" data-bs-interval="10000">
                      <div class="caption">
                        <h1><?php echo e($jumbo->judul); ?></h1>
                        <p><?php echo e($jumbo->isi); ?> </p>
                        <a href="<?php echo e($jumbo->link); ?>"><button class="btn btn2"><?php echo e($jumbo->tulisan_link); ?></button></a>
                    </div>
                    <div class="hal1">
                        <img src="/storage/img/jumboslider/<?php echo e($jumbo->gambar); ?>" alt="">
                    </div>
                  </div>
                  <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
<?php /**PATH F:\d'jamu\resources\views/layouts/landing-page/header.blade.php ENDPATH**/ ?>