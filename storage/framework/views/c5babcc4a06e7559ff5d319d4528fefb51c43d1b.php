<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Edit Batch</title>
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
                    <h1>Batches</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo e(url('admin/batches')); ?>">Batches</a></li>
                        <li class="active">Edit</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo Form::open([ 'url' => 'admin/batches/'.$batch->BatchID]); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit</h3>
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/batches')); ?>'"><i class="fa fa-times"></i> Cancel</button>
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
                                                                <label for="FileNo">File No: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('FileNo', $batch->FileNo, ['placeholder' => 'Enter File No. (FN100)', 'class' => 'form-control', 'id' => 'FileNo']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="BatchCode">Batch Code: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('BatchCode', $batch->BatchCode, ['placeholder' => 'Enter Batch Code', 'class' => 'form-control', 'id' => 'BatchCode']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="LabID">Lab: </label>
                                                                <?php echo Form::select('LabID', $labs, $batch->LabID, ['placeholder' => 'Select Lab', 'class' => 'form-control select2', 'id' => 'LabID']); ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="BatchStartDate">Batch Start Date: </label>
                                                                <?php echo Form::text('BatchStartDate', $batch->BatchStartDate, ['placeholder' => 'Enter Batch Start Date', 'class' => 'form-control datepicker', 'id' => 'BatchStartDate']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Days">Days: </label>
                                                                <?php echo Form::select('Days', $days, $batch->Days, ['placeholder' => 'Select Days', 'class' => 'form-control', 'id' => 'Days']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Time">Time: </label>
                                                                <?php echo Form::select('Time', $time, $batch->Time, ['placeholder' => 'Select Time', 'class' => 'form-control', 'id' => 'Time']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="CurriculumID">Select Curriculum:  <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('CurriculumID', $curriculums, $batch->CurriculumID, ['placeholder' => 'Select Curriculum', 'class' => 'form-control select2', 'id' => 'CurriculumID']); ?>

                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="SemesterID">Select Semester:  <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('SemesterID', $semesters, $batch->SemesterID, ['placeholder' => 'Select Semester', 'class' => 'form-control select2', 'id' => 'SemesterID']); ?>

                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ModuleID">Select Module:  <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('ModuleID', $modules, $batch->ModuleID, ['placeholder' => 'Select Module', 'class' => 'form-control select2', 'id' => 'ModuleID']); ?>

                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="FacultyID">Select Faculty:  <span class="mandatory">*</span></label>
                                                                <?php echo Form::select('FacultyID', $faculties, $batch->FacultyID, ['placeholder' => 'Select Faculty', 'class' => 'form-control select2', 'id' => 'FacultyID']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Sessions">No. of Sessions: <span class="mandatory">*</span></label>
                                                                <?php echo Form::text('Sessions', $batch->Sessions, ['placeholder' => 'Enter No. of Sessions', 'class' => 'form-control', 'id' => 'Sessions']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ModStartDate">Mod. Start Date: </label>
                                                                <?php echo Form::text('ModStartDate', $batch->ModStartDate, ['placeholder' => 'Enter Mod. Start Date', 'class' => 'form-control datepicker', 'id' => 'ModStartDate']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ModEndDate">Mod. End Date: </label>
                                                                <?php echo Form::text('ModEndDate', $batch->ModEndDate, ['placeholder' => 'Enter Mod. End Date', 'class' => 'form-control datepicker', 'id' => 'ModEndDate']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ActEndDate">Actual End Date: </label>
                                                                <?php echo Form::text('ActEndDate', $batch->ActEndDate, ['placeholder' => 'Enter Actual End Date', 'class' => 'form-control datepicker', 'id' => 'ActEndDate']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Status">Status</label><br>
                                                                <label>
                                                                    <?php echo FORM::radio('Status', 1, ($batch->Status == 1 ? true : null)); ?>

                                                                    Active
                                                                </label>
                                                                <label>
                                                                    <?php echo FORM::radio('Status', 0, ($batch->Status == 0 ? true : null)); ?>

                                                                    Deactive
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

                                <div class="box-footer">
                                    <div class="box-tools pull-right">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="location.href = '<?php echo e(url('admin/batches')); ?>'"><i class="fa fa-times"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo FORM::close(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Batch Students</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-border table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Student ID</th>
                                                        <th>Enrollment No</th>
                                                        <th>Student Name</th>
                                                        <th>Course Code</th>
                                                        <th>Upgrade Course Code</th>
                                                        <th>Student Status</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($students)) {
                                                        foreach ($students as $std) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($std->StudentID); ?></td>
                                                                <td><?php echo e($std->StudentNo); ?></td>
                                                                <td><?php echo e($std->StudentName); ?></td>
                                                                <td><?php echo e($std->CourseCode); ?></td>
                                                                <td><?php echo e($std->UpgradeCourse); ?></td>
                                                                <td><?php echo e($statuses[$std->StudentStatus]); ?></td>
                                                                <td><?php echo e($std->Cell); ?></td>
                                                                <td><?php echo e($std->Email); ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Course Change Log</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-border table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.#</th>
                                                        <th>Log ID</th>
                                                        <th>Sequence</th>
                                                        <th>Batch Code</th>
                                                        <th>Days</th>
                                                        <th>Time</th>
                                                        <th>Batch Start Date</th>
                                                        <th>Course Start Date</th>
                                                        <th>Course End Date</th>
                                                        <th>Course Name</th>
                                                        <th>Faculty</th>
                                                        <th>Actual Duration</th>
                                                        <th>Actual Session</th>
                                                        <th>Session Held</th>
                                                        <th>Session Overflow</th>
                                                        <th>Duration Overflow</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($BatchLog)) {
                                                        $count = 1;
                                                        foreach ($BatchLog as $log) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($count); ?></td>
                                                                <td><?php echo e($log->BatchModuleID); ?></td>
                                                                <td><?php echo e($log->Sort); ?></td>
                                                                <td><?php echo e($log->BatchCode); ?></td>
                                                                <td><?php echo e($log->Days); ?></td>
                                                                <td><?php echo e($log->Time); ?></td>
                                                                <td><?php echo e($log->BatchStartDate); ?></td>
                                                                <td><?php echo e($log->CourseStartDate); ?></td>
                                                                <td><?php echo e($log->CourseEndDate); ?></td>
                                                                <td><?php echo e($log->ModuleName); ?></td>
                                                                <td><?php echo e($log->FacultyName); ?></td>
                                                                <td><?php echo e($log->ActualDuration); ?></td>
                                                                <td><?php echo e($log->ActualSession); ?></td>
                                                                <td><?php echo e($log->SessionHeld); ?></td>
                                                                <td><?php echo e(($log->ActualSession - $log->SessionHeld)); ?></td>
                                                                <td><?php echo e(($log->ConductedDuration - $log->ActualDuration)); ?></td>
                                                                <td><button class="btn btn-primary btn-xs btn-edit-log" logid="<?php echo e($log->BatchModuleID); ?>" type="button">Edit</button></td>
                                                            </tr>
                                                            <?php
                                                            $count++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="modal fade" id="LogModal" tabindex="-1" role="dialog" aria-labelledby="LogModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="SalaryModalLabel">Edit Log</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo Form::open([ 'url' => 'admin/batches/update-log']); ?>

                                <input type="hidden" name="BatchModuleID" value="" id="BatchModuleID" />
                                <input type="hidden" name="BatchID" value="<?php echo e($batch->BatchID); ?>" id="BatchID" />
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Sort">Sequence:</label>
                                            <input type="number" name="Sort" id="Sort" placeholder="Enter Sequence" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Days">Days:</label>
                                            <input type="text" name="Days" id="Days" placeholder="Enter Days" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Time">Time:</label>
                                            <input type="text" name="Time" id="Time" placeholder="Enter Time" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="CourseStartDate">Course Start Date:</label>
                                            <input type="text" name="CourseStartDate" id="CourseStartDate" placeholder="Enter Course Start Date" class="form-control datepicker" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="CourseEndDate">Course End Date:</label>
                                            <input type="text" name="CourseEndDate" id="CourseEndDate" placeholder="Enter Course End Date" class="form-control datepicker" />
                                            <input type="hidden" name="CourseActEndDate" id="CourseActEndDate"  class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ModuleID2">Course Name:</label>
                                    <?php echo Form::select('ModuleID', $AllModules, null, ['placeholder' => 'Select Module', 'class' => 'form-control', 'id' => 'ModuleID2', 'style' => 'width:100%']); ?>

                                </div>
                                <div class="form-group">
                                    <label for="FacultyID">Faculty Name:</label>
                                    <?php echo Form::select('FacultyID', $faculties, null, ['placeholder' => 'Select Faculty', 'class' => 'form-control', 'id' => 'FacultyID', 'style' => 'width:100%']); ?>

                                </div>
                                <div class="form-group">
                                    <label for="ActualSession">Actual Session:</label>
                                    <input type="text" name="ActualSession" id="ActualSession" placeholder="Enter Actual Session" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="SessionHeld">Session Held:</label>
                                    <input type="text" name="SessionHeld" id="SessionHeld" placeholder="Enter Session Held" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <button class="btn btn-danger" type="button" onclick="deleteLog()">Delete this record</button>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer"> </div>
                        </div>
                    </div>
                </div>
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
                                        $('#CurriculumID').change(function() {
                                        getSemesters($(this).val());
                                        });
<?php
if (\Session::has('_old_input')) {
    ?>
                                            getSemesters(<?php echo \Session::get('_old_input')['CurriculumID'] ?>);
    <?php
}
?>

                                        function deleteLog() {
                                        var LogID = $('#LogModal #BatchModuleID').val();
                                        if (confirm("Are you sure, do you want to delete this log record?")) {
                                        location.href = '<?php echo e(url("admin/batches/delete-log")); ?>/' + LogID + '/' + '<?php echo e($batch->BatchID); ?>';
                                        }
                                        }
                                        function getSemesters(CurrID) {
                                        var SetDefVal = <?php echo (\Session::has('_old_input') ? \Session::get('_old_input')['SemesterID'] : "0"); ?>;
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-semesters')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {CurriculumID: CurrID},
                                                dataType: "JSON",
                                                success: function (data) {
                                                if (data.Status) {
                                                var myData = '<option value="">Select Semester</option>';
                                                $.each(data.Semesters, function(index, val) {
                                                myData += '<option ' + (SetDefVal == val.SemesterID ? 'selected' : '') + ' value="' + val.SemesterID + '">' + val.SemesterName + '</option>';
                                                })

                                                        $('#SemesterID').html(myData);
                                                } else {
                                                alert(data.Message);
                                                }
                                                },
                                                complete: function () {
                                                getModules(<?php echo \Session::get('_old_input')['SemesterID'] ?>);
                                                }
                                        });
                                        }

                                        $(document).ready(function() {
                                        $('.btn-edit-log').click(function() {
                                        var logid = $(this).attr('logid');
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-log')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {LogID: logid},
                                                dataType: "JSON",
                                                success: function (data) {
                                                if (data.Status) {
                                                $('#LogModal #CourseActEndDate').val("");
                                                $('#LogModal #Sort').val(data.BatchLog.Sort);
                                                $('#LogModal #BatchModuleID').val(data.BatchLog.BatchModuleID);
                                                $('#LogModal #Days').val(data.BatchLog.Days);
                                                $('#LogModal #Time').val(data.BatchLog.Time);
                                                $('#LogModal #CourseStartDate').val(data.BatchLog.CourseStartDate);
                                                $('#LogModal #CourseEndDate').val(data.BatchLog.CourseEndDate);
                                                $('#LogModal #ModuleID2').val(data.BatchLog.ModuleID);
                                                $('#LogModal #FacultyID').val(data.BatchLog.FacultyID);
                                                $('#LogModal #ActualDuration').val(data.BatchLog.ActualDuration);
                                                $('#LogModal #ActualSession').val(data.BatchLog.ActualSession);
                                                $('#LogModal #SessionHeld').val(data.BatchLog.SessionHeld);
                                                $('#LogModal').modal();
                                                } else {
                                                alert(data.Message);
                                                }
                                                },
                                                complete: function () {

                                                }
                                        });
                                        });
                                        });
                                        function getModules(SemID) {
                                        var SetDefVal = <?php echo (\Session::has('_old_input') ? \Session::get('_old_input')['ModuleID'] : "0"); ?>;
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-modules')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {SemesterID: SemID},
                                                dataType: "JSON",
                                                success: function (data) {
                                                if (data.Status) {
                                                var myData = '<option value="">Select Module</option>';
                                                $.each(data.Modules, function(index, val) {
                                                myData += '<option ' + (SetDefVal == val.ModuleID ? 'selected' : '') + ' value="' + val.ModuleID + '">' + val.ModuleName + '</option>';
                                                })
                                                        $('#ModuleID').html(myData);
                                                } else {
                                                alert(data.Message);
                                                }
                                                },
                                                complete: function () {

                                                }
                                        });
                                        }

                                        function getEndDate(StartDate, Sessions, Days) {
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-end-date')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {StartDate: StartDate, Sessions: Sessions, Days:Days},
                                                dataType: "JSON",
                                                success: function (data) {
                                                $("#ModEndDate").val(data);
                                                },
                                                error: function (err){
                                                console.log(err);
                                                },
                                                complete: function () {

                                                }
                                        });
                                        }

                                        function getEndDate2(StartDate, Sessions, Days) {
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-end-date')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {StartDate: StartDate, Sessions: Sessions, Days:Days},
                                                dataType: "JSON",
                                                success: function (data) {
                                                $("#CourseActEndDate").val(data);
                                                },
                                                error: function (err){
                                                console.log(err);
                                                },
                                                complete: function () {

                                                }
                                        });
                                        }

                                        function getSessions(modid) {
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-sessions')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {ModuleID:modid},
                                                dataType: "JSON",
                                                success: function (data) {
                                                $("#Sessions").val(data);
                                                },
                                                error: function (err){
                                                console.log(err);
                                                },
                                                complete: function () {

                                                }
                                        });
                                        }

                                        function getSessions2(modid) {
                                        $.ajax({
                                        type: "POST",
                                                url: "<?php echo e(url('admin/batches/get-sessions')); ?>",
                                                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                                                data: {ModuleID:modid},
                                                dataType: "JSON",
                                                success: function (data) {
                                                $("#ActualSession").val(data);
                                                getEndDate2($("#LogModal #CourseStartDate").val(), $("#LogModal #ActualSession").val(), $("#LogModal #Days").val());
                                                },
                                                error: function (err){
                                                console.log(err);
                                                },
                                                complete: function () {

                                                }
                                        });
                                        }

                                        $('#ModStartDate,#Sessions,#Days').on("change", function() {
                                        getEndDate($("#ModStartDate").val(), $("#Sessions").val(), $("#Days").val());
                                        });
                                        $('#SemesterID').change(function() {
                                        getModules($(this).val());
                                        });
                                        $('#ModuleID').change(function() {
                                        getSessions($(this).val());
                                        });
                                        $('#ModuleID2').change(function() {
                                        getSessions2($(this).val());
                                        });
                                        $('#LogModal #ModuleID2, #LogModal #CourseStartDate, #LogModal #Days').on("change", function() {
                                        getEndDate2($("#LogModal #CourseStartDate").val(), $("#LogModal #ActualSession").val(), $("#LogModal #Days").val());
                                        });
                                        });
        </script>
    </body>
</html>
