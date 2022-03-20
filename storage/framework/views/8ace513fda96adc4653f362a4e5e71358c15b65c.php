<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Add New Expense</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/minimal/blue.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .bank{
                display: none;
            }
            .select2{
                width: 100% !important;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <!-- Left side column. contains the logo and sidebar -->
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
                    <h1>Expense</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/config/expense')); ?>">Expense</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo Form::open([ 'url' => 'admin/expenses/add']); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/expenses')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Category / Type</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Select Expense Head</label>
                                                                <?php echo e(Form::select("HeadID",$Expense_heads,null,["class"=>"form-control select2 head_id"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Select Expense Sub Head</label>
                                                                <?php echo e(Form::select("HeadID",["Select Expense Sub Head"],null,["class"=>"form-control select2 sub_head_id"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Select Expense Name</label>
                                                                <?php echo e(Form::select("ExpTypeID",$Expense_types,null,["class"=>"form-control select2 type"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 name">
                                                            <div class="form-group">
<label>Expense Name <span class="mandatory">(New)</span></label>
                                                                <?php echo e(Form::text("ExpenseName",null,["class"=>"form-control new_type","placeholder"=>"Enter Expense Name Here..."])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
<label>Payment Mode</label>
                                                                <?php echo e(Form::select("Mode",["Cash","Cheque"],null,["class"=>"form-control mode select2"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 bank">
                                                            <div class="form-group">
<label>Select Bank</label>
                                                                <?php echo e(Form::select("BankID",$banks,null,["class"=>"form-control select2"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 bank">
                                                            <div class="form-group">
<label>Cheque Number</label>
                                                                <?php echo e(Form::text("ChequeNumber",null,["class"=>"form-control","placeholder"=>"Enter Cheque Number"])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        
                                        <div class="col-md-4">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <?php echo e(Form::text("Date",date("Y-m-d"),["class"=>"form-control date","placeholder"=>"Select Date","autocomplete"=>"off"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Amount</label>
                                                                <?php echo e(Form::number("Amount",null,["class"=>"form-control amount","placeholder"=>"Enter Amount Here..."])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/expenses')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->
                    <?php echo FORM::close(); ?>

                </section>
                <!-- /.content -->
            </div>

            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- ./wrapper -->

        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/demo.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
            $('input[type="checkbox"], input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $(document).ready(function() {
                $('.select2').select2();
                $('.date').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true
                });
            });
            $('.type').on('select2:select', function (e) {
                var data = e.params.data;
                if(data.id == 0){
                    $(".name").fadeIn();
                }else{
                    $(".name").fadeOut();
                }
            });
            $('.mode').on('select2:select', function (e) {
                var data = e.params.data;
                if(data.id == 1){
                    $(".bank").fadeIn();
                }else{
                    $(".bank").fadeOut();
                }
            });
            
            $(".head_id").change(function(){
                if ($(this).val() != "0") {
                    $.ajax({
                    type: "POST",
                            url: "<?php echo e(url('admin/expenses/get_sub_heads')); ?>",
                            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                            dataType: "JSON",
                            data: {HeadID: $(this).val()},
                            success: function (data) {
                                $(".name").fadeIn();
                                options = "";
                                $.each(data,function(a,b){
                                    options+="<option value=\""+a+"\">"+b+"</option>"
                                });
                                $(".sub_head_id").html(options);
                                $('.select2').select2();
                            }
                    });
                } else {
                    
                }
            })
            $(".sub_head_id").change(function(){
                if ($(this).val() != "0") {
                    $.ajax({
                    type: "POST",
                            url: "<?php echo e(url('admin/expenses/get_types')); ?>",
                            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                            dataType: "JSON",
                            data: {HeadID: $(this).val()},
                            success: function (data) {
                                $(".name").fadeIn();
                                options = "";
                                $.each(data,function(a,b){
                                    options+="<option value=\""+a+"\">"+b+"</option>"
                                });
                                $(".type").html(options);
                                $('.select2').select2();
                            }
                    });
                } else {
                    
                }
            })
            
        </script>
    </body>
</html>
