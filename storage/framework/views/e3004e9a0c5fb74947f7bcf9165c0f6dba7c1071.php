<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
        <!-- <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" /> -->
        <!-- <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid position-relative" id="wave">
            <div class="position-absolute top-50 start-50 translate-middle" style="width: 30%;">
                <div class="p-3 mb-5 form-div">
                    <h2 class="text-center">Login</h2>
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form method="POST"  method="POST" action="<?php echo e(url('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="mb-3"  dir="rtl">
                            <label for="exampleInputEmail1" class="form-label">اسم المستخدم</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-5" dir="rtl">
                            <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center mt-3">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
