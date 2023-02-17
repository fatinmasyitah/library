<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> | <?php echo $__env->yieldContent('title'); ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/summernote/summernote-bs4.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/jquery-selectric/selectric.css')); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->

</head>
<body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg" style="background-color: #800000" !important></div>

        
        
        <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        

        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
          
            <?php echo $__env->yieldContent('content'); ?>

          </section>
        </div>

       
      </div>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Library Management System By <a href="https://www.linkedin.com/in/nur-fatin-masyitah-mesle-78b7b0229/" target="_blank">Nur Fatin Masyitah binti Mesle</a>
      </div>
      <div class="footer-right">
        
      </div>
    </footer>
  
    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
    
    <!-- JS Libraies -->
    <script src="<?php echo e(asset('assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/jquery-selectric/jquery.selectric.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script>
  
    <!-- Page Specific JS File -->

    <?php echo $__env->yieldContent('scripts'); ?>
    
    <!-- Template JS File -->
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
  </body>

</html>
<?php /**PATH C:\xampp\htdocs\library\resources\views/layouts/backend.blade.php ENDPATH**/ ?>