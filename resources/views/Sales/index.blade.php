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
@media print{
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}
</style>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Sales</title>

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
                <h2 style="float: right;">المبيعات</h2>
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
  @if(isset($_GET['id']))
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">رقم الفاتوره:</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="text" id="sale_no" value="{{$Sale_edit[0]->num }}" class="form-control" style="width: 65%;float: right" disabled>
                                        <!-- <input type="text" id="sale_no" value="{{$Sale_no }}" class="form-control" disabled> -->
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label for="date" class="col-form-label" style="float: right;width: 30%;margin-left: 10px;"> التاريخ:</label>
                                    {{-- <div class="col-sm-8"> --}}
                                    <input type="text" id="sale_date" class="form-control" style="width: 65%;float: right" disabled>

                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">العميل :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <select class="js-example-basic-single" name="client" style="width: 65%;float: right" id="client_id">
                                            <option disabled value selected value=''></option>

                                            @foreach ($clients as $key => $client)

                                            <option  value="{{$client->id}}">{{$client->name}}</option>

                                            @endforeach
                                        </select>
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">المنتج/رقم التصنيع :</label>
                                    {{-- <div class="col-sm-7"> --}}
                                        <select class="js-example-basic-single" name="manufacturingNumber" style="width: 65%;float: right" id="product_id">
                                        <option disabled value selected value=''></option>

                                        @foreach ($products as $key => $product)

                                        <option  value="{{$product->id}}">{{$product->product_name}}_{{$product->num}}</option>

                                    @endforeach
                                        </select>
                                    {{-- </div> --}}
                                </div>

                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">اجمالي التكلفه :</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="text" id="product_cost" class="form-control" style="width: 65%;float: right">
                                        <!-- <input type="hidden" id="product_repeat" class="form-control"> -->
                                        <input type="hidden" id="sale_id" class="form-control">

                                    {{-- </div> --}}
                                </div>
                            <!-- <div class="row"> -->
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">سعر البيع :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="product_price" class="form-control" style="width: 65%;float: right">
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">نوع الشكاره :</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <select class="js-example-basic-single" id="package_type" style="width: 65%;float: right">
                                            <option disabled value selected value=''></option>
                                            @foreach ($packages as $key => $package)

                                            <option  value="{{$package->id}}">{{$package->name}}</option>

                                        @endforeach
                                        </select>
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">وزن الشكاره :</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="text" id="package_weight" class="form-control" style="width: 65%;float: right">
                                        <input type="hidden" id="package_num" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">عدد الشكاير :</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="text" id="package_count" class="form-control" style="width: 65%;float: right">
                                    {{-- </div> --}}
                                </div>
                                <div class="mb-5 col-lg-12 mt-3" style="float: left;">
                                    <div class="col-sm-9">
                                        <input type="button" onclick="add()" class="btn btn-primary " value="اضف" style="width: 80px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                          @else
                          <div class="row">

                              <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                  <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">رقم الفاتوره:</label>
                                  {{-- <div class="col-sm-8"> --}}
                                      <input type="text" id="sale_no" value="{{$Sale_no }}" class="form-control" style="width: 65%;float: right" disabled>
                                  {{-- </div> --}}
                              </div>
                              <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                  <label for="date" class="col-form-label" style="float: right;width: 30%;margin-left: 10px;"> التاريخ:</label>
                                  {{-- <div class="col-sm-8"> --}}
                                    <input type="text" id="sale_date" class="form-control" style="width: 65%;float: right" disabled>

                                      <!-- <input type="date" id="sale_date" class="form-control" style="width: 100%;"> -->
                                  {{-- </div> --}}
                              </div>
                              <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                  <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">العميل :</label>
                                  {{-- <div class="col-sm-9"> --}}
                                      <select class="js-example-basic-single" name="client" style="width: 65%;float: right" id="client_id">
                                          <option disabled value selected value=''></option>

                                          @foreach ($clients as $key => $client)

                                          <option  value="{{$client->id}}">{{$client->name}}</option>

                                          @endforeach
                                      </select>
                                  {{-- </div> --}}
                              </div>
                              <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                  <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">المنتج/رقم التصنيع :</label>
                                  {{-- <div class="col-sm-7"> --}}
                                      <select class="js-example-basic-single" name="manufacturingNumber" style="width: 65%;float: right" id="product_id">
                                        <option disabled value selected value=''></option>

                                        @foreach ($products as $key => $product)

                                        <option  value="{{$product->id}}">{{$product->product_name}}_{{$product->num}}</option>

                                    @endforeach
                                      </select>
                                  {{-- </div> --}}
                              </div>

                              <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                  <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">اجمالي التكلفه :</label>
                                  {{-- <div class="col-sm-8"> --}}
                                      <input type="text" id="product_cost" style="width: 65%;float: right" class="form-control">
                                      <!-- <input type="hidden" id="product_repeat" class="form-control"> -->

                                  {{-- </div> --}}
                              </div>
                              <!-- <div class="row"> -->
                                  <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                      <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">سعر البيع (الطن)</label>
                                      {{-- <div class="col-sm-9"> --}}
                                          <input type="text" id="product_price" style="width: 65%;float: right" class="form-control">
                                      {{-- </div> --}}
                                  </div>

                                  <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                      <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;"> الكميه بالمخزن :</label>
                                      {{-- <div class="col-sm-9"> --}}
                                          <input type="text" id="product_repeat" style="width: 65%;float: right" class="form-control">
                                      {{-- </div> --}}
                                  </div>
                                  <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                      <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">نوع الشكاره :</label>
                                      {{-- <div class="col-sm-8"> --}}
                                          <select class="js-example-basic-single" style="width: 65%;float: right" id="package_type" style="width:100%;">
                                              <option disabled value selected value=''></option>
                                              @foreach ($packages as $key => $package)

                                              <option  value="{{$package->id}}">{{$package->name}}</option>

                                          @endforeach
                                          </select>
                                      {{-- </div> --}}
                                  </div>
                                  <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                      <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">وزن الشكاره :</label>
                                      {{-- <div class="col-sm-8"> --}}
                                          <input type="text" id="package_weight" style="width: 65%;float: right" class="form-control">
                                          <input type="hidden" id="package_num" class="form-control">
                                      {{-- </div> --}}
                                  </div>
                                  <div class="mb-3 col-lg-4 p-0 col-md-6" style="float: right">
                                      <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">عدد الشكاير :</label>
                                      {{-- <div class="col-sm-8"> --}}
                                          <input type="text" id="package_count" style="width: 65%;float: right" class="form-control">
                                      {{-- </div> --}}
                                  </div>
                                  <div class="mb-5 col-lg-12 mt-3" style="float: left;">
                                      <div class="col-sm-9">
                                          <input type="button" onclick="add()" class="btn btn-primary " value="اضف" style="width: 80px;">
                                      </div>
                                  </div>
                              <!-- </div> -->
                          </div>
  @endif
                        <div class="table-responsive" id="printtable">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10px" >م</th>
                                        <th width="50px" >المنتج/رقم التصنيع</th>
                                        <th width="50px"> الكميه (الطن)</th>
                                        <th width="50px"> سعر البيع</th>
                                        <th width="50px">نوع الشكاره</th>
                                        <th width="50px">وزن الشكاره</th>
                                        <th width="50px">عدد الشكاير</th>

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
                        <div class="row mt-3">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 mb-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">رصيد العميل :</label>
                                    {{-- <div class="col-lg-9"> --}}
                                        <input type="text" id="client_balance" style="width: 65%;float: right" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-12 mb-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;"> الاجمالى :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="total" style="width: 65%;float: right" class="form-control" disabled>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
    

                        <div>
                            <button onclick="save()"class="btn btn-primary">حفظ</button>
                            <!-- <div class="btn btn-primary" onClick="print_screen()"><span class="glyphicon glyphicon-print"></span> Print This Page</div><br><br> -->
                            <div id="userInfo" style="display: none;"> </div>

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

