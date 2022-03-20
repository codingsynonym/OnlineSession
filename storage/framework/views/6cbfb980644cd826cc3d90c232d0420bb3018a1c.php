<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | CR Monthly Report</title>
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
            div.dataTables_processing {
                top: 0 !important;
                height: 100% !important;
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
                    <h1><i class="fa fa-edit"></i> CR Monthly Report</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">CR Monthly Report</li>
                    </ol>
                </section>
                <section class="content">
                    <?php echo Form::open([ 'url' => 'admin/cr-monthly', 'id' => 'frm_list' ]); ?>

                    <div class="box box-success">
                        <div class="box-body table-responsive">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Range Start</label>
                                        <input type="text" id="dateFrom" name="dateFrom" value="<?php echo e($startDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date From" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Range End</label>
                                        <input type="text" id="dateTo" name="dateTo" value="<?php echo e($endDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date To" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Select Date</label>
                                        <input type="text" id="CurrentDate" name="CurrentDate" value="<?php echo e($CurrentDate); ?>" class="DateFromTo form-control filterCR" placeholder="Select Date" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Get Result</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo FORM::close(); ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-body table-responsive">
                                    <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Total Collection</th>
                                                <th>No. of Inquiries</th>
                                                <th>No. of Admissions</th>
                                                <th>BC Amount</th>
                                                <?php
                                                $typeNames = [];
                                                foreach ($FeesTypes as $type) {
                                                    ?>
                                                    <th><?php echo e($type->TypeName); ?></th>
                                                    <?php
                                                    $typeNames[$type->TypeName] = 0;
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $TotalCollection = 0;
                                            $TotalNoOfInquiries = 0;
                                            $TotalNoOfAdmissions = 0;
                                            $TotalBCAmount = 0;
                                            if (!empty($MonthArray)) {
                                                foreach ($MonthArray as $mData) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo e($mData['MonthYear']); ?></td>
                                                        <td><?php echo e(number_format($mData['TotalCollection'],0)); ?></td>
                                                        <td><?php echo e(number_format($mData['NoOfInquiries'],0)); ?></td>
                                                        <td><?php echo e(number_format($mData['NoOfAdmissions'],0)); ?></td>
                                                        <td><?php echo e(number_format($mData['BCAmount'],0)); ?></td>
                                                        <?php
                                                        foreach ($mData['FeesDetails'] as $indx => $fee) {
                                                            ?>
                                                            <td><?php echo e(number_format($fee,0)); ?></td>
                                                            <?php
                                                            $typeNames[$indx] += $fee;
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                    $TotalCollection += $mData['TotalCollection'];
                                                    $TotalNoOfInquiries += $mData['NoOfInquiries'];
                                                    $TotalNoOfAdmissions += $mData['NoOfAdmissions'];
                                                    $TotalBCAmount += $mData['BCAmount'];
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th><?php echo e(number_format($TotalCollection, 0)); ?></th>
                                                <th><?php echo e(number_format($TotalNoOfInquiries, 0)); ?></th>
                                                <th><?php echo e(number_format($TotalNoOfAdmissions, 0)); ?></th>
                                                <th><?php echo e(number_format($TotalBCAmount, 0)); ?></th>
                                                <?php
                                                foreach ($typeNames as $t) {
                                                    ?>
                                                    <th><?php echo e(number_format($t,0)); ?></th>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="box-footer"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <?php echo FORM::close(); ?>

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/extensions/ReloadAjax/fnReloadAjax.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/demo.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- page script -->

        <script language="javascript">
var checkAll;
var checkboxes;

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

$('#CurrentDate').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});
        </script>
    </body>
</html>
