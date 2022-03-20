<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Monthly Faculties</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.css">
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
            table.dataTable thead > tr > th {
                padding-right: 0;
            }
            .course-box {
                border: 2px solid #d4d4d4;
                margin-bottom: 10px;
                padding: 0 10px;
                text-align: left;
            }
            .course-box h3 {
                border-bottom: 2px solid #d4d4d4;
                padding-bottom: 6px;
            }
            .course-box h4 {
                border-bottom: 1px solid #ccc;
                padding-bottom: 8px;
            }
            .course-box h4 span {
                float: right;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

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
                    <h1><i class="fa fa-edit"></i> Monthly <?php echo e($TitleType); ?> Faculties</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Monthly <?php echo e($TitleType); ?> Faculties</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo e($TitleType); ?> Faculties (<?php echo e($MonthAndYearOnly); ?>)</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo e(Form::open(['url' => 'admin/month-faculties?FacultyType='.$FacultyType])); ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php echo e(Form::text('MonthYear', $MonthYear, ['class' => 'form-control datepicker', 'id' => 'MY', 'placeholder' => 'Select Month Year'])); ?>

                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Get Records</button>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>


                                    <?php echo e(Form::open(['url' => 'admin/save-month-faculties?FacultyType='.$FacultyType])); ?>

                                    <?php echo e(Form::hidden('MonthYear', $MonthYear, ['id' => 'NewMonthYear'])); ?>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="table-responsive">
                                                <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Salary</th>
                                                            <th>Incentive</th>
                                                            <th>Incentive (PKR)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($AllStaff as $staff) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($staff['FacultyName']); ?></td>
                                                                <?php echo e(Form::hidden('FacultyIDs[]', $staff['FacultyID'])); ?>

                                                                <td><?php echo e(Form::text('EmpSalary_'.$staff['FacultyID'], $staff['EmpSalary'], ['class' => 'form-control', 'placeholder' => 'Enter Salary'])); ?></td>
                                                                <td><?php echo ($staff['IsIncentive'] == 1 ? '<span class="label bg-green label-green">Yes</span>' : 'No'); ?></td>
                                                                <?php
                                                                if ($staff['IsIncentive'] == 1) {
                                                                    ?>
                                                                    <td><?php echo e(Form::text('Incentive_'.$staff['FacultyID'], $staff['Incentive'], ['class' => 'form-control', 'placeholder' => 'Enter Incentive (PKR)'])); ?></td>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <td></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <td><button class="btn btn-primary btn-sm manage-batches-btn" type="button" monthfacultyid="<?php echo e($staff['MonthFacultyID']); ?>">Manage Batches</button></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody> 
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-default add-emp-month"><i class="fa fa-plus"></i> Add Faculties in selected month</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Records</button>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>


                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>

            <div class="modal fade" id="AddEmpModal" tabindex="-1" role="dialog" aria-labelledby="AddEmpModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="StaffSalaryModalLabel"><?php echo e($TitleType); ?> Faculties Attendance Details</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(['url' => 'admin/add-faculty?FacultyType='.$FacultyType])); ?>

                            <?php echo e(Form::hidden('MonthYear', $MonthYear)); ?>


                            <button class="btn btn-success pull-right">Save Faculties in <?php echo e($MonthAndYearOnly); ?> sheet</button>

                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th><input type="checkbox" id="chkall" /></th>
                                    <th>Is Incentive</th>
                                    <th>Faculty</th>
                                    <th>Cell</th>
                                    <th>Email</th>
                                    <th>Current Salary</th>
                                </tr>
                                <?php
                                foreach ($Staffs as $stf) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="StaffArray[]" <?php echo ($stf->IsAlreadyAdded ? 'checked' : ''); ?> value="<?php echo e($stf->FacultyID); ?>" class="chk" /></td>
                                        <td><input type="checkbox" <?php echo ($stf->IsAlreadyAdded && $stf->IsIncentiveStaff && $stf->IsIncentiveStaff == 1 ? 'checked' : ''); ?> name="IsIncentive_<?php echo e($stf->FacultyID); ?>" value="1" /></td>
                                        <?php echo e(Form::hidden('Salary_'.$stf->FacultyID, $stf->Salary)); ?>

                                        <td><?php echo e($stf->FacultyName); ?></td>
                                        <td><?php echo e($stf->Contact); ?></td>
                                        <td><?php echo e($stf->Email); ?></td>
                                        <td><?php echo e($stf->Salary); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ManageBatches" tabindex="-1" role="dialog" aria-labelledby="ManageBatchesLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="ManageBatchesLabel">Faculty Batch Details</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(['url' => 'admin/add-batches-faculty?FacultyType='.$FacultyType])); ?>

                            <?php echo e(Form::hidden('MonthFacultyID', null, ['id' => 'MonthFacultyID'])); ?>


                            <button type="submit" class="btn btn-success pull-right">Save Batches</button>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="chkall" /></th>
                                        <th>Days</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody id="daytimeblock">

                                </tbody>
                            </table>

                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- /.content-wrapper -->
            <?php echo $__env->make('admin/includes/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datatables/extensions/ReloadAjax/fnReloadAjax.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/dist/js/demo.js"></script>
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- page script -->
        <script>
$(document).ready(function () {
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });

    $('#MY').change(function () {
        $('#NewMonthYear').val($(this).val());
    });

    $('#chkall').change(function () {
        $('.chk').prop('checked', $(this).is(':checked'));
    });

    $('.add-emp-month').click(function () {
        $('#AddEmpModal').modal();
    });
    $('.manage-batches-btn').click(function () {
        var MonthFacultyID = $(this).attr('monthfacultyid');
        $('#MonthFacultyID').val(MonthFacultyID);
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/get-faculty-batches?FacultyType='.$FacultyType)); ?>",
            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
            data: {MonthFacultyID: MonthFacultyID},
            dataType: "JSON",
            success: function (data) {
                if (data.Status) {
                    var daytimeblock = '';

                    $.each(data.AllDaysTime, function (index, val) {
                        daytimeblock += '<tr>';
                        daytimeblock += '<td><input type="checkbox" name="DayTimeArray[]" value="'+val.Day+'|'+val.Time+'" ' + (val.IsAlreadyAdded == 1 ? 'checked="checked"' : '') + ' /></td>';
                        daytimeblock += '<td>' + val.Day + '</td>';
                        daytimeblock += '<td>' + val.Time + '</td>';
                        daytimeblock += '</tr>';
                    });
                    $('#daytimeblock').html(daytimeblock);
                    $('#ManageBatches').modal();
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
