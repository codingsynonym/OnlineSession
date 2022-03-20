<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Permanent Faculty Attendance</title>
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
            .wrapper1, .wrapper2 { width: 100%; overflow-x: scroll; overflow-y: hidden; }
            .wrapper1 { height: 20px; }
            .wrapper2 {}
            .div1 { height: 20px; }
            .div2 { overflow: none; }
            .total-report span {
                font-size:120%;
                font-weight: bolder;
            }
            thead th, tfoot th {
                vertical-align: text-top !important;
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
            .att-input{
                width: 30px;
            }
            .mt-47{
                margin-top: -47px;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            <?php echo $__env->make('admin/includes/front_alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>                            
                    </div>
                </section>
                <section class="content  table-responsive">
                    <div class="row timetable">
                        <div class="col-md-12">
                            <?php echo e(Form::open(['url' => 'admin/perm-faculty-attendance?FacultyType='.$FacultyType])); ?>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="DateFrom">Select Month: </label>
                                        <?php echo Form::text('DateFrom', $DateFrom, ['placeholder' => 'Select Month', 'class' => 'form-control datepicker', 'id' => 'DateFrom', 'autocomplete' => 'off']); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Month">&nbsp;</label>
                                        <button type="submit" class="form-control btn btn-success">Get Attendance</button>
                                    </div>
                                </div>
                            </div>

                            <?php echo e(Form::close()); ?>



                            <?php echo e(Form::open(['url' => 'admin/mark-perm-fac-attendance?FacultyType='.$FacultyType])); ?>

                            <div>
                                <?php
                                foreach ($attendancelovs as $indx => $form) {
                                    if ($indx != "" && $indx != '-') {
                                        ?>
                                        <p style="background: <?php echo e($form['Background']); ?>; color: <?php echo e($form['Text']); ?>; padding:4px; width:25%;"><span style="width:50px; display:inline-block;"><?php echo $indx .':</span> '.$form['FullTerm']; ?></p>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <?php echo Form::hidden('DateFrom', $DateFrom, []); ?>

                            <div class="wrapper1">
                                <div class="div1"></div>
                            </div>
                            <div class="wrapper2">
                                <div class="div2">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="32" class="main-title" style=" background: #333; color: #fff;">Aptech Computer Education</th>
                                        </tr>
                                        <tr>
                                            <th colspan="32" class="main-title">A Division of Aptech Worldwide Inc.</th>
                                        </tr>
                                        <tr>
                                            <th colspan="32" class="gray-title">PERMANENT FACULTY ATTENDANCE</th>
                                        </tr>
                                        <tr>
                                            <th>Faculty Name</th>
                                            <th>Days Time</th>
                                            <?php
                                            foreach ($DatesArray as $dateindex => $date) {
                                                ?>
                                                <th style="text-align:center;"><?php echo $dateindex.'<br>'.$date; ?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>

                                        <?php
                                        foreach ($StaffArray as $staff) {
                                            ?>
                                            <tr>
                                                <?php
                                                foreach ($staff['FacultyBatches'] as $btch) {
                                                    if (!empty($btch)) {
                                                        ?>
                                                    <tr>
                                                        <th><?php echo $staff['FacultyName'] ?></th>
                                                        <th><?php echo e($btch['Days'].' '.$btch['Time']); ?></th>
                                                        <?php
                                                        foreach ($btch['Dates'] as $index => $date) {
                                                            $a = strpos($btch['Days'], $btch['OnlyDays'][$index][0]);
                                                            if ($a != NULL || $a === 0) {
                                                                ?>
                                                            <input type="hidden" name="abcd" value="<?php echo e($date); ?>" />
                                                            <th><?php echo e(Form::select('Attendance_' . $btch['MonthFacultyBatchID'] . '_' . $btch['OnlyDates'][$index], $lovs, $date, ['style' => 'background:' . $attendancelovs[$date]['Background'] . '; color: ' . $attendancelovs[$date]['Text'] . ';'])); ?></th>
                                                            <?php
                                                        } else {
                                                            echo '<th>' . (strpos($btch['Days'], $btch['OnlyDays'][$index][0])) . '</th>';
                                                        }
                                                    }
                                                    ?>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <tr>
                                            <th>Faculty Name</th>
                                            <th>Days Time</th>
                                            <?php
                                            foreach ($DatesArray as $dateindex => $date) {
                                                ?>
                                                <th style="text-align:center;"><?php echo $dateindex.'<br>'.$date; ?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Save</button>
                            <?php echo e(Form::close()); ?>

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
$('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$(function () {

    $(".select2").select2();

    $('.wrapper1').on('scroll', function (e) {
        $('.wrapper2').scrollLeft($('.wrapper1').scrollLeft());
    });
    $('.wrapper2').on('scroll', function (e) {
        $('.wrapper1').scrollLeft($('.wrapper2').scrollLeft());
    });
});
$(window).on('load', function (e) {
    $('.div1').width($('table').width());
    $('.div2').width($('table').width());
});
        </script>

    </body>
</html>
