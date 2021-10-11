<?php $__env->startSection('title', 'Suppliers'); ?>

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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


</head>
    <div class="row" style="dir:rtl">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <?php echo e(session()->get('name')); ?>

                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <div class="ibox-title">
                    <h5>الموردين</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable">
                            <thead>
                            <tr>
                                <th class="text-center">كود</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">رقم التليفون</th>
                                <th class="text-center">العنوان</th>

                                <th class="text-center">الاعدادات</th>
                            </tr>
                            </thead>
                            <a href="<?php echo e(route('Suppliers.create')); ?>" class="btn btn-success"style="margin-left:1207px;">اضافه مورد</a>
                            <tbody>
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="gradeX">
                                    <td class="text-center">
                                      <?php echo e($supplier->code); ?>

                                    </td>
                                    <td class="text-center"><?php echo e($supplier->name); ?></td>
                                    <td class="text-center"><?php echo e($supplier->phone); ?></td>
                                    <td class="text-center"><?php echo e($supplier->address1); ?></td>



                                    <td class="text-center">

                                        <a class="btn btn-xs btn-primary"
                                           href="<?php echo e(route('Suppliers.edit',$supplier->id)); ?>"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(url('Suppliers/'.$supplier->id)); ?>" method="POST"
                                              style="display: inline-block">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" id="delete-task-<?php echo e($supplier->id); ?>"
                                                    class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
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

    $(document).ready(function(){
        $('#gettable').DataTable({
            pageLength: 25,
            responsive: true,
            order: [] ,
            // dom: '<"html5buttons"B>lTfgitp',
            // buttons: [
            //     { extend: 'copy'},
            //     {extend: 'csv'},
            //     {extend: 'excel', title: 'ExampleFile'},
            //     {extend: 'pdf', title: 'ExampleFile'},
            //
            //     {extend: 'print',
            //      customize: function (win){
            //             $(win.document.body).addClass('white-bg');
            //             $(win.document.body).css('font-size', '10px');
            //
            //             $(win.document.body).find('table')
            //                     .addClass('compact')
            //                     .css('font-size', 'inherit');
            //     }
            //     }
            // ]

        });

    });

</script>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>