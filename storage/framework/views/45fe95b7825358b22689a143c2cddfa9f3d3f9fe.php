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
    <link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="js/plugins/select2/select2.min.js"></script>


</head>
<div id="page-wrap" class="gray-bg" style="margin-right: 0px;">
    <div class="wrapper wrapper-content animated fadeInRight pt-2">
        <div class="row wrapper border-bottom white-bg page-heading w-100 m-auto" >
            <div class="col-lg-12">
                <h2 style="float: right;">التصنيع</h2>

                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>التصنيع</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="ibox-content p-xl" style="">
                <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="alert alert-danger text-right" id="message" style="display:none;"></div>
                    <div class="alert  alert-info text-right" id="success" style="display:none;"></div>

                        <div class="row">
                            <div class="row" style="width: 100%;">
                                <div class="col-lg-3">
                                    <label class="col-form-label">رقم التصنيع:</label>
                                    <div class="col-sm-9">
                                  <?php if(isset($_GET['id'])): ?>
                                  <input type="text" id="num"class="form-control" value="<?php echo e($updated_manufacture[0]->num); ?>"style="width: 100%;"disabled>

                                  <?php else: ?>
                                  <input type="text" id="num"class="form-control" value="<?php echo e($manufacture_no); ?>"style="width: 100%;" disabled>

                                  <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3" style="text-align: initial;">
                                    <label class="col-form-label"> التاريخ:</label>
                                    <div class="col-sm-9">


                                        <input type="text" id="date" class="form-control" style="width: 143px;" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label">رقم التكرار:</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="repeat_num"class="form-control" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label">اسم المنتج :</label>
                                    <div class="col-sm-9">
                                        <input type="text"id="product_name" class="form-control" style="width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 mb-4" style="width: 100%;">
                                <div class="col-lg-3">
                                    <label class="col-form-label">الصنف :</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single" style="width:130px;"id="item_id">
                                          <option disabled value selected></option>

                                          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                          <option  value="<?php echo e($item->id); ?>"><?php echo e($item->name2); ?></option>

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label">النسبه/الطن :</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="ratio_per_ton" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label">السعر للطن :</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="price" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="col-sm-9">
                                      <!-- <input type="hidden" name="total_ton" id="total_ton" > -->

                                        <!-- <input type="button" class="btn btn-primary " value="اضف" style="width: 80px;"> -->
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
                                    <th width="50px">النسبه</th>
                                    <th width="50px">السعر</th>

                                    <th width="50px">حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>item 1</td>
                                        <td>20</td>
                                        <td>34</td>
                                        <td><a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12"></div>
                            <div class="col-lg-6">
                                <label class="col-form-label"> تكلفه الطن الواحد :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="total2" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label"> الاجمالى :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="total" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12"></div>

                            <div class="col-lg-6">
                                <label class="col-form-label"> اجمالي التصنيع :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="total_ton" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
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
var total_ton=0
$('#repeat_num').on('change', function() {

  $('#total').val(Number($('#repeat_num').val()*$('#total2').val()));
});
<?php if(isset($_GET['id'])): ?>
$("#product_name").val("<?php echo e($updated_manufacture[0]->product_name); ?>")
$("#total").val(<?php echo e($updated_manufacture[0]->total_price); ?>)
$("#total2").val(<?php echo e($updated_manufacture[0]->total_per_ton); ?>)
$("#repeat_num").val(<?php echo e($updated_manufacture[0]->repeat_num); ?>)
$("#total_ton").val(700)
x=0
$("#date").datepicker().datepicker("setDate", new Date());

 <?php $__currentLoopData = $manufacture_edit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
x++
$('#gettable tbody').append('<tr id='+'<?php echo e($manufacture->item_id); ?>><td>'+x+'</td><td>'+"<?php echo e($manufacture->name); ?>"+'</td><td>'+"<?php echo e($manufacture->ratio); ?>"+'</td><td>'+<?php echo e($manufacture->price); ?>+'</td><td><button onclick="newtest(this)"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></button></td></tr>');
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
$("#date").datepicker().datepicker("setDate", new Date());

<?php endif; ?>

