<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Invoice</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="js/plugins/select2/select2.min.js"></script>

</head>
<div id="page-wrap" class="gray-bg" style="margin-right: 0px;">

    <div class="wrapper wrapper-content animated fadeInRight" style="padding-top: 0;">
        <div class="row wrapper border-bottom white-bg page-heading w-100 m-auto" >
            <div class="col-lg-12">
                <h2 style="float: right;">استلام نقديه</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>استلام نقديه</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                    <div class="ibox-content " style="">

                        <div class="container-fluid">
                            <div class="row text-right mb-3">
                                <div class="col-lg-4 mb-3">
                                    <div class="col-sm-8">
                                        <select  id="client" name="client" style="width:180px;">
                                          <option disabled value selected value=''></option>

                                          <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                          <option  value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <label class="col-form-label col-lg-4"> اسم العميل:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="date" id="date" name="date" class="form-control" style="width: 180px;">
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden"  id="transaction_id" value="">

                                    </div>
                                    <label class="col-form-label col-lg-4">  التاريخ:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="balance" name="balance"class="form-control" style="width: 180px;" disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    </div>
                                    <label class="col-form-label col-lg-4">  الرصيد:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="amount" name="amount" class="form-control" style="width: 180px;">
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">

                                    </div>
                                    <label class="col-form-label col-lg-4">المبلغ المدفوع:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="from_account" name="from_account" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">

                                    </div>
                                    <label class="col-form-label col-lg-4">من حساب:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="to_account" placeholder="الخزنه" name="to_account" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    </div>
                                    <label class="col-form-label col-lg-4">الي حساب:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="remain"   name="remain" class="form-control" style="width: 180px;" disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                    </div>
                                    <label class="col-form-label col-lg-4"> الباقي:</label>
                                </div>
                                <div class="col-lg-12 text-left mt-2">
                                    <div class="mb-3">
                                        <div class="col-lg-6">
                                            <input type="button" class="btn btn-primary " onclick="save();"value="حفظ" style="width: 80px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </div>
        </div>
    </div>


</div>
<!-- <script src="js/jquery-3.1.1.min.js"></script> -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>
<!-- Page-Level Scripts -->
<script>
  $('.js-example-basic-single').select2();


</script>

<script>
<?php if(isset($_GET['id'])): ?>
$('#transaction_id').val("<?php echo e($Transaction[0]->id); ?>")
$("#expense_type").select2("val", "<?php echo e($Transaction[0]->expense_type); ?>"); //set the value



// if($('#expense_type').val()==2){
  // $('#supplier').val(<?php echo e($Transaction[0]->supplier_id); ?>)
  $('#client').val("<?php echo e($Transaction[0]->client_id); ?>");
  console.log("<?php echo e($Transaction[0]->client_id); ?>");

  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  if(<?php echo e($client->id); ?>==$('#client').val()){
$('#from_account').val("<?php echo e($client->name); ?>")


}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
$('#date').val("<?php echo e($Transaction[0]->created_at); ?>")
  $('#balance').val("<?php echo e($Transaction[0]->depit+$Transaction[0]->account_balance); ?>");
  var old_depit="<?php echo e($Transaction[0]->depit); ?>";

  $('#amount').val("<?php echo e($Transaction[0]->depit); ?>");

    var remain =Number($('#balance').val())-Number($('#amount').val())
    $('#remain').val("<?php echo e($Transaction[0]->account_balance); ?>")

// var old_credit="<?php echo e($Transaction[0]->depit); ?>";
console.log('<?php echo e($Transaction[0]->account_balance); ?>')
  // $('#supplier').val("<?php echo e($Transaction[0]->supplier_id); ?>");


  // $("#supplier").select2("val", "<?php echo e($Transaction[0]->supplier_id); ?>"); //set the value
console.log($('#client').val(),<?php echo e($Transaction[0]->supplier_id); ?>)
  // $('#supplier').val(<?php echo e($Transaction[0]->account_id); ?>)
// }



<?php else: ?>

<?php endif; ?>
$('#amount').on('change', function() {
  <?php if(isset($_GET['id'])): ?>



  $('#remain').val(remain)
  console.log(Number(old_depit));

  var remain =Number($('#balance').val())+Number(old_depit)-Number(this.value)
  <?php else: ?>
  var remain =Number($('#balance').val())-Number(this.value)

  <?php endif; ?>;
  $('#remain').val(remain)

});
$('#client').on('change', function() {

  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  if(<?php echo e($client->id); ?>==$('#client').val()){
$('#balance').val(<?php echo e($client->balance); ?>)
$('#from_account').val("<?php echo e($client->name); ?>")


}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

});
function save()
{
  var client_id=$('#client_id').val()

<?php if(isset($_GET['id'])): ?>

  $.ajax({
    url: "<?php echo e(URL::to('updateReceiveCash')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "id": $('#transaction_id').val(),
    "amount":$('#amount').val(),
    "client":$('#client').val(),
    "balance":$('#balance').val(),
    "remain":$('#remain').val()

    },
    success: function(response)
    {
console.log(response)
if(response.status=="success"){
  window.location.href = "/PaymentScreen";

}else{

}



   }



    });

    <?php else: ?>
    $.ajax({
      url: "<?php echo e(URL::to('createReceiveCash')); ?>",
      type: "post",
      dataType: 'json',
      data: {"_token":$('#_token').val(),
      "amount":$('#amount').val(),
      "client":$('#client').val(),

      "remain":$('#remain').val()

      },
      success: function(response)
      {
  console.log(response)
  if(response.status=="success"){
    window.location.href = "/PaymentScreen";

  }else{

  }



     }



      });
    <?php endif; ?>
// }
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>