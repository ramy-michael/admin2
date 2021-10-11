<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - <?php echo $__env->yieldContent('title'); ?> </title>


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
      @media (max-width: 768px) {
          .body-small .navbar-static-side {
              width: 0%;
          }
      }
  </style>
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper" style="direction:rtl;background: #233645;">
          <body>
        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
              <?php echo $__env->yieldContent('content'); ?>            

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
