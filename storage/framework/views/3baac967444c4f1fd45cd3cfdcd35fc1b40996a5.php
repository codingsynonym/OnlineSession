<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | CR</title>
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
                    <h1><i class="fa fa-edit"></i> CR</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">CR</li>
                    </ol>
                </section>
                <?php echo Form::open([ 'url' => 'admin/cr/delete', 'id' => 'frm_list' ]); ?>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">CR</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-sm btn-danger btnTools" onClick="doDelete()" id="btnDelete"><i class="fa fa-trash-o"></i> Delete</button>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" id="dateFrom" value="<?php echo e($startDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date From" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" id="dateTo" value="<?php echo e($endDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date To" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button class="btn btn-success get-result" type="button">Get Result</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-4">
                                            <h3>Total Amount: <span style="font-size:120%; font-weight: bold;" id="totalAmount"></span></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Admission: <span style="font-size: 120%; font-weight: bolder;" class="feetypes" id="type-1"></span></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Monthly: <span style="font-size: 120%; font-weight: bolder;" class="feetypes" id="type-7"></span></h3>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <?php
                                        foreach ($feesTypes as $type) {
                                            if ($type->FeeTypeID != 1 && $type->FeeTypeID != 7) {
                                                ?>
                                                <div class="col-md-3">
                                                    <h4><?php echo e($type->TypeName); ?>: <span style="font-size: 120%; font-weight: bolder;" class="feetypes" id="type-<?php echo e($type->FeeTypeID); ?>"></span></h4>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-12 counselors">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAllNone" class="all" /></th>
                                                <th>Fee ID</th>
                                                <th>Student Reg No</th>
                                                <th>Enroll. No.</th>
                                                <th>Student Name</th>
                                                <th>Course</th>
                                                <th>Receipt No</th>
                                                <th>Amount</th>
                                                <th>Fees Type</th>
                                                <th>Dated</th>
                                                <th>Added</th>
                                                <th>Modified</th>
                                                <th></th>
                                            </tr>
                                        </thead>
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


                                            $(function () {

                                                var data_list = $('#dataList').dataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        'type': 'POST',
                                                        'url': '<?php echo e(url(Request::path())); ?>?DateFrom=' + $('#dateFrom').val() + '&DateTo=' + $('#dateTo').val(),
                                                        'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}
                                                    },
                                                    "pageLength": <?php echo $recordsTotal; ?>,
                                                    "aLengthMenu": [[10, 25, 50, 100, 1000, <?php echo $recordsTotal; ?>], [10, 25, 50, 100, 1000, "All"]],
                                                    aoColumnDefs: [
                                                        {
                                                            bSortable: false,
                                                            aTargets: [0, 12]
                                                        }
                                                    ],
                                                    "order": [[1, 'desc']],
                                                    "oLanguage": {
                                                        "sSearch": "",
                                                        "sProcessing": "<img src='<?php echo e(url('resources/assets/admin')); ?>/images/loading-spinner-grey.gif'>"
                                                    },
                                                    "fnDrawCallback": function (myData) {
                                                        $('#totalAmount').html("");
                                                        $('.feetypes').html("");
                                                        $('.counselors').html("");

                                                        $('#totalAmount').html(myData.json.totalAmount);
                                                        $.each(myData.json.FeesBreakDown, function (a_key, a_value) {
                                                            $('#type-' + a_key).html("Rs. " + a_value['Amount'] + " (" + a_value['Percentage'] + ")");
                                                        });
                                                        var counselors = "";
                                                        $.each(myData.json.Counselors, function (c_key, c_value) {
                                                            counselors += '<div class="col-md-3"><h3>' + c_value.CounselorName + ' ('+(c_value.CPISM + c_value.DISM + c_value.HDSE + c_value.ADSE + c_value.OST + c_value.STC + c_value.Upgrade)+'):<br><span style="font-weight:bold;">Rs. ' + c_value.TotalAmount + "</span></h3>CPISM: " + c_value.CPISM + " (Rs. " + c_value.CpismAmount + ")<br>DISM: " + c_value.DISM + " (Rs. " + c_value.DismAmount + ")<br>HDSE: " + c_value.HDSE + " (Rs. " + c_value.HdseAmount + ")<br>ADSE: " + c_value.ADSE + " (Rs. " + c_value.AdseAmount + ")<br>OST: " + c_value.OST + " (Rs. " + c_value.OstAmount + ")<br>STC: " + c_value.STC + " (Rs. " + c_value.StcAmount + ")<br>Upgrade: " + c_value.Upgrade + " (Rs. " + c_value.UpgradeAmount + ")</div>";
                                                        });
                                                        $('.counselors').html(counselors);

                                                        checkAll = $('input.all');
                                                        checkboxes = $('input.check');

                                                        $('input[type="checkbox"], input[type="radio"]').iCheck({
                                                            checkboxClass: 'icheckbox_minimal-blue',
                                                            radioClass: 'iradio_minimal-blue'
                                                        });
                                                        checkAll.on('ifChecked ifUnchecked', function (event) {
                                                            if (event.type == 'ifChecked') {
                                                                checkboxes.iCheck('check');
                                                            } else {
                                                                checkboxes.iCheck('uncheck');
                                                            }
                                                        });

                                                        checkboxes.on('ifChanged', function (event) {
                                                            if (checkboxes.filter(':checked').length == checkboxes.length) {
                                                                checkAll.prop('checked', 'checked');
                                                            } else {
                                                                checkAll.removeProp('checked');
                                                            }
                                                            checkAll.iCheck('update');
                                                        });

                                                        $(".btnTools").prop("disabled", !(parseInt(data_list.fnGetData().length) > 0));
                                                    }
                                                });

                                                $(".get-result").click(function () {
                                                    data_list.fnReloadAjax('<?php echo e(url(Request::path())); ?>?DateFrom=' + $('#dateFrom').val() + '&DateTo=' + $('#dateTo').val());
                                                    data_list.fnClearTable(0);
                                                    data_list.fnDraw();
                                                });

                                                $('#dataList_filter input').attr('placeholder', 'Search...');
                                            });

                                            function doDelete()
                                            {
                                                if (checkboxes.filter(':checked').length > 0)
                                                {
                                                    ok = function () {
                                                        $("#frm_list").submit();
                                                    };
                                                    message_box("Confirm", "This will delete all selected Records.<br>Are you sure?", "confirm", ok, null);
                                                } else
                                                {
                                                    message_box("Alert", "Please select Record to delete", "alert", null, null);
                                                }
                                            }
        </script>
    </body>
</html>
