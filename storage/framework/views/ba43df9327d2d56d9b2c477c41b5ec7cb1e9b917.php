<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>
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
                <h2 style="float: right;">اضافه مستخدم</h2>
                <ol class="breadcrumb" style="margin-top: 60px;">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحه الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        صفحات اخري
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>اضافه مستخدم</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                    <div class="ibox-content " style="">

                        <div class="container-fluid">
                            <div class="row text-right mb-3">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">الاسم:</label>
                                        
                                            <input type="text" id="name" class="form-control" style="width: 65%;float: right">
                                            <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden"  id="user_id" value="">
                                        
                                    </div>


                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label for="date" class="col-form-label" style="float: right;width: 30%;margin-left: 10px;"> رقم التليفون:</label>
                                        
                                            <input type="tel" id="phone" class="form-control" style="width: 65%;float: right">
                                        
                                    </div>
                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">الوظيفه :</label>
                                        
                                            <select class="js-example-basic-single" id="job" name="state" style="width: 65%;float: right">
                                            <option disabled value selected></option>
                                            <option  value="1">مدير حسابات</option>
                                            <option  value="2">محاسب</option>

                                        </select>
                                        
                                    </div>
                                    <div class="col-lg-12"></div>
                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">اسم المستخدم :</label>
                                        <!-- <div class="col-sm-12"> -->
                                            <input type="text" id="username" class="form-control" style="width: 65%;float: right">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">كلمه المرور :</label>
                                        <!-- <div class="col-sm-9"> -->
                                            <input type="password" id="password" class="form-control" style="width: 65%;float: right">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-lg-4 col-md-6 mt-3" style="float: right">
                                        <label class="col-form-label" style="float: right;width: 30%;margin-left: 10px;">تاكيد كلمه المرور :</label>
                                        <!-- <div class="col-sm-9"> -->
                                            <input type="password" id="password_confirm" class="form-control" style="width: 65%;float: right">
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row mb-3 float-left mt-3">
                                <div class="mb-3 row mt-3 mr-2">
                                    <div class="col-sm-9">
                                        <input type="button" class="btn btn-primary " onclick="save();"value="حفظ" style="width: 80px;">
                                    </div>
                                </div>
                            </div>
                            </div>

                        <div class="table-responsive">
                            <!-- <table class="table table-striped table-bordered table-hover dataTables-example" id="gettable"> -->
                            <table class="table table-striped table-bordered table-hover dataTables-example" >

                                <thead class="text-center">
                                    <tr>
                                    <th width="10px" >م</th>
                                    <th width="50px" >الاسم</th>
                                    <th width="50px">الوظيفه</th>
                                    <th width="50px">اسم المستخدم</th>
                                    <th width="50px">رقم التليفون</th>

                                    <th width="50px">الاعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeX">
                                        <td class="text-center">
                                        <?php echo e($key +1); ?>

                                        </td>
                                        <td class="text-center"><?php echo e($User->name); ?></td>
                                        @<?php if ($User->job==1): ?>
                                        <td class="text-center">مدير حسابات</td>

                                        @<?php else: ?>
                                            <td class="text-center">محاسب</td>

                                        <?php endif; ?>
                                        <td class="text-center"><?php echo e($User->username); ?></td>

                                        <td class="text-center"><?php echo e($User->phone); ?></td>


                                        <td class="text-center actions">
                                            <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown" id="text" onclick="notopen()" style="font-size: 10px;">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" style="width: 10%"ole="menu">
                                                <li class="text-center" style="margin: 12px;"><a class="btn btn-primary text-center" href="<?php echo e(url('Users?id='.$User->id)); ?>" style="font-size: 15px;">تعديل</a></li>
                                                <li style="margin: 12px;">
                                                <form action="<?php echo e(url('Users?id='.$User->id)); ?>" method="POST">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" id="delete-task-<?php echo e($User->id); ?>"
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
                                            href="<?php echo e(route('Users.edit',$User->id)); ?>"><i class="fa fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(url('Users/'.$User->id)); ?>" method="POST"
                                                style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button type="submit" id="delete-task-<?php echo e($User->id); ?>"
                                                        class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form> -->
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php if(isset($_GET['id'])): ?>
    $('#name').val("<?php echo e($user[0]->name); ?>");
    $('#phone').val("<?php echo e($user[0]->phone); ?>")
    // $('#job').val("<?php echo e($user[0]->job); ?>")
    $("#job").select2("val", "<?php echo e($user[0]->job); ?>"); //set the value

    $('#username').val("<?php echo e($user[0]->username); ?>")
    $('#user_id').val('<?php echo $_GET['id']?>')

        <?php endif; ?>
function save()
{
<?php if(isset($_GET['id'])): ?>
$.ajax({
    url: "<?php echo e(URL::to('updateUser')); ?>",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "id":$('#user_id').val(),
    "username":$('#username').val(),
     "state":1,
    "job":$('#job').val(),
    "phone":$('#phone').val(),
    "password":$('#password').val()

  },
    success: function(response)
    {
if(response.status=="success"){
    console.log(response)

  window.location.href = "/Users";

}else{

}



   }



    });
<?php else: ?>
  $.ajax({
    url: "<?php echo e(URL::to('createUser')); ?>",
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
    console.log(response)

  window.location.href = "/Users";

}else{

}



   }



    });
    <?php endif;?>
}

</script>
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>