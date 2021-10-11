@extends('layouts.app')

@section('title', 'product')

@section('content')
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
    <div class="row" style="dir:rtl">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
              {{session()->get('name') }}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="ibox-title">
                    <h5>product Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th class="text-center">#</th>

                                <th class="text-center">رقم التصنيع/اسم المنتج</th>
                                <th class="text-center">التكرار</th>

                                  <th class="text-center">اجمالى التكلفه</th>ا
                                <th class="text-center">اعدادات</th>
                            </tr>
                            </thead>
                            <a href="{{ route('product.create')}}" class="btn btn-success"style="margin-left:1207px;">New Item</a>
                            <tbody>
                            @foreach ($product as $key => $Product)
                                <tr class="gradeX">
                                    <td class="text-center">
                                      {{ $key+1 }}
                                    </td>

                                    <td class="text-center">{{ $Product->name }}_{{ $Product->num }}</td>
                                    <td class="text-center">{{ $Product->repeat_num }}</td>
                                    <td class="text-center">{{ $Product->total_price }}</td>



                                    <td class="text-center">

                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('product.edit',$Product->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('product/'.$Product->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $Product->id }}"
                                                    class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Page-Level Scripts -->
<script>

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

</script>
