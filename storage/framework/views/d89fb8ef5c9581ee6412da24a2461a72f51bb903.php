<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Students</title>
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
                    <h1><i class="fa fa-edit"></i> <?php echo e((isset($statuses[$StudentStatus]) ? $statuses[$StudentStatus] : '')); ?> Students</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Students</li>
                    </ol>
                </section>
                <?php echo Form::open([ 'url' => 'admin/students/delete', 'id' => 'frm_list' ]); ?>

                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <div class="box-body table-responsive">
                                    <div class="row" style="margin-top: 20px;">
                                        <?php
                                        if (!empty($Courses)) {
                                            foreach ($Courses as $course) {
                                                ?>
                                                <div class="col-md-12">
                                                    <h2 class="text-center">Total: <?php echo e($course['TotalAdmissions']); ?></h2>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="counselor-box">
                                                        <div class="course-box">
                                                            <h3>Career (<?php echo e($course['CareerCountTotal']); ?>)</h3> 
                                                            <?php
                                                            foreach ($course['CareersCount'] as $careerIndex => $careerValue) {
                                                                ?>
                                                                <h4><?php echo e($careerIndex); ?>: <span>(<?php echo e($careerValue); ?>) </span></h4>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="counselor-box">
                                                        <div class="course-box">
                                                            <h3>STC (<?php echo e($course['STCCountTotal']); ?>)</h3> 
                                                            <?php
                                                            foreach ($course['STCsCount'] as $stcIndex => $stcValue) {
                                                                ?>
                                                                <h4><?php echo e($stcIndex); ?>: <span>(<?php echo e($stcValue); ?>)</span></h4>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="col-md-3">
                                            <div class="counselor-box">
                                                <div class="course-box">
                                                    <h3>Male: <span id="male"></span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="counselor-box">
                                                <div class="course-box">
                                                    <h3>Female: <span id="female"></span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="counselor-box">
                                                <div class="course-box">
                                                    <h3>Total after filter: <span id="Total"></span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                <h2 class="text-center">Total <span id="Total"></span></h2>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div style="border: 1px solid #000; padding: 0 20px;">
                                                                                    <h3>Careers <span id="careers"></span></h3>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <h4>CPISM <span id="CPISM"></span></h4>
                                                                                            <h4>HDSE <span id="HDSE"></span></h4>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <h4>DISM <span id="DISM"></span></h4>
                                                                                            <h4>ADSE <span id="ADSE"></span></h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div style="border: 1px solid #000; padding: 0 20px;">
                                                                                    <h3>STC <span id="STC"></span></h3>
                                                                                    <h3>Male <span id="male"></span></h3>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div style="border: 1px solid #000; padding: 0 20px;">
                                                                                    <h3>OST <span id="OST"></span></h3>
                                                                                    <h3>Female <span id="female"></span></h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo e((isset($statuses[$StudentStatus]) ? $statuses[$StudentStatus] : '')); ?> Students</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-sm btn-primary" onClick="location.href = '<?php echo e(url('admin/students/add')); ?>'"><i class="fa fa-plus"></i> Add New</button>
                                        <button type="button" class="btn btn-sm btn-danger btnTools" onClick="doDelete()" id="btnDelete"><i class="fa fa-trash-o"></i> Delete</button>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <?php
                                        if ($StudentStatus == 0) {
                                            ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" id="dateFrom" value="<?php echo e($startDate); ?>" class="DateFromTo form-control filterStudents" placeholder="Date From" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" id="dateTo" value="<?php echo e($endDate); ?>" class="DateFromTo form-control filterStudents" placeholder="Date To" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select id="StudentStatus" class="filterStudents form-control">
                                                        <option <?php echo ($StudentStatus == 0 ? 'selected="selected"' : ''); ?> value="0">All Students</option>
                                                        <option <?php echo ($StudentStatus == 1 ? 'selected="selected"' : ''); ?> value="1">Active Students</option>
                                                        <option <?php echo ($StudentStatus == 2 ? 'selected="selected"' : ''); ?> value="2">Break Students</option>
                                                        <option <?php echo ($StudentStatus == 3 ? 'selected="selected"' : ''); ?> value="3">Dropout Students</option>
                                                        <option <?php echo ($StudentStatus == 4 ? 'selected="selected"' : ''); ?> value="4">Passout Students</option>
                                                        <option <?php echo ($StudentStatus == 5 ? 'selected="selected"' : ''); ?> value="5">Unspecified Students</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-success get-result" type="button">Get Result</button>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            if ($StudentStatus == 1 || $StudentStatus == 5 || $StudentStatus == 2 || $StudentStatus == 6) {
                                                ?>
                                                <input type="hidden" id="dateFrom" class="DateFromTo form-control filterStudents" placeholder="Date From" />
                                                <input type="hidden" id="dateTo" class="DateFromTo form-control filterStudents" placeholder="Date To" />
                                                <?php
                                            } else {
                                                ?>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="dateFrom" value="<?php echo e($startDate); ?>" class="DateFromTo form-control filterStudents" placeholder="Date From" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="dateTo" value="<?php echo e($endDate); ?>" class="DateFromTo form-control filterStudents" placeholder="Date To" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <button class="btn btn-success get-result" type="button">Get Result</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" id="StudentStatus" value="<?php echo e($StudentStatus); ?>" class="DateFromTo form-control filterStudents" placeholder="Date To" />
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
								
                                <div class="box-body table-responsive" style='50px'>
                                    <table id="dataList" class="display table table-bordered table-striped table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAllNone" class="all" /></th>
                                                <th>Student ID</th>
                                                <th>Picture</th>
                                                <th>File</th>
                                                <th>Enroll. No.</th>
                                                <th>Student Name</th>
                                                <th>Enrolled Course</th>
                                                <th>Cell</th>
                                                <th>Day</th>
                                                
                                                
                                                
                                                
                                                
                                                <th>Status</th>
                                                
                                                
                                                
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer"></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <?php echo FORM::close(); ?>

                <!-- /.content -->
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

        <script language="javascript">
                                            var checkAll;
                                            var checkboxes;
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
                                            $(function () {

                                                var data_list = $('#dataList').dataTable({
                                                    "processing": true,
                                                    "serverSide": true,
                                                    "ajax": {
                                                        'type': 'POST',
                                                        'url': '<?php echo e(url(Request::path())); ?>?StudentStatus=' + $('#StudentStatus').val() + '&DateFrom=' + $('#dateFrom').val() + '&DateTo=' + $('#dateTo').val(),
                                                        'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}
                                                    },
                                                    "pageLength": <?php echo $recordsTotal; ?>,
                                                    "aLengthMenu": [[10, 25, 50, 100, 500, <?php echo $recordsTotal; ?>], [10, 25, 50, 100, 500, "All"]],
                                                    aoColumnDefs: [
                                                        {
                                                            bSortable: false,
                                                            aTargets: [0, 10]
                                                        }
                                                    ],
                                                    "order": [[1, 'desc']],
                                                    "oLanguage": {
                                                        "sSearch": "",
                                                        "sProcessing": "<img src='<?php echo e(url('resources/assets/admin')); ?>/images/loading-spinner-grey.gif'>"
                                                    },
                                                    "fnDrawCallback": function (myData) {
                                                        $('#CPISM').html(myData.json.CPISM);
                                                        $('#DISM').html(myData.json.DISM);
                                                        $('#ADSE').html(myData.json.ADSE);
                                                        $('#HDSE').html(myData.json.HDSE);
                                                        $('#STC').html(myData.json.STC);
                                                        $('#careers').html(myData.json.careers);
                                                        $('#OST').html(myData.json.OST);
                                                        $('#Total').html(myData.json.Total);
                                                        $('#male').html(myData.json.male);
                                                        $('#female').html(myData.json.female);
                                                        checkAll = $('input.all');
                                                        checkboxes = $('input.check');
                                                        $('input[type="checkbox"], input[type="radio"]').iCheck({
                                                            checkboxClass: 'icheckbox_minimal-blue',
                                                            radioClass: 'iradio_minimal-blue'
                                                        });
                                                        checkAll.on('ifChecked ifUnchecked', function (event) {
                                                            if (event.type == 'ifChecked') {
                                                                checkboxes.iCheck('check');
                                                            } else {
                                                                checkboxes.iCheck('uncheck');
                                                            }
                                                        });
                                                        checkboxes.on('ifChanged', function (event) {
                                                            if (checkboxes.filter(':checked').length == checkboxes.length) {
                                                                checkAll.prop('checked', 'checked');
                                                            } else {
                                                                checkAll.removeProp('checked');
                                                            }
                                                            checkAll.iCheck('update');
                                                        });
                                                        $(".btnTools").prop("disabled", !(parseInt(data_list.fnGetData().length) > 0));
                                                    }
                                                });
                                                $(".get-result").click(function () {
                                                    data_list.fnReloadAjax('<?php echo e(url(Request::path())); ?>?StudentStatus=' + $('#StudentStatus').val() + '&DateFrom=' + $('#dateFrom').val() + '&DateTo=' + $('#dateTo').val());
                                                    data_list.fnClearTable(0);
                                                    data_list.fnDraw();
                                                });
                                                $('#dataList_filter input').attr('placeholder', 'Search...');
                                            });
                                            function doDelete()
                                            {
                                                if (checkboxes.filter(':checked').length > 0)
                                                {
                                                    ok = function () {
                                                        $("#frm_list").submit();
                                                    };
                                                    message_box("Confirm", "This will delete all selected Records.<br>Are you sure?", "confirm", ok, null);
                                                } else
                                                {
                                                    message_box("Alert", "Please select Record to delete", "alert", null, null);
                                                }
                                            }
        </script>
    </body>
</html>
