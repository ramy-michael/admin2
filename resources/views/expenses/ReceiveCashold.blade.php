@extends('layouts.app')

@section('title', 'Main page')

@section('content')
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
                                        <select class="js-example-basic-single" id="client" name="client" style="width:180px;">
                                          <option disabled value selected value=''></option>

                                          @foreach ($clients as $key => $client)

                                          <option  value="{{$client->id}}">{{$client->name}}</option>

                                          @endforeach

                                        </select>
                                    </div>
                                    <label class="col-form-label col-lg-4"> اسم العميل:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="date" id="date" name="date" class="form-control" style="width: 180px;">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    </div>
                                    <label class="col-form-label col-lg-4">  التاريخ:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="balance" name="balance"class="form-control" style="width: 180px;" disabled>
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    </div>
                                    <label class="col-form-label col-lg-4">  الرصيد:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="amount" name="amount" class="form-control" style="width: 180px;">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                    </div>
                                    <label class="col-form-label col-lg-4">المبلغ المدفوع:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="from_account" name="from_account" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                    </div>
                                    <label class="col-form-label col-lg-4">من حساب:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="to_account" placeholder="الخزنه" name="to_account" class="form-control" style="width: 180px;"disabled>
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    </div>
                                    <label class="col-form-label col-lg-4">الي حساب:</label>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="col-lg-8">
                                        <input type="text" id="remain"   name="remain" class="form-control" style="width: 180px;">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
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

$('#amount').on('change', function() {
  var remain =Number($('#balance').val())-Number(this.value)
  $('#remain').val(remain)
});
$('#client').on('change', function() {

  @foreach ($clients as $key =>$client)

  if({{$client->id}}==$('#client').val()){
$('#balance').val({{$client->balance}})
$('#from_account').val("{{$client->name}}")


}
@endforeach

});
function save()
{
  var client_id=$('#client_id').val()

@if(isset($_GET['id']))

  $.ajax({
    url: "{{ URL::to('updateReceiveCash') }}",
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
  window.location.href = "/ReceiveCash";

}else{

}



   }



    });

    @else
    $.ajax({
      url: "{{ URL::to('createReceiveCash') }}",
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
    window.location.href = "/ReceiveCash";

  }else{

  }



     }



      });
    @endif
// }
}

</script>

@endsection
