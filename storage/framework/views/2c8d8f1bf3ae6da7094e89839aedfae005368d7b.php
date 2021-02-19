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
                        <li class="breadcrumb-item active"><a href="/admin/users">Pengguna</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/users/create">Buat Pengguna</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form action="<?php echo e(action('Admin\UserController@create')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="id" value="<?php echo e($users->id); ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap <span class="text-danger">*</span><br>
                                                <small>Note : Maksimal 20 Huruf</small>
                                            </label>
                                            <div class="col-lg-6">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Masukkan nama pengguna" required="on" maxlength="20" value="<?php echo e($users->name); ?>" readonly> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input id="email" name="email" type="email" class="form-control" placeholder="Masukkan email pengguna"  value="<?php echo e($users->email); ?>" readonly> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-level">Level <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="level" name="level">
                                                    <option value="Pengguna">Pengguna</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>