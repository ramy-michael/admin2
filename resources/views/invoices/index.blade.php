@extends('layouts.app')

@section('title', 'Invoices')

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
                <h2 style="float: right;">المشتريات</h2>
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
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="ibox-content p-xl" style="">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="alert alert-danger text-right" id="message" style="display:none;"></div>
                <div class="alert  alert-info text-right" id="success" style="display:none;"></div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="width: 100%;">

                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">رقم الفاتوره:</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="text" id="invoice_no" value="{{$invoice_no}}" class="form-control" style="width: 70%;float: right" disabled>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label for="date" class="col-form-label" style="float: right;width: 25%;margin-left: 10px;"> التاريخ:</label>
                                    {{-- <div class="col-sm-8"> --}}
                                        <input type="date" onload="getDate()" id="invoice_date" class="form-control" style="width: 70%;float: right">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">المورد :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <!-- <select class=" form-control" style="width:150px;heigth:10px"name= "type" id="supplier_id2" >
                                        @foreach ($suppliers as $key => $supplier)

                                        <option  value="{{$supplier->id}}">{{$supplier->name}}</option>

                                        @endforeach

                                        </select> -->
                                        <select class="js-example-basic-single" id="supplier_id" style="width: 70%;float: right">
                                        <option disabled value selected></option>

                                        @foreach ($suppliers as $key => $supplier)

                                        <option  value="{{$supplier->id}}">{{$supplier->name}}</option>

                                        @endforeach
                                        </select>

                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">المخزن :</label>
                                    {{-- <div class="col-sm-9"> --}}

                                        <select class="js-example-basic-single" name="state" style="width: 70%;float: right" id="store_id">
                                            <option disabled value selected></option>

                                            @foreach ($stores as $key => $store)

                                            <option  value="{{$store->id}}">{{$store->name}}</option>

                                            @endforeach
                                        </select>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-12"></div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">الصنف :</label>
                                    {{-- <div class="col-sm-9"> --}}

                                    <!-- <select data-placeholder="Choose a Country..." class="chosen-select"  tabindex="2"> -->
                                        <select class="js-example-basic-single" name="state" style="width: 70%;float: right" id="item_id">
                                        <option disabled value selected></option>

                                        @foreach ($items as $key => $item)

                                        <option  value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach
                                    </select>
                                    {{-- </div> --}}
                                </div>
                                
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">السعر :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="item_price" class="form-control" style="width: 70%;float: right">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">الكميه :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="number"  id="item_quantity" class="form-control" style="width: 70%;float: right">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 col-md-6 mt-3 p-0" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">الاجمالي :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="total_items" class="form-control" style="width: 70%;float: right" disabled>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-3 mt-3 p-0 mb-3">
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="button" onclick="add()" class="btn btn-primary mt-3" value="اضف" style="width: 80px;">
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                                <thead>
                                    <tr>
                                    <th width="10px" >م</th>
                                    <th width="50px" >الصنف</th>
                                    <th width="50px">الكميه</th>
                                    <th width="50px">السعر</th>
                                    <th width="50px">الاجمالى</th>

                                    <th width="50px">حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>item 1</td>
                                        <td>20</td>
                                        <td>34</td>
                                        <td>34</td>
                                        <td><a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr> -->


                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

                        <!-- <table class="table invoice-total" style="direction: ltr;">
                            <tbody>
                                <tr class="row">
                                    <td class="col-lg-2"><input type="text" class="form-control"></td>
                                    <td class="col-lg-1 pt-4" style="border-bottom: 0;"><strong>:الاجمالي</strong></td>
                                </tr>
                                <tr class="row">
                                    <td class="col-lg-2"><input type="text" class="form-control"></td>
                                    <td class="col-lg-1 pt-4" style="border-bottom: 0;"><strong>:خصم</strong></td>
                                </tr>
                                <tr class="row">
                                    <td class="col-lg-2"><input type="text" class="form-control"></td>
                                    <td class="col-lg-1 pt-4" style="border-bottom: 0;"><strong>:نولون</strong></td>
                                </tr>
                                <tr class="row">
                                    <td class="col-lg-2"><input type="text" class="form-control"></td>
                                    <td class="col-lg-1 pt-4" style="border-bottom: 0;"><strong>:رصيد المورد</strong></td>
                                </tr>
                            </tbody>
                        </table> -->
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="col-lg-12 mt-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">رصيد المورد :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="supplier_balance"class="form-control" style="width: 70%;float: right" disabled>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 mt-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">المجموع :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text"  id="total2" style="width: 70%;float: right" class="form-control" disabled>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-12 mt-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">خصم :</label>
                                    {{-- <div class="col-lg-9"> --}}
                                        <input type="text" id="discount" style="width: 70%;float: right" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-12 mt-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;">نولون :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="freight_charge" style="width: 70%;float: right" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-lg-12 mt-3" style="float: right">
                                    <label class="col-form-label" style="float: right;width: 25%;margin-left: 10px;"> الاجمالى :</label>
                                    {{-- <div class="col-sm-9"> --}}
                                        <input type="text" id="total" style="width: 70%;float: right" class="form-control" disabled>
                                    {{-- </div> --}}
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
@if(isset($_GET['id']))
// alert('hdhd')
$("#supplier_id").val({{$invoice_edit[0]->supplier_id}})
$("#store_id").val(2)
$("#supplier_balance").val({{$invoice_edit[0]->balance+$invoice_edit[0]->total}})
$("#total2").val({{$invoice_edit[0]->total+$invoice_edit[0]->discount}})
$("#total").val({{$invoice_edit[0]->total}})
$("#discount").val({{$invoice_edit[0]->discount}})
$("#freight_charge").val({{$invoice_edit[0]->freight_cost}})

