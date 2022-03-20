<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Dashboard</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo e(url('resources/assets/web')); ?>/images/favicon.png" type="image/x-icon">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
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
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-header">
                    <h1> Dashboard </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section class="content">

<!--                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>S#</th>
                                    <th>Student ID</th>
                                    <th>Enrollment No.</th>
                                    <th>Student Name</th>
                                    <th>Monthly Fees</th>
                                    <th>Outstanding</th>
                                </tr>
                                <?php
                                $cnt = 1;
                                foreach ($ActiveStudents as $std) {
                                    $d1 = new \DateTime($std->AdmissionDate);
                                    $d2 = new \DateTime($endDateCurrMonth);
                                    $interval = date_diff($d1, $d2);
//                                    echo ($interval->m + ($interval->y * 12) + 1);
//                                    die;
                                    ?>
                                    <tr>
                                        <td><?php echo e($cnt); ?></td>
                                        <td><?php echo e($std->StudentID); ?></td>
                                        <td><?php echo e($std->StudentNo); ?></td>
                                        <td><?php echo e($std->StudentName); ?></td>
                                        <td><?php echo e($std->MonthlyFees); ?></td>
                                        <td><?php echo e($std->EnrollmentAmount + $std->MonthlyFees); ?></td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="text-center">Outstanding</h3>
                            <div class="col-md-6">
                                <div class="square">
                                    PKR 0
                                    <div></div>
                                    PKR 100,000
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="circle">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3 class="text-center">Internal</h3>
                            <div class="col-md-6">
                                <div class="square">
                                    PKR <?php echo number_format($InternalRecord->Received, 0); ?>
                                    <div></div>
                                    PKR <?php echo number_format($InternalRecord->Total, 0); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="circle">
                                    <?php echo e(number_format(($InternalRecord->Received / $InternalRecord->Total * 100),2)); ?>%
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3 class="text-center">Online Varsity</h3>
                            <div class="col-md-6">
                                <div class="square">
                                    PKR <?php echo number_format($InternalRecord->ReceivedOV, 0); ?>
                                    <div></div>
                                    PKR <?php echo number_format($InternalRecord->TotalOV, 0); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="circle">
                                    <?php echo e(number_format(($InternalRecord->ReceivedOV / $InternalRecord->TotalOV * 100),2)); ?>%
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Faculty</th>
                                        <th>File</th>
                                        <th>Batch Code</th>
                                        <th>Collection</th>
                                        <th>Month</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($collection as $collect) {
                                        ?>
                                        <tr>
                                            <th style="vertical-align:middle; width: 30%; border: 1px solid #000;"><?php echo e($collect['FacultyName']); ?></th>
                                            <td colspan="4" style="width:60%; border: 1px solid #000;">
                                                <table class="table table-bordered table-hover myTabe" style="margin-bottom: 0;">
                                                    <?php
                                                    if (!empty($collect['Batch']) && is_array($collect['Batch'])) {
                                                        foreach ($collect['Batch'] as $batch) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($batch['FileNo']); ?></td>
                                                                <td><?php echo e($batch['BatchCode']); ?></td>
                                                                <td><?php echo e($batch['Total']); ?></td>
                                                                <td><?php echo e($batch['Month']); ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