function print_screen()
{
  // var newWindow=window.open('/print');
// newWindow.focus();
$('#userInfo').load(location.pathname+'/getData2.php',function(){
    var printContent = document.getElementById('userInfo');
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
});
// newWindow.close();
    //your print div data
    //alert(document.getElementById("printpage").innerHTML);
    // var newstr=document.getElementById("printtable").innerHTML;
    //
    // var header='<header><div align="center"><h3 style="color:#EB5005"> Your HEader </h3></div><br></header><hr><br>'
    //
    // var footer ="Your Footer";
    //
    // //You can set height width over here
    // var popupWin = window.open('', '_blank', 'width=1100,height=600');
    // popupWin.document.open();
    // popupWin.document.write('<html> <body onload="window.print()">'+ newstr + '</html>' + footer);
    // popupWin.document.close();
    // return false;
}
@if(isset($_GET['id']))
// alert('hdhd')
$("#client_id").val({{$Sale_edit[0]->customer_id}})
document.getElementById("client_id").disabled = true;
$("#client_balance").val({{$Sale_edit[0]->customer_id}})
$("#total").val({{$Sale_edit[0]->total}})

$("#sale_id").val({{$Sale_edit[0]->id}})
// $("#total").val({{$Sale_edit[0]->total}})
$("#client_balance").val({{$Sale_edit[0]->balance-$Sale_edit[0]->total}})
x=0
 @foreach($Sales_edit as $sale_edit)
x++
$('#gettable tbody').append('<tr id='+'{{$sale_edit->product_id}}><td style="display:none;">'+'{{$sale_edit->p_type_id}}'+'</td><td>'+x+'</td><td>'+"{{$sale_edit->product_name}}_{{$sale_edit->num}}"+'</td><td>'+"{{$sale_edit->product_qty}}"+'</td><td>'+{{$sale_edit->sale_price}}+'</td><td>'+"{{$sale_edit->name}}"+'</td><td>'+'{{$sale_edit->p_weight}}'+'</td><td>'+'{{$sale_edit->p_count}}'+'</td><td><button onclick="newtest(this)"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></button></td></tr>');
 @endforeach
 $("#sale_date").datepicker().datepicker("setDate", new Date());

