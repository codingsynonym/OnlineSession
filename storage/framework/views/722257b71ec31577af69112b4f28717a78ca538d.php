<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Pay Fees</title>
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
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .voucher .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 0 !important;
            }
            .voucher .border {
                border: 2px solid #949494 !important;
            }
            .voucher .table-bordered {
                border: 2px solid #949494 !important;
            }
            .voucher .strong {
                font-weight: bold !important;
            }
            .voucher .pt-35 {
                padding-top: 35px !important;
            }
            .voucher .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 1px 15px;
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
                    <h1>Fees</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/students')); ?>">Students</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- general form elements -->
                                    <?php echo Form::open([ 'url' => 'admin/search-student']); ?>

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
                                                            <th>Outstanding</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                        <tr>
                                                            <td id="CurriculumName">&nbsp;</td>
                                                            <td id="courseName">&nbsp;</td>
                                                            <td id="CurrentSemester">&nbsp;</td>
                                                            <td id="BillingAmount">&nbsp;</td>
                                                            <td id="PaidAmount">&nbsp;</td>
                                                            <td id="Outstanding">&nbsp;</td>
                                                            <td id="Balance">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box box-primary">
                                        <?php echo Form::open([ 'url' => 'admin/pay-fees']); ?>

                                        <div class="box-header with-border">
                                            <h3 class="box-title">Pay Fees</h3>
                                        </div>
                                        <div class="box-body">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="StudentID">Registration ID: <span class="mandatory">*</span></label>
                                                        <?php echo Form::text('StudentID', null, ['placeholder' => 'Enter Student ID', 'class' => 'form-control', 'id' => 'StudentID', 'readonly' => 'readonly']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="StudentNo">Student No.:</label>
                                                        <?php echo Form::text('StudentNo', null, ['placeholder' => 'Enter Student No.', 'class' => 'form-control', 'id' => 'StudentNo', 'readonly' => 'readonly']); ?>

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
                                                        <label for="ReceiptNo">Receipt No.: <span class="mandatory">*</span></label>
                                                        <?php echo Form::text('ReceiptNo', null, ['placeholder' => 'Enter Receipt No.', 'class' => 'form-control', 'id' => 'ReceiptNo']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Amount">Amount: <span class="mandatory">*</span></label>
                                                        <?php echo Form::text('Amount', null, ['placeholder' => 'Enter Amount', 'class' => 'form-control', 'id' => 'Amount']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="FeeTypeID">Fees Type: <span class="mandatory">*</span></label>
                                                        <?php echo Form::select('FeeTypeID', $FeeTypes, null, ['placeholder' => 'Select Fees Type', 'class' => 'form-control', 'id' => 'FeeTypeID']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="PaymentMode">Payment Mode: <span class="mandatory">*</span></label>
                                                        <?php echo Form::select('PaymentMode', $PaymentMode, null, ['placeholder' => 'Select Payment Mode', 'class' => 'form-control', 'id' => 'PaymentMode']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Dated">Dated: </label>
                                                        <?php echo Form::text('Dated', $Dated, ['placeholder' => 'Enter Date', 'class' => 'form-control', 'id' => 'Dated']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="box-tools pull-right">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                        <?php echo FORM::close(); ?>

                                    </div>
                                    <!-- /.box -->
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
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
//$('input[type="checkbox"], input[type="radio"]').iCheck({
//    checkboxClass: 'icheckbox_minimal-blue',
//    radioClass: 'iradio_minimal-blue'
//});

$('#Dated').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$('.RadioStudentID').change(function () {
    var StudentID = $(this).val();
    if (StudentID != "") {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?php echo e(url('admin/get_student_details')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {StudentID: StudentID},
            success: function (data) {
                if (data.error) {
                    alert(data.message);
                } else {
                    $('#dataRegID').html('Reg' + data.StudentDetails.StudentID);
                    $('#dataStudentNo').html(data.StudentDetails.StudentNo);
                    $('#dataStudentName').html(data.StudentDetails.StudentName);
                    $('#dataMonthlyFees').html(data.StudentDetails.MonthlyFees);
                    $('#dataCell').html(data.StudentDetails.Cell);
                    $('#dataEnrollmentFees').html(data.StudentDetails.EnrollmentAmount);
                    $('#dataOVFees').html(data.StudentDetails.OvAmount);
                    $('#dataCertificationFees').html(data.StudentDetails.Certification);

                    $('#StudentID').val(data.StudentDetails.StudentID);
                    $('#StudentNo').val(data.StudentDetails.StudentNo);
                    $('#StudentName').val(data.StudentDetails.StudentName);
                    
                    $('#CurriculumName').html(data.StudentDetails.CurriculumName);
                    $('#courseName').html(data.StudentDetails.SemesterName);
                    $('#CurrentSemester').html(data.StudentDetails.CurrentSemester);
                    $('#BillingAmount').html(data.BookingConfirmationAmount);
                    $('#PaidAmount').html(data.TotalPaid);
                    $('#Outstanding').html(data.FeesOutstanding);
                    $('#Balance').html(data.Balance);
                }
            }
        });
    }
});

        </script>
    </body>
</html>
