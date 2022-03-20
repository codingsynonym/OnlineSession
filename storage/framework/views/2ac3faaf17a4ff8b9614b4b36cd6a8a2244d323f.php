<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Internal Summary</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo e(url('resources/assets/web')); ?>/images/favicon.png" type="image/x-icon">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
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
            .box {
                margin-bottom: 0 !important;
                box-shadow: 0;
            }
            .table {
                margin-bottom: 0;
            }
            .box-header, .box-body {
                padding: 4px !important
            }
            .mCustomTH th {
                font-size: 16px !important;
                font-weight: 600;
                text-align: right;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding:1px;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-header">
                    <h1> Internal Report </h1>
                </section>
                <section class="content">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Total Internal <span style="font-weight:bold">Rs. <span class="SummarytotalCurrMonth"></span></span></h3>
                            <h3>Total Received (Monthly) <span style="font-weight:bold">Rs. <span class="SummaryTotalCollection"><?php echo e($currentMonthCollection); ?></span></span></h3>
                            <h3>Balance <span style="font-weight:bold">Rs. <span class="SummaryBalance"></span></span></h3>
                        </div>
                    </div>
                    <?php echo Form::open([ 'url' => 'admin/internal-summary']); ?>

                    <!--                    <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" id="dateFrom" name="startDate" value="<?php echo e($startDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date From" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" id="dateTo" name="endDate" value="<?php echo e($endDate); ?>" class="DateFromTo form-control filterCR" placeholder="Date To" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-success" type="submit">Get Data</button>
                                            </div>
                                        </div>-->
                    <?php echo FORM::close(); ?>

                    <table class="table table-border">
                        <tr class="text-right mCustomTH">
                            <th style="width:30%; text-align: left;">&nbsp;</th>
                            <th style="width:10%">Previous Pending <br>(<span class="GTtotalPrevPending">0</span>)</th>
                            <th style="width:10%">Current Month Fees <br>(<span class="GTtotalCurrMonth">0</span>)</th>
                            <th style="width:10%">Recovered <br><br>(<span><?php echo e($currentMonthCollection); ?></span>)</th>
                            <!--<th style="width:10%">Recovered <br><br>(<span class="GTTotalRecovered">0</span>)</th>-->
                            <th style="width:10%">Total Amount (Without OV) <br>(<span class="GTTotalWithoutOV">0</span>)</th>
                            <th style="width:10%">OV Fees (Outstanding) <br>(<span class="GTTotalOVOutstanding">0</span>)</th>
                            <th style="width:10%">Total Amount (With OV) <br>(<span class="GTTotalRemainingDues">0</span>)</th>
                            <th style="width:10%">Sum of % Recovered</th>
                        </tr>
                    </table>
                    <?php
                    foreach ($FacultiesData as $BatchData) {
                        if (count($BatchData['Days']) > 0) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-default">
                                        <div class="box-header">
                                            <table class="table table-bordered table-hover">
                                                <tr class="text-right F<?php echo e($BatchData['FacultyID']); ?>">
                                                    <td style="width:30%; text-align: left;"><h3 class="box-title"> <i class="fa fa-plus fh" fid="<?php echo e($BatchData['FacultyID']); ?>"></i> <?php echo e($BatchData['FacultyName'] . ' ('.$BatchData['NoOfBatches'].')'); ?></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultytotalPrevPending">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultytotalCurrMonth">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultyTotalRecovered">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultyTotalWithoutOV">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultyTotalOVOutstanding">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title"><span class="FacultyTotalRemainingDues">0</span></h3></td>
                                                    <td style="width:10%"><h3 class="box-title">-</h3></td>
                                                </tr>
                                            </table>

                                        </div>
                                        <div class="box-body fb-<?php echo e($BatchData['FacultyID']); ?>" style="display:none;">
                                            <?php
                                            if (count($BatchData['Days']) > 0) {
                                                foreach ($BatchData['Days'] as $days) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box box-warning">
                                                                <div class="box-header">
                                                                    <table class="table table-bordered table-hover">
                                                                        <tr class="text-right D<?php echo e($days['Day'].$BatchData['FacultyID']); ?>">
                                                                            <td style="width:30%; text-align: left;"><h3 class="box-title"> <i class="fa fa-plus dh" did="<?php echo e($days['Day'].$BatchData['FacultyID']); ?>"></i> <?php echo e($days['Day']); ?></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DaytotalPrevPending">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DaytotalCurrMonth">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DayTotalRecovered">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DayTotalWithoutOV">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DayTotalOVOutstanding">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title"><span class="DayTotalRemainingDues">0</span></h3></td>
                                                                            <td style="width:10%"><h3 class="box-title">-</h3></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="box-body db-<?php echo e($days['Day'].$BatchData['FacultyID']); ?>" style="display:none;">
                                                                    <?php
                                                                    if (count($days['Time']) > 0) {
                                                                        foreach ($days['Time'] as $time) {
                                                                            ?>
                                                                            <div class="row TimeData">
                                                                                <div class="col-md-12">
                                                                                    <div class="box box-info">
                                                                                        <div class="box-header">
                                                                                            <table class="table table-bordered table-hover">
                                                                                                <tr class="text-right T<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time']); ?>">
                                                                                                    <td style="width:30%; text-align: left;"><h3 class="box-title"> <i class="fa fa-plus thh" tid="<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time']); ?>"></i> <?php echo e($time['Time']); ?></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimetotalPrevPending">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimetotalCurrMonth">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimeTotalRecovered">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimeTotalWithoutOV">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimeTotalOVOutstanding">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title"><span class="TimeTotalRemainingDues">0</span></h3></td>
                                                                                                    <td style="width:10%"><h3 class="box-title">-</h3></td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </div>
                                                                                        <div class="box-body tb-<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time']); ?>" style="display:none;">
                                                                                            <?php
                                                                                            if (count($time['Batches']) > 0) {
                                                                                                foreach ($time['Batches'] as $batch) {
                                                                                                    ?>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="box box-success">
                                                                                                                <div class="box-header">
                                                                                                                    <table class="table table-bordered table-hover">
                                                                                                                        <tr class="text-right">
                                                                                                                            <td style="width:30%; text-align: left;"><h3 class="box-title FNLoadData" Time="<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time']); ?>" Faculty="<?php echo e($BatchData['FacultyID']); ?>" Day="<?php echo e($days['Day'].$BatchData['FacultyID']); ?>" BatchID="<?php echo e($batch['BatchID']); ?>"> <i class="fa fa-plus fileh" fileid="<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time'].$batch['FileNo']); ?>"></i> <?php echo e($batch['FileNo']); ?>


                                                                                                                                </h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="totalPrevPending-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="totalCurrMonth-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="TotalRecovered-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="TotalWithoutOV-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="TotalOVOutstanding-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title"><span id="TotalRemainingDues-<?php echo e($batch['BatchID']); ?>"></span></h3></td>
                                                                                                                            <td style="width:10%"><h3 class="box-title">-</h3></td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                                <div class="box-body fileb-<?php echo e($days['Day'].$BatchData['FacultyID'].$time['Time'].$batch['FileNo']); ?>" style="display:none;">
                                                                                                                    <table class="table table-bordered table-hover">

                                                                                                                        <?php
                                                                                                                        if (!empty($batch['Students'])) {
                                                                                                                            foreach ($batch['Students'] as $students) {
                                                                                                                                ?>
                                                                                                                                <tr class="text-right">
                                                                                                                                    <td style="width:30%; text-align: left;">
                                                                                                                                        <table class="table">
                                                                                                                                            <tr>
                                                                                                                                                <td width="30%"><?php echo e($students->StudentNo); ?></td>
                                                                                                                                                <td width="35%"><?php echo e($students->StudentName); ?></td>
                                                                                                                                                <td width="35%"><?php echo e($students->Cell); ?></td>
                                                                                                                                            </tr>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                    <td style="width:10%" id="prev-pending-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%" id="curr-month-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%" id="recovered-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%" id="total-without-ov-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%" id="ov-fees-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%" id="remaining-dues-<?php echo e($students->StudentID); ?>">&nbsp;</td>
                                                                                                                                    <td style="width:10%">&nbsp;</td>
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
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </section>
            </div>
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
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
var Batches;
var myCounter = 0;

$(document).ready(function () {

    Batches = $('.FNLoadData');

    $('.fh').click(function () {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-minus');
        } else {
            $(this).removeClass('fa-minus');
            $(this).addClass('fa-plus');
        }
        $('.fb-' + $(this).attr('fid')).slideToggle();
    });

    $('.dh').click(function () {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-minus');
        } else {
            $(this).removeClass('fa-minus');
            $(this).addClass('fa-plus');
        }
        $('.db-' + $(this).attr('did')).slideToggle();
    });

    $('.thh').click(function () {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-minus');
        } else {
            $(this).removeClass('fa-minus');
            $(this).addClass('fa-plus');
        }
        $('.tb-' + $(this).attr('tid')).slideToggle();
    });

    $('.fileh').click(function () {
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-minus');
        } else {
            $(this).removeClass('fa-minus');
            $(this).addClass('fa-plus');
        }
        $('.fileb-' + $(this).attr('fileid')).slideToggle();
    });
});

function getsAjaxLoadData() {
    var progre = (myCounter / Batches.length * 100);
    $('.progress-bar').css('width', progre + '%').attr('aria-valuenow', progre);
    if (myCounter < Batches.length) {
        var BatchID = $(Batches[myCounter]).attr('BatchID');
        var TimeID = $(Batches[myCounter]).attr('Time');
        var DayID = $(Batches[myCounter]).attr('Day');
        var FacultyID = $(Batches[myCounter]).attr('Faculty');
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/internal-summary/get-batch-amount')); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {BatchID: BatchID},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {
                    var TotalPrevPending = 0;
                    var TotalCurrMonth = 0;
                    var TotalOVOutstanding = 0;
                    var TotalRecovered = 0;
                    var TotalWithoutOV = 0;
                    var TotalRemainingDues = 0;
                    $.each(data.Students, function (index, val) {
                        $('#prev-pending-' + val.StudentID).html(val.PrevPending);
                        $('#curr-month-' + val.StudentID).html(val.CurrMonthFees);
                        $('#ov-fees-' + val.StudentID).html(val.OVOutstanding);
                        $('#recovered-' + val.StudentID).html(val.Recovered);
                        $('#total-without-ov-' + val.StudentID).html(val.TotalWithoutOV);
                        $('#remaining-dues-' + val.StudentID).html(val.TotalWithOV);

                        TotalPrevPending += parseInt(val.PrevPending);
                        TotalCurrMonth += parseInt(val.CurrMonthFees);
                        TotalOVOutstanding += parseInt(val.OVOutstanding);
                        TotalRecovered += parseInt(val.Recovered);
                        TotalWithoutOV += parseInt(val.TotalWithoutOV);
                        TotalRemainingDues += parseInt(val.TotalWithOV);

                        var am = parseInt($('.T' + TimeID + ' .TimetotalPrevPending').html());
                        am += parseInt(val.PrevPending);
                        $('.T' + TimeID + ' .TimetotalPrevPending').html(Math.round(am, 2));

                        var bm = parseInt($('.T' + TimeID + ' .TimetotalCurrMonth').html());
                        bm += parseInt(val.CurrMonthFees);
                        $('.T' + TimeID + ' .TimetotalCurrMonth').html(Math.round(bm, 2));

                        var cm = parseInt($('.T' + TimeID + ' .TimeTotalRecovered').html());
                        cm += parseInt(val.Recovered);
                        $('.T' + TimeID + ' .TimeTotalRecovered').html(Math.round(cm, 2));

                        var dm = parseInt($('.T' + TimeID + ' .TimeTotalWithoutOV').html());
                        dm += parseInt(val.TotalWithoutOV);
                        $('.T' + TimeID + ' .TimeTotalWithoutOV').html(Math.round(dm, 2));

                        var em = parseInt($('.T' + TimeID + ' .TimeTotalOVOutstanding').html());
                        em += parseInt(val.OVOutstanding);
                        $('.T' + TimeID + ' .TimeTotalOVOutstanding').html(Math.round(em, 2));

                        var fm = parseInt($('.T' + TimeID + ' .TimeTotalRemainingDues').html());
                        fm += parseInt(val.TotalWithOV);
                        $('.T' + TimeID + ' .TimeTotalRemainingDues').html(Math.round(fm, 2));

                        // ---------------

                        var am = parseInt($('.D' + DayID + ' .DaytotalPrevPending').html());
                        am += parseInt(val.PrevPending);
                        $('.D' + DayID + ' .DaytotalPrevPending').html(Math.round(am, 2));

                        var bm = parseInt($('.D' + DayID + ' .DaytotalCurrMonth').html());
                        bm += parseInt(val.CurrMonthFees);
                        $('.D' + DayID + ' .DaytotalCurrMonth').html(Math.round(bm, 2));

                        var cm = parseInt($('.D' + DayID + ' .DayTotalRecovered').html());
                        cm += parseInt(val.Recovered);
                        $('.D' + DayID + ' .DayTotalRecovered').html(Math.round(cm, 2));

                        var dm = parseInt($('.D' + DayID + ' .DayTotalWithoutOV').html());
                        dm += parseInt(val.TotalWithoutOV);
                        $('.D' + DayID + ' .DayTotalWithoutOV').html(Math.round(dm, 2));

                        var em = parseInt($('.D' + DayID + ' .DayTotalOVOutstanding').html());
                        em += parseInt(val.OVOutstanding);
                        $('.D' + DayID + ' .DayTotalOVOutstanding').html(Math.round(em, 2));

                        var fm = parseInt($('.D' + DayID + ' .DayTotalRemainingDues').html());
                        fm += parseInt(val.TotalWithOV);
                        $('.D' + DayID + ' .DayTotalRemainingDues').html(Math.round(fm, 2));

                        // ---------------

                        var am = parseInt($('.F' + FacultyID + ' .FacultytotalPrevPending').html());
                        am += parseInt(val.PrevPending);
                        $('.F' + FacultyID + ' .FacultytotalPrevPending').html(Math.round(am, 2));

                        var bm = parseInt($('.F' + FacultyID + ' .FacultytotalCurrMonth').html());
                        bm += parseInt(val.CurrMonthFees);
                        $('.F' + FacultyID + ' .FacultytotalCurrMonth').html(Math.round(bm, 2));

                        var cm = parseInt($('.F' + FacultyID + ' .FacultyTotalRecovered').html());
                        cm += parseInt(val.Recovered);
                        $('.F' + FacultyID + ' .FacultyTotalRecovered').html(Math.round(cm, 2));

                        var dm = parseInt($('.F' + FacultyID + ' .FacultyTotalWithoutOV').html());
                        dm += parseInt(val.TotalWithoutOV);
                        $('.F' + FacultyID + ' .FacultyTotalWithoutOV').html(Math.round(dm, 2));

                        var em = parseInt($('.F' + FacultyID + ' .FacultyTotalOVOutstanding').html());
                        em += parseInt(val.OVOutstanding);
                        $('.F' + FacultyID + ' .FacultyTotalOVOutstanding').html(Math.round(em, 2));

                        var fm = parseInt($('.F' + FacultyID + ' .FacultyTotalRemainingDues').html());
                        fm += parseInt(val.TotalWithOV);
                        $('.F' + FacultyID + ' .FacultyTotalRemainingDues').html(Math.round(fm, 2));

                        // ---------------

                        var am = parseInt($('.GTtotalPrevPending').html());
                        am += parseInt(val.PrevPending);
                        $('.GTtotalPrevPending').html(Math.round(am, 2));

                        var bm = parseInt($('.GTtotalCurrMonth').html());
                        bm += parseInt(val.CurrMonthFees);
                        $('.GTtotalCurrMonth').html(Math.round(bm, 2));
                        $('.SummarytotalCurrMonth').html(Math.round(bm, 2));
                        $('.SummaryBalance').html(parseInt($('.SummarytotalCurrMonth').html()) - parseInt($('.SummaryTotalCollection').html()));

                        var cm = parseInt($('.GTTotalRecovered').html());
                        cm += parseInt(val.Recovered);
                        $('.GTTotalRecovered').html(Math.round(cm, 2));

                        var dm = parseInt($('.GTTotalWithoutOV').html());
                        dm += parseInt(val.TotalWithoutOV);
                        $('.GTTotalWithoutOV').html(Math.round(dm, 2));

                        var em = parseInt($('.GTTotalOVOutstanding').html());
                        em += parseInt(val.OVOutstanding);
                        $('.GTTotalOVOutstanding').html(Math.round(em, 2));

                        var fm = parseInt($('.GTTotalRemainingDues').html());
                        fm += parseInt(val.TotalWithOV);
                        $('.GTTotalRemainingDues').html(Math.round(fm, 2));

                        // ---------------
                    });
                    $('#totalPrevPending-' + BatchID).html(TotalPrevPending);
                    $('#totalCurrMonth-' + BatchID).html(TotalCurrMonth);
                    $('#TotalOVOutstanding-' + BatchID).html(TotalOVOutstanding);
                    $('#TotalRecovered-' + BatchID).html(TotalRecovered);
                    $('#TotalWithoutOV-' + BatchID).html(TotalWithoutOV);
                    $('#TotalRemainingDues-' + BatchID).html(TotalRemainingDues);
                }
            },
            complete: function () {
                myCounter++;
                getsAjaxLoadData();
            }
        });
    }
}

$(document).ready(function () {
    getsAjaxLoadData();
});

        </script>

    </body>
</html>
