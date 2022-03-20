<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Student Ledger (Upgrade)</title>
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
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 1px solid #b1b1b1;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 3px 8px;
            }
            .active-month {
                background: #feff58;
            }
            .student-status1 {
                background: #00a65a;
                border-top-color: #00a65a !important;
                text-align: center;
            }
            .student-status2 {
                background: #b33535;
                border-top-color: #b33535 !important;
                text-align: center;
            }
            .student-status3 {
                background: #b4c83a;
                border-top-color: #b4c83a !important;
                text-align: center;
            }
            .student-status4 {
                background: #1676ab;
                border-top-color: #1676ab !important;
                text-align: center;
            }
            .student-status5 {
                background: #e0c772;
                border-top-color: #e0c772 !important;
                text-align: center;
            }
            .student-status .box-title {
                color: #fff !important;
                font-weight:bolder;
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
                        <li class="active">Add New</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo Form::open([ 'url' => 'admin/student-ledger']); ?>

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Search Student</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="StudentNo">Student No: </label>
                                                <?php echo Form::text('StudentNo', null, ['placeholder' => 'Enter Student No', 'class' => 'form-control', 'id' => 'StudentNo']); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <button class="btn btn-success form-control">Get Ledger</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo FORM::close(); ?>


                            <?php
                            if (isset($Student)) {
                                ?>
                                <div class="box box-primary student-status student-status<?php echo $Student->StudentStatus ?>">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Student Status: <?php echo e($statuses[$Student->StudentStatus]); ?></h3>
                                    </div>
                                </div>
                                <?php
                                if ($Acc['TotalPaidAmountInternalExternal'] >= $Acc['BookingConfirmationAmount']) {
                                    ?>
                                    <div class="box box-success student-status student-status1">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Fees Completed</h3>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Status Log</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <td>Date</td>
                                                        <td>Status</td>
                                                        <td>Reason</td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e($Student->ActiveDate); ?></td>
                                                        <td>Active</td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                    if (!empty($StatusLog)) {
                                                        foreach ($StatusLog as $status_log) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($status_log->Dated); ?></td>
                                                                <td><?php echo e($statuses[$status_log->StudentStatus]); ?></td>
                                                                <td><?php echo e($status_log->Reason); ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Ledger</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Student ID</th>
                                                            <td><?php echo e($Student->StudentID); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Enrollment No.</th>
                                                            <td><?php echo e($Student->StudentNo); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Student Name</th>
                                                            <td><?php echo e($Student->StudentName); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact Information</th>
                                                            <td><?php echo e($Student->Cell . ', ' . $Student->ParentCell); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Course Enrolled</th>
                                                            <td><?php echo e($Acc['StudentCourse']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Current Semester</th>
                                                            <td><?php echo e($BatchDetails->SemesterNumber); ?> Semester (<?php echo e($BatchDetails->SemesterName); ?>)</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Faculty</th>
                                                            <td><?php echo e($BatchDetails->FacultyName); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Days / Time</th>
                                                            <td><?php echo e($BatchDetails->Days . ' / ' . $BatchDetails->Time); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lab</th>
                                                            <td><?php echo e($BatchDetails->LabName); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Batch Code / File</th>
                                                            <td><?php echo e($BatchDetails->BatchCode . ' / ' . $BatchDetails->FileNo); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Current Module</th>
                                                            <td><?php echo e($BatchDetails->ModuleName); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Admission</th>
                                                            <td><?php echo e($Student->AdmissionDate); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Upgrade</th>
                                                            <td><?php echo e($DateOfUpgrade); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div style="margin-top: 30px;">
                                                    <?php
                                                    $noOfFeeDisplayed = 0;
                                                    ?>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Monthly Installments</th>
                                                            <th>Date</th>
                                                            <th>Internal Due</th>
                                                            <th>Internal Paid</th>
                                                        </tr>
                                                        <?php
                                                        if ($Student->DateOfAdmission == $Student->DateOfFeeStart) {
                                                            $noOfFeeDisplayed++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td class="text-center">Admission Amount <?php echo ($Student->DateOfAdmission == $Student->DateOfFeeStart ? ' + Monthly' : '') ?></td>
                                                            <td><?php echo $Student->DateOfAdmission ?></td>
                                                            <td><?php echo number_format($Student->EnrollmentAmount, 0) . ($Student->DateOfAdmission == $Student->DateOfFeeStart ? ' + ' . number_format($Student->MonthlyFees, 0) : ''); ?></td>
                                                            <td><?php echo number_format($FeesRecords[0]['PaidAmount'], 0) ?></td>
                                                        </tr>
                                                        <?php
                                                        $isOverflow = false;
                                                        $c = 5;
                                                        $semIndex = 0;
                                                        $ovIndex = 0;
                                                        $ActualAmount = 0;
                                                        $isCurr = false;
                                                        $isFeeStart = false;
                                                        $installmentsCounter = 0;
                                                        $TotalPaid = 0;
                                                        $mCheck = true;

                                                        foreach ($FeesRecords as $index => $fee) {
                                                            $TotalPaid += $fee['PaidAmount'];
                                                            if ($Student->DateOfFeeStart == $fee['MonthYear']) {
                                                                $isFeeStart = true;
                                                            }
                                                            if ($index > 0) {
                                                                ?>
                                                                <tr class="<?php echo e(($currentMonth == $fee['MonthYear'] ? 'active-month' : '')); ?>">
                                                                    <?php
                                                                    if ($c % 6 == 0) {
                                                                        if (!isset($semesters[$semIndex]->SemesterName)) {
                                                                            $isOverflow = true;
                                                                        }
                                                                        ?>
                                                                        <td style="vertical-align: middle; text-align: center;" rowspan="6"><?php echo e((isset($semesters[$semIndex]->SemesterName) ? $semesters[$semIndex]->SemesterName : 'Overflow')); ?></td>
                                                                        <?php
                                                                        $semIndex++;
                                                                    }
                                                                    ?>
                                                                    <td><?php echo $fee['MonthYear']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if (!$isOverflow && $isFeeStart) {
                                                                            if ($Student->DateOfFeeStart) {
                                                                                
                                                                            }
                                                                            if ($noOfFeeDisplayed < $Student->NoOfInstallments) {
                                                                                echo number_format($Student->MonthlyFees, 0);
                                                                                $noOfFeeDisplayed++;
                                                                            } else if($noOfFeeDisplayed < ($Acc['StudentMonthlyFees'] - $Student->NoOfInstallments)) {
                                                                                echo number_format($Acc['StudentMonthlyFees'], 0);
                                                                                $noOfFeeDisplayed++;
                                                                            }
//                                                                            echo number_format($Student->MonthlyFees, 0);
//                                                                            echo ($ovIndex % 6 == 0 && $ovIndex > 0 ? ' + ' . number_format($Student->OvAmount, 0) : '');
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo number_format($fee['PaidAmount'], 0) ?></td>
                                                                </tr>
                                                                <?php
//                                                                if($Acc['BookingConfirmationAmountBeforeUpgrade'] < $TotalPaid && $mCheck) {
//                                                                    $mCheck = false;
//                                                                    echo '<tr><th colspan="4" class="text-center">Upgrade</th></tr>';
//                                                                }
                                                            }

                                                            $c++;
                                                            if ($index != 0) {
                                                                $ovIndex++;
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th>Certification</th>
                                                            <th><?php echo e(number_format($Student->Certification, 0)); ?></th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th><?php echo e(number_format(($Student->EnrollmentAmount + $Student->Certification + ($Student->MonthlyFees * $Student->NoOfInstallments)), 0)); ?></th>
                                                            <th><?php echo number_format($Acc['TotalPaidAmountInternalExternal'], 0); ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h4>Basic Details</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th width="60%">OV Amount: </th>
                                                        <td>Rs. <?php echo e($OvAmount); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Prospectus:</th>
                                                        <td><?php echo e(($Student->ProspectusAmount > 0 ? 'Rs. '.number_format($Student->ProspectusAmount, 0) : '-')); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Course Duration:</th>
                                                        <td><?php echo e($Acc['NoOfInstallments']); ?> Months</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Admission Fees:</th>
                                                        <td>Rs. <?php echo e(number_format($Student->EnrollmentAmount, 0)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Monthly Fees:</th>
                                                        <td>Rs. <?php echo e(number_format($Student->MonthlyFees, 0)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Certificate Fees:</th>
                                                        <td>Rs. <?php echo e(number_format($Student->Certification, 0)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Upgrade Fees:</th>
                                                        <td>Rs. <?php echo e(number_format($UpgradeAmount, 0)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Package (Without OV):</th>
                                                        <?php
                                                        $TotalPackageAmount = $Acc['BookingConfirmationAmount'];
                                                        ?>
                                                        <td>Rs. <?php echo e(number_format($TotalPackageAmount, 0)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Amount Paid:</th>
                                                        <td>Rs. <?php echo number_format($Acc['TotalPaidAmountInternalExternal'], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Remaining Package Amount:</th>
                                                        <td style="font-weight:bold;">Rs. <?php echo number_format(($TotalPackageAmount - $Acc['TotalPaidAmountInternalExternal']), 0); ?></td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <h4>OV Payment Details</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Semester</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    <?php
                                                    $OVPaid = $OVCollection->Amount;
                                                    $isUpgradeCheck = false;
                                                    $chk = 1;
                                                    for ($i = 0; $i < $Acc['NoOfOV']; $i++) {
                                                        if (($i + 1) <= $Acc['NoOfOVBeforeUpgrade']) {
                                                            $OvFees = $Student->OvAmount;
                                                        } else {
                                                            $isUpgradeCheck = true;
                                                            $OvFees = $OvFeeAfterUpgrade;
                                                        }
                                                        if ($isUpgradeCheck && $chk) {
                                                            ?>
                                                            <tr>
                                                                <th colspan="3" class="text-center">Upgrade</th>
                                                            </tr>
                                                            <?php
                                                            $chk = 0;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th><?php echo e($semesters[$i]->SemesterName); ?></th>
                                                            <td>Rs. <?php echo e(number_format($OvFees, 0)); ?></td>
                                                            <td><?php echo e(($OVPaid >= $OvFees ? 'Paid' : ($OVPaid > 0 ? $OVPaid : ''))); ?></td>
                                                        </tr>
                                                        <?php
                                                        $OVPaid = $OVPaid - $OvFees;
                                                    }
                                                    ?>

                                                </table>
                                                <br>
                                                <h4>Paid Fees History</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Fees Type</th>
                                                        <th>Total Paid</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php
                                                    $TotalExtraPaid = 0;
                                                    foreach ($ExtraFeeses as $fees) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo e($fees->TypeName); ?></th>
                                                            <td>Rs. <?php echo e(number_format($fees->Amount, 0)); ?></td>
                                                            <td><button class="btn btn-primary btn-xs getDetailsBtn" StudentID="<?php echo e($Student->StudentID); ?>" feeTypeID="<?php echo e($fees->FeeTypeID); ?>" type="button">View Details</button></td>
                                                        </tr>
                                                        <?php
                                                        $TotalExtraPaid += $fees->Amount;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th>Total Paid</th>
                                                        <th>Rs. <?php echo e(number_format($TotalExtraPaid, 0)); ?></th>
                                                        <th></th>
                                                    </tr>
                                                </table>
                                                <br>
                                                <h4>Semesters breakdown</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Semester</th>
                                                        <th>Due</th>
                                                        <th>Paid</th>
                                                    </tr>
                                                    <?php
                                                    $isUpgradeCheck = false;
                                                    $chk = 1;
                                                    $SemesterPaid = $Acc['TotalPaidAmountInternalExternal'];
                                                    for ($i = 0; $i < $Acc['NoOfOV']; $i++) {
                                                        if (($i + 1) <= $Acc['NoOfOVBeforeUpgrade']) {
                                                            $MonthlyFees = $Student->MonthlyFees;
                                                        } else {
                                                            $isUpgradeCheck = true;
                                                            $MonthlyFees = $MonthlyFeeAfterUpgrade;
                                                        }
                                                        if ($isUpgradeCheck && $chk) {
                                                            ?>
                                                            <tr>
                                                                <th colspan="3" class="text-center">Upgrade</th>
                                                            </tr>
                                                            <?php
                                                            $chk = 0;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <th><?php echo e($semesters[$i]->SemesterName); ?></th>
                                                            <td>Rs. <?php echo e(number_format(($MonthlyFees * 6), 0)); ?></td>
                                                            <td>Rs. <?php echo e(($SemesterPaid > ($MonthlyFees * 6) ? number_format(($MonthlyFees * 6), 0) : number_format($SemesterPaid, 0))); ?></td>
                                                        </tr>
                                                        <?php
                                                        if ($SemesterPaid > ($MonthlyFees * 6)) {
                                                            $SemesterPaid = $SemesterPaid - ($MonthlyFees * 6);
                                                        } else {
                                                            $SemesterPaid = 0;
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                                <br>
                                                <h4>Billing Details</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th><?php echo e($Student->SemesterName); ?></th>
                                                        <td>Rs. <?php echo number_format($Acc['BookingConfirmationAmountBeforeUpgrade'], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e($Acc['StudentCourse']); ?></th>
                                                        <td>Rs. <?php echo number_format(($Acc['BookingConfirmationAmountAfterUpgrade']), 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td style="font-weight:bold;">Rs. <?php echo number_format($Acc['BookingConfirmationAmount'], 0) ?></td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <h4>Current Details</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Amount to be paid till today</th>
                                                        <td>Rs. <?php echo number_format($Acc['AmountToBePaidTillToday'], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Paid</th>
                                                        <td>Rs. <?php echo number_format($Acc['TotalPaidAmountInternalExternal'], 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Monthly Outstanding</th>
                                                        <td style="font-weight:bold;">Rs. <?php echo number_format(($Acc['AmountToBePaidTillToday'] - $Acc['TotalPaidAmountInternalExternal']), 0) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>OV Outstanding</th>
                                                        <td style="font-weight:bold;">Rs. <?php echo number_format($Acc['OVOutstanding'], 0) ?></td>
                                                    </tr>
                                                    <tr style="color: #fc0000;">
                                                        <th>Total Outstanding with OV</th>
                                                        <td style="font-weight:bold; <?php echo e((($Acc['AmountToBePaidTillToday'] - $Acc['TotalPaidAmountInternalExternal'] + $Acc['OVOutstanding']) <= 0 ? 'color:#008000; ' : '')); ?>">Rs. <?php echo number_format(($Acc['AmountToBePaidTillToday'] - $Acc['TotalPaidAmountInternalExternal'] + $Acc['OVOutstanding']), 0) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Upgrade Outstanding</th>
                                                        <td style="font-weight:bold;">Rs. <?php echo number_format(($UpgradeAmount - $UpgradePaid), 0); ?></td>
                                                    </tr>
                                                    <tr style="color: #fc0000;">
                                                        <th>Total Outstanding with OV And Upgrade</th>
                                                        <td style="font-weight:bold; <?php echo e((($Acc['AmountToBePaidTillToday'] - $Acc['TotalPaidAmountInternalExternal'] + $Acc['OVOutstanding'] + ($UpgradeAmount - $UpgradePaid)) <= 0 ? 'color:#008000; ' : '')); ?>">Rs. <?php echo number_format(($Acc['AmountToBePaidTillToday'] - $Acc['TotalPaidAmountInternalExternal'] + $Acc['OVOutstanding'] + ($UpgradeAmount - $UpgradePaid)), 0) ?></td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <h4>Upgrade Amount</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Due</th>
                                                        <th>Paid</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Upgrade Amount</th>
                                                        <td>Rs. <?php echo number_format($UpgradeAmount, 0); ?></td>
                                                        <td>Rs. <?php echo number_format($UpgradePaid, 0); ?></td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <h4>Total Billing</h4>
                                                <table class="table table-bordered table-hover">
                                                    <tr>
                                                        <th>Prospectus: 1 X <?php echo e(number_format($Student->ProspectusAmount, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format($Student->ProspectusAmount, 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Admission: 1 X <?php echo e(number_format($Student->EnrollmentAmount, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format($Student->EnrollmentAmount, 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Monthly: <?php echo e(number_format($Student->NoOfInstallments, 0)); ?> X <?php echo e(number_format($Student->MonthlyFees, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format(($Student->MonthlyFees * $Student->NoOfInstallments), 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Monthly (After Upgrade): <?php echo e(number_format(($Acc['NoOfInstallments'] - $Student->NoOfInstallments), 0)); ?> X <?php echo e(number_format($Acc['StudentMonthlyFees'], 0)); ?></th>
                                                        <td>Rs. <?php echo number_format(($Acc['StudentMonthlyFees'] * ($Acc['NoOfInstallments'] - $Student->NoOfInstallments)), 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>OV: <?php echo e(number_format($Student->NoOfOv, 0)); ?> (Semesters) X <?php echo e(number_format($Student->OvAmount, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format(($Student->NoOfOv * $Student->OvAmount), 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>OV (After Upgrade): <?php echo e(number_format(($Acc['NoOfOV'] - $Student->NoOfOv), 0)); ?> (Semesters) X <?php echo e(number_format($Acc['OVAmountAfterUpgrade'], 0)); ?></th>
                                                        <td>Rs. <?php echo number_format((($Acc['NoOfOV'] - $Student->NoOfOv) * $Acc['OVAmountAfterUpgrade']), 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Certification: 1 X <?php echo e(number_format($Student->Certification, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format($Student->Certification, 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Upgrade: 1 X <?php echo e(number_format($UpgradeAmount, 0)); ?></th>
                                                        <td>Rs. <?php echo number_format($UpgradeAmount, 0); ?></td>
                                                    </tr>

                                                    <?php
                                                    $countSum = 0;
                                                    foreach ($ExtraFeeses as $fees) {
                                                        if ($fees->FeeTypeID != 1 && $fees->FeeTypeID != 2 && $fees->FeeTypeID != 7 && $fees->FeeTypeID != 8 && $fees->FeeTypeID != 10 && $fees->FeeTypeID != 9) {
                                                            ?>
                                                            <tr>
                                                                <th><?php echo e($fees->TypeName); ?>: <?php echo e(number_format($fees->Amount, 0)); ?></th>
                                                                <td>Rs. <?php echo e(number_format($fees->Amount, 0)); ?></td>
                                                            </tr>
                                                            <?php
                                                            $countSum += $fees->Amount;
                                                        }
                                                    }
                                                    ?>

                                                    <tr>
                                                        <th>Total</th>
                                                        <th>Rs. <?php echo number_format(($Student->ProspectusAmount + $Student->EnrollmentAmount + $UpgradeAmount + ($Student->MonthlyFees * $Student->NoOfInstallments) + ($Acc['StudentMonthlyFees'] * ($Acc['NoOfInstallments'] - $Student->NoOfInstallments)) + ($Student->NoOfOv * $Student->OvAmount) + (($Acc['NoOfOV'] - $Student->NoOfOv) * $Acc['OVAmountAfterUpgrade']) + $Student->Certification + $countSum), 0); ?></th>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>


                        <!-- /.col (right) -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Attendance</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th>Course</th>
                                                    <th>Module</th>
                                                    <th>Faculty</th>
                                                    <th>Days - Time</th>
                                                    <th>Sessions</th>
                                                    <th>Total Present</th>
                                                    <th>Total Absent</th>
                                                </tr>
                                                <?php
                                                if (!empty($attendance)) {
                                                    foreach ($attendance as $att) {
                                                        if (!empty($att['Modules'])) {
                                                            foreach ($att['Modules'] as $mod) {
                                                                ?>
                                                                <tr class="<?php echo ($BatchDetails->ModuleID == $mod['ModuleID'] ? 'active-month' : ''); ?>">
                                                                    <td><?php echo e($att['Semester']); ?></td>
                                                                    <td><?php echo e($mod['ModuleName']); ?></td>
                                                                    <td><?php echo e($mod['Faculty']); ?></td>
                                                                    <td><?php echo e($mod['DaysTime']); ?></td>
                                                                    <td><?php echo e($mod['Sessions']); ?></td>
                                                                    <td><?php echo e($mod['TotalPresent']); ?></td>
                                                                    <td><?php echo e($mod['TotalAbsent']); ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
            
            <div class="modal fade" id="PaymentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="PaymentDetailsModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Payment Details</h4>
                        </div>
                        <div class="modal-body">
                            <table id="PaymentDetailsTable" class="table table-bordered">

                            </table>
                        </div>
                        <div class="modal-footer"> </div>
                    </div>
                </div>
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
$(function () {
    $(".select2").select2();
    $('#Curriculum').change(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/students/get-semesters')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {Curriculum: $('#Curriculum').val()},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {
                    var myData = '<option value="">Select Semester</option>';
                    $.each(data.Semesters, function (index, val) {
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

$(document).ready(function() {
                                                        $('.getDetailsBtn').click(function() {
                                                        var FeeTypeID = $(this).attr('feeTypeID');
                                                        var StudentID = $(this).attr('StudentID');
                                                        $('#PaymentDetailsTable').html("");
                                                        $.ajax({
                                                        type: "POST",
                                                                url: "<?php echo e(url('admin/get-pay-details')); ?>",
                                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                                data: {FeeTypeID: FeeTypeID, 'StudentID': StudentID},
                                                                dataType: "JSON",
                                                                success: function (data) {
                                                                $('#PaymentDetailsModal').modal();
                                                                var mData = '<tr><th>Type</th><th>Amount</th><th>Date</th></tr>';
                                                                $.each(data.Details, function(index, val) {
                                                                mData += "<tr>";
                                                                mData += '<td>' + val.TypeName + '</td>';
                                                                mData += '<td>' + val.Amount + '</td>';
                                                                mData += '<td>' + val.Dated + '</td>';
                                                                mData += "</tr>";
                                                                });
                                                                $('#PaymentDetailsTable').html(mData);
//                                                                var myData = '<option value="">Select Semester</option>';
//                                                                $.each(data.Semesters, function(index, val) {
//                                                                myData += '<option value="' + val.SemesterID + '">' + val.SemesterName + '</option>';
//                                                                });
//                                                                $('#SemesterID').html(myData);
                                                                },
                                                                complete: function () {

                                                                }
                                                        });
                                                        });
                                                        });
        </script>
    </body>
</html>
