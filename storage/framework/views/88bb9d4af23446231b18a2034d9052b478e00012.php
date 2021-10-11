<style>
    .row .col-md-12 .panel-default .panel-body .form-horizontal .col-lg-12 .form-group label{
        width: 10%;
        float: right;
    }
    .row .col-md-12 .panel-default .panel-body .form-horizontal .col-lg-12 .form-group input{
        width: 36%;
        float: right;
    }
    @media(max-width: 650px){
        .row .col-md-12 .panel-default .panel-body .form-horizontal .col-lg-12 .form-group label{
            width: 15%;
        }
        .row .col-md-12 .panel-default .panel-body .form-horizontal .col-lg-12 .form-group input{
            width: 50%;
        }
    }
</style>


<?php $__env->startSection('title', 'Create Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> اضافه عميل</div>
                <div class="panel-body" style="height: 350px;">
                    <!-- Display Validation Errors -->
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

                    <form class="form-horizontal row" role="form" method="POST" action="<?php echo e(url('Clients')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- <legend class="section">Basic & Contact Info</legend> -->
                            <div class="form-group required<?php echo e($errors->has('name') ? ' has-error' : ''); ?> row" style="float: right;width: 100%">
                                
                                    <label for="name" class="col-lg-1 control-label">الاسم</label>
                                    <input id="name" name="name" type="text" class="form-control col-lg-11"
                                           value="<?php echo e(old('name')); ?>"  >
                                    <!-- <?php if($errors->has('name')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('name')); ?></strong></span>
                                    <?php endif; ?> -->
                                
                            </div>
                            <br>
                            <div class="form-group required<?php echo e($errors->has('address1') ? ' has-error' : ''); ?> row" style="float: right;width: 100%">
                                
                                    <label for="address1" class="col-lg-1 control-label">عنوان</label>
                                    <input id="address1" name="address1" type="text" class="form-control col-lg-11"
                                           value="<?php echo e(old('address1')); ?>" >
                                    <!-- <?php if($errors->has('address1')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('address1')); ?></strong></span>
                                    <?php endif; ?> -->
                                
                            </div>
                            <br>
                            <div class="form-group<?php echo e($errors->has('code') ? ' has-error' : ''); ?> row" style="float: right;width: 100%">
                                
                                    <label for="code" class="col-lg-1 control-label">كود</label>
                                    <input id="code" name="code" type="text" class="form-control col-lg-11"
                                           value="<?php echo e(old('code')); ?>">
                                    <!-- <?php if($errors->has('code')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('code')); ?></strong></span>
                                    <?php endif; ?> -->
                                
                                
                            </div>
                            <br>
                            <div class="form-group<?php echo e($errors->has('code') ? ' has-error' : ''); ?> row" style="float: right;width: 100%">
                                
                                    <label for="code" class="col-lg-1 control-label"> رصيد</label>
                                    <input id="balance" name="balance" type="text" class="form-control col-lg-11"
                                           value="<?php echo e(old('balance')); ?>">
                                    <!-- <?php if($errors->has('balance')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('balance')); ?></strong></span>
                                    <?php endif; ?> -->
                                
                                
                            </div>
                            <br>
                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?> row" style="float: right;width: 100%">
                                
                                    <label for="phone" class="col-lg-1 control-label">رقم تليفون</label>
                                    <input id="phone" name="phone" type="text" class="form-control col-lg-11"
                                           value="<?php echo e(old('phone')); ?>">
                                           <input id="state" name="state" type="hidden" class="form-control"
                                                  value=1>
                                    <!-- <?php if($errors->has('phone')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('phone')); ?></strong></span>
                                    <?php endif; ?> -->
                                
                                
                            </div>

                            <legend class="section"></legend>
                            <div class="form-group required<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">

                            </div>



                        </div>

                        <br>
                        <div class="form-group" style="margin: 30px 20px 20px 0px">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> حفظ</button>
                                <a class="btn btn-link" href="<?php echo e(url('Clients')); ?>"> الغاء</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>