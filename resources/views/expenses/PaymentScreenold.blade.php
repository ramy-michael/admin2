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
                <h2 style="float: right;">شاشه مدفوعات</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>شاشه مدفوعات</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                    <div class="ibox-content " style="">
                        <div class="table-responsive">
                            <!-- <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable"> -->
                            <table class="table table-striped table-bordered table-hover dataTables-example" >

                                <thead class="text-center">
                                    <tr>
                                    <th width="10px" >م</th>
                                    <th width="50px" >اسم العميل</th>
                                    <th width="50px">رصيد العميل</th>
                                    <th width="50px">المبلغ المدفوع</th>
                                    <th width="50px">الباقي</th>
                                    <th width="50px">الاعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr class="gradeX"> -->
                                      @foreach ($clinets as $key => $clinet)
                                          <tr class="gradeX">
                                              <td class="text-center">
                                                {{ $key+1 }}
                                              </td>

                                              <td class="text-center">{{ $clinet->name }}</td>
                                              <td class="text-center">{{ $clinet->depit + $clinet->balance }}</td>

                                              <td class="text-center">{{ $clinet->depit }}</td>
                                              <td class="text-center">{{ $clinet->balance }}</td>




                                              <td class="text-center">

                                                  <a class="btn btn-xs btn-primary"
                                                     href="{{ route('Manufactures.index',['id' => $clinet->id]) }}"><i class="fa fa-edit"></i>
                                                  </a>
                                                  <form action="{{ url('addexpense/'.$clinet->trans_id) }}" method="POST"
                                                        style="display: inline-block">
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE') }}
                                                      <button type="submit" id="delete-task-{{ $clinet->id }}"
                                                              class="btn btn-xs btn-danger">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                        <!-- <td class="text-center">1</td>
                                        <td class="text-center">اسم العميل</td>
                                        <td class="text-center">2000</td>
                                        <td class="text-center">3000</td>
                                        <td class="text-center">1000</td> -->
                                        <!-- <td class="text-center actions">
                                            <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" id="text" onclick="notopen()" style="font-size: 10px;">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="left: 0px;width: 13%;">
                                                <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="" style="font-size: 15px;">تعديل</a></li>
                                                <li style="margin: 12px;">
                                                    <form action="" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" id="delete-task"
                                                                class="btn btn-danger" style="width: 93%;margin: 0 4px;">
                                                            حذف
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td> -->
                                    <!-- </tr> -->
                                </tbody>
                            </table>
                        </div><!-- /table-responsive -->

                        <!-- <div>
                            <button class="btn btn-primary">حفظ</button>
                        </div> -->
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
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

    function notopen(){
        $('.actions').removeClass('open');
    }

</script>

<script>
    function save()
    {
        $.ajax({
            url: "{{ URL::to('createUser') }}",
            type: "post",
            dataType: 'json',
            data: {"_token":$('#_token').val(),
            "name":$('#name').val(),
            "username":$('#username').val(),
            "state":1,
            "job":$('#job').val(),
            "phone":$('#phone').val(),
            "password":$('#password').val()


            },
            success: function(response)
            {
                console.log(response)
                if(response.status=="success"){
                window.location.href = "/Users";
                }else{}
            }



        });
    }


</script>

@endsection
