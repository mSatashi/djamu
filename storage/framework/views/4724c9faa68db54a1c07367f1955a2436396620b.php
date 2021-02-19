<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php echo $__env->yieldContent('title'); ?>
    <!-- Pignose Calender -->
    <link href="<?php echo e(asset('backend/plugins/pg-calendar/css/pignose.calendar.min.css')); ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/chartist/css/chartist.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')); ?>">
    <!-- Custom Stylesheet -->
    <link href="<?php echo e(asset('backend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/css/datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/plugins/sweetalert/css/sweetalert.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="<?php echo e(asset('backend/images/logo.png')); ?>" alt="<?php echo e($web->nama_web); ?>"> </b>
                    <span class="logo-compact"><img src="<?php echo e(asset('backend/images/logo-compact.png')); ?>" alt="<?php echo e($web->nama_web); ?>"></span>
                    <span class="brand-title">
                        <img src="<?php echo e(asset('backend/images/logo-text.png')); ?>" alt="<?php echo e($web->nama_web); ?>">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="storage/img/avatar/<?php echo e(Auth::user()->avatar); ?>" height="40" width="40" alt="">
                            </div>
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span><?php echo e(Auth::user()->name); ?></span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="icon-power"></i> <span>Keluar</span>
                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label"><b>Halo, <?php echo e(Auth::user()->name); ?></b></li>
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/">Home</a></li>
                            <li><a href="/toko">Home Toko</a></li>
                            <li><a href="/home">Home Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Halaman Utama</li>
                    <li>
                        <a href="/admin/website">
                            <i class="icon-globe menu-icon"></i> <span class="nav-text">Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/jumboslider">
                            <i class="icon-screen-desktop menu-icon"></i> <span class="nav-text">Jumbo Slider</span>
                        </a>
                    </li>
                    <li class="nav-label">Toko</li>
                    <li>
                        <a href="/admin/produk">
                            <i class="icon-tag menu-icon"></i> <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/pesanan">
                            <i class="icon-basket-loaded menu-icon"></i> <span class="nav-text">Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users">
                            <i class="icon-people menu-icon"></i> <span class="nav-text">Pengguna</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->        
        
        <?php echo $__env->yieldContent('content'); ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo e(asset('backend/plugins/common/common.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/gleek.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/styleSwitcher.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/js/dashboard/dashboard-1.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/plugins/tables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/tables/js/datatable-init/datatable-basic.min.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/plugins/validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/validation/jquery.validate-init.js')); ?>"></script>

    <script src="<?php echo e(asset('backend/plugins/sweetalert/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/plugins/sweetalert/js/sweetalert.init.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH F:\d'jamu\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>