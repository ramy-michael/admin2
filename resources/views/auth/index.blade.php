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

    <title>INSPINIA | Sales</title>

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
                <h2 style="float: right;">المبيعات</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>المبيعات</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="ibox-content p-xl" style="">
                <!-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> -->
                <div class="alert alert-danger text-right" id="message" style="display:none;"></div>
                <div class="alert  alert-info text-right" id="success" style="display:none;"></div>

                        <div class="row">

                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">رقم الفاتوره:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="invoice_no" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4 ">
                                <label for="date" class="col-form-label"> التاريخ:</label>
                                <div class="col-sm-8">
                                    <input type="date" id="invoice_date" class="form-control" style="width: 100%;">
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">العميل :</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single" name="client" style="width: 100%;" id="client_name">
                                        <option disabled value selected></option>
                                        <option  value="one">one</option>
                                        <option  value="two">two</option>
                                        <option  value="three">three</option>
                                        <option  value="four">four</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">المنتج/رقم التصنيع :</label>
                                <div class="col-sm-7">
                                    <select class="js-example-basic-single" name="manufacturingNumber" style="width: 100%;"id="manufacturing_number">
                                        <option disabled value selected></option>
                                        <option  value="one">one</option>
                                        <option  value="two">two</option>
                                        <option  value="three">three</option>
                                        <option  value="four">four</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-lg-4">
                                <label class="col-form-label">اجمالي التكلفه :</label>
                                <div class="col-sm-8">
                                    <input type="text" id="total_price" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="row"> -->
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">سعر البيع :</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="item_price" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">نوع الشكاره :</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single" id="shakara_type" style="width:100%;">
                                            <option disabled value selected></option>
                                            <option  value="one">one</option>
                                            <option  value="two">two</option>
                                            <option  value="three">three</option>
                                            <option  value="four">four</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">وزن الشكاره :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="shakara_size" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-form-label">عدد الشكاير :</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="shakara_total" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-5 col-lg-12 mt-3" style="float: left;">
                                    <div class="col-sm-9">
                                        <input type="button" onclick="" class="btn btn-primary " value="اضف" style="width: 80px;">
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
                                        <th width="50px">الكميه</th>
                                        <th width="50px">سعر البيع</th>
                                        <th width="50px">نوع الشكاره</th>
                                        <th width="50px">وزن الشكاره</th>
                                        <th width="50px">عدد الشكاير</th>

                                        <th width="40px">حذف</th>
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

    <div class="row mb-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <label class="col-form-label">رصيد العميل :</label>
            <div class="col-lg-9">
                <input type="text" id="discount" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <label class="col-form-label"> الاجمالى :</label>
            <div class="col-sm-9">
                <input type="text" id="total" class="form-control" disabled>
            </div>
        </div>
    </div>

                        <div>
                            <button onclick=""class="btn btn-primary">حفظ</button>
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
    $('.js-example-basic-single').select2();    
</script>
@endsection
