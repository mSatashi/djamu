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
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success">
                                            <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(session('danger')): ?>
                                    <div class="alert alert-danger">
                                            <?php echo e(session('danger')); ?>

                                    </div>
                                <?php endif; ?>
                                
                                <h4 class="card-title">Pengguna</h4>
                                <a href="<?php echo e(url('admin/users/create')); ?>" title="Buat Pengguna">
                                    <button class="btn btn-primary btn-sm">
                                        Buat Pengguna
                                    </button>
                                </a>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Avatar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0 ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $no++ ?>
                                            <tr>
                                              <td style="text-align: center;"><?php echo e($no); ?></td>
                                              <td><?php echo e($user->name); ?></td>
                                              <td><?php echo e($user->email); ?></td>
                                              <td><?php echo e($user->level); ?></td>
                                              <td><img src="/storage/img/avatar/<?php echo e($user->avatar); ?>" style="height: 100px;" alt="<?php echo e($user->name); ?>"></td>
                                              <td>
                                                <a href="<?php echo e(url('/admin/jumboslider/' . $user->id . '/edit')); ?>" title="Edit Jumbtron">
                                                  <button class="btn btn-warning">
                                                    <i class="mdi mdi-pencil" aria-hidden="true"></i>
                                                  </button>
                                                </a>
                                              </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Avatar</th>
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
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/users/index.blade.php ENDPATH**/ ?>