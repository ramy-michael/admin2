<?php $__env->startSection('title', 'Minor page'); ?>

<?php $__env->startSection('content'); ?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="padding-right: 20px;">
                    <h3 style="float: right;">شاشه بحث المشتريات</h3>
                </div>

                <div class="ibox-content">
                  <div class=" row">
                      <label class="col-form-label">العميل :</label>
                      <div class="col-sm-2">
                          <select class="js-example-basic-single" name="client" style="width: 100%;" id="client_id">
                              <option disabled value selected value=''></option>

                              <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option  value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                      <div class="col-lg-6">
                          <label class="col-form-label">رصيد العميل :</label>
                          <div class="col-lg-9">
                              <input type="text" id="client_balance" class="form-control">
                          </div>
                      </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable2">
                            <thead>
                            <tr>
                                <th class="text-center">كود</th>
                                <!-- <th class="text-center">اسم العميل</th> -->

                                <th class="text-center">رقم الفاتوره</th>
                                <!-- <th class="text-center">المخزن</th> -->
                                <th class="text-center">دائن</th>
                                <th class="text-center">مدين</th>
                                <th class="text-center">actions</th>
                            </tr>
                            </thead>
                            <!-- <a href="<?php echo e(route('Suppliers.create')); ?>" class="btn btn-success"style="margin-left:1207px;">New Supplier</a> -->
                            <tbody>

                                  <?php $__currentLoopData = $Sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr class="gradeX">

                                    <td class="text-center"><?php echo e($key+1); ?></td>
                                    <!-- <td class="text-center"><?php echo e($Sale->num); ?></td> -->
                                    <td class="text-center"><?php echo e($Sale->name); ?></td>
                                    <td class="text-center"><?php echo e($Sale->date); ?></td>
                                    <td class="text-center"><?php echo e($Sale->total); ?></td>

                                    <td class="text-center actions">

                                        <ul class="dropdown-menu" role="menu">
                                            <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="Sales?id=<?php echo e($Sale->id); ?>" style="font-size: 15px;">تعديل</a></li>
                                            <li style="margin: 12px;">
                                                <form action="" method="POST">
                                                    <button type="submit"
                                                            class="btn btn-danger" style="width: 93%;margin: 0 4px;color: black;">
                                                        حذف
                                                    </button>
                                                </form>
                                                <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="revesesale?id=<?php echo e($Sale->id); ?>" style="font-size: 15px;">استرجاع</a></li>
                                            </li>
                                        </ul>

                                    </td>
                                  </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



                <!-- Modal footer -->
                <div class="modal-footer">
                  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">

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

<script src="js/plugins/chosen/chosen.jquery.js"></script>


<!-- Page-Level Scripts -->
<script>
// $('.js-example-basic-single').select2();

$('#client_id').on('change', function() {

  <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  if(<?php echo e($client->id); ?>==$('#client_id').val()){
$('#client_balance').val(<?php echo e($client->balance); ?>)


}
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
//     url: "<?php echo e(URL::to('loaddata')); ?>",
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>