@else
$("#sale_date").datepicker().datepicker("setDate", new Date());

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
  var product_price=$('#product_price').val();
  var product_cost=$('#product_cost').val();
  var package_type=$( "#package_type option:selected" ).val();
  var package_type2=$( "#package_type option:selected" ).text();

  var package_weight=$('#package_weight').val();
  var package_count=$('#package_count').val();
// alert(item_id);


  var total_packages=Number($('#package_weight').val())*Number($('#package_count').val()/1000);
  product_price=product_price*total_packages
  // var total_packages=Number($('#package_weight').val())*Number($('#package_count').val());

    if(Number(package_count)> Number($('#package_num').val())){
  $('#message').show().html('عدد الشكاير اكبر من العدد الفعلى للشكاير فى مخزن الشكاير ');
    }
    else if(package_count==''||package_count==null||package_count==0||!Number(package_count)){
      $('#message').show().html('  يرجى ادخال عدد الشكاير');

    }
    else if(product_price==''||product_price==null||product_price==0||!Number(product_price)){
      $('#message').show().html('يرجى ادخال سعر البيع اكبر 0 ');

    }
else  if(product_id==''||product_id==null){
    $('#message').show().html('يرجى اختيار المنتج');

  }
// else if(Number(product_cost)>Number(product_price) ){
//   $('#message').show().html('تكلفه المنتج اقل من سعر البيع ');
// }
// to compare repeat_num in ton and total_packages in ton
else if(Number(total_packages)>Number($('#product_repeat').val()*1000) ){
  $('#message').show().html(' الكميه المراد بييعها اكبر من كميه المنتج بالمخزن');
}


else {
$('#product_repeat').val(Number($('#product_repeat').val()-total_packages/1000))
  $('#gettable tbody').append('<tr id='+product_id+'><td style="display:none;">'+package_type+'</td><td>'+count+'</td><td>'+product_name+'</td><td>'+total_packages+'</td><td>'+product_price+'</td><td>'+package_type2+'</td><td>'+package_weight+'</td><td>'+package_count+'</td><td><button onclick="newtest(this)"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></button></td></tr>');
  // var item_id=$( "#item_id option:selected" ).text();
count++;
// $('#store_id').prop('disabled', true);


// $( "#item_id option:selected" ).disabled();
// $("#item_id option:selected").prop("selected", false)
var client_id=$('#client_id').val();
total_prices+=Number(product_price);
$('#total').val(Number(total_prices));
// $('#product_cost').val(0);
// $('#product_price').val(0);
$('#package_weight').val(0);
$('#package_count').val(0);

$( "#package_type option:selected" ).val('')
// $( "#product_id option:selected" ).val('')

}

}

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

  @foreach ($products as $key => $product)
  if({{$product->id}}==$('#product_id').val()){

$('#product_cost').val({{$product->total_price}})
$('#product_repeat').val({{$product->repeat_num}})


}
@endforeach

});
    $('.js-example-basic-single').select2();
    function save()
    {
      var sale_items=[];
      var client_id=$('#client_id').val()

    var table = document.getElementById("gettable");
for (var i = 1;  i < table.rows.length; i++) {

  var package_type =table.rows[i].cells[0].textContent

  var product_name =table.rows[i].cells[2].textContent
  var product_qty =table.rows[i].cells[3].textContent
  var product_sale_price =table.rows[i].cells[4].textContent
  // var package_type =table.rows[i].cells[5].textContent
  var package_weight =table.rows[i].cells[6].textContent
  var package_num2 =table.rows[i].cells[7].textContent
var product_id2=table.rows[i].id
  // console.log(table.rows[i].id,product_qty,product_sale_price)
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   // for (var j = 0, col; col = row.cells[j]; j++) {
   //   //iterate through columns
   //   //columns would be accessed using the "col" variable assigned in the for loop
   // }
   sale_items.push({'product_id':product_id2,'product_qty':product_qty,'product_sale_price':product_sale_price,'package_type':package_type,'package_num2':package_num2,'package_weight':package_weight,'client_id':client_id})

}

// console.log(sale_items)
    // else{
    @if(isset($_GET['id']))

      $.ajax({
        url: "{{ URL::to('updatesale') }}",
        type: "post",
        dataType: 'json',
        data: {"_token":$('#_token').val(),
        "id": $('#sale_id').val(),
        "sale_items":sale_items,
        "sale_no":$('#sale_no').val(),
        "sale_date":$('#sale_date').val(),
        // "store_id":$('#store_id').val(),
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

        @else
        $.ajax({
          url: "{{ URL::to('createSale') }}",
          type: "post",
          dataType: 'json',
          data: {"_token":$('#_token').val(),
          "sale_items":sale_items,
          "sale_no":$('#sale_no').val(),
          "sale_date":$('#sale_date').val(),
          // "store_id":$('#store_id').val(),
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
        @endif
    // }
    }
</script>
@endsection
