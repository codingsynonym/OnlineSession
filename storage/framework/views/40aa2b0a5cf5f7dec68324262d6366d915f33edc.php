<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Deposits</title>
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
            .update{
                display: none;
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
                    <h1><i class="fa fa-edit"></i> Deposits</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Deposits</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Deposits</h3>
                                </div>
                                <div class="box-body table-responsive">
                                    <?php echo e(Form::open(['url'=>'admin/deposits/add'])); ?>

                                    <div class="row add-new">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Account :</label>
                                                <?php echo e(Form::select("BankID",$banks,null,["class"=>"form-control"])); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Type :</label>
                                                <input type="text" class="form-control" name="Type" placeholder="Deposit Type Here...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Amount :</label>
                                                <input type="number" class="form-control" name="Amount" placeholder="Amount Here...">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Dated :</label>
                                                <input type="text" class="form-control datepicker" name="Date" placeholder="Select Date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button type="submit" class="btn btn-success form-control">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                    <?php echo e(Form::open(['url'=>'admin/deposits/update','id'=>"frm-update"])); ?>

                                    <input class="id" type="hidden" name="DepositID" value="0">
                                    <div class="row update">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Account :</label>
                                                <?php echo e(Form::select("BankID",$banks,null,["class"=>"form-control bank"])); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Type :</label>
                                                <input type="text" class="form-control type" name="Type" placeholder="Deposit Type Here...">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Amount :</label>
                                                <input type="number" class="form-control amount" name="Amount" placeholder="Amount Here...">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Dated :</label>
                                                <input type="text" class="form-control dated datepicker" name="Date" placeholder="Select Date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success form-control">Update</button><br><br>
                                                <button type="button" class="btn btn-warning form-control or-add">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                    <?php echo e(Form::open(['url'=>'admin/deposits/delete','id'=>'frm_list'])); ?>

                                    <button type="button" onclick="doDelete()" class="btn btn-danger pull-right">Delete</button><br><br>
                                    <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAllNone" class="all" /></th>
                                                <th>Deposit ID</th>
                                                <th>Account</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Dated</th>
                                                <th>Added</th>
                                                <th>Modified</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <?php echo e(Form::close()); ?>

                                </div>
                                <div class="box-footer"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
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

                                            $(function () {

                                                var data_list = $('#dataList').dataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        'type': 'POST',
                                                        'url': '<?php echo e(url(Request::path())); ?>',
                                                        'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}
                                                    },
                                                    "pageLength": 50,
                                                    "aLengthMenu": [[10, 25, 50, 100, <?php echo $recordsTotal; ?>], [10, 25, 50, 100, "All"]],
                                                    aoColumnDefs: [
                                                        {
                                                            bSortable: false,
                                                            aTargets: [0, -1]
                                                        }
                                                    ],
                                                    "order": [[1, 'desc']],
                                                    "oLanguage": {
                                                        "sSearch": "",
                                                        "sProcessing": "<img src='<?php echo e(url('resources/assets/admin')); ?>/images/loading-spinner-grey.gif'>"
                                                    },
                                                    "fnDrawCallback": function () {
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

                                                $(".filterStudents").change(function () {
                                                    data_list.fnReloadAjax("<?php echo e(url(Request::path())); ?>?Status=" + $(this).val());
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
                                                    message_box("Confirm", "This will delete all selected Data.<br>Are you sure?", "confirm", ok, null);
                                                } else
                                                {
                                                    message_box("Alert", "Please select Data to delete", "alert", null, null);
                                                }
                                            }
                                            
                                            function edit(id,bank,type,amount,dated){
                                                $(".add-new").hide();
                                                $(".update").show();
                                                $(".bank").val(bank);
                                                $(".type").val(type);
                                                $(".amount").val(amount);
                                                $(".dated").val(dated);
                                                $(".id").val(id);
                                            }
                                            $(".or-add").click(function(){
                                                $(".update").hide();
                                                $(".add-new").show();
                                            });
                                            $('.datepicker').datepicker({
                                                autoclose: true,
                                                format: 'yyyy-mm-dd',
                                                todayHighlight: true
                                            });
        </script>
    </body>
</html>