document.getElementById("supplier_id").disabled = true;

 x=0
  @foreach($invoice_edit as $invoice_edi)
 x++
 $('#gettable tbody').append('<tr id=r'+x+'><td>'+x+'</td><td>'+'{{$invoice_edi->item_name}}'+'</td><td>'+'{{$invoice_edi->quantity}}'+'</td><td>'+'{{$invoice_edi->quantity}}'+'</td><td>'+'{{$invoice_edi->total_item_price}}'+'</td><td><a href="#" onclick="delete_item('+count+');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td></tr>');


  @endforeach


@else

@endif
// $('.chosen-select').chosen({width: "125%"});
var count=$('#gettable tr').length
var total_prices=0;

$('#discount,#freight_charge').on('change', function() {
  var total_discount=0;
  total_discount+=Number($('#discount').val())+Number($('#freight_charge').val())

  $('#total').val(total_prices-total_discount);

});
$('#item_quantity,#item_price').on('change', function() {
  var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());
$('#total_items').val(total_items);
});
var invoice_items=[];
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
  var item_quantity=$('#item_quantity').val();
  var item_price=$('#item_price').val();
  var total_items=Number($('#item_price').val())*Number($('#item_quantity').val());
  if(store_id==''||store_id==null){
    $('#message').show().html('   يرجى اختيار المخزن');

  }
else if(item_id==''||item_id==null){
  $('#message').show().html(' يرجى اختيار الصنف');

}
else if(item_price==''||item_price==null||item_price==0||!Number(item_price)){
  $('#message').show().html('  يرجى ادخال السعر اكبر من 0');

}
else if(item_quantity==''||item_quantity==null||item_quantity==0||!Number(item_quantity)){
  $('#message').show().html(' يرجى ادخال الكميه اكبر من 0 ');

}
else {

  $('#gettable tbody').append('<tr id=r'+count+'><td>'+count+'</td><td>'+item_name+'</td><td>'+item_quantity+'</td><td>'+item_price+'</td><td>'+total_items+'</td><td><a href="#" onclick="delete_item('+count+');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td></tr>');
  // var item_id=$( "#item_id option:selected" ).text();
count++;
$('#store_id').prop('disabled', true);


// $( "#item_id option:selected" ).disabled();
// $("#item_id option:selected").prop("selected", false)

invoice_items.push({'item_id':item_id,'item_quantity':item_quantity,'item_price':item_price,'total_items':total_items,'store_id':store_id})
total_prices+=total_items;
$('#total2').val(total_prices);
$('#item_quantity').val(0);
$('#item_price').val(0);
$('#total_items').val(0);
$('#item_id').val('');
}

}
$('#supplier_id').on('change', function() {

  @foreach ($suppliers as $key => $supplier)
  if({{$supplier->id}}==$('#supplier_id').val()){

$('#supplier_balance').val({{$supplier->balance}})

}
@endforeach

});
function save()
{
console.log(invoice_items)
console.log(Number($('#supplier_balance').val()))
console.log(Number($('#total2').val()))

console.log((Number($('#supplier_balance').val())<Number($('#total2').val())))
if(Number($('#supplier_balance').val())<Number($('#total2').val())){
  $('#message').show().html('  رصيد المورد لا يكفى لشراء الاصناف ');

}

else if(Number($('#total').val())<Number($('#discount').val())){
  $('#message').show().html(' يرجى ادخال الخصم اقل من المجموع ');

}
else if(Number($('#total').val())<Number($('#freight_charge').val())){
  $('#message').show().html(' يرجى ادخال نولون اقل من المجموع ');

}
else{
  $.ajax({
    url: "{{ URL::to('createInvoice') }}",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "invoice_items":invoice_items,
    "invoice_no":$('#invoice_no').val(),
    "invoice_date":$('#invoice_date').val(),
    "store_id":$('#store_id').val(),
    "supplier_id":$('#supplier_id').val(),
    "supplier_balance":$('#supplier_balance').val(),

    "discount":$('#discount').val(),
    "freight_charge":$('#freight_charge').val(),
    "total":$('#total').val()

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
function getDate(){
    var today = new Date();
console.log(today)
document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);


}
    $('.js-example-basic-single').select2();
</script>
@endsection
