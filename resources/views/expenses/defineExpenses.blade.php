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
          {{session()->get('name') }}
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-lg-12">
                <h2 style="float: right;">تعريف المصروفات</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>تعريف المصروفات</strong>
                    </li>
                </ol>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{url('addexpense')}}" >
            {{ csrf_field() }}
        <div class="row mt-2">
            <div class="col-lg-12">
                    <div class="ibox-content " style="">

                        <div class="container-fluid">
                            <div class="row text-right mb-3" style="width: 100%">
                                <div class="col-lg-4 col-sm-12 col-md-4 mt-3">
                                    {{-- <div class="col-lg-8"> --}}
                                        <label class="col-form-label col-lg-2 col-sm-2" style="float: right;width: 20%;">الاسم:</label>
                                        <input type="text" id="name" name="name" class="form-control col-lg-10" style="width: 180px;float: right;margin-right: 20px;>
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                    {{-- </div> --}}
                                    
                                </div>
                                <div class="col-lg-4 mt-3">
                                    {{-- <div class="col-sm-8"> --}}
                                        <label class="col-form-label col-lg-2 col-sm-2" style="float: right;width: 20%;margin-left: 20px;"> النوع:</label>
                                        <select class="js-example-basic-single" id="type" name="type" style="width:180px;float: right;">
                                            <option disabled value selected></option>
                                            <option  value="5">اصول </option>
                                            <option  value="4">خصوم</option>
                                            <option  value="3">نثريات</option>
                                            <option  value="1">المصروفات</option>

                                        </select>
                                    {{-- </div> --}}
                                    
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <div class="mb-3">
                                        <div class="col-lg-6">
                                            <input type="submit" class="btn btn-primary " value="حفظ" style="width: 80px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </div>
        </div>
      </form>
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



@endsection
