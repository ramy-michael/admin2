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
                <h2 style="float: right;">صرف نقديه</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>صرف نقديه</strong>
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
                                        <select class="js-example-basic-single" id="expense_type" name="expense_type" style="width:180px;">
                                            <option disabled value selected></option>
                                            <option  value=2>حساب موردين</option>

                                            <option  value=1>مصروفات</option>
                                            <option  value=3>نثريات</option>
                                            <option  value=4>خصومات</option>
                                            <option  value="5">اصول </option>


                                        </select>
                                    </div>
                                    <label class="col-form-label col-lg-4"> نوع المصروف:</label>
                                </div>
                                
                                


                                <div class="col-lg-4 mb-3"id="supplier_div" >
                                    <!-- <div class="col-sm-8" id="supplier_div2">
                                        <select class="js-example-basic-single"  name="supplier" style="width:180px;"id="supplier">
                                            <option disabled value selected></option>

                                              <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              <option  value='<?php echo e($supplier->id); ?>'><?php echo e($supplier->name); ?></option>

                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
</div> -->
                                        <div class="col-sm-8" id="expense_div2" >

                                        <select class="js-example-basic-single"   name="expense" style="width:180px;"id="expense" >

                                           
                                        </select>
                                    </div>
                                    <label class="col-form-label col-lg-4"> <span id="span_txt"></span>:</label>
                                </div>
                                
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="balance" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden"  id="transaction_id" value="">

                                    </div>
                                    <label class="col-form-label col-lg-4">الرصيد:</label>
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
                                      <input type="text" id="from_account" name="from_account" placeholder="الخزنه" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">

                                    </div>
                                    <label class="col-form-label col-lg-4">من حساب:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="to_account" name="to_account"   class="form-control" style="width: 180px;" disabled>
                                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" id="remain"   name="remain" class="form-control" style="width: 180px;">

                                    </div>
                                    <label class="col-form-label col-lg-4">الي حساب:</label>
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
console.log("<?php echo e($Transaction[0]->expense_id); ?>",0)
////////////set options
if("<?php echo e($Transaction[0]->expense_type); ?>"==1){

$('#span_txt').text('مصروفات');

<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==1): ?>
$('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




}else if("<?php echo e($Transaction[0]->expense_type); ?>"==2){
$('#span_txt').text('حساب مورد');



<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

$('#expense').append("<option  value='<?php echo e($supplier->id); ?>'><?php echo e($supplier->name); ?></option>");

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

}else if("<?php echo e($Transaction[0]->expense_type); ?>"==3){
$('#span_txt').text('نثريات');

<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==3): ?>
$('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


}else if("<?php echo e($Transaction[0]->expense_type); ?>"==4){
$('#span_txt').text('خصومات');
<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==4): ?>
$('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

}else if("<?php echo e($Transaction[0]->expense_type); ?>"==5){
$('#span_txt').text('اصول');
<?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==5): ?>
$('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






}
$('#expense').val("<?php echo e($Transaction[0]->expense_id); ?>");
$('#amount').val("<?php echo e($Transaction[0]->credit); ?>");

/////////////

if($('#expense_type').val()==2){
  // $('#supplier').val(<?php echo e($Transaction[0]->supplier_id); ?>)
  $('#expense').val("<?php echo e($Transaction[0]->supplier_id); ?>");
  <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  if(<?php echo e($supplier->id); ?>==$('#supplier').val()){
// $('#balance').val(<?php echo e($supplier->balance); ?>)
$('#to_account').val("<?php echo e($supplier->name); ?>")


}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  $('#balance').val("<?php echo e($Transaction[0]->account_balance); ?>");
  $('#amount').val("<?php echo e($Transaction[0]->credit); ?>");
var old_credit="<?php echo e($Transaction[0]->credit); ?>";
console.log('<?php echo e($Transaction[0]->account_balance); ?>')
  $('#supplier').val("<?php echo e($Transaction[0]->supplier_id); ?>");


  // $("#supplier").select2("val", "<?php echo e($Transaction[0]->supplier_id); ?>"); //set the value
console.log($('#supplier').val(),<?php echo e($Transaction[0]->supplier_id); ?>)
  // $('#supplier').val(<?php echo e($Transaction[0]->account_id); ?>)
}else{
  // $('#supplier_div').hide()

}



<?php else: ?>


<?php endif; ?>
$('#span_txt').text('حساب مورد');
// $('#expense_div2').hide();
$('#expense_type').on('change', function() {
  $('#expense')
    .find('option')
    .remove()
    .end();
    $('#expense').append("<option disabled value selected></option>");
  console.log(this.value);
   if(this.value==1){

    $('#span_txt').text('مصروفات');
   
    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==1): ?>
    $('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




  }else if(this.value==2){
    $('#span_txt').text('حساب مورد');

 

    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    $('#expense').append("<option  value='<?php echo e($supplier->id); ?>'><?php echo e($supplier->name); ?></option>");

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  }else if(this.value==3){
    $('#span_txt').text('نثريات');

    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==3): ?>
    $('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  }else if(this.value==4){
    $('#span_txt').text('خصومات');
    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==4): ?>
    $('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

}else if(this.value==5){
    $('#span_txt').text('اصول');
    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($expense->type==5): ?>
    $('#expense').append("<option  value='<?php echo e($expense->id); ?>'><?php echo e($expense->name); ?></option>")
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





}
});
$('#amount').on('change', function() {
  <?php if(isset($_GET['id'])): ?>
  console.log(old_credit);
  var diff=Number(this.value)-Number(old_credit);
  console.log(diff);

  var remain =Number($('#balance').val())-diff
  console.log(remain);

<?php else: ?>
var remain =Number($('#balance').val())-Number(this.value)

<?php endif; ?>;
  $('#remain').val(remain)
});
$('#expense').on('change', function() {
  // alert(this.value);
  if($('#expense_type').val()==2){
    alert(this.value);
  <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
console.log(<?php echo e($supplier->id); ?>,$('#expense').val())
  if(<?php echo e($supplier->id); ?>==$('#expense').val()){
$('#balance').val(<?php echo e($supplier->balance); ?>)
$('#to_account').val("<?php echo e($supplier->name); ?>")


}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
}
});
function save()
{
  var supplier_id=0
var expense_id=0
  if($('#expense_type').val()==2){
    supplier_id=$('#expense').val()
  }else{
    expense_id=$('#expense').val()

  }

<?php if(isset($_GET['id'])): ?>
console.log($('#transaction_id').val())
  $.ajax({
    url: "<?php echo e(URL::to('updateCashExchange')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "id": $('#transaction_id').val(),
    "amount":$('#amount').val(),
    "supplier":supplier_id,
    "balance":$('#balance').val(),
    "expense_type":$('#expense_type').val(),
    "expense":expense_id,

    "remain":$('#remain').val()

    // "discount":$('#discount').val(),
    // "freight_charge":$('#freight_charge').val(),
    // "total":$('#total').val()

    },
    success: function(response)
    {
console.log(response)
if(response.status=="success"){
  window.location.href = "/ExpenseScreen";

}else{

}



   }



    });

    <?php else: ?>
    $.ajax({
      url: "<?php echo e(URL::to('createCashExchange')); ?>",
      type: "post",
      dataType: 'json',
      data: {"_token":$('#_token').val(),
      "amount":$('#amount').val(),
      "supplier":supplier_id,
      "expense_type":$('#expense_type').val(),
      "expense":expense_id,
      "remain":$('#remain').val()
  
      },
      success: function(response)
      {
  console.log(response)
  if(response.status=="success"){
    window.location.href = "/CashExchange";
  
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