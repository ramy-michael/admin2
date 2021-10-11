
    <body style="direction:rtl; text-align=rigth;">
      <style>
      #page-wrapper {
            position: inherit;
            margin: 0 220px 0 0px;
            /* min-height: 1200px; */
        }
        @media (max-width: 768px) {
          #page-wrapper {
            margin-right: 0px;
          }
        }
        .dropdown-menu{
            width: 100%;
            border: 0;
        }
        .dropdown .dropdown-menu li a:hover{
            background-color: #293846;
            color: white;
        }
        .rotate {
            transform: rotate(180deg);
        }
        .spaces{
            display: contents;
        }
        .dropdown #dropdownMenuButton1 .fas.fa-caret-down{
            transition: all 0.25s 0.25s;
        }
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #19aa8d; 
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #19aa8d; 
        }
        .d-block{
            display: block;
        }
</style>
<nav  class="navbar-default navbar-static-side" role="navigation" style="height: 100%;background: #233645;overflow: auto;">

    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" style="background: #233645;padding: 0;">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">admin</strong>
                            </span> <span class="text-muted text-xs block"> admin menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element" style="padding: 0;">
                    IN+
                </div>
            </li>

            <li class="<?php echo e(isActiveRoute('Suppliers')); ?>">
                <a href="<?php echo e(url('/Suppliers')); ?>"><span class="nav-label" style="font-size: 20px"> موردين</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('payments')); ?> dropdown">
                <a href="#" id="dropdownMenuButton1" style="font-size: 20px" data-bs-toggle="dropdown" aria-expanded="false"><span class="nav-label">تحصيلات و سدادات</span><i class="fas fa-caret-down"></i></i></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color:black;color: white;padding-left: 15px;">
                    <li class="<?php echo e(isActiveRoute('Expenses')); ?>">
                        <a href="<?php echo e(url('/DefineExpenses')); ?>" style="font-size: 15px"><span class="nav-label">تعريف المصروفات</span><i class="fa fa-th-large" style="padding-right: 7px;"></i></a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('Expenses')); ?>">
                        <a href="<?php echo e(url('/CashExchange')); ?>" style="font-size: 15px"><span class="nav-label">صرف نقديه</span><i class="fa fa-th-large" style="padding-right: 7px;"></i></a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('Expenses')); ?>">
                        <a href="<?php echo e(url('/PaymentScreen')); ?>" style="font-size: 15px"><span class="nav-label">شاشه مدفوعات</span><i class="fa fa-th-large" style="padding-right: 7px;"></i></a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('Expenses')); ?>">
                        <a href="<?php echo e(url('/ExpenseScreen')); ?>" style="font-size: 15px"><span class="nav-label">شاشه مصروفات</span><i class="fa fa-th-large" style="padding-right: 7px;"></i></a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('Expenses')); ?>">
                        <a href="<?php echo e(url('/ReceiveCash')); ?>" style="font-size: 15px"><span class="nav-label">استلام نقديه</span><i class="fa fa-th-large" style="padding-right: 7px;"></i></a>
                    </li>

                </ul>
            </li>
            <li class="<?php echo e(isActiveRoute('Clients')); ?>">
                <a href="<?php echo e(url('/Clients')); ?>"><span class="nav-label" style="font-size: 20px"> العملاء</span><i class="fa fa-th-large"></i></a>
            </li>

            <li class="<?php echo e(isActiveRoute('Items')); ?>">
                <a href="<?php echo e(url('/Items')); ?>"><span class="nav-label" style="font-size: 20px"> الاصناف</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('Packages')); ?>">
                <a href="<?php echo e(url('/Packages')); ?>"><span class="nav-label" style="font-size: 20px"> شكاير</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('show')); ?>">
                <a href="<?php echo e(url('/show')); ?>"><span class="nav-label" style="font-size: 20px"> المنتجات</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('Clients')); ?>">
                <a href="<?php echo e(url('/Clients')); ?>"><span class="nav-label" style="font-size: 20px"> العملاء</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('main')); ?>">
                <a href="<?php echo e(url('/')); ?>"><span class="nav-label" style="font-size: 20px">المبيعات</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('minor')); ?>">
                <a href="<?php echo e(url('/minor')); ?>"><span class="nav-label" style="font-size: 20px"> مشتريات</span><i class="fa fa-th-large"></i></a>
            </li>

            <li class="<?php echo e(isActiveRoute('Manufactures ')); ?>">
                <a href="<?php echo e(url('/Manufactures ')); ?>" style="font-size: 20px"><span class="nav-label"> تصنيع</span><i class="fa fa-th-large"></i></a>
            </li>

            <li class="<?php echo e(isActiveRoute('Invoices')); ?>">
                <a href="<?php echo e(url('/Invoices')); ?>" style="font-size: 20px"><span class="nav-label"> فواتير شراء</span><i class="fa fa-th-large"></i></a>
            </li>
            <li class="<?php echo e(isActiveRoute('Sales')); ?>">
                <a href="<?php echo e(url('/Sales')); ?>" style="font-size: 20px"><span class="nav-label"> فواتير بيع</span><i class="fa fa-th-large"></i></a>
            </li>


            <li class="<?php echo e(isActiveRoute('Users')); ?>">
                <a href="<?php echo e(url('/Users')); ?>" style="font-size: 20px"><span class="nav-label"> مستخدمين</span><i class="fa fa-th-large"></i></a>
            </li>

        </ul>

    </div>
</nav>
<script>
    $(".dropdown").click(function(){
        $(".fa-caret-down").toggleClass("rotate");
        $('.dropdown-menu').toggleClass("spaces");
    });
    // if ($('.navbar-static-side').width() >= 768)
    // $('.navbar-static-side').click(function(){
    //     $('.navbar-static-side').toggleClass('d-block');
    // });
</script>

