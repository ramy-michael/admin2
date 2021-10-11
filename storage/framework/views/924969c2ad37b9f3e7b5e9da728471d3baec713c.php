<?php $__env->startSection('title', 'Edit Package'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="height: 250px;">
                    <div class="panel-heading">Edit Package</div>

                    <div class="panel-body">
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


                      <!--  <form class="form-horizontal" role="form" method="POST"
                              action="<?php echo e(url('Packages/update/'.$Package->id)); ?>">-->
                            <form class="form-horizontal" enctype="multipart/form-data" action = "updatePackage" method = "post">

                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PATCH')); ?>


                                <div class="row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" style="height: 100%;">
                                    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden"  id="Package_id" value="<?php echo e($Package->id); ?>">

                                    <div class="col-lg-11" style="margin-bottom: 15px;">
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="<?php echo e($Package->name); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <label for="name" class="col-lg-1 control-label">الاسم</label>
                                </div>

                                <div class="row <?php echo e($errors->has('quantity') ? ' has-error' : ''); ?>" style="height: 100%;">


                                    <div class="col-lg-11" style="margin-bottom: 15px;">
                                        <input id="quantity" type="text" class="form-control" name="quantity"
                                            value="<?php echo e($Package->quantity); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('quantity')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('quantity')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <label for="quantity" class="col-lg-1 control-label">الكميه</label>
                                </div>
                                <div class="row <?php echo e($errors->has('weight') ? ' has-error' : ''); ?>" style="height: 100%;">


                                    <div class="col-lg-11" style="margin-bottom: 15px;">
                                        <input id="weight" type="text" class="form-control" name="weight"
                                            value="<?php echo e($Package->weight); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('weight')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('weight')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <label for="weight" class="col-lg-1 control-label">الوزن</label>
                                </div>
                                <div class="row" style="height: 100%;">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="button" onclick="update()" class="btn btn-primary">
                                            تعديل
                                        </button>

                                        <a class="btn btn-link" href="<?php echo e(url('Packages')); ?>">
                                            الغاء
                                        </a>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

function update()
{


  $.ajax({
    url: "<?php echo e(URL::to('updatePackage')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "weight":$('#weight').val(),
    "quantity":$('#quantity').val(),"id":$('#Package_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {
if(response.status=="success"){
  window.location.href = "/Packages";

}else{

}

    /*  if(response['errors'].phone)
      {var html="";
        for(var i=0;i<response['errors'].phone.length;i++){
        html+=''+response["errors"].phone[i]+'<br>'
      }
        $("#olddoctor_phoneinvalid").html(html);
      }
      if(response['errors'].type)
      {
        $("#olddoctor_typeinvalid").html(response['errors'].type);
      }
      if(response['errors'].docName)
      {
        $("#olddoctor_nameinvalid").html(response['errors'].docName);
      }

    }
      else if(response.success)
      {*/
      //  location.reload();
    //  }
    //  location.reload();
    //window.location.replace("Packages");




   }



    });

}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>