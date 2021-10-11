@extends('layouts.app')

@section('title', 'Sales')

@section('content')
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
                <h2 style="float: right;">استرجاع الفاتوره</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-product">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-product">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-product active">
                        <strong>المبيعات</strong>
                    </li>

                    <li class="breadcrumb-product active">
                        <strong>استرجاع الفاتوره</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="ibox-content p-xl" style="">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="alert alert-danger text-right" id="message" style="display:none;"></div>
                <div class="alert  alert-info text-right" id="success" style="display:none;"></div>
                <!-- {{$Sale_edit}} -->
                        <div class="row">


                            <div class="mb-3 col-lg-4 ">
                                <label for="date" class="col-form-label"> التاريخ:</label>
                                <div class="col-sm-8">
                                  <input type="text" id="sale_date" name="sale_date" class="form-control" style="width:231px;" disabled>

                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">رقم الفاتوره:</label>
                                <div class="col-sm-8">

                                    <input type="text" id="sale_no" value="{{$Sale_no }}" class="form-control" disabled>

                                    <!-- <input type="text" id="sale_no" value="{{$Sale_no }}" class="form-control" disabled> -->


                                </div>
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label"> رقم المرتجع:</label>
                                <div class="col-sm-8">

                                    <input type="text" id="return_no" value="{{$return_no}}" class="form-control" disabled>

                                    <!-- <input type="text" id="sale_no" value="{{$Sale_no }}" class="form-control" disabled> -->


                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">العميل :</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single" name="client" style="width: 100%;" id="client_id" >
                                        <option disabled value selected value=''></option>

                                        @foreach ($clients as $key => $client)

                                        <option  value="{{$client->id}}">{{$client->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">المنتج/رقم التصنيع :</label>
                                <div class="col-sm-7">
                                    <select class="js-example-basic-single" name="manufacturingNumber" style="width: 100%;"id="product_id">
                                      <option disabled value selected value=''></option>

                                       @foreach($Sales_edit as $sale_edit)

                                      <option  value="{{$sale_edit->product_id}}" name="{{$sale_edit->sale_detail_id}}">{{$sale_edit->product_name}}_{{$sale_edit->num}}</option>

                                  @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label"> كميه المباعه :</label>
                                <div class="col-sm-8">
                                    <input type="text" id="saled_qty" class="form-control">
                                    <input type="hidden" id="product_repeat" class="form-control">
                                    <input type="hidden" id="sale_id" class="form-control">

                                </div>
                            </div>
                            <!-- <div class="row"> -->
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">كميه المرتجع السابق :</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="previous_return_qty" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">كميه المرتجع  :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="return_qty" class="form-control">
                                        <input type="hidden" id="package_num" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">سعر البيع :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="sale_price" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">نوع الشكاره :</label>
                                    <div class="col-sm-8">
                                      <input type="text" id="package_type" class="form-control" disabled>

                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">وزن الشكاره :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="package_weight" class="form-control" disabled>
                                        <input type="hidden" id="package_num" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">عدد الشكاير :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="package_count" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="mb-5 col-lg-12 mt-3" style="float: left;">
                                    <div class="col-sm-9">
                                        <input type="button" onclick="add()" class="btn btn-primary " value="اضف" style="width: 80px;">
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10px" >م</th>
                                        <th width="50px" >المنتج/رقم التصنيع</th>
                                        <th width="50px">كميه المرتجع</th>
                                        <th width="50px">تكلفه المرتجع </th>
                                        <th width="50px">عدد مرتجع الشكاير </th>

                                        <th width="50px"> كميه المرتجع السابق</th>
                                        <th width="50px"> الكميه المباعه</th>
                                        <th width="40px">حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>product 1</td>
                                        <td>20</td>
                                        <td>34</td>
                                        <td>34</td>
                                        <td><a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

    <div class="row mb-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <label class="col-form-label">رصيد العميل :</label>
            <div class="col-lg-9">
                <input type="text" id="client_balance" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <label class="col-form-label"> اجمال المرتجع :</label>
            <div class="col-sm-9">
                <input type="text" id="total" class="form-control" disabled>
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
$("#sale_date").datepicker().datepicker("setDate", new Date());

@if(isset($_GET['id']))
// alert('hdhd')
$("#client_id").val({{$Sale_edit[0]->customer_id}})
document.getElementById("client_id").disabled = true;
$("#client_balance").val({{$Sale_edit[0]->customer_id}})
// $("#total").val({{$Sale_edit[0]->total}})

$("#sale_id").val({{$Sale_edit[0]->id}})
// $("#total").val({{$Sale_edit[0]->total}})
$("#client_balance").val({{$Sale_edit[0]->balance}})
x=0

@else
$("#sale_date").datepicker().datepicker("setDate", new Date());
// $("#sale_date").val(new Date());
console.log(new Date());
@endif
function newtest(e) {
  // alert('gggg')
  $(e).parents('tr').remove();
  console.log($(e).parents('tr').find('td').eq(4).text())
// or)
var del=Number($(e).parents('tr').find('td').eq(4).text())

  $('#total').val(Number($('#total').val())-del);
}
// $(document).ready(function() {

// });
var count=1;
var total_prices=0;
function add(){
  // $('#store_id')
$('#message').hide()
  var product_name=$( "#product_id option:selected" ).text();

  var product_id=$( "#product_id option:selected" ).val();
  var sale_detail_id=$( "#product_id option:selected" ).attr("name");
console.log(sale_detail_id)
  var saled_qty=$('#saled_qty').val();
  var previous_return_qty=$('#previous_return_qty').val();
  // var return_qty=$( "#package_type option:selected" ).val();
  // var package_type2=$( "#package_type option:selected" ).text();

  var return_qty=$('#return_qty').val();
  var sale_price=$('#sale_price').val();
  var returned_amount=Number($('#sale_price').val()*return_qty/saled_qty)
var package_count = Number($('#package_count').val());
var package_type =$('#package_type').attr("name")
// alert(item_id);


  // var total_packages=Number($('#package_weight').val())*Number($('#package_count').val())/1000;

//     if(Number(package_count)> Number($('#package_num').val())){
//   $('#message').show().html('عدد الشكاير اكبر من العدد الفعلى للشكاير فى مخزن الشكاير ');
//     }
//     else if(package_count==''||package_count==null||package_count==0||!Number(package_count)){
//       $('#message').show().html('  يرجى ادخال عدد الشكاير');
//
//     }
//     else if(product_price==''||product_price==null||product_price==0||!Number(product_price)){
//       $('#message').show().html('يرجى ادخال سعر البيع اكبر 0 ');
//
//     }
// else  if(product_id==''||product_id==null){
//     $('#message').show().html('يرجى اختيار المنتج');
//
//   }
// else if(Number(product_cost)>Number(product_price) ){
//   $('#message').show().html('تكلفه المنتج اقل من سعر البيع ');
// }
// else if(total_packages>$('#product_repeat').val() ){
//   $('#message').show().html(' عدد الاطنان المراد بيعها اكبر من الموجود بالمخزن');
// }


// else {
  $('#gettable tbody').append('<tr id='+product_id+'><td style="display:none;">'+package_type+'</td><td>'+count+'</td><td>'+product_name+'</td><td>'+return_qty+'</td><td>'+returned_amount+'</td><td>'+package_count+'</td><td>'+previous_return_qty+'</td><td>'+saled_qty+'</td><td style="display:none;">'+sale_detail_id+'</td><td><button onclick="newtest(this)"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></button></td></tr>');
  // var item_id=$( "#item_id option:selected" ).text();
count++;
// $('#store_id').prop('disabled', true);


// $( "#item_id option:selected" ).disabled();
// $("#item_id option:selected").prop("selected", false)
var client_id=$('#client_id').val();
total_prices+=Number(returned_amount);
$('#total').val(Number(total_prices));
$('#product_cost').val(0);
$('#product_price').val(0);
$('#package_weight').val(0);
$('#package_count').val(0);

// $( "#package_type option:selected" ).val('')
// $( "#product_id option:selected" ).val('')

// }

}
$('#return_qty').on('keyup', function() {
  // alert('jdj');
  var cal_return_package=Number($('#return_qty').val())/Number($('#package_weight').val())
  console.log(cal_return_package);
$('#package_count').val(cal_return_package) ;
});
$('#client_id').on('change', function() {

  @foreach ($clients as $key =>$client)

  if({{$client->id}}==$('#client_id').val()){
$('#client_balance').val({{$client->balance}})


}
@endforeach

});
$('#package_type').on('change', function() {

  @foreach ($packages as $key =>$item)

  if({{$item->id}}==$('#package_type').val()){
console.log({{$item->weight}});
$('#package_weight').val({{$item->weight}})
$('#package_num').val({{$item->quantity}})


}
@endforeach

});
$('#product_id').on('change', function() {
console.log($( "#product_id option:selected" ).attr("name"))
  @foreach($Sales_edit as $sale_edit)

  //if({{$sale_edit->product_id}}==$('#product_id').val()){
  if({{$sale_edit->sale_detail_id}}==$( "#product_id option:selected" ).attr("name")){

$('#sale_price').val({{$sale_edit->sale_price}})
$('#saled_qty').val({{$sale_edit->product_qty}})
console.log('{{$sale_edit->p_type_id}}')
$("#package_type").val("{{$sale_edit->name}}")
$("#package_type").attr("name",'{{$sale_edit->p_type_id}}')
$('#package_weight').val({{$sale_edit->p_weight}})
$('#package_count').val({{$sale_edit->p_count}})
}
@endforeach
@foreach($previous_returns as $previous_return)

if({{$previous_return->product_id}}==$('#product_id').val()){
  $("#previous_return_qty").val("{{$previous_return->reverse_qty }}")

}
@endforeach

});
    $('.js-example-basic-single').select2();
    function save()
    {
      var return_items=[];
      var client_id=$('#client_id').val()

    var table = document.getElementById("gettable");
for (var i = 1;  i < table.rows.length; i++) {
console.log(table.rows[i].cells[6])
console.log(table.rows[i].cells[8])
  var package_type =table.rows[i].cells[0].textContent

  var product_name =table.rows[i].cells[2].textContent
  var return_qty =table.rows[i].cells[3].textContent
  var return_qty_price =table.rows[i].cells[4].textContent
  var package_count =table.rows[i].cells[5].textContent
  var  sale_detail_id=table.rows[i].cells[8].textContent
var  sold_qty=table.rows[i].cells[7].textContent
var previous_quantity=table.rows[i].cells[6].textContent
if(previous_quantity==''||previous_quantity==null){
  previous_quantity=0;
}
var product_id2=table.rows[i].id
  // console.log(table.rows[i].id,product_qty,product_sale_price)
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   // for (var j = 0, col; col = row.cells[j]; j++) {
   //   //iterate through columns
   //   //columns would be accessed using the "col" variable assigned in the for loop
   // }
   return_items.push({'previous_quantity':previous_quantity,'package_type':package_type,'sale_detail_id':sale_detail_id,'product_id':product_id2,'sold_qty':sold_qty,'package_count':package_count,'return_qty_price':return_qty_price,'return_qty':return_qty,'client_id':client_id})

}

console.log(return_items)
    // else{


      $.ajax({
        url: "{{ URL::to('createReturn') }}",
        type: "post",
        dataType: 'json',
        data: {"_token":$('#_token').val(),
        "sale_id": $('#sale_id').val(),
        "return_items":return_items,
        "return_no":$('#return_no').val(),
        "sale_date":$('#sale_date').val(),
        "sale_no":$('#sale_no').val(),
        "client_id":$('#client_id').val(),
        "client_balance":$('#client_balance').val(),

        // "discount":$('#discount').val(),
        // "freight_charge":$('#freight_charge').val(),
        "total":$('#total').val()

        },
        success: function(response)
        {
    console.log(response)
    if(response.status=="success"){
      window.location.href = "/Sales";

    }else{

    }



       }



        });


    // }
    }
</script>
@endsection
