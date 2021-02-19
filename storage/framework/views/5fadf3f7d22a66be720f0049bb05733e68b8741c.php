<?php if(Auth::user()->level == "Admin"): ?>
  

  <?php $__env->startSection('content'); ?>
            <div class="content-wrapper">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-10">
                          <h4>Jumbotron</h4>
                        </div>
                        <div class="col-md-2">
                          <a href="jumbotron/create" class="btn btn-primary">Buat Jumbotron</a>
                        </div>
                      </div>
                      </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Id</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Link</th>
                            <th>Gambar</th>
                            <th>Dibuat oleh</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0 ?>
                          <?php $__currentLoopData = $myItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jumbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $no++ ?>
                          <tr>
                            <td style="text-align: center;"><?php echo e($no); ?></td>
                            <td><?php echo e($jumbo->judul); ?></td>
                            <td><?php echo e($jumbo->isi); ?></td>
                            <td><a href="<?php echo e($jumbo->link); ?>"><?php echo e($jumbo->link); ?></a></td>
                            <td><img src="/storage/img/jumbotron/<?php echo e($jumbo->gambar); ?>" style="height: 100px;" alt="<?php echo e($jumbo->judul); ?>"></td>
                            <td><?php echo e($jumbo->name); ?></td>
                            <td>
                              <a href="<?php echo e(url('/admin/jumbotron/' . $jumbo->id . '/edit')); ?>" title="Edit Jumbtron">
                                <button class="btn btn-warning btn-sm">
                                  <i class="mdi mdi-pencil" aria-hidden="true"></i>
                                </button>
                              </a>
                              <form method="POST" action="<?php echo e(action('Admin\JumbotronController@destroy', $jumbo->id)); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Jumbotron" onclick="return confirm('Apakah kamu yakin mau menghapus jumbtron ini?')">
                                  <i class="mdi mdi-trash-can-outline" aria-hidden="true"></i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                      <?php echo e($jumbotron->links()); ?>

                    </div>
                  </div>
                </div>
              </div>
            <!-- content-wrapper ends -->
  <?php $__env->stopSection(); ?>
<?php else: ?>
<script type="text/javascript">
    window.location = "<?php echo e(url('/404')); ?>";//here double curly bracket
</script>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/jumbotron/index.blade.php ENDPATH**/ ?>