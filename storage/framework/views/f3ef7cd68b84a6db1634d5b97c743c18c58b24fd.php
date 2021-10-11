<?php $__env->startSection('title', 'Edit Client'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Client</div>

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
                              action="<?php echo e(url('Clients/update/'.$Client->id)); ?>">-->
                              <form class="form-horizontal" enctype="multipart/form-data" action = "updateClient" method = "post">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">الاسم</label>
                                <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden"  id="Client_id" value="<?php echo e($Client->id); ?>">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="<?php echo e($Client->name); ?>"
                                           required autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('code') ? ' has-error' : ''); ?>">
                                <label for="code" class="col-md-4 control-label">الكود</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code"
                                           value="<?php echo e($Client->code); ?>"
                                           required autofocus>

                                    <?php if($errors->has('code')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('code')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('balance') ? ' has-error' : ''); ?>">
                                <label for="balance" class="col-md-4 control-label">balance</label>

                                <div class="col-md-6">
                                    <input id="balance" type="text" class="form-control" name="balance"
                                           value="<?php echo e($Client->balance); ?>"
                                           required autofocus>

                                    <?php if($errors->has('balance')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('balance')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="phone"   class="col-md-4 control-label">التليفون</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" value="<?php echo e($Client->phone); ?>" class="form-control" name="phone" autofocus>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>">
                                <label for="address1" class="col-md-4 control-label">
                                    العنوان</label>

                                <div class="col-md-6">
                                    <input id="address1" type="text" value="<?php echo e($Client->address1); ?>"class="form-control"
                                           name="address1" autofocus>
                                    <?php if($errors->has('address1')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('address1')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" onclick="update()" class="btn btn-primary">
                                        Update
                                    </button>

                                    <a class="btn btn-link" href="<?php echo e(url('Clients')); ?>">
                                        Cancel
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
    url: "<?php echo e(URL::to('updateClient')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "phone":$('#phone').val(),
    "address1":$('#address1').val(),
    "balance":$('#balance').val(),
    "code":$('#code').val(),"id":$('#Client_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {
if(response.status=="success"){
  window.location.href = "/Clients";

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
    //window.location.replace("Clients");




   }



    });

}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>