<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Internal Report</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo e(url('resources/assets/web')); ?>/images/favicon.png" type="image/x-icon">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">
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
            .tableFixHead          { overflow-y: auto; height: 1000px; }
            .tableFixHead thead th { position: sticky; top: 0; }

            table  { border-collapse: collapse; width: 100%; }
            th, td { padding: 8px 16px; }
            th     { background:#eee; }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 2px !important;}
            .mBorder {
                border: 2px solid #333;
                padding: 10px;
            }
            .mBorder h3.border {
                border-bottom: 2px solid #333;
            }
            #average-box {
                border: 1px solid #ccc;
                padding: 0 6px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-header">
                    <h1> Internal Report (<?php echo e($Title); ?>)</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <?php
                        if ($TotalInternal == 0) {
                            $TotalInternal = 1;
                        }
                        ?>
                        <div class="col-md-5">
                            <h3 style="font-weight:bold;">Actual Received</h3>
                        </div>
                        <div class="col-md-5">
                            <h3 style="font-weight:bold;">Actual Balance</h3>
                        </div>
                        <div class="col-md-2">
                            <h3 style="font-weight:bold;">Outstanding</h3>
                        </div>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                        <div class="col-md-5">
                            <h3>Total Internal <span style="font-weight:bold">Rs. <?php echo e(number_format(($TotalInternal == 1 ? 0 : $TotalInternal), 0)); ?></span></h3>
                            <h3>Current Month Actual Received <span style="font-weight:bold;">Rs. <?php echo e(number_format($ActualRecovered, 0)); ?> 
                                    (<?php echo e(number_format(($ActualRecovered / $TotalInternal * 100),2)); ?>%)</span></h3>
                            <div class="mBorder">
                                <h3 class="border">Internal Extra Received <span style="font-weight:bold; color: #23d823;">Rs. <?php echo e(number_format($TotalExtra, 0)); ?></span></h3>
                                <h3>Previous Month Outstanding: <span style="font-weight:bold; color: #23d823;">Rs. <?php echo e(number_format($ExtraOutstanding,0)); ?></span></h3>
                                <h3>Future Internal Received: <span style="font-weight:bold; color: #23d823;">Rs. <?php echo e(number_format($ExtraFuture,0)); ?></span></h3>
                            </div>
                            <h3>Total Internal Received <span style="font-weight:bold;">Rs. <?php echo e(number_format(($ActualRecovered + $TotalExtra), 0)); ?>

                                    (<?php echo e(number_format((($ActualRecovered + $TotalExtra) / $TotalInternal * 100),2)); ?>%)</span></h3>
                            <h3>Target Balance <span style="font-weight:bold;">Rs. <?php echo e(number_format(($TotalInternal - ($ActualRecovered + $TotalExtra)), 0)); ?></span></h3>
                        </div>
                        <div class="col-md-5">
                            <h3>Total Internal <span style="font-weight:bold">Rs. <?php echo e(number_format(($TotalInternal == 1 ? 0 : $TotalInternal), 0)); ?></span></h3>
                            <h3>Current Month Actual Received <span style="font-weight:bold;">Rs. <?php echo e(number_format($ActualRecovered, 0)); ?>

                                    (<?php echo e(number_format(($ActualRecovered / $TotalInternal * 100),2)); ?>%)</span></h3>
                            <h3>Internal Not Received <span style="font-weight:bold; color: #fc0000; ">Rs. <?php echo e(number_format($FeeNotPaid, 0)); ?>

                                    (<?php echo e(number_format(($FeeNotPaid / $TotalInternal * 100),2)); ?>%)</span></h3>
                            <h3>Total Balance <span style="font-weight:bold;">Rs. <?php echo e(number_format($FeeNotPaid, 0)); ?></span></h3>
                        </div>
                        <div class="col-md-2">
                            <h3>Total<br> <span style="font-weight:bold">Rs. <?php echo e(number_format(($TotalOutstanding + $ExtraOutstanding), 0)); ?></span></h3>
                            <h3>Received<br> <span style="font-weight:bold">Rs. <?php echo e(number_format($ExtraOutstanding, 0)); ?></span></h3>
                            <h3>Balance<br> <span style="font-weight:bold">Rs. <?php echo e(number_format($TotalOutstanding, 0)); ?></span></h3>
                            <div id="average-box">
                                <h3>Current Overdue<br> <span style="font-weight:bold">Rs. <?php echo e(number_format($FeeNotPaid, 0)); ?></span></h3>
                                <h3>Previous Overdue<br> <span style="font-weight:bold">Rs. <?php echo e(number_format(($TotalOutstanding - $FeeNotPaid), 0)); ?></span></h3>
                            </div>
                        </div>
                        <div class="col-md-2 pull-right">
                            <div id="average-box">
                                <h3 style="font-weight:bold;">Average</h3>
                                <hr>
                                <div class="bx">
                                    <h3><span style="font-weight:bold">Rs. <?php echo e(number_format($AverageFees, 0)); ?> of <?php echo e($Cnt); ?></span> Paying STC + Career Students</h3>
                                </div>
                                <div class="bx">
                                    <h3><span style="font-weight:bold">Rs. <?php echo e(number_format($AverageTotalInternalFees, 0)); ?> of <?php echo e($CareerStudentsCount); ?></span> Total Career Students</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h2><center>Total: <?php echo e($TotalStudentsCount); ?> (100%)</center></h2>
                        </div>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                        <div class="col-md-4">
                            <h3>6501 and above: <span style="font-weight:bold"><?php echo e($Range6500AndAbove.' ('.number_format(($Range6500AndAbove/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>6500: <span style="font-weight:bold"><?php echo e($Range6500.' ('.number_format(($Range6500/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>6000 to 6499: <span style="font-weight:bold"><?php echo e($Range6000And6499.' ('.number_format(($Range6000And6499/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h3>5500 to 5999: <span style="font-weight:bold"><?php echo e($Range5500And5999.' ('.number_format(($Range5500And5999/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>5000 to 5499: <span style="font-weight:bold"><?php echo e($Range5000And5499.' ('.number_format(($Range5000And5499/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>4500 to 4999: <span style="font-weight:bold"><?php echo e($Range4500And4999.' ('.number_format(($Range4500And4999/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>4000 to 4499: <span style="font-weight:bold"><?php echo e($Range4000And4499.' ('.number_format(($Range4000And4499/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>3500 to 3999: <span style="font-weight:bold"><?php echo e($Range3500And3999.' ('.number_format(($Range3500And3999/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3>3499 and below: <span style="font-weight:bold"><?php echo e($Range0And3499.' ('.number_format(($Range0And3499/$TotalStudentsCount*100),2).'%)'); ?></span></h3>
                        </div>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S#</th>
                                            <th>Student ID</th>
                                            <th>Enrollment No.</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                            <th>Cell</th>
                                            <th>Course</th>
                                            <th style="border-left:2px solid #666; border-top:2px solid #666;">BC Amount</th>
                                            <th style="border-top:2px solid #666;">Total Paid</th>
                                            <th style="border-right:2px solid #666; border-top:2px solid #666;">Total Balance</th>
                                            <th>Monthly Fees</th>
                                            <th>Installments</th>
                                            <th>File No</th>
                                            <th>Faculty</th>
                                            <th>Days</th>
                                            <th>Time</th>
                                            <th>Balance Till Today</th>
                                            <th>Prev Month Balance</th>
                                            <th style="border-left:2px solid #666; border-top:2px solid #666;">Curr Month</th>
                                            <th style="border-top:2px solid #666;">Paid (Curr Month)</th>
                                            <th style="border-right:2px solid #666; border-top:2px solid #666;">Curr Balance</th>
                                            <th>Fees Outstanding</th>
                                            <th>OV Outstanding</th>
                                            <th>Total with OV</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $cnt = 1;
                                    foreach ($ActiveStudents as $std) {
                                        ?>
                                        <tr>
                                            <td><?php echo e($cnt); ?></td>
                                            <td><a target="_blank" href="<?php echo e(url('admin/student-ledger?StudentID='.$std['StudentID'])); ?>"><?php echo e($std['StudentID']); ?></a></td>
                                            <td><?php echo e($std['StudentNo']); ?></td>
                                            <td><?php echo e($std['StudentName']); ?></td>
                                            <td><?php echo e($std['StudentStatus']); ?></td>
                                            <td><?php echo e($std['Cell']); ?></td>
                                            <td><?php echo e($std['Accounts']['StudentCourse']); ?></td>
                                            <td style="border-left:2px solid #666;"><?php echo e(number_format($std['Accounts']['BookingConfirmationAmount'],0)); ?></td>
                                            <td style="text-align: center;"><?php echo e(number_format($std['Accounts']['TotalPaidAmountInternalExternal'],0)); ?></td>
                                            <td style="text-align: center; border-right:2px solid #666;"><?php echo e(number_format(($std['Accounts']['BookingConfirmationAmount'] - $std['Accounts']['TotalPaidAmountInternalExternal']),0)); ?></td>
                                            <td style="background:#ede483;"><?php echo e($std['MonthlyFees']); ?></td>
                                            <td><?php echo e($std['Accounts']['NoOfInstallments']); ?></td>
                                            <td><?php echo e($std['FileNo']); ?></td>
                                            <td><?php echo e($std['FacultyName']); ?></td>
                                            <td><?php echo e($std['Days']); ?></td>
                                            <td><?php echo e($std['Time']); ?></td>
                                            <td style="text-align: center;"><?php echo e($std['Accounts']['AmountToBePaidTillToday']); ?></td>
                                            <td style="text-align: center;"><?php echo e($std['Accounts']['PrevPending']); ?></td>
                                            <td style="background:#ede483; text-align: center; border-left:2px solid #666;"><?php echo e($std['Accounts']['CurrMonthFeesForInternal']); ?></td>
                                            <td style="text-align: center; background: #89e489;"><?php echo e($std['Accounts']['Recovered']); ?></td>
                                            <td style="text-align: center;border-right:2px solid #666;"><?php echo e(number_format(($std['Accounts']['CurrMonthFeesForInternal'] - $std['Accounts']['Recovered']),0)); ?></td>
                                            <td style="background: #e45a5a; color: #fff; text-align: center;"><?php echo e($std['Accounts']['TotalWithoutOV']); ?></td>
                                            <td style="text-align: center;"><?php echo e($std['Accounts']['OVOutstanding']); ?></td>
                                            <td style="text-align: center;"><?php echo e($std['Accounts']['TotalWithOV']); ?></td>
                                        </tr>
                                        <?php
                                        $cnt++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!--<script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/chartjs/Chart.min.js"></script>-->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

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
    $('#dataList').dataTable({
        "pageLength": <?php echo count($ActiveStudents); ?>,
        "aLengthMenu": [[10, 25, 50, 100, <?php echo count($ActiveStudents); ?>], [10, 25, 50, 100, "All"]],
        "order": [[0, 'asc']],
        "oLanguage": {
            "sSearch": "",
            "sProcessing": "<img src='<?php echo e(url('resources/assets/admin')); ?>/images/loading-spinner-grey.gif'>"
        },
    });
    $('#dataList_filter input').attr('placeholder', 'Search...');
});

        </script>

    </body>
</html>
