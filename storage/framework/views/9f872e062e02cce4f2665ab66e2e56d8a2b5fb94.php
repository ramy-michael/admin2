<?php $__env->startSection('title', 'Invoices'); ?>

<?php $__env->startSection('content'); ?>
<style>
.row{
  margin-right: -246px;

}
.page-heading {
    border-top: 0;
    margin-right: -248px;
    padding: 4px -25px 17px 23px;
}
</style>
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


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="js/plugins/select2/select2.min.js"></script>


</head>
<div id="page-wrapper" class="gray-bg" >
    <div class="row wrapper border-bottom white-bg page-heading" style="margin-left: 10px;width: 1305px;margin-right: -231px;">
        <div class="col-lg-12">
            <h2 style="float: right;">المرتجع</h2>
            <ol class="breadcrumb" style="margin-top: 60px;">
                <li class="breadcrumb-item">
                    <a href="index.html">الصفحه الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    صفحات اخري
                </li>
                <li class="breadcrumb-item active">
                    <strong>المشتريات</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content p-xl" style="margin-right: -242px;">
              <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
              <div class="alert alert-danger" id="message" style="display:none;direction:rtl"></div>
              <div class="alert  alert-info" id="success" style="display:none;direction:rtl"></div>

                    <div class="row">
                      <div class="mb-3 row">
                          <label class="col-form-label">رقم المرتجع:</label>
                          <div class="col-sm-8">
                              <input type="text" id="return_no" value="<?php echo e($return_no); ?>" class="form-control" disabled>
                          </div>
                      </div>
                        <div class="mb-3 row">
                            <label class="col-form-label">رقم الفاتوره:</label>
                            <div class="col-sm-8">
                                <input type="text" id="invoice_no" value="<?php echo e($invoice_no); ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row mr-1">
                            <label for="date" class="col-form-label"> التاريخ:</label>
                            <div class="col-sm-8">
                                <input type="date" id="return_date" class="form-control" style="width: 143px;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label">المورد:</label>
                            <div class="col-sm-8">
                                <input type="text" id="supplier" value="<?php echo e($supplier_name[0]->name); ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- <div class="mb-3 row mr-3">
                            <label class="col-form-label">المورد :</label>
                            <div class="col-sm-9">

 <select class="js-example-basic-single" "supplier_id" style="width:130px;">
   <option disabled value selected></option>


</select>

                            </div>
                        </div> -->

                        <!-- <div class="mb-3 row mr-4">
                            <label class="col-form-label">المخزن :</label>
                            <div class="col-sm-9">

                                <select class="js-example-basic-single" name="state" style="width:130px;"id="store_id">
                                    <option disabled value selected></option>

                                    <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option  value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="mb-3 row mr-4">
                            <label class="col-form-label">الصنف :</label>
                            <div class="col-sm-9">

                            <!-- <select data-placeholder="Choose a Country..." class="chosen-select"  tabindex="2"> -->
                                <select class="js-example-basic-single" name="state" style="width:130px;" id="item_id">
                                  <option disabled value selected></option>

                                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <option  value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 row mt-3 mr-3">
                              <label class="col-form-label">  الكميه الحاليه :</label>
                              <div class="col-sm-9">
                                  <input type="text" id="now_quantity" class="form-control"disabled>
                              </div>
                          </div>
                        <div class="mb-3 row mt-3 mr-3">
                            <label class="col-form-label">كميه المرتجع السابق :</label>
                            <div class="col-sm-9">
                                <input type="text" id="previous_quantity" class="form-control"disabled>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3 mr-2">
                            <label class="col-form-label">كميه المرتجع :</label>
                            <div class="col-sm-9">
                                <input type="number"  id="refund_quantity" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="mb-3 row mt-3 mr-2">
                            <label class="col-form-label">الاجمالي :</label>
                            <div class="col-sm-9">
                                <input type="text" id="total_items" class="form-control" disabled>
                            </div>
                        </div> -->
                        <div class="mb-3 row mt-3 mr-2">
                            <div class="col-sm-9">
                                <input type="button" onclick="add()" class="btn btn-primary " value="اضف" style="width: 80px;">
                            </div>
                        </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                            <thead>
                                <tr>
                                <th width="10px" >م</th>
                                <th width="50px" >الصنف</th>
                                <th width="50px"> الكميه بالمخزن</th>
                                <th width="50px">المرتجع السابق</th>
                                <th width="50px"> كميه المرتجع</th>

                                <!-- <th width="50px">الاجمالى</th> -->

                                <th width="50px">حذف</th>
                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->



                  <div>
                        <button onclick="save()"class="btn btn-primary">حفظ</button>
                    </div>
                </div>
        </div>
    </div>
