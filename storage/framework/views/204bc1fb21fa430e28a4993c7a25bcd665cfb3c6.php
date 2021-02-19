

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><b>Edit</b> Jumbotron</h2>
                        </div>
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
                </div>
                
                <div class="card-body">
                    <form action="<?php echo e(action('Admin\JumbotronController@update', $jumbotron->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="judul">Judul Jumbotron</label>
                            <input id="judul" name="judul" type="text" class="form-control" placeholder="Masukkan judul jumbotron" required="on" value="<?php echo e($jumbotron->judul); ?>">
                            <div class="form-text"><small>Contoh : D'jamu ...</small></div>
                        </div>
                        <div class="mb-3">
                            <label for="isi">Isi Jumbotron</label>
                            <input id="isi" name="isi" type="text" class="form-control" placeholder="Masukkan isi jumbotron" required="on" value="<?php echo e($jumbotron->isi); ?>">
                            <div class="form-text"><small>Contoh : D'jamu ...</small></div>
                        </div>
                        <div class="mb-3">
                            <label for="link">Link Jumbotron</label>
                            <input id="link" name="link" type="url" class="form-control" placeholder="Masukkan link jumbotron" required="on" value="<?php echo e($jumbotron->link); ?>">
                            <div class="form-text"><small>Contoh : D'jamu ...</small></div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar">Gambar Jumbotron</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*">
                        </div>
                        <?php echo method_field('PUT'); ?>
                        <button type="submit" class="btn btn-primary" style="float: right;">Ubah Jumbotron</button>
                    </form>
                    <a href="<?php echo e(url('admin/jumbotron')); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/jumbotron/edit.blade.php ENDPATH**/ ?>