$('#item_id').on('change', function() {
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  if($('#item_id').val()=="<?php echo e($item->id); ?>"){
    console.log("<?php echo e($item->item_price); ?>","<?php echo e($item->name2); ?>");
    $('#price').val("<?php echo e($item->item_price); ?>");

  }
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
});
var count=$('#gettable tr').length
var total_prices=0;
var total_prices2=0
var total_ton2=0;
// $('#item_quantity,#item_price').on('change', function() {
//   var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());
// $('#total_items').val(total_items);
// });
var manu_items=[];
// $('#gettable').Datatable({});
function delete_item(id,price,ratio){

console.log(Number($('#total2').val()),Number(price))
  $('#r'+id).remove();
   total_ton2-=price;
var f= Number($('#total2').val())-Number((ratio*price)/1000);
  $('#total2').val( f);

  console.log($('#r'+id))
  // $('#'.id).remove();

}
function add(){
  // $('#store_id')

  var item_name=$( "#item_id option:selected" ).text();

  var item_id=$( "#item_id option:selected" ).val();

// alert(item_id);
  var ratio_per_ton=$('#ratio_per_ton').val();
  var price=$('#price').val();
  var total_ton=$('#total_ton').val();
  // var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());
  // if(store_id==''||store_id==null){
  //   $('#message').show().html('   يرجى اختيار المخزن');
  //
  // }

 if(item_id==''||item_id==null){
  $('#message').show().html(' يرجى اختيار الصنف');

}
else if(price==''||price==null||price==0||!Number(price)){
  $('#message').show().html('  يرجى ادخال السعر اكبر من 0');

}
else if(ratio_per_ton==''||ratio_per_ton==null||ratio_per_ton==0||!Number(ratio_per_ton)){
  $('#message').show().html('  يرجى ادخال النسبه اكبر من 0 ');

}
else if(ratio_per_ton>1000){
  $('#message').show().html('  يجب الا تزيد النسبه عن1000 كيلو ');

}
else if(total_ton>=1000){
  $('#message').show().html('  يجب الا تزيد النسبه عن1000 كيلو ');

}
else {

  $('#gettable tbody').append('<tr id=r'+count+'><td>'+count+'</td><td>'+item_name+'</td><td>'+ratio_per_ton+'</td><td>'+price+'</td><td><a href="#" onclick="delete_item('+count+','+price+','+ratio_per_ton+');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td></tr>');
  // var item_id=$( "#item_id option:selected" ).text();
count++;
// $('#store_id').prop('disabled', true);


// $( "#item_id option:selected" ).disabled();
// $("#item_id option:selected").prop("selected", false)

manu_items.push({'item_id':item_id,'ratio_per_ton':ratio_per_ton,'price':price})
total_prices+=Number((ratio_per_ton*price)/1000);
$('#total2').val(total_prices);
console.log($('#repeat_num').val(),Number($('#total2').val()))

total_prices2=Number($('#repeat_num').val()*Number($('#total2').val()));
total_ton+=Number(ratio_per_ton);

$('#total_ton').val(total_ton);

$('#total').val(total_prices2);

$('#ratio_per_ton').val(0);
$('#price').val(0);
// $('#total_items').val(0);
document.getElementById('item_id').selectedIndex = -1;

$('#item_id').val('');
}

}

function save()
{
console.log(manu_items)
console.log(Number($('#supplier_balance').val()))
console.log(Number($('#total2').val()))
console.log((Number($('#supplier_balance').val())<Number($('#total2').val())))
if($('#repeat_num').val()==''){
  $('#message').show().html('يرجى ادخال رقم التكرار ');

}

else if($('#product_name').val()==''){

  $('#message').show().html(' يرجى ادخال اسم المنتج ');

}
else if(Number($('#total').val())<Number($('#freight_charge').val())){
  $('#message').show().html(' يرجى ادخال نولون اقل من المجموع ');

}
else if(Number($('#total_ton').val())<1000){
  $('#message').show().html('اجمالي كميه التصنيع اقل من 1000 كيلو ');

}

else{
  $.ajax({
    url: "<?php echo e(URL::to('createManufacture')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "manu_items":manu_items,
    "repeat_num":$('#repeat_num').val(),
    "date":$('#date').val(),
    "product_name":$('#product_name').val(),
    "total":$('#total').val(),
    "manufacture_no":$('#num').val(),
    "total2":$('#total2').val()


    },
    success: function(response)
    {
console.log(response)
if(response.status=="success"){
  window.location.href = "/Invoices";

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