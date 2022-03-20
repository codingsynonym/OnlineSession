<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Edit Student</title>
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
                    <h1>Students</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/students')); ?>">Students</a></li>
                        <li class="active">Edit</li>
                    </ol>
                </section>

                <!-- Main content -->
                <?php echo Form::open([ 'url' => 'admin/change-status/'.$student->StudentID]); ?>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/students/'.$student->StudentID)); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Setting</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="StudentID">Student ID:</label>
                                                        <?php echo Form::text('StudentID', $student->StudentID, ['placeholder' => 'Student ID', 'class' => 'form-control', 'id' => 'StudentID', 'readonly' => 'readonly']); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="StudentName">Student Name:</label>
                                                        <?php echo Form::text('StudentName', $student->StudentName, ['placeholder' => 'Student Name', 'class' => 'form-control', 'id' => 'StudentName', 'readonly' => 'readonly']); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Status">Status:  <span class="mandatory">*</span></label><br>

                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 1, ((int)$student->StudentStatus == 1) ? true : null); ?>

                                                            Active
                                                        </label>
                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 2, ((int)$student->StudentStatus == 2) ? true : null); ?>

                                                            Break
                                                        </label>
                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 3, ((int)$student->StudentStatus == 3) ? true : null); ?>

                                                            Dropout
                                                        </label>
                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 4, ((int)$student->StudentStatus == 4) ? true : null); ?>

                                                            Passout
                                                        </label>
                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 5, ((int)$student->StudentStatus == 5) ? true : null); ?>

                                                            Waiting
                                                        </label>
                                                        <label>
                                                            <?php echo Form::radio('StudentStatus', 6, ((int)$student->StudentStatus == 5) ? true : null); ?>

                                                            Exam + E-Project
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Dated">Dated: <span class="mandatory">*</span></label>
                                                        <?php echo Form::text('Dated', null, ['placeholder' => 'Dated', 'class' => 'form-control', 'id' => 'Dated', 'autocomplete' => 'off']); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Reason">Reason: </label>
                                                        <?php echo Form::textarea('Reason', null, ['placeholder' => 'Reason', 'rows' => '3', 'class' => 'form-control', 'id' => 'Reason']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Reasons List</h3>
                                                </div>
                                                <div class="box-body">
                                                    <h3>Dropout Reasons:</h3>
                                                    <ul>
                                                        <li>Family Issues</li>
                                                        <li>Health Issues</li>
                                                        <li>Lost Interest</li>
                                                        <li>No Contact</li>
                                                        <li>Not Interested</li>
                                                        <li>Other Studies</li>
                                                        <li>Understanding Issues</li>
                                                        <li>Changed the Field</li>
                                                        <li>Job</li>
                                                        <li>Financial Issues</li>
                                                        <li>He is not attending the online examinations</li>
                                                        <li>IT is not the right field</li>
                                                        <li>Transfer to other Branch</li>
                                                        <li>Moving abroad or other city</li>
                                                        <li>Not Serious in Study</li>
                                                        <li>Unknown Reason</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/students/'.$student->StudentID)); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php echo FORM::close(); ?>

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
                                            $(".select2").select2();
                                            $('#Dated').datepicker({
                                            autoclose: true,
                                                    format: 'yyyy-mm-dd',
                                                    todayHighlight: true
                                            });
        </script>
    </body>
</html>
