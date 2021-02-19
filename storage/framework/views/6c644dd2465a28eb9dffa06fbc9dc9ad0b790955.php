<!DOCTYPE html>
<html>
    <head>
        <title>Instalasi Website - Akun Admin</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="<?php echo e(asset('css/setup.css')); ?>">
    </head>
    <body>
        <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Selamat Datang</h3>
                        <p>Silahkan daftarkan akun admin untuk website ini!</p>
                        <div class="created-text">Dibuat oleh</div><br/>
                        <button class="created">DJamu Dev</button><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false">Setup</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Silahkan Buat Akun Admin</h3>
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
                                <form action="<?php echo e(action('WelcomeController@store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Depan *" name="first_name"  required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nama Belakang *" name="last_name" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Kata Sandi *" name="password" id="password"  required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Ulangi Kata Sandi *" name="re-password" id="re_password" required />
                                            <small><span id="message"></span></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" name="email" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="13" class="form-control" placeholder="Nomer Hp *" name="phone" required />
                                        </div>
                                        <div class="form-group">
                                            <small>Masukkan Tanggal Lahir</small>
                                            <input type="date" name="born_date" required >
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Laki-Laki </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Perempuan </span> 
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btnRegister" id="submit">Buat Akun</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $('#password, #re_password').on('keyup', function () {
                if ($('#password').val() != $('#re_password').val()) {
                    $('#submit').attr('disabled','disabled');
                    $('#message').html('Password tidak sama').css('color', 'red');
                    $('#re_password').addClass('is-invalid');
                } else {
                    $('#message').html('');
                    $('#submit').removeAttr('disabled');
                    $('#re_password').removeClass('is-invalid');
                }
            });
        </script>
    </body>
</html><?php /**PATH F:\d'jamu\resources\views/install/akun.blade.php ENDPATH**/ ?>