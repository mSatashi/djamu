<?php if(Auth::user()->level == "Admin"): ?>
    

    <?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2><b>Buat</b> Jumbtron</h2>
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
                        <form action="<?php echo e(action('Admin\JumbotronController@store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="judul">Judul Jumbotron</label>
                                <input id="judul" name="judul" type="text" class="form-control" placeholder="Masukkan judul jumbotron" required="on">
                                <div class="form-text"><small>Contoh : Selamat Datang</small></div>
                            </div>
                            <div class="mb-3">
                                <label for="isi">Isi Jumbotron</label>
                                <textarea name="isi" id="isi" cols="30" rows="5" class="form-control" placeholder="Masukkan isi jumbotron" required="on"></textarea>
                                <div class="form-text"><small>Contoh : D'jamu ...</small></div>
                            </div>
                            <div class="mb-3">
                                <label for="link">Link Jumbotron</label>
                                <input id="link" name="link" type="url" class="form-control" placeholder="Masukkan link jumbotron" required="on">
                                <div class="form-text"><small>Contoh : D'jamu ...</small></div>
                            </div>
                            <div class="mb-3">
                                <label for="gambar">Gambar Jumbotron</label>
                                <input type="file" class="form-control" name="gambar" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                        </form>
                        <a href="<?php echo e(url('admin/jumbotron')); ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php else: ?>
<script type="text/javascript">
    window.location = "<?php echo e(url('/404')); ?>";//here double curly bracket
</script>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\d'jamu\resources\views/admin/jumbotron/create.blade.php ENDPATH**/ ?>