<!DOCTYPE html>
<html>
    <head>
        <title>Instalasi Website - Pengaturan Website</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="<?php echo e(asset('css/setup-web.css')); ?>">
    </head>
    <body>
        <div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false">Setup</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Silahkan Buat Konfigurasi Website</h3>
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
                                <form action="<?php echo e(action('Admin\WebController@store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Website *" name="nama_web"  required />
                                        </div>
                                        <div class="form-group">
                                            <textarea name="tentang" id="tentang" cols="30" rows="6" class="form-control" placeholder="Tentang Website *" maxlength="340"></textarea>
                                            <small>Note: Maksimal 340 huruf</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar_tentang">Gambar Tentang</label>
                                            <input type="file" class="form-control" name="gambar_tentang" accept="image/*">
                                            <small>Contoh : <a href="https://drive.google.com/file/d/1i63lWR9EJxJyv7hQ5lIPS7a5-NYz5BGn/view?usp=sharing">Klik Disini!</a></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo Website</label>
                                            <input type="file" class="form-control" name="logo" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Email Admin *" name="email" required="on" />
                                            <small>Contoh : <span class="danger-text">contoh@email.com</span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Username Instagram" name="instagram"/>
                                            <small>Contoh : https://instagram.com/<span class="danger-text">instagram</span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="13" class="form-control" placeholder="Nomer Whatsapp" name="phone"/>
                                            <small>Contoh : <span class="danger-text">6281234567890</span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username Twitter" name="twitter"/>
                                            <small>Contoh : https://twitter.com/<span class="danger-text">twitter</span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username Channel Youtube" name="youtube"/>
                                            <small>Contoh : https://www.youtube.com/user/<span class="danger-text">YouTube</span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username Facebook Fanspage" name="facebook"/>
                                            <small>Contoh : https://web.facebook.com/<span class="danger-text">facebook</span></small>
                                        </div>
                                        <button type="submit" class="btnRegister" id="submit">Buat Website</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Konfigurasi Website</h3>
                        <p>Silahkan isi form disamping untuk melakukan konfigurasi pada calon website anda!</p>
                        <div class="created-text">Dibuat oleh</div><br/>
                        <button class="created">DJamu Dev</button><br/>
                    </div>
                </div>

            </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </body>
</html><?php /**PATH F:\d'jamu\resources\views/install/web-config.blade.php ENDPATH**/ ?>