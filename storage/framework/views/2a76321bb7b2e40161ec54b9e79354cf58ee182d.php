<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Assign Student No.</title>
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
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/minimal/blue.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .user-img{
            width:50px;
            height:50px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .user-img:hover {opacity: 0.7;}

        .zoominimg{
            width:100%;
        }
    </style>
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
                        <li><a href="<?php echo e(url('admin/dashboard')); ?>">Dashboard</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                
                <section class="content">
                    <?php echo Form::open([ 'url' => 'admin/assign-studentno']); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Assign</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/dashboard')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="StudentID">Students: <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('StudentID', $students, null, ['placeholder' => 'Select Student', 'class' => 'form-control select2', 'id' => 'StudentID']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="StudentNo">Student No.: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('StudentNo', null, ['placeholder' => 'Enter Student No.', 'class' => 'form-control', 'id' => 'StudentNo']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if (!empty($UnregStudents)) {
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-bordered table-hover">
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Reg ID</th>
                                                                        <th>Picture</th>
                                                                        <th>Student Name</th>
                                                                        <th>Cell</th>
                                                                        <th>Email</th>
                                                                        <th>File No</th>
                                                                        <th>Batch Code</th>
                                                                        <th>Day / Time</th>
                                                                        <th>Faculty Name</th>
                                                                    </tr>
                                                                    <?php
                                                                    $cnt = 1;

                                                                    foreach ($UnregStudents as $std) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo e($cnt); ?></td>
                                                                            <td><?php echo e($std->StudentID); ?></td>
                                                                            <td>
                                                                                <a data-toggle="modal" data-target="#modID<?php echo e($std->StudentID); ?>">
                                                                                    <?php echo \Html::image('/public/uploads/students/' . $std->Picture, $std->Picture, ['class' => 'user-img' ]); ?>

                                                                                </a>
                                                                            </td>
                                                                            
                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="modID<?php echo e($std->StudentID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e($std->StudentName); ?></h4>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center" style="padding:0">
                                                                                    <?php echo \Html::image('/public/uploads/students/' . $std->Picture, $std->Picture, ['class' => 'zoominimg' ]); ?>


                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            <td><?php echo e($std->StudentName); ?></td>
                                                                            <td><?php echo e($std->Cell); ?></td>
                                                                            <td><?php echo e($std->Email); ?></td>
                                                                            <td><?php echo e($std->FileNo); ?></td>
                                                                            <td><?php echo e($std->BatchCode); ?></td>
                                                                            <td><?php echo e($std->Days.' '.$std->Time); ?></td>
                                                                            <td><?php echo e($std->FacultyName); ?></td>
                                                                        </tr>
                                                                        <?php
                                                                        $cnt++;
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/dashboard')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.col (right) -->
                    </div>
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
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.full.min.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
                                            $('input[type="checkbox"], input[type="radio"]').iCheck({
                                            checkboxClass: 'icheckbox_minimal-blue',
                                                    radioClass: 'iradio_minimal-blue'
                                            });
                                            $(function () {
                                            $(".select2").select2();
                                            });
        </script>
    </body>
</html>