</div>




</div>
<!-- Select2 -->
<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<script>

$('#item_id').on('change', function() {
  // var total_discount=0;
  // total_discount+=Number($('#discount').val())+Number($('#freight_charge').val())

$('#previous_quantity').val(<?php echo e($updated_invoice[0]->previous_quantity); ?>);

  <?php $__currentLoopData = $invoices_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoices_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  if($('#item_id').val()=="<?php echo e($invoices_detail->item_id); ?>"){
    // console.log("<?php echo e($invoices_detail->id); ?>");
    $('#now_quantity').val("<?php echo e($invoices_detail->quantity); ?>");


  }
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $invoices_refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoices_refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
if($('#item_id').val()=="<?php echo e($invoices_refund->item_id); ?>"){
  console.log("<?php echo e($invoices_refund->previous_quantity); ?>");
  if("<?php echo e($invoices_refund->previous_quantity); ?>"==''){
    $('#previous_quantity').val(0);

  }else{
    $('#previous_quantity').val("<?php echo e($invoices_refund->refund_quantity); ?>");

  }

}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

});
// $('.chosen-select').chosen({width: "125%"});
var count=$('#gettable tr').length
var total_prices=0;

// $('#discount,#freight_charge').on('change', function() {
//   var total_discount=0;
//   total_discount+=Number($('#discount').val())+Number($('#freight_charge').val())
//
//   $('#total').val(total_prices-total_discount);
//
// });
// $('#item_quantity,#item_price').on('change', function() {
//   var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());
// $('#total_items').val(total_items);
// });
var refund_items=[];
// $('#gettable').Datatable({});
function delete_item(id){
  console.log(id)

  console.log($('#r'.id))

  console.log($('#r'+id))
  // $('#'.id).remove();

}
function add(){
  // $('#store_id')

  var item_name=$( "#item_id option:selected" ).text();

  var item_id=$( "#item_id option:selected" ).val();
  var store_id=$( "#store_id option:selected" ).val();

// alert(item_id);
  var previous_quantity=$('#previous_quantity').val();
  // var item_price=$('#item_price').val();
  // var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());

// alert(item_id);
  var now_quantity=$('#now_quantity').val();
  var refund_quantity=$('#refund_quantity').val();
  if(previous_quantity==''||previous_quantity==null){
    previous_quantity=0;
}
  if(refund_quantity==''||refund_quantity==null){
    $('#message').show().html(' يرجى ادخال كميه المرتجع ');

  }
else if(Number(refund_quantity)>Number(now_quantity)){
  $('#message').show().html('   الكميه المراد ترجيعها اكبر من الكمبه بالمخزن');

}

else {

  $('#gettable tbody').append('<tr id=r'+count+'><td>'+count+'</td><td>'+item_name+'</td><td>'+now_quantity+'</td><td>'+previous_quantity+'</td><td>'+refund_quantity+'</td><td><a href="#" onclick="delete_item('+count+');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td></tr>');
  // var item_id=$( "#item_id option:selected" ).text();
count++;
// $('#store_id').prop('disabled', true);


// $( "#item_id option:selected" ).disabled();
// $("#item_id option:selected").prop("selected", false)

refund_items.push({'item_id':item_id,'refund_quantity':refund_quantity,'now_quantity':now_quantity,'previous_quantity':previous_quantity,'store_id':store_id})
// total_prices+=total_items;
// $('#total2').val(total_prices);
$('#previous_quantity').val(0);
$('#now_quantity').val(0);
$('#refund_quantity').val(0);
$('#item_id').val('');
}
}

function save()
{

var now_quantity=$('#now_quantity').val();
var refund_quantity=$('#refund_quantity').val();
console.log(refund_items)
if(refund_quantity==''||refund_quantity==null){
  $('#message').show().html(' يرجى ادخال كميه المرتجع ');

}
else if(Number(refund_quantity)>Number(now_quantity)){
$('#message').show().html('   الكميه المراد ترجيعها اكبر من الكمبه بالمخزن');

}
else{
  $.ajax({
    url: "<?php echo e(URL::to('createRefund')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "return_no":$('#return_no').val(),
    "invoice_no":$('#invoice_no').val(),
    "return_date":$('#return_date').val(),
    "previous_quantity":$('#previous_quantity').val(),
    "refund_quantity":$('#refund_quantity').val(),
"refund_items":refund_items


    },
    success: function(response)
    {
console.log(response)
if(response.status=="success"){
  window.location.href = "/minor";

}else{

}



   }



    });
}
}

</script>
<script>
    $('.js-example-basic-single').select2();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>