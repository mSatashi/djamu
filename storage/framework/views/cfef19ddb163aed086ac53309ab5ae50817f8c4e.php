<?php if(Auth::user()->level == "Admin"): ?>
  

  <?php $__env->startSection('title'); ?>
      <title><?php echo e($web->nama_web); ?> - Halaman Admin</title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('img/logo.png')); ?>">
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="card-title">Produk</h4>
                                <a href="<?php echo e(url('admin/produk/create')); ?>" title="Buat Jumbo Slider">
                                    <button class="btn btn-primary btn-sm">
                                        Buat Produk
                                    </button>
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Id</th>
                                                <th>Nama Produk</th>
                                                <th>Gambar Ke-1</th>
                                                <th>Gambar Ke-2</th>
                                                <th>Gambar Ke-3</th>
                                                <th>Deskripsi</th>
                                                <th>Komposisi</th>
                                                <th>Manfaat</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Dibuat oleh</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ?>
                                            <?php $__currentLoopData = $myItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $no++ ?>
                                            <tr>
                                              <td style="text-align: center;"><?php echo e($no); ?></td>
                                              <td><?php echo e($product->nama_produk); ?></td>
                                              <td><img src="/storage/img/products/<?php echo e($product->gambar1); ?>" style="height: 100px;" alt="<?php echo e($product->nama_produk); ?>"></td>
                                              <td><img src="/storage/img/products/<?php echo e($product->gambar2); ?>" style="height: 100px;" alt="<?php echo e($product->nama_produk); ?>"></td>
                                              <td><img src="/storage/img/products/<?php echo e($product->gambar3); ?>" style="height: 100px;" alt="<?php echo e($product->nama_produk); ?>"></td>
                                              <td><?php echo e($product->deskripsi); ?></td>
                                              <td><?php echo e($product->komposisi); ?></td>
                                              <td><?php echo e($product->manfaat); ?></td>
                                              <td><?php echo e($product->isi); ?> ml = Rp <?php echo e($product->harga); ?></td>
                                              <td><?php echo e($product->isi2); ?> ml = Rp <?php echo e($product->harga2); ?></td>
                                              <td><?php echo e($product->isi3); ?> ml = Rp <?php echo e($product->harga3); ?></td>
                                              <td><?php echo e($product->isi4); ?> ml = Rp <?php echo e($product->harga4); ?></td>
                                              <td><?php echo e($product->name); ?></td>
                                              <td>
                                                <a href="<?php echo e(url('/admin/produk/' . $product->id . '/edit')); ?>" title="Edit Jumbtron">
                                                  <button class="btn btn-warning btn-sm">
                                                    <i class="mdi mdi-pencil" aria-hidden="true"></i>
                                                  </button>
                                                </a>
                                                <form method="POST" action="<?php echo e(action('Admin\ProductController@destroy', $product->id)); ?>" style="display: inline;">
                                                  <?php echo csrf_field(); ?>
                                                  <?php echo method_field('DELETE'); ?>
                                                  <button type="submit" class="btn btn-danger btn-sm" title="Delete Jumbotron" onclick="return confirm('Apakah kamu yakin mau menghapus produk ini?')">
                                                    <i class="mdi mdi-delete" aria-hidden="true"></i>
                                                  </button>
                                                </form>
                                              </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="text-align: center;">Id</th>
                                                <th>Nama Produk</th>
                                                <th>Gambar Ke-1</th>
                                                <th>Gambar Ke-2</th>
                                                <th>Gambar Ke-3</th>
                                                <th>Deskripsi</th>
                                                <th>Komposisi</th>
                                                <th>Manfaat</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Isi (ml) = Harga</th>
                                                <th>Dibuat oleh</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
  <?php $__env->stopSection(); ?>
<?php else: ?>
<script type="text/javascript">
    window.location = "<?php echo e(url('/404')); ?>";//here double curly bracket
</script>
<?php endif; ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/product/index.blade.php ENDPATH**/ ?>