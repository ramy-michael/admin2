<style>
    .wrapper .row .col-lg-12 .panel .panel-body .row .col-lg-12 .form-horizontal .row .form-control{
        width: 40%;
        float: right;
    }
    @media(max-width: 562px){
        .wrapper .row .col-lg-12 .panel .panel-body .row .col-lg-12 .form-horizontal .row .form-control{
            width: 50%;
            float: right;
        }
    }
</style>


<?php $__env->startSection('title', 'Edit Package'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="height: 300px;">
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

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                      <!--  <form class="form-horizontal" role="form" method="POST"
                              action="<?php echo e(url('Packages/update/'.$Package->id)); ?>">-->
                            <form class="form-horizontal" enctype="multipart/form-data" action = "updatePackage" method = "post" style="padding: 0 30px 0 0;">

                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PATCH')); ?>


                                <div class="row <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" style="float: right;margin-top: 20px;width:100%;">
                                    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden"  id="Package_id" value="<?php echo e($Package->id); ?>">

                                    <label for="name" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الاسم</label>
                                    
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="<?php echo e($Package->name); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    
                                    
                                </div>

                                <div class="row <?php echo e($errors->has('quantity') ? ' has-error' : ''); ?>" style="float: right;margin-top: 20px;width:100%;">

                                    <label for="quantity" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الكميه</label>
                                    
                                        <input id="quantity" type="text" class="form-control" name="quantity"
                                            value="<?php echo e($Package->quantity); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('quantity')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('quantity')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    
                                    
                                </div>
                                <div class="row <?php echo e($errors->has('weight') ? ' has-error' : ''); ?>" style="float: right;margin-top: 20px;width:100%;">

                                    <label for="weight" class="control-label" style="float: right;width: 10%;margin-left: 10px;">الوزن</label>
                                    
                                        <input id="weight" type="text" class="form-control" name="weight"
                                            value="<?php echo e($Package->weight); ?>"
                                            required autofocus style="width: 40%">

                                        <?php if($errors->has('weight')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('weight')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    
                                    
                                </div>
                                <div class="row" style="float: right;margin-top: 20px;width:100%;">
                                    
                                        <button type="button" onclick="update()" class="btn btn-primary">
                                            تعديل
                                        </button>

                                        <a class="btn btn-link" href="<?php echo e(url('Packages')); ?>">
                                            الغاء
                                        </a>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
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