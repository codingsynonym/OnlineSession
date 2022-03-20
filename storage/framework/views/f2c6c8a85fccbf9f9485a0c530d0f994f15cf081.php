<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Daily Centre Report</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/minimal/blue.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .table-responsive{
                overflow-x: scroll !important;
            }.mh-6{
                max-height: 600px;
            }
            .bg-grey{
                background: #f6b81c;
                color: #cecece;
                padding:0 !important;
            }
            .bg-grey>center>h3{
                font-size: 37px;
                font-weight: 600;
                margin: 0;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 2px;
            }
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 1px solid #9c9797 !important;
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
            .text-center {
                font-weight: bold;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            <?php echo $__env->make('admin/includes/front_alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>                            
                    </div>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-edit"></i> Daily Centre Report</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">DCR</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">DCR</h3>
                                    <?php echo Form::open([ 'url' => 'admin/dcr', 'id' => 'frm_list' ]); ?>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Date (From):</label>
                                                <input type="text" class="form-control date" name="DateFrom" value="<?php echo e($startDate); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Date (To):</label>
                                                <input type="text" class="form-control date" name="DateTo" value="<?php echo e($endDate); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button class="btn btn-success form-control" type="submit">Get Reports</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo FORM::close(); ?>


                                    <?php
                                    $TotalInquiries = 0;
                                    $TotalCareer = 0;
                                    $TotalSTC = 0;
                                    $TotalUpgrade = 0;
                                    $TotalEnroll = 0;
                                    $TotalBilling = 0;
                                    $TotalCollection = 0;
                                    $TotalAdmissionAmount = 0;
                                    $TotalMonthlyAmount = 0;
                                    $TotalProspectusAmount = 0;
                                    $TotalLateAmount = 0;
                                    $TotalExtraAmount = 0;
                                    $TotalReactivationAmount = 0;
                                    $TotalReattemptAmount = 0;
                                    $TotalCertificateAmount = 0;
                                    $TotalOVAmount = 0;
                                    $TotalNoOfDO = 0;
                                    if (!empty($dates)) {
                                        foreach ($dates as $index => $date) {
                                            $TotalInquiries += $date["Enquiries"];
                                            $TotalCareer += $date["Careers"];
                                            $TotalSTC += $date["Shorts"];
                                            $TotalUpgrade += $date["Upgrades"];
                                            $TotalEnroll += ($date["Careers"] + $date["Shorts"] + $date["Upgrades"]);
                                            $TotalBilling += $date["Billing"];
                                            $TotalCollection += ($date["Admission"] + $date["Monthly"] + $date["Prospectus"] + $date["Late"] + $date["Extra"] + $date["Reactivation"] + $date["Reattempt"] + $date["Certificate"] + $date["OV"]);
                                            $TotalAdmissionAmount += $date["Admission"];
                                            $TotalMonthlyAmount += $date["Monthly"];
                                            $TotalProspectusAmount += $date["Prospectus"];
                                            $TotalLateAmount += $date["Late"];
                                            $TotalExtraAmount += $date["Extra"];
                                            $TotalReactivationAmount += $date["Reactivation"];
                                            $TotalReattemptAmount += $date["Reattempt"];
                                            $TotalCertificateAmount += $date["Certificate"];
                                            $TotalOVAmount += $date["OV"];
                                            $TotalNoOfDO += $date["DO"];
                                        }
                                    }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Total</h3>
                                                </div>
                                                <div class="box-body total-report">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4>Total Enquiries: <span><?php echo e($TotalInquiries); ?></span></h4>
                                                            <h4>No. of Dropouts: <span><?php echo e($TotalNoOfDO); ?></span></h4>
                                                            <h4>Total Enrollments: <span><?php echo e($TotalEnroll); ?></span></h4>
                                                            <h4>Career: <span><?php echo e($TotalCareer); ?></span></h4>
                                                            <h4>STC: <span><?php echo e($TotalSTC); ?></span></h4>
                                                            <h4>Upgrades: <span><?php echo e($TotalUpgrade); ?></span></h4>
                                                            <h4>Total Billing: <span><?php echo e(number_format($TotalBilling, 0)); ?></span></h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>Total Collection: <span><?php echo e(number_format($TotalCollection, 0)); ?></span></h4>
                                                            <h4>Adm. + Reg. + Upgrade: <span><?php echo e(number_format($TotalAdmissionAmount, 0)); ?></span></h4>
                                                            <h4>Monthly: <span><?php echo e(number_format($TotalMonthlyAmount, 0)); ?></span></h4>
                                                            <h4>Prospectus: <span><?php echo e(number_format($TotalProspectusAmount, 0)); ?></span></h4>
                                                            <h4>Late Fees: <span><?php echo e(number_format($TotalLateAmount, 0)); ?></span></h4>
                                                            <h4>Extra: <span><?php echo e(number_format($TotalExtraAmount, 0)); ?></span></h4>
                                                            <h4>Reactivation: <span><?php echo e(number_format($TotalReactivationAmount, 0)); ?></span></h4>
                                                            <h4>Reattempt: <span><?php echo e(number_format($TotalReattemptAmount, 0)); ?></span></h4>
                                                            <h4>Certificate: <span><?php echo e(number_format($TotalCertificateAmount, 0)); ?></span></h4>
                                                            <h4>OV: <span><?php echo e(number_format($TotalOVAmount, 0)); ?></span></h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?php
                                                            if ($TotalCollection > 0) {
                                                                ?>
                                                                <h4>Internal Percentage: <span><?php echo e(number_format(($TotalMonthlyAmount / $TotalCollection * 100), 2)); ?>%</span></h4>
                                                                <h4>External Percentage: <span><?php echo e(number_format(($TotalAdmissionAmount / $TotalCollection * 100), 2)); ?>%</span></h4>
                                                                <h4>Other Percentage: <span><?php echo e(number_format((($TotalProspectusAmount + $TotalLateAmount + $TotalExtraAmount + $TotalReactivationAmount + $TotalReattemptAmount + $TotalCertificateAmount + $TotalOVAmount) / $TotalCollection * 100), 2)); ?>%</span></h4>
                                                                <h4>Royalty (5%): <span><?php echo e(number_format(($TotalCollection * 5 / 100), 0)); ?></span></h4>
                                                                <h4>Royalty (10%): <span><?php echo e(number_format(($TotalCollection * 10 / 100), 0)); ?></span></h4>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <h4>Internal Percentage: <span>0%</span></h4>
                                                                <h4>External Percentage: <span>0%</span></h4>
                                                                <h4>Other Percentage: <span>0%</span></h4>
                                                                <h4>Royalty (5%): <span>0</span></h4>
                                                                <h4>Royalty (10%): <span>0</span></h4>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-body table-responsive">
                                    <div class="wrapper1">
                                        <div class="div1"></div>
                                    </div>
                                    <div class="wrapper2">
                                        <div class="div2">
                                            <table id="dataList" class="display table table-bordered table-striped table-hover mt-30 text-nowrap" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3"></th>
                                                        <th colspan="4" class="bg-grey"><center><h3>Total Enrollment</h3></center></th>
                                                <th></th>
                                                <th colspan="10" class="bg-grey"><center><h3>Total Collection</h3></center></th>
                                                <th colspan="15" class=""></th>
                                                </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>S. No</th>
                                                        <th>Date</th>
                                                        <th>Enquiries</th>
                                                        <th>Career<br>Course</th>
                                                        <th>STC.</th>
                                                        <th>Upgrade </th>
                                                        <th>Total<br>Enroll.</th>
                                                        <th>Total<br>Billing</th>
                                                        <th>Admission +<br>Reg +<br>Upgrade</th>
                                                        <th>Monthly</th>
                                                        <th>Prospectus</th>
                                                        <th>Late<br>Fees</th>
                                                        <th>Extra</th>
                                                        <th>Reactivation<br>Fees</th>
                                                        <th>Re-Attempt<br>Fees</th>
                                                        <th>Certificate</th>
                                                        <th>OV</th>
                                                        <th>Total<br>Collection</th>
                                                        <th>No of<br>Dropouts</th>
                                                        <th>Revenue<br>Lost</th>
                                                        <th>Internal %</th>
                                                        <th>External %</th>
                                                        <th>Total %</th>
                                                        <th>Royalty<br>5%</th>
                                                        <th>Royalty<br>10%</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="mh-6">
                                                    <?php if (!empty($dates)) { ?>
                                                        <?php
                                                        foreach ($dates as $index => $date) {
                                                            $Collection = ($date["Admission"] + $date["Monthly"] + $date["Prospectus"] + $date["Late"] + $date["Extra"] + $date["Reactivation"] + $date["Reattempt"] + $date["Certificate"] + $date["OV"]);
                                                            ?>
                                                            <tr class="text-center">
                                                                <td><?php echo e($index+1); ?></td>
                                                                <td><?php echo e($date["Date"]); ?></td>
                                                                <td><b><?php echo e($date["Enquiries"]); ?></b></td>
                                                                <td><b><?php echo e($date["Careers"]); ?></b></td>
                                                                <td><b><?php echo e($date["Shorts"]); ?></b></td>
                                                                <td><b><?php echo e($date["Upgrades"]); ?></b></td>
                                                                <td><b><?php echo e($date["Careers"]+$date["Shorts"]+$date["Upgrades"]); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Billing"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Admission"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Monthly"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Prospectus"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Late"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Extra"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Reactivation"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Reattempt"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["Certificate"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($date["OV"], 0)); ?></b></td>
                                                                <td><b><?php echo e(number_format($Collection, 0)); ?></b></td>
                                                                <td><b><?php echo e($date["DO"]); ?></b></td>
                                                                <td>-</td>
                                                                <?php
                                                                if ($Collection > 0) {
                                                                    ?>
                                                                    <td><?php echo e(number_format(($date["Monthly"] / $Collection * 100),2)); ?>%</td>
                                                                    <td><?php echo e(number_format(($date["Admission"] / $Collection * 100),2)); ?>%</td>
                                                                    <td><?php echo e(number_format((($date["Prospectus"] + $date["Late"] + $date["Extra"] + $date["Reactivation"] + $date["Reattempt"] + $date["Certificate"] + $date["OV"]) / $Collection * 100),2)); ?>%</td>
                                                                    <td><?php echo e(number_format(($Collection * 5 / 100),0)); ?></td>
                                                                    <td><?php echo e(number_format(($Collection * 10 / 100),0)); ?></td>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <td>0%</td>
                                                                    <td>0%</td>
                                                                    <td>0%</td>
                                                                    <td>0%</td>
                                                                    <td>0%</td>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>S. No</th>
                                                        <th>Date</th>
                                                        <th>Enquiries</th>
                                                        <th>Career<br>Course</th>
                                                        <th>STC.</th>
                                                        <th>Upgrade </th>
                                                        <th>Total<br>Enroll.</th>
                                                        <th>Total<br>Billing</th>
                                                        <th>Admission +<br>Reg +<br>Upgrade</th>
                                                        <th>Monthly</th>
                                                        <th>Prospectus</th>
                                                        <th>Late<br>Fees</th>
                                                        <th>Extra</th>
                                                        <th>Reactivation<br>Fees</th>
                                                        <th>Re-Attempt<br>Fees</th>
                                                        <th>Certificate</th>
                                                        <th>OV</th>
                                                        <th>Total<br>Collection</th>
                                                        <th>No of<br>Dropouts</th>
                                                        <th>Revenue<br>Lost</th>
                                                        <th>Internal %</th>
                                                        <th>External %</th>
                                                        <th>Total %</th>
                                                        <th>Royalty<br>5%</th>
                                                        <th>Royalty<br>10%</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <div id="placeholder" style="width:500px;height:400px;"></div>

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- page script -->
        <script>
$('.date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$(function () {
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
