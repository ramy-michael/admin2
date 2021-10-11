<?php $__env->startSection('title', 'Clients'); ?>

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
                <div class="ibox-title" style="dir:rtl">
                    <h5>العملاء</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th class="text-center">كود</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">رقم التليفون</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الرصيد</th>

                                <th class="text-center">الاعدادات</th>
                            </tr>
                            </thead>
                            <a href="<?php echo e(route('Clients.create')); ?>" class="btn btn-success"style="margin-left:1207px;">اضافه العميل</a>
                            <tbody>
                            <?php $__currentLoopData = $Clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="gradeX">
                                    <td class="text-center">
                                      <?php echo e($Client->code); ?>

                                    </td>
                                    <td class="text-center"><?php echo e($Client->name); ?></td>
                                    <td class="text-center"><?php echo e($Client->phone); ?></td>
                                    <td class="text-center"><?php echo e($Client->address1); ?></td>

                                    <td class="text-center"><?php echo e($Client->balance); ?></td>


                                    <td class="text-center actions">
                                        <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" id="text" onclick="notopen()" style="font-size: 10px;">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="<?php echo e(route('Clients.edit',$Client->id)); ?>" style="font-size: 15px;">تعديل</a></li>
                                            <li style="margin: 12px;">
                                            <form action="<?php echo e(url('Clients/'.$Client->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" id="delete-task-<?php echo e($Client->id); ?>"
                                                        class="btn btn-danger" style="width: 93%;margin: 0 4px;">
                                                    حذف
                                                </button>
                                            </form>
                                            </li>
                                            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                                        </ul>
                                        <!-- <a class="btn btn-xs btn-primary"
                                           href="<?php echo e(route('Clients.edit',$Client->id)); ?>"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(url('Clients/'.$Client->id)); ?>" method="POST"
                                              style="display: inline-block">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" id="delete-task-<?php echo e($Client->id); ?>"
                                                    class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> -->
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

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
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

    function notopen(){
        $('.actions').removeClass('open');
    }

</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>