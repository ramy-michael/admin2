@extends('layouts.app')

@section('title', 'Minor page')

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
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="padding-right: 20px;">
                                        <h3 style="float: right;"> شاشاشه بحث المبيعات</h3>

                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable2">
                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم الفاتوره</th>
                                <!-- <th class="text-center">المخزن</th> -->
                                <th class="text-center">العميل</th>
                                <th class="text-center">التاريخ</th>
                                <th class="text-center">الاجمالي</th>
                                <th class="text-center">actions</th>
                            </tr>
                            </thead>
                            <!-- <a href="{{ route('Suppliers.create')}}" class="btn btn-success"style="margin-left:1207px;">New Supplier</a> -->
                            <tbody>

                                  @foreach ($Sales as $key => $Sale)
                                  <tr class="gradeX">

                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $Sale->num }}</td>
                                    <td class="text-center">{{ $Sale->name }}</td>
                                    <td class="text-center">{{ $Sale->date }}</td>
                                    <td class="text-center">{{ $Sale->total }}</td>

                                    <td class="text-center actions">
                                        <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" id="text"  style="font-size: 10px;">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="Sales?id={{$Sale->id}}" style="font-size: 15px;">تعديل</a></li>
                                            <li style="margin: 12px;">
                                                <form action="" method="POST">
                                                    <button type="submit"
                                                            class="btn btn-danger" style="width: 93%;margin: 0 4px;color: black;">
                                                        حذف
                                                    </button>
                                                </form>
                                                <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="revesesale?id={{$Sale->id}}" style="font-size: 15px;">استرجاع</a></li>
                                            </li>
                                        </ul>

                                    </td>
                                  </tr>
                                  @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">الصنف</th>
                            <th class="text-center">الكميه</th>
                            <th class="text-center">السعر</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">الصنف</td>
                            <td class="text-center">5</td>
                            <td class="text-center">50</td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- <script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script> -->
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>



<!-- Page-Level Scripts -->
<script>
$(document).on('click', '.edit-modal', function() {

        // $('#footer_action_button').text(" Update");
        // $('#footer_action_button').addClass('glyphicon-check');
        // $('#footer_action_button').removeClass('glyphicon-trash');
        // $('.actionBtn').addClass('btn-success');
        // $('.actionBtn').removeClass('btn-danger');
        // $('.actionBtn').removeClass('delete');
        // $('.actionBtn').addClass('edit');
        // $('.modal-title').text('Edit');
        // $('.deleteContent').hide();
        // $('.form-horizontal').show();


        // $('#myModal').modal('show');
    });
$(document).ready(function(){

var table2 = $('#gettable').DataTable({
  pageLength: 10,
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
function fillmodalData(details){
    // $('#fid').val(details[0]);
    var table22 = $('#gettable').DataTable();

    var rowNode = table22
    .row.add( [ details[0], details[1], details[2],details[3] ] )
    .draw()
    // .node();
           // $("#gettable tbody").append("<tr><td>" +1 + "</td><td>" +  details[0] + "</td><td>" +  details[0] + "</td><td>" +  details[0] + "</td></tr>");

}
function show(invoice_id){
// alert(invoice_id);
// var stuff = $(this).data('info').split(',');
// fillmodalData(stuff)
// $('#myModal').modal('show');
      // table2.row()
      // .remove()
      // .draw();
// var table2=$('#gettable').DataTable({
//   pageLength: 10,
//   responsive: true,
//   serverSide: true,
// $("#gettable").remove();
// // "ajax":({
//   $.ajax({
//     url: "{{ URL::to('loaddata') }}",
//     type: "post",
//     dataType: 'json',
//     processing: true,
//      serverSide: true,
//      pageLength:2,
//     // filter: true,
//     // retrieve: true,
//     data: {"_token":$('#_token').val(),"invoice_id":invoice_id},
//   success: function (data) {
//     console.log(data)
//
//     for (var i = 0; i < data.length; i++) {
//       console.log(data[0]['id'])
//        // table2.row.add([data[0]['id'], data[0]['id'],data[0]['id'],data[0]['id']]).draw();
//        $("#gettable tbody").append("<tr><td>" +Number(i+1) + "</td><td>" +  data[i]['item_name'] + "</td><td>" +  data[i]['quantity'] + "</td><td>" +  data[i]['unit_price'] + "</td></tr>");
// // table2.draw();
//     }
//     // table2.draw();
//        }
// })
// });
}
    $(document).ready(function(){

        var table=$('#gettable2').DataTable({
            pageLength: 10,
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
        // $('#gettable').DataTable({
        //     pageLength: 10,
        //     responsive: true,
        //     dom: '<"html5buttons"B>lTfgitp',
        //     buttons: [
        //         { extend: 'copy'},
        //         {extend: 'csv'},
        //         {extend: 'excel', title: 'ExampleFile'},
        //         {extend: 'pdf', title: 'ExampleFile'},
        //
        //         {extend: 'print',
        //          customize: function (win){
        //                 $(win.document.body).addClass('white-bg');
        //                 $(win.document.body).css('font-size', '10px');
        //
        //                 $(win.document.body).find('table')
        //                         .addClass('compact')
        //                         .css('font-size', 'inherit');
        //         }
        //         }
        //     ]
        //
        // });
        // table.on( 'responsive-display', function ( e, datatable, row, showHide, update ) {
        //     alert( 'Details for row '+row.index()+' '+(showHide ? 'shown' : 'hidden') );
        // })

    // $(document).ready(function(){


});
</script>

@endsection
