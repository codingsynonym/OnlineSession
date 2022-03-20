<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Attendance</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo e(url('resources/assets/web')); ?>/images/favicon.png" type="image/x-icon">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            /*            .info-box-content {
                            padding: 11% 22% !important;
                        }*/
            .info-box-content {
                padding-top: 11% !important;
            }
            .bg-aqua {
                background-color: #f8b239 !important;
            }
            .myTabe td {
                padding: 3px 10px !important;
            }
            .circle {
                border: 1px solid;
                border-radius: 50%;
                min-height: 70px;
                padding: 49px 0;
                text-align: center;
                font-size: 50px;
            }
            .square {
                border: 1px solid;
                min-height: 70px;
                padding: 53px 0;
                text-align: center;
                font-size: 22px;
            }
            .square div {
                background: #000;
                height: 1px;
                width: 100%
            }
            .table .main-title {
                background: #333;
                color: #fff;
                font-size: 22px;
                text-align: center;
            }
            .table .gray-title, .mcol-gray-title th {
                background: #A6A6A6;
                color: #fff;
                font-size: 14px;
                text-align: center;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 2px;
            }
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 1px solid #000000;
            }
            .width-class th {
                width: 12% !important;
                vertical-align: middle !important;
            }
            th {
                vertical-align: middle !important;
            }
            .mCols th {
                width: 1.764% !important;
            }
            @media  print {
                /*                .print-hidden {
                                    display: none;
                                }*/
                @page  { margin: 0; }
                body * { visibility: hidden; }
                .timetable, .timetable * { visibility: visible; width: 98% !important; }

                .table .main-title {
                    background: #333 !important;
                    color: #fff !important;
                    text-align: center !important;
                    border: 1px solid #000 !important;
                }
                .table .gray-title, .mcol-gray-title th {
                    background: #A6A6A6 !important;
                    color: #fff !important;
                    font-size: 14px !important;
                    text-align: center !important;
                }
                .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                    padding: 2px !important;
                }
                .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                    border: 1px solid #000000 !important;
                }
                .width-class th {
                    width: 12% !important;
                    vertical-align: middle !important;
                }
                th {
                    vertical-align: middle !important;
                }
                .mCols th {
                    width: 1.764% !important;
                }

            }
            .mCols th.w2{
                width: 2.94% !important;
            }
            .txt-center{
                text-align: center;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content ">
                    <?php echo Form::open([ 'url' => 'admin/attendance', 'class' => 'print-hidden']); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="BatchID">Batch: </label>
                                <?php echo Form::select('BatchID', $batches, null, ['placeholder' => 'Select Batch', 'class' => 'form-control select2', 'id' => 'BatchID',"onChange"=>"$('.print-hidden').submit()"]); ?>

                            </div>
                        </div>
<!--                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-success form-control">Generate Attendance Sheet</button>
                            </div>
                        </div>-->
                    </div>
                    <?php echo FORM::close(); ?>

                    <div class="row timetable">
                        <div class="col-md-12">
                            <?php
                            if (isset($attendance['Batch']) && count($attendance['Batch']) > 0) {
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="21" class="main-title" style=" background: #333; color: #fff;">Aptech Computer Education</th>
                                    </tr>
                                    <tr>
                                        <th colspan="21" class="main-title">A Division of Aptech Worldwide Inc.</th>
                                    </tr>
                                    <tr>
                                        <th colspan="21" class="gray-title">STUDENT ATTENDANCE REGISTER</th>
                                    </tr>
                                    <tr class="width-class">
                                        <th height="50px" colspan="2" class="gray-title">Centre Name:</th>
                                        <th class="text-center">Aptech Tariq Road</th>
                                        <th style="width:10% !important;" class="gray-title">Time Slot/ Days:</th>
                                        <th class="text-center" colspan="2"><?php echo e($attendance['Batch']['Days'] . ' ' . $attendance['Batch']['Time']); ?></th>
                                        <th colspan="4" class="gray-title">Course / Module:</th>
                                        <th class="text-center" style="width:17% !important;" colspan="7"><?php echo e($attendance['Batch']['ModuleName']); ?></th>
                                        <th colspan="2" class="gray-title">File:</th>
                                        <th class="text-center" style="width:10% !important;" colspan="2"><?php echo e($attendance['Batch']['FileNo']); ?></th>
                                    </tr>
                                    <tr class="width-class">
                                        <th height="50px" colspan="2" class="gray-title">Start Date:</th>
                                        <th class="text-center"><?php echo e($attendance['Batch']['ModStartDate']); ?></th>
                                        <th style="width:10% !important;" class="gray-title">Month:</th>
                                        <th class="text-center" colspan="2"><?php echo e($attendance['Batch']['Month']); ?></th>
                                        <th colspan="4" class="gray-title">Curriculum:</th>
                                        <th class="text-center" style="width:17% !important;" colspan="7"><?php echo e($attendance['Batch']['CurriculumName']); ?></th>
                                        <th colspan="2" class="gray-title">Batch Code:</th>
                                        <th class="text-center" style="width:10% !important;" colspan="2"><?php echo e($attendance['Batch']['BatchCode']); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width:4% !important;" rowspan="2" class="gray-title">Sr. No.</th>
                                        <th style="width:8% !important;" rowspan="2"  class="gray-title">Roll No.</th>
                                        <th style="width:12% !important;" rowspan="2" class="gray-title">Name</th>
                                        <th style="width:10% !important;" rowspan="2" class="gray-title">Course</th>
                                        <th class="gray-title" colspan="15">Session Number Attended by Student</th>
                                        <th class="gray-title" rowspan="2" colspan="2">Internal Test Marks</th>
                                    </tr>
                                    <!--<tr class="mCols">-->
<!--                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>-->
                                        
                                    <!--</tr>-->
                                    <tr class="mCols">
                                        <?php
                                        $cnt = 1;
                                        foreach ($attendance['Batch']['DaysDates'] as $day) {
                                            ?>
                                        <th class="txt-center"><?php echo $day['Session']; ?></th>
                                            <?php
                                            $cnt++;
                                        }
                                        if ($cnt < 15) {
                                            for ($i = $cnt; $i <= 15; $i++) {
                                                ?>
                                                <th>&nbsp;</th>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    $cnt = 1;
                                    foreach ($attendance['Batch']['Students'] as $stud) {
                                        ?>
                                        <tr class="mCols">
                                            <th><?php echo e($cnt); ?></th>
                                            <th><?php echo e($stud->StudentNo); ?></th>
                                            <th><?php echo e($stud->StudentName); ?></th>
                                            <th><?php echo e($stud->CourseCode); ?></th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                            <th class="w2">&nbsp;</th>
                                        </tr>
                                        <?php
                                        $cnt++;
                                    }
                                    if ($cnt < 20) {
                                        for ($i = $cnt; $i <= 20; $i++) {
                                            ?>
                                            <tr class="mCols">
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr class="mCols mcol-gray-title">
                                        <th colspan="4" style="text-align:left !important;" class="gray-title">Days:</th>
                                        <?php
                                        $cnt = 1;
                                        foreach ($attendance['Batch']['DaysDates'] as $day) {
                                            ?>
                                        <th><?php echo $day['Day']; ?><?= $day['Day'] == 'Fri' ? '&nbsp;&nbsp;' : '' ?></th>
                                            <?php
                                            $cnt++;
                                        }
                                        if ($cnt < 20) {
                                            for ($i = $cnt; $i <= 17; $i++) {
                                                ?>
                                                <th>&nbsp;</th>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr class="mCols mcol-gray-title">
                                        <th colspan="4" style="text-align:left !important;" class="gray-title">Date:</th>
                                        <?php
                                        $cnt = 1;
                                        foreach ($attendance['Batch']['DaysDates'] as $day) {
                                            ?>
                                            <th><?php echo $day['Date']; ?></th>
                                            <?php
                                            $cnt++;
                                        }
                                        if ($cnt < 20) {
                                            for ($i = $cnt; $i <= 17; $i++) {
                                                ?>
                                                <th>&nbsp;</th>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr class="mCols">
                                        <th colspan="4" style="text-align:left !important;">Faculty Name :- <?php echo e($attendance['Batch']['FacultyName']); ?></th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr class="mCols">
                                        <th colspan="4" style="text-align:left !important;">Centre Head's Signature: -</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr class="mCols mcol-gray-title">
                                        <th colspan="4" class="gray-title" style="text-align:left !important;">Session covered as per CPC</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr class="mCols mcol-gray-title">
                                        <th colspan="4" class="gray-title" style="text-align:left !important;">Actual session covered</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr class="mCols">
                                        <th colspan="4" class="gray-title" style="text-align:left !important;">Class In</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr class="mCols">
                                        <th colspan="4" class="gray-title" style="text-align:left !important;">Class Out</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!--<script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/chartjs/Chart.min.js"></script>-->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.full.min.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script language="javascript">
$('#dateFrom').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$('#dateTo').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$(function () {
    $(".select2").select2();
});
        </script>

    </body>
</html>
