<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Internal Report</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo e(url('resources/assets/web')); ?>/images/favicon.png" type="image/x-icon">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/datepicker3.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            /*            .info-box-content {
                            padding: 11% 22% !important;
                        }*/
            .info-box-content {
                padding-top: 11% !important;
            }
            .bg-aqua {
                background-color: #f8b239 !important;
            }
            .myTabe td {
                padding: 3px 10px !important;
            }
            .circle {
                border: 1px solid;
                border-radius: 50%;
                min-height: 70px;
                padding: 49px 0;
                text-align: center;
                font-size: 50px;
            }
            .square {
                border: 1px solid;
                min-height: 70px;
                padding: 53px 0;
                text-align: center;
                font-size: 22px;
            }
            .square div {
                background: #000;
                height: 1px;
                width: 100%
            }
            .tableFixHead          { overflow-y: auto; height: 1000px; }
            .tableFixHead thead th { position: sticky; top: 0; }

            table  { border-collapse: collapse; width: 100%; }
            th, td { padding: 8px 16px; }
            th     { background:#eee; }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 2px !important;}
            .student-status {
                cursor: pointer; color: blue;
            }
            .student-status:hover {
                text-decoration: underline;
            }

            .errorBox {
                background: #e42c2c;
                color: #fff;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
            }
            .successBox {
                background: #2bbb41;
                color: #fff;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-header">
                    <h1> Internal Report (<?php echo e($Title); ?>)</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Total Outstanding <span style="font-weight:bold">Rs. <?php echo e(number_format($TotalOutstanding, 0)); ?></span></h3>
                            <h3>Previous Overdue <span style="font-weight:bold">Rs. <?php echo e(number_format(($TotalOutstanding - $FeeNotPaid), 0)); ?></span></h3>
                            <h3>Current Overdue <span style="font-weight:bold">Rs. <?php echo e(number_format($FeeNotPaid, 0)); ?></span></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($TotalOutstanding == 0) {
                                $TotalOutstanding = 1;
                            }
                            ?>
                            <h3 style="border-bottom:2px solid #333; margin-bottom: 3px; padding-bottom: 4px;">Total Internal <span style="font-weight:bold">Rs. <?php echo e(number_format($TotalOutstanding, 0)); ?> (<?php echo e($MyCount); ?>)</span></h3>
                            <div style="border-bottom:2px solid #333; margin-bottom: 12px;"></div>
                            <div class="row">
                                <?php
                                foreach ($StatusesSum as $statIndx => $statsSum) {
                                    ?>
                                    <div class="col-md-4">
                                        <div>
                                            <h4><?php echo e($statIndx); ?>: <span style="font-weight:bold">Rs. <?php echo e(number_format($statsSum, 0)); ?> (<?php echo e($HeadCounts[$statIndx]); ?>) <?php echo e(number_format(($statsSum / $TotalOutstanding * 100),2)); ?>%</span></h4>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-md-12">
                                    <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                                    <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-weight: 900; color: #595959;"><center>Faculty (Outstanding Fees List)</center></h2>
                        </div>
                        <?php
                        $a_num = 1;
                        foreach ($FacultyData as $facid => $fac_data) {
                            ?>
                            <div class="col-md-4">
                                <div style="border:1px solid #333; margin-bottom: 20px; padding: 0 10px;">
                                    <h3 style="border-bottom:2px solid #333; margin-bottom: 3px; padding-bottom: 4px; font-size: 18px;"><a href="<?php echo e(url('admin/internal-defaulters?FacultyID='.$facid)); ?>"><?php echo e($FacultyNames[$facid]); ?> <span style="font-weight:bold">Rs. <?php echo e(number_format($FacultyAmountTotal[$facid], 0)); ?> (<?php echo e($FacultyCountTotal[$facid]); ?>) <?php echo e(number_format(($FacultyAmountTotal[$facid] / $TotalOutstanding * 100),2)); ?>%</span></a></h3>
                                    <div style="border-bottom:2px solid #333; margin-bottom: 12px;"></div>
                                    <div class="row">
                                        <?php
                                        foreach ($fac_data as $statIndx => $statsSum) {
                                            ?>
                                            <div class="col-md-12">
                                                <div>
                                                    <h4 style="margin:0 0 10px 0; font-size: 15px;"><?php echo e($statIndx); ?>: <span style="font-weight:bold">Rs. <?php echo e(number_format($statsSum, 0)); ?> (<?php echo e($FacultyDataCount[$facid][$statIndx]); ?>) <?php echo e(number_format(($statsSum / ($FacultyAmountTotal[$facid] > 0 ? $FacultyAmountTotal[$facid] : 1) * 100),2)); ?>%</span></h4>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($a_num % 3 == 0) {
                                echo '</div><div class="row">';
                            }
                            $a_num++;
                        }
                        ?>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-weight: 900; color: #595959;"><center>Batch Time (Outstanding Fees List)</center></h2>
                        </div>
                        <?php
                        $b_num = 1;
                        foreach ($DaysTimeData as $daytime => $time_data) {
                            ?>
                            <div class="col-md-4">
                                <div style="border:1px solid #333; margin-bottom: 20px; padding: 0 10px;">
                                    <h3 style="border-bottom:2px solid #333; margin-bottom: 3px; padding-bottom: 4px; font-size: 18px;"><a href="<?php echo e(url('admin/internal-defaulters?DaysTime='.$daytime)); ?>"><?php echo e($daytime); ?> <span style="font-weight:bold">Rs. <?php echo e(number_format($DaysTimeTotal[$daytime], 0)); ?> (<?php echo e($DaysTimeTotalCount[$daytime]); ?>) <?php echo e(number_format(($DaysTimeTotal[$daytime] / $TotalOutstanding * 100),2)); ?>%</span></a></h3>
                                    <div style="border-bottom:2px solid #333; margin-bottom: 12px;"></div>
                                    <div class="row">
                                        <?php
                                        foreach ($time_data as $statIndx => $statsSum) {
                                            ?>
                                            <div class="col-md-12">
                                                <div>
                                                    <h4 style="margin:0 0 10px 0; font-size: 15px;"><?php echo e($statIndx); ?>: <span style="font-weight:bold">Rs. <?php echo e(number_format($statsSum, 0)); ?> (<?php echo e($DaysTimeCount[$daytime][$statIndx]); ?>) <?php echo e(number_format(($statsSum / $DaysTimeTotal[$daytime] * 100),2)); ?>%</span></h4>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($b_num % 3 == 0) {
                                echo '</div><div class="row">';
                            }
                            $b_num++;
                        }
                        ?>
                        <div class="col-md-12">
                            <div style="border-bottom:2px solid #333; margin-bottom: 3px;"></div>
                            <div style="border-bottom:2px solid #333; margin-bottom: 20px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo Form::open(['url' => 'admin/get-students-for-compose-msg']); ?>

                            <button class="btn btn-primary" type="submit">Send Message</button>
                            <div class="table-responsive">
                                <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>S#</th>
                                            <th>Student ID</th>
                                            <th>Enrollment No.</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                            <th>Cell</th>
                                            <th>Course</th>
                                            <th style="border-left:2px solid #666; border-top:2px solid #666;">BC Amount</th>
                                            <th style="border-top:2px solid #666;">Total Paid</th>
                                            <th style="border-right:2px solid #666; border-top:2px solid #666;">Total Balance</th>
                                            <th>Monthly Fees</th>
                                            <th>Installments</th>
                                            <th>File No</th>
                                            <th>Faculty</th>
                                            <th>Days</th>
                                            <th>Time</th>
                                            <th>Balance Till Today</th>
                                            <th>Prev Month Balance</th>
                                            <th style="border-left:2px solid #666; border-top:2px solid #666;">Curr Month</th>
                                            <th style="border-top:2px solid #666;">Paid (Curr Month)</th>
                                            <th style="border-right:2px solid #666; border-top:2px solid #666;">Curr Balance</th>
                                            <th>Fees Outstanding</th>
                                            <th>OV Outstanding</th>
                                            <th>Total with OV</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $cnt = 1;
                                    $mInx = 1;
                                    foreach ($ActiveStudents as $reasonIndex => $stdudents) {
                                        ?>
                                        <tr>
                                            <th class="text-center" style="font-size:30px;" colspan="24"><input class="chkall" minx="<?php echo e($mInx); ?>" type="checkbox" /> <?php echo e($reasonIndex); ?></th>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                            <td style="display: none;"></td>
                                        </tr>
                                        <?php
                                        foreach ($stdudents as $std) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="StudentIDs[]" value="<?php echo e($std['StudentID']); ?>" class="chk-<?php echo e($mInx); ?>" /></td>
                                                <td><?php echo e($cnt); ?></td>
                                                <td><a target="_blank" href="<?php echo e(url('admin/student-ledger?StudentID='.$std['StudentID'])); ?>"><?php echo e($std['StudentID']); ?></a></td>
                                                <td><?php echo e($std['StudentNo']); ?></td>
                                                <td class="student-status" nme="<?php echo e($std['StudentName']); ?>" outstanding="<?php echo e($std['Accounts']['TotalWithoutOV']); ?>" val="<?php echo e($std['StudentID']); ?>"><?php echo e($std['StudentName']); ?></td>
                                                <td><?php echo e($std['StudentStatus']); ?></td>
                                                <td><?php echo e($std['Cell']); ?></td>
                                                <td><?php echo e($std['Accounts']['StudentCourse']); ?></td>
                                                <td style="border-left:2px solid #666;"><?php echo e(number_format($std['Accounts']['BookingConfirmationAmount'],0)); ?></td>
                                                <td style="text-align: center;"><?php echo e(number_format($std['Accounts']['TotalPaidAmountInternalExternal'],0)); ?></td>
                                                <td style="text-align: center; border-right:2px solid #666;"><?php echo e(number_format(($std['Accounts']['BookingConfirmationAmount'] - $std['Accounts']['TotalPaidAmountInternalExternal']),0)); ?></td>
                                                <td style="background:#ede483;"><?php echo e($std['MonthlyFees']); ?></td>
                                                <td><?php echo e($std['Accounts']['NoOfInstallments']); ?></td>
                                                <td><?php echo e($std['FileNo']); ?></td>
                                                <td><?php echo e($std['FacultyName']); ?></td>
                                                <td><?php echo e($std['Days']); ?></td>
                                                <td><?php echo e($std['Time']); ?></td>
                                                <td style="text-align: center;"><?php echo e($std['Accounts']['AmountToBePaidTillToday']); ?></td>
                                                <td style="text-align: center;"><?php echo e($std['Accounts']['PrevPending']); ?></td>
                                                <td style="background:#ede483; text-align: center; border-left:2px solid #666;"><?php echo e($std['Accounts']['CurrMonthFeesForInternal']); ?></td>
                                                <td style="text-align: center; background: #89e489;"><?php echo e($std['Accounts']['Recovered']); ?></td>
                                                <td style="text-align: center;border-right:2px solid #666;"><?php echo e(number_format(($std['Accounts']['CurrMonthFeesForInternal'] - $std['Accounts']['Recovered']),0)); ?></td>
                                                <td style="background: #e45a5a; color: #fff; text-align: center;"><?php echo e($std['Accounts']['TotalWithoutOV']); ?></td>
                                                <td style="text-align: center;"><?php echo e($std['Accounts']['OVOutstanding']); ?></td>
                                                <td style="text-align: center;"><?php echo e($std['Accounts']['TotalWithOV']); ?></td>
                                            </tr>
                                            <?php
                                            $cnt++;
                                        }
                                        $mInx++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </section>
            </div>

            <div class="modal" id="student-status-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="float:left;" class="modal-title">Reason</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="mssg"></div>
                            <h3 class="text-center" style="margin-top:0;" id="StudentName"></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="BatchID">Select File: </label>
                                        <input type="hidden" name="StudentID" id="StudentID" value="0" />
                                        <?php echo Form::select('ReasonID', $reasons, null, ['placeholder' => 'Select Reason', 'class' => 'form-control select2', 'id' => 'ReasonID']); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="OutstandingAmount">Outstanding Amount: <span class="mandatory">*</span></label>
                                        <?php echo Form::text('OutstandingAmount', null, ['placeholder' => 'Enter Outstanding Amount', 'class' => 'form-control', 'id' => 'OutstandingAmount', 'readonly' => 'readonly']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InformedAmount">Informed Amount: <span class="mandatory">*</span></label>
                                        <?php echo Form::text('InformedAmount', null, ['placeholder' => 'Enter Informed Amount', 'class' => 'form-control', 'id' => 'InformedAmount']); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NotInformedAmount">Not Informed Amount: <span class="mandatory">*</span></label>
                                        <?php echo Form::text('NotInformedAmount', null, ['placeholder' => 'Enter Not Informed Amount', 'class' => 'form-control', 'id' => 'NotInformedAmount', 'readonly' => 'readonly']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Reason">Comment: <span class="mandatory">*</span></label>
                                <?php echo Form::textarea('Reason', null, ['placeholder' => 'Enter Comment', 'class' => 'form-control', 'id' => 'Reason', 'rows' => '8']); ?>

                            </div>
                            <div class="form-group">
                                <label for="ReasonDate">Date: <span class="mandatory">*</span></label>
                                <?php echo Form::text('ReasonDate', null, ['placeholder' => 'Select Reason Date', 'class' => 'form-control datepicker', 'id' => 'ReasonDate', 'autocomplete' => 'off']); ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary save-btn">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!--<script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/chartjs/Chart.min.js"></script>-->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script language="javascript">

$('#InformedAmount').change(function () {
    var outstanding = $('#OutstandingAmount').val();
    $('#NotInformedAmount').val(outstanding - $(this).val());
});

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

$('#ReasonDate').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
});

$(function () {
    
    $('.chkall').change(function() {
        var id = $(this).attr('minx');
        $('.chk-'+id).prop('checked', $(this).is(':checked'));
    });
    $('#dataList').dataTable({
//        "pageLength": <?php // echo $cnt;                  ?>,
//        "aLengthMenu": [[10, 25, 50, 100, <?php // echo $cnt;                  ?>], [10, 25, 50, 100, "All"]],
//        "order": [[0, 'asc']],
//        "oLanguage": {
//            "sSearch": "",
//            "sProcessing": "<img src='<?php echo e(url('resources/assets/admin')); ?>/images/loading-spinner-grey.gif'>"
//        },
        "ordering": false,
        "paging": false,
    });
    $('#dataList_filter input').attr('placeholder', 'Search...');

    $('.student-status').click(function () {
        var StudentID = $(this).attr('val');
        $('#StudentID').val(StudentID);
        $('#StudentName').html($(this).attr('nme'));
        $('#OutstandingAmount').val($(this).attr('outstanding'));
        $('#InformedAmount').val("");
        $('#NotInformedAmount').val("");
        $('#ReasonDate').val("");
        $('#ReasonID').val("");
        $('#Reason').val("");

        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/internal-report/get-outstanding-status')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {StudentID: StudentID},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {
                    $('#ReasonID').val(data.Reason.ReasonID);
                    $('#Reason').val(data.Reason.Reason);
                    $('#ReasonDate').val(data.Reason.ReasonDate);
                    //$('#OutstandingAmount').val(data.Reason.OutstandingAmount);
                    $('#InformedAmount').val(data.Reason.InformedAmount);
                    $('#NotInformedAmount').val(data.Reason.NotInformedAmount);
                }
            },
            complete: function () {

            }
        });

        $('#student-status-modal').modal();
    });

});

$('.save-btn').click(function () {
    var StudentID = $('#StudentID').val();
    var ReasonID = $('#ReasonID').val();
    var Reason = $('#Reason').val();
    var ReasonDate = $('#ReasonDate').val();
    var OutstandingAmount = $('#OutstandingAmount').val();
    var InformedAmount = $('#InformedAmount').val();
    var NotInformedAmount = $('#NotInformedAmount').val();

    if (StudentID != "0" && ReasonID != "" && ReasonDate != "" && Reason != "") {
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/internal-report/set-outstanding-status')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {StudentID: StudentID, ReasonID: ReasonID, ReasonDate: ReasonDate, Reason: Reason, OutstandingAmount: OutstandingAmount, InformedAmount: InformedAmount, NotInformedAmount: NotInformedAmount},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {
                    $('#mssg').removeClass('errorBox');
                    $('#mssg').addClass('successBox');
                    location.href = '<?php echo e(url("admin/internal-defaulters")); ?>';
                } else {
                    $('#mssg').removeClass('successBox');
                    $('#mssg').addClass('errorBox');
                }
                $('#mssg').html(data.Message);
            },
            complete: function () {

            }
        });
    } else {
        $('#mssg').removeClass('successBox');
        $('#mssg').addClass('errorBox');
        $('#mssg').html("Please fill form complete");
    }
});
        </script>

    </body>
</html>
