<?php $__env->startSection('title', 'Edit Client'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight" style="height: 480px;">
        <div class="row" style="height: 100%">
            <div class="col-md-8 col-md-offset-2" style="height: 100%">
                <div class="panel panel-default" style="height: 100%">
                    <div class="panel-heading">Edit Client</div>

                    <div class="panel-body" style="height: 100%">
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

                        <div class="row" style="height: 100%">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="height: 100%">

                      <!--  <form class="form-horizontal" role="form" method="POST"
                              action="<?php echo e(url('Clients/update/'.$Client->id)); ?>">-->
                              <form class="form-horizontal" enctype="multipart/form-data" action = "updateClient" method = "post" style="height: 100%">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>


                            <div class="<?php echo e($errors->has('name') ? ' has-error' : ''); ?> col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="name" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">الاسم</label>
                                <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden"  id="Client_id" value="<?php echo e($Client->id); ?>">

                                
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="<?php echo e($Client->name); ?>" style="width: 70%;float: right"
                                           required autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                
                            </div>
                            <div class="<?php echo e($errors->has('code') ? ' has-error' : ''); ?> col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="code" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">الكود</label>

                                
                                    <input id="code" type="text" class="form-control" name="code"
                                           value="<?php echo e($Client->code); ?>" style="width: 70%;float: right"
                                           required autofocus>

                                    <?php if($errors->has('code')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('code')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                
                            </div>
                            <div class="<?php echo e($errors->has('balance') ? ' has-error' : ''); ?> col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="balance" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">balance</label>

                                
                                    <input id="balance" type="text" class="form-control" name="balance"
                                           value="<?php echo e($Client->balance); ?>" style="width: 70%;float: right"
                                           required autofocus>

                                    <?php if($errors->has('balance')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('balance')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                
                            </div>
                            <div class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?> col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="phone"   class=" control-label" style="float: right;width: 25%;margin-left: 10px;">التليفون</label>

                                
                                    <input id="phone" type="text" value="<?php echo e($Client->phone); ?>" class="form-control" style="width: 70%;float: right" name="phone" autofocus>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                
                            </div>

                            <div class="<?php echo e($errors->has('address1') ? ' has-error' : ''); ?> col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                <label for="address1" class=" control-label" style="float: right;width: 25%;margin-left: 10px;">
                                    العنوان</label>

                                
                                    <input id="address1" type="text" value="<?php echo e($Client->address1); ?>"class="form-control" style="width: 70%;float: right"
                                           name="address1" autofocus>
                                    <?php if($errors->has('address1')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('address1')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                
                            </div>





                            <div class="col-lg-12 col-md-12 col-sm-12" style="float: right;margin-top: 20px;width:100%;">
                                
                                    <button type="button" onclick="update()" class="btn btn-primary">
                                        Update
                                    </button>

                                    <a class="btn btn-link" href="<?php echo e(url('Clients')); ?>">
                                        Cancel
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