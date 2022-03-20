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
        <style>
            .user-img{
                width: 100%;
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
                    <h1>Students</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/students')); ?>">Students</a></li>
                        <li class="active">Edit</li>
                    </ol>
                </section>

                
                <?php echo e(Form::open([ 'url' => 'admin/students/'.$student->StudentID, 'method' => 'post', 'files' => true])); ?>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/students')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">

                                        <div class="col-md-8">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Info</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="StudentName">Student Name: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('StudentName', $student->StudentName, ['placeholder' => 'Enter Student Name', 'class' => 'form-control', 'id' => 'StudentName']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Cell">Student Cell: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('Cell', $student->Cell, ['placeholder' => 'Enter Student Cell', 'class' => 'form-control', 'id' => 'Cell']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Email">Student Email:</label>
                                                                <?php echo Form::text('Email', $student->Email, ['placeholder' => 'Enter Student Email', 'class' => 'form-control', 'id' => 'Email']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="DOB">Date of Birth: </label>
                                                                <?php echo Form::text('DOB', $student->DOB, ['placeholder' => 'Enter DOB', 'class' => 'form-control datepicker', 'id' => 'DOB', 'autocomplete' => 'off']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Gender">Gender: <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('Gender', ['1' => 'Male', '0' => 'Female'], $student->Gender, ['placeholder' => 'Select Gender', 'class' => 'form-control', 'id' => 'Gender']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FatherName">Father Name: </label>
                                                                <?php echo Form::text('FatherName', $student->FatherName, ['placeholder' => 'Enter Father Name', 'class' => 'form-control', 'id' => 'FatherName']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ParentCell">Parent Cell: </label>
                                                                <?php echo Form::text('ParentCell', $student->ParentCell, ['placeholder' => 'Enter Parent Cell', 'class' => 'form-control', 'id' => 'ParentCell']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="StudentNo">Student No: </label>
                                                                <?php echo Form::text('StudentNo', $student->StudentNo, ['placeholder' => 'Enter Student No', 'class' => 'form-control', 'id' => 'StudentNo']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Password">Password: </label>
                                                                <?php echo Form::text('Password', $student->Password, ['placeholder' => 'Enter Student Password', 'class' => 'form-control', 'id' => 'Password']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="AdmissionDate">Admission Date: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('AdmissionDate', $student->AdmissionDate, ['placeholder' => 'Select Admission Date', 'class' => 'form-control datepicker', 'id' => 'AdmissionDate', 'autocomplete' => 'off']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FeeStartAfter">Fee Start After months: <span class="mandatory">*</span></label>
                                                                <?php echo Form::number('FeeStartAfter', $FeeStartAfter, ['placeholder' => 'Select Fee Start', 'class' => 'form-control', 'id' => 'FeeStartAfter', 'min' => '0', 'max' => '9', ]); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CounselorID">Counselor: <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('CounselorID', $counselors, $student->CounselorID, ['placeholder' => 'Select Counselor', 'class' => 'form-control select2', 'id' => 'CounselorID']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="BatchID">Select File: </label>
                                                                <?php echo Form::select('BatchID', $files, $student->BatchID, ['placeholder' => 'Select File', 'class' => 'form-control select2', 'id' => 'BatchID']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Curriculum">Curriculum: <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('Curriculum', $curriculums, $student->CurriculumID, ['placeholder' => 'Select Curriculum', 'class' => 'form-control select2', 'id' => 'Curriculum']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="SemesterID">Semester: <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('SemesterID', $semesters, $student->SemesterID, ['placeholder' => 'Select Semester', 'class' => 'form-control select2', 'id' => 'SemesterID']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Setting</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Status">Status: <span style="font-size: 16px;"><?php echo e($statuses[$student->StudentStatus]); ?></span></label>
                                                        <br>
                                                        <button type="button" class="btn btn-sm btn-primary" onclick="location.href = '<?php echo e(url('admin/change-status/'.$student->StudentID)); ?>'"><i class="fa fa-edit"></i> Change Status</button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Status"> Picture</label>
                                                        <input name="Picture" id="Picture" type="file" />
                                                    </div>
                                                    <?php
                                                    if($student->Picture != "" && $student->Picture != null) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="CurrentPicture">Current Picture</label><br>
                                                        <?php echo \Html::image('/public/uploads/students/' . $student->Picture, $student->Picture, ['class' => 'user-img' ]); ?>

                                                        <input type="hidden" name="ImgName" value="<?php echo $student->Picture; ?>" />

                                                    </div>
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Accounts</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="ProspectusAmount">Prospectus Amount: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('ProspectusAmount', $student->ProspectusAmount, ['placeholder' => 'Enter Prospectus Amount', 'class' => 'form-control', 'id' => 'ProspectusAmount']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="EnrollmentAmount">Enrollment Amount: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('EnrollmentAmount', $student->EnrollmentAmount, ['placeholder' => 'Enter Enrollment Amount', 'class' => 'form-control', 'id' => 'EnrollmentAmount']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="Certification">Certification: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('Certification', $student->Certification, ['placeholder' => 'Enter Certification Amount', 'class' => 'form-control', 'id' => 'Certification']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="MonthlyFees">Monthly Fees: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('MonthlyFees', $student->MonthlyFees, ['placeholder' => 'Enter Monthly Fees', 'class' => 'form-control', 'id' => 'MonthlyFees']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="OvAmount">OV. Amount: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('OvAmount', $student->OvAmount, ['placeholder' => 'Enter OV. Amount', 'class' => 'form-control', 'id' => 'OvAmount']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <br>
                                                                <button class="btn btn-info" type="button" onclick="billing()">Calculate Billing</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h3 id="BookingConfirmationAmount"></h3>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                            if (isset($status_log) && !empty($status_log)) {
                                                ?>
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Status Log</h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-bordered table-hover">
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Reason</th>
                                                                    </tr>
                                                                    <?php
                                                                    foreach ($status_log as $st) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo e($st->Dated); ?></td>
                                                                            <td><?php echo e($statuses[$st->StudentStatus]); ?></td>
                                                                            <td><?php echo e($st->Reason); ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <!-- /.box -->
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/students')); ?>'"><i class="fa fa-times"></i> Cancel</button>
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
                                            
                                            function billing(){
                                            $.ajax({
                                            type: "POST",
                                                    url: "<?php echo e(url('admin/students/get-billing')); ?>",
                                                    'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                    data: {SemesterID: $('#SemesterID').val(), ProspectusAmount: $('#ProspectusAmount').val(), EnrollmentAmount: $('#EnrollmentAmount').val(), Certification: $('#Certification').val(), MonthlyFees: $('#MonthlyFees').val(), OvAmount: $('#OvAmount').val()},
                                                    dataType: "JSON",
                                                    success: function (data) {
                                                    if (data.Status) {
                                                    $('#BookingConfirmationAmount').html("Total Billing: " + data.BookingConfirmationAmount + "<br>" + data.Formula);
                                                    } else {
                                                    alert(data.Message);
                                                    }
                                                    },
                                                    complete: function () {

                                                    }
                                            });
                                            }
                                            
                                            $(function () {
                                            $(".select2").select2();
                                            $('#Curriculum').change(function() {
                                            $.ajax({
                                            type: "POST",
                                                    url: "<?php echo e(url('admin/students/get-semesters')); ?>",
                                                    'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                    data: {Curriculum: $('#Curriculum').val()},
                                                    dataType: "JSON",
                                                    success: function (data) {
                                                    if (data.Status) {
                                                    var myData = '<option value="">Select Semester</option>';
                                                    $.each(data.Semesters, function(index, val) {
                                                    myData += '<option value="' + val.SemesterID + '">' + val.SemesterName + '</option>';
                                                    })
                                                            $('#SemesterID').html(myData);
                                                    } else {
                                                    alert(data.Message);
                                                    }
                                                    },
                                                    complete: function () {

                                                    }
                                            });
                                            });
                                            });
                                            $('.datepicker').datepicker({
                                            autoclose: true,
                                                    format: 'yyyy-mm-dd',
                                                    todayHighlight: true
                                            });

        </script>
    </body>
</html>
