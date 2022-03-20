<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Upgrade Student</title>
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
                    <h1>Upgrade Student</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/students')); ?>">Students</a></li>
                        <li class="active">Upgrade</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- general form elements -->
                                    <?php echo Form::open([ 'url' => 'admin/upgrade-search-student']); ?>

                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Search Student</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-10">

                                                    <div class="form-group">
                                                        <?php echo Form::text('Keyword', null, ['placeholder' => 'Search here...', 'class' => 'form-control', 'id' => 'Keyword']); ?>

                                                    </div>

                                                </div>
                                                <div class="col-md-2">

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Search</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                            if (isset($StudentDetails) && !empty($StudentDetails)) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-bordered table-hover">
                                                            <tr>
                                                                <th></th>
                                                                <th>Reg ID</th>
                                                                <th>Student No</th>
                                                                <th>Student Name</th>
                                                                <th>Father Name</th>
                                                                <th>Cell</th>
                                                                <th>Email</th>
                                                                <th>Course</th>
                                                            </tr>
                                                            <?php
                                                            foreach ($StudentDetails as $std) {
                                                                ?>
                                                                <tr>
                                                                    <td><input type="radio" class="RadioStudentID" name="RadioStudentID" value="<?php echo e($std->StudentID); ?>" /></td>
                                                                    <td><?php echo e($std->StudentID); ?></td>
                                                                    <td><?php echo e($std->StudentNo); ?></td>
                                                                    <td><?php echo e($std->StudentName); ?></td>
                                                                    <td><?php echo e($std->FatherName); ?></td>
                                                                    <td><?php echo e($std->Cell); ?></td>
                                                                    <td><?php echo e($std->Email); ?></td>
                                                                    <td><?php echo e($std->SemesterName); ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="box-footer">
                                            <div class="box-tools pull-right">

                                            </div>
                                        </div>
                                    </div>

                                    <?php echo FORM::close(); ?>


                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Student Details</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>Reg. ID</th>
                                                            <td id="dataRegID"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Student No</th>
                                                            <td id="dataStudentNo"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Student Name</th>
                                                            <td id="dataStudentName"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enrollment Amount</th>
                                                            <td id="dataEnrollmentFees"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>Monthly Fees</th>
                                                            <td id="dataMonthlyFees"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Certification Fees</th>
                                                            <td id="dataCertificationFees"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>OV Fees</th>
                                                            <td id="dataOVFees"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cell</th>
                                                            <td id="dataCell"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Account Details</h3>
                                            <center><h3 id="upgrade-err-msg" class="mandatory"></h3></center>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Curriculum</th>
                                                            <th>Course Name</th>
                                                            <th>Current Semester</th>
                                                            <th>Billing Amount</th>
                                                            <th>Total Paid</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                        <tr>
                                                            <td id="CurriculumName">&nbsp;</td>
                                                            <td id="courseName">&nbsp;</td>
                                                            <td id="CurrentSemester">&nbsp;</td>
                                                            <td id="BillingAmount">&nbsp;</td>
                                                            <td id="PaidAmount">&nbsp;</td>
                                                            <td id="outstanding">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="upgrade-box">
                                        <?php echo Form::open([ 'url' => 'admin/upgrade']); ?>

                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Pay Fees</h3>
                                            </div>
                                            <div class="box-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="StudentID">Student No.: <span class="mandatory">*</span></label>
                                                            <?php echo Form::text('StudentID', null, ['placeholder' => 'Enter Student No.', 'class' => 'form-control', 'id' => 'StudentID', 'readonly' => 'readonly']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="StudentName">Student Name</label>
                                                            <?php echo Form::text('StudentName', null, ['placeholder' => 'Student Name', 'class' => 'form-control', 'id' => 'StudentName', 'readonly' => 'readonly']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="SemesterID">Semester: <span class="mandatory">*</span></label>
                                                            <?php echo Form::select('SemesterID', [], null, ['placeholder' => 'Select Semester', 'class' => 'form-control select2', 'id' => 'SemesterID']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="UpgradeDate">Upgrade Date: </label>
                                                            <?php echo Form::text('UpgradeDate', null, ['placeholder' => 'Select Upgrade Date', 'class' => 'form-control datepicker', 'id' => 'UpgradeDate']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="CounselorID">Counselor: <span class="mandatory">*</span></label>
                                                            <?php echo Form::select('CounselorID', $counselors, null, ['placeholder' => 'Select Counselor', 'class' => 'form-control select2', 'id' => 'CounselorID']); ?>

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
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="MonthlyFees">Monthly Fees: <span class="mandatory">*</span></label>
                                                                    <?php echo Form::text('MonthlyFees', null, ['placeholder' => 'Enter Monthly Fees', 'class' => 'form-control', 'id' => 'MonthlyFees']); ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="OvAmount">OV. Amount: <span class="mandatory">*</span></label>
                                                                    <?php echo Form::text('OvAmount', null, ['placeholder' => 'Enter OV. Amount', 'class' => 'form-control', 'id' => 'OvAmount']); ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="UpgradeAmount">Upgrade Amount: <span class="mandatory">*</span></label>
                                                                    <?php echo Form::text('UpgradeAmount', null, ['placeholder' => 'Enter Upgrade Amount', 'class' => 'form-control', 'id' => 'UpgradeAmount']); ?>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="box-footer">
                                                        <div class="box-tools pull-right">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box -->
                                            </div>
                                        </div>

                                        <?php echo FORM::close(); ?>

                                        <!-- /.box -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->

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
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
//$('input[type="checkbox"], input[type="radio"]').iCheck({
//    checkboxClass: 'icheckbox_minimal-blue',
//    radioClass: 'iradio_minimal-blue'
//});

$('.RadioStudentID').change(function () {
    var StudentID = $(this).val();
    if (StudentID != "") {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?php echo e(url('admin/upgrade-get_student_details')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {StudentID: StudentID},
            success: function (data) {
                if (data.error) {
                    alert(data.message);
                } else {
                    $('#dataRegID').html('Reg' + data.StudentDetails.StudentID);
                    $('#dataStudentNo').html(data.StudentDetails.StudentNo);
                    $('#dataStudentName').html(data.StudentDetails.StudentName);
                    $('#dataMonthlyFees').html(data.StudentAcc.StudentMonthlyFees);
                    $('#dataCell').html(data.StudentDetails.Cell);
                    $('#dataEnrollmentFees').html(data.StudentDetails.EnrollmentAmount);
                    $('#dataOVFees').html(data.StudentDetails.OvAmount);
                    $('#dataCertificationFees').html(data.StudentDetails.Certification);

                    $('#StudentID').val(data.StudentDetails.StudentNo);
                    $('#StudentName').val(data.StudentDetails.StudentName);

                    $('#CurriculumName').html(data.StudentDetails.CurriculumName);
                    $('#courseName').html(data.StudentAcc.StudentCourse);
                    $('#CurrentSemester').html(data.StudentDetails.CurrentSemester);
                    $('#BillingAmount').html(data.StudentAcc.BookingConfirmationAmount);
                    $('#PaidAmount').html(parseInt(data.StudentAcc.PrevPaidAmount) + parseInt(data.StudentAcc.Recovered));
                    $('#outstanding').html(parseInt(data.StudentAcc.BalanceAmountWithoutOV));
                    if (data.adseerror) {
                        $('#upgrade-box').slideUp();
                        $('#upgrade-err-msg').html(data.message);
                    }
//                    else if ((data.StudentDetails.BillingAmount - data.StudentDetails.PaidAmount) > 0) {
//                        $('#upgrade-box').slideUp();
//                        $('#upgrade-err-msg').html('Student can not upgrade due to his outstanding');
//                    }
                    else {
                        $('#upgrade-box').slideDown();
                        $('#upgrade-err-msg').html('');
                    }

                    var myData = '<option value="">Select Semester</option>';
                    $.each(data.Semesters, function (index, val) {
                        myData += '<option value="' + val.SemesterID + '">' + val.SemesterName + '</option>';
                    })
                    $('#SemesterID').html(myData);
                }
            }
        });
    }
});

$('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$(function () {
    $(".select2").select2();
    $('#Curriculum').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/upgrade/get-semesters')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {Curriculum: $('#Curriculum').val(), StudentNo: $('#StudentID').val()},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {

                } else {
                    alert(data.Message);
                }
            },
            complete: function () {

            }
        });
    });
});

        </script>
    </body>
</html>
