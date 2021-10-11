<?php $__env->startSection('title', 'Create Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> اضافه مورد</div>
                <div class="panel-body" style="height: 330px;">
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

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('Suppliers')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="">
                            <!-- <legend class="section" style="border-bottom: 0;">Basic & Contact Info</legend> -->
                            <div class="form-group required<?php echo e($errors->has('name') ? ' has-error' : ''); ?> row ">
                                <div class="col-lg-11 ">
                                    <input id="name" name="name" type="text" class="form-control" style="width: 300px;"
                                           value="<?php echo e(old('name')); ?>" required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('name')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                                <label for="name" class="control-label col-lg-1">الاسم</label>
                            </div>
                            <br>
                            <div class="form-group required<?php echo e($errors->has('address1') ? ' has-error' : ''); ?> row" style="margin-top: 30px;">
                                <div class="col-lg-11 ">
                                    <input id="address1" name="address1" type="text" class="form-control" style="width: 300px;"
                                           value="<?php echo e(old('address1')); ?>" required>
                                    <?php if($errors->has('address1')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('address1')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                                <label for="address1" class="col-lg-1 control-label">عنوان</label>
                            </div>
                            <br>
                            <div class="form-group<?php echo e($errors->has('code') ? ' has-error' : ''); ?> row" style="margin-top: 30px;">
                                <div class="col-lg-11">
                                    <input id="code" name="code" type="text" class="form-control" style="width: 300px;"
                                           value="<?php echo e(old('code')); ?>">
                                    <?php if($errors->has('code')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('code')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                                <label for="code" class="col-lg-1 control-label">كود</label>
                            </div>
                            <br>
                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?> row" style="margin-top: 30px;">
                                <div class="col-lg-11">
                                    <input id="phone" name="phone" type="text" class="form-control" style="width: 300px;"
                                           value="<?php echo e(old('phone')); ?>">
                                           <input id="state" name="state" type="hidden" class="form-control"
                                                  value=1>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('phone')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                                <label for="phone" class="col-lg-1 control-label">رقم تليفون</label>
                            </div>
                            <br>

                            <div class="form-group<?php echo e($errors->has('balance') ? ' has-error' : ''); ?> row" style="margin-top: 30px;">
                                <div class="col-lg-11">
                                    <input id="balance" name="balance" type="text" class="form-control" style="width: 300px;"
                                           value="<?php echo e(old('balance')); ?>">
                                           <!-- <input id="state" name="state" type="hidden" class="form-control" -->
                                                  <!-- value=1> -->
                                    <?php if($errors->has('balance')): ?>
                                        <span class="help-block"><strong><?php echo e($errors->first('balance')); ?></strong></span>
                                    <?php endif; ?>
                                </div>
                                <label for="balance" class="col-lg-1 control-label"> الرصيد</label>
                            </div>
                            <legend class="section"></legend>
                            <div class="form-group required<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">

                            </div>



                        </div>
                        <br>

                        <div class="form-group row" style="margin-top: 30px;">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> حفظ</button>
                                <a class="btn btn-link" href="<?php echo e(url('Suppliers')); ?>"> الغاء</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>