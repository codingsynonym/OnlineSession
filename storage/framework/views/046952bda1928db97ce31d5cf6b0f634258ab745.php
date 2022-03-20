<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Edit Faculty</title>
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
                    <h1>Faculties</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/config/faculties')); ?>">Faculties</a></li>
                        <li class="active">Edit</li>
                    </ol>
                </section>

                <!-- Main content -->
                <?php echo Form::open([ 'url' => 'admin/config/faculties/'.$faculty->FacultyID]); ?>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/config/faculties')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FacultyName">Faculty Name: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('FacultyName', $faculty->FacultyName, ['placeholder' => 'Enter Faculty Name', 'class' => 'form-control', 'id' => 'FacultyName']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="RefNo">Portal Ref #: </label>
                                                                <?php echo Form::text('RefNo', $faculty->RefNo, ['placeholder' => 'Enter Ref No', 'class' => 'form-control', 'id' => 'RefNo']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="DOB">Date of birth: </label>
                                                                <?php echo Form::text('DOB', ($faculty->DOB == '0000-00-00' ? null : $faculty->DOB), ['placeholder' => 'Select DOB', 'class' => 'form-control datepicker', 'id' => 'DOB']); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Cell">Cell: </label>
                                                                <?php echo Form::text('Cell', $faculty->Cell, ['placeholder' => 'Enter Cell', 'class' => 'form-control', 'id' => 'Cell']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ResidencePhone">Residence Phone: </label>
                                                                <?php echo Form::text('ResidencePhone', $faculty->ResidencePhone, ['placeholder' => 'Enter Residence Phone', 'class' => 'form-control', 'id' => 'ResidencePhone']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Email">Email: </label>
                                                                <?php echo Form::text('Email', $faculty->Email, ['placeholder' => 'Enter Email', 'class' => 'form-control', 'id' => 'Email']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Qualification">Qualification: </label>
                                                                <?php echo Form::text('Qualification', $faculty->Qualification, ['placeholder' => 'Enter Qualification', 'class' => 'form-control', 'id' => 'Qualification']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Country">Country: </label>
                                                                <?php echo Form::text('Country', $faculty->Country, ['placeholder' => 'Enter Country', 'class' => 'form-control', 'id' => 'Country']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="State">State: </label>
                                                                <?php echo Form::text('State', $faculty->State, ['placeholder' => 'Enter State', 'class' => 'form-control', 'id' => 'State']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="City">City: </label>
                                                                <?php echo Form::text('City', $faculty->City, ['placeholder' => 'Enter City', 'class' => 'form-control', 'id' => 'City']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Area">Area: </label>
                                                                <?php echo Form::text('Area', $faculty->Area, ['placeholder' => 'Enter Area', 'class' => 'form-control', 'id' => 'Area']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Address">Address: </label>
                                                                <?php echo Form::text('Address', $faculty->Address, ['placeholder' => 'Enter Address', 'class' => 'form-control', 'id' => 'Address']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="BackgroundColor">Color Code: </label>
                                                                <?php echo Form::text('BackgroundColor', $faculty->BackgroundColor, ['placeholder' => 'Enter Color Code', 'class' => 'form-control', 'id' => 'BackgroundColor']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Username">Username: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('Username', $faculty->Username, ['placeholder' => 'Enter Username', 'class' => 'form-control', 'id' => 'Username']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Password">Password: <span class="mandatory">(Leave blank if you do not want to change)</span></label>
                                                                <?php echo Form::text('Password', null, ['placeholder' => 'Enter Password', 'class' => 'form-control', 'id' => 'Password']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Status">Status</label><br>
                                                                <label>
                                                                    <?php echo FORM::radio('Status', 1, ($faculty->Status == 1 ? true : null)); ?>

                                                                    Active
                                                                </label>
                                                                <label>
                                                                    <?php echo FORM::radio('Status', 0, ($faculty->Status == 0 ? true : null)); ?>

                                                                    Deactive
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FacultyType">Faculty Type</label><br>
                                                                <label>
                                                                    <?php echo FORM::checkbox('PermFacultyType', '1', ($PermanentCheck == true ? true : null), ['id' => 'PermCheckbox']); ?>

                                                                    Permanent
                                                                </label>
                                                                <label>
                                                                    <?php echo FORM::checkbox('VisitFacultyType', '2', ($VisitingCheck == true ? true : null), ['id' => 'VisitCheckbox']); ?>

                                                                    Visiting
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="box box-primary perm-box" style="<?php echo ($PermanentCheck == true || old('PermFacultyType') ? '' : 'display:none;') ?>">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Permanent</h3>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="PermanentSalary">Salary: <span class="mandatory">*</span></label>
                                                <?php echo Form::text('PermanentSalary', $Permanent['Salary'], ['placeholder' => 'Enter Salary', 'class' => 'form-control', 'id' => 'PermanentSalary']); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="FixBatches">No. of batches: <span class="mandatory">*</span></label>
                                                <?php echo Form::text('FixBatches', $Permanent['FixBatches'], ['placeholder' => 'Enter No. of batches', 'class' => 'form-control', 'id' => 'FixBatches']); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="TotalYearlyLeaves">Total Yearly Leaves: <span class="mandatory">*</span></label>
                                                <?php echo Form::text('TotalYearlyLeaves', $Permanent['TotalYearlyLeaves'], ['placeholder' => 'Enter Total Yearly Leaves', 'class' => 'form-control', 'id' => 'TotalYearlyLeaves']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary visit-box" style="<?php echo ($VisitingCheck == true || old('VisitFacultyType') ? '' : 'display:none;') ?>">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Visiting</h3>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="VisitingSalary">Salary / 12 Sessions: <span class="mandatory">*</span></label>
                                                <?php echo Form::text('VisitingSalary', $Visiting['Salary'], ['placeholder' => 'Enter Salary', 'class' => 'form-control', 'id' => 'VisitingSalary']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Subjects</h3>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Modules">Subjects:</label><br>
                                                <?php
                                                foreach ($Curriculums as $curriculum) {
                                                    ?>
                                                    <h3><?php echo e($curriculum['CurriculumName']); ?></h3>
                                                    <div style="padding: 0 50px;">
                                                        <?php
                                                        foreach ($curriculum['Semesters'] as $semester) {
                                                            ?>
                                                            <h4 style="font-weight:500;"><?php echo e($semester['SemesterName']); ?></h4>
                                                            <div style="padding: 0 50px;">
                                                                <?php
                                                                foreach ($semester['Modules'] as $module) {
                                                                    ?>
                                                                    <label style="font-weight:400; font-size: 14px;"><?php echo Form::checkbox('ModuleIDs[]', $module['ModuleID'], ($module['IsAdded'] ? true : false)); ?> <?php echo e($module['ModuleName']); ?></label><br>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/config/faculties')); ?>'"><i class="fa fa-times"></i> Cancel</button>
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
                                            $('.datepicker').datepicker({
                                            autoclose: true,
                                                    format: 'yyyy-mm-dd',
                                                    todayHighlight: true
                                            });
                                            $(function () {
                                            $(".select2").select2();
                                            $('#PermCheckbox').on('ifChanged', function (event) {
                                            var perm = $('#PermCheckbox').filter(':checked').length;
                                            if (perm == 1) {
                                            $('.perm-box').slideDown();
                                            } else {
                                            $('.perm-box').slideUp();
                                            }
                                            });
                                            $('#VisitCheckbox').on('ifChanged', function (event) {
                                            var visit = $('#VisitCheckbox').filter(':checked').length;
                                            if (visit == 1) {
                                            $('.visit-box').slideDown();
                                            } else {
                                            $('.visit-box').slideUp();
                                            }
                                            });
                                            });
        </script>
    </body>
</html>
