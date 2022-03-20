<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($configurations['project_name']); ?> | Staff Chat</title>
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
        <link rel="stylesheet" href="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .users-list {
                border: 1px solid #ccc;
                height: 80vh;
                overflow: scroll;
                overflow-x: auto;
            }
            .users-list ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }
            .users-list ul li {
                border-bottom: 1px solid #e5e5e5;
            }
            .users-list ul li img {
                width: 60px;
                height: 60px;
                margin-right: 12px;
            }
            .users-list ul li a {
                color: #333;
                display: block;
                font-weight: 400;
                font-size: 16px;
            }
            .users-list ul li a:hover {
                background: #efefef;
            }
            .users-list ul li a.active {
                background: #dfdfdf;
            }
            .chat-area {
                border: 1px solid #ccc;
                height: 80vh;
                background: #e9e9e9;
                overflow: scroll;
                overflow-x: auto;
            }
            #chat-header {
                background: #222d32;
                font-weight: 400;
                color: #fff;
                font-size: 20px;
                border: 1px solid #222d32;
                position: absolute;
                top: 0;
                height: 62px;
                width: 96.5%;
            }
            #chat-header img {
                width: 60px;
                height: 60px;
                margin-right: 12px;
            }
            #chat-body {
                padding: 72px 30px 96px 30px;
            }
            .rcv {
                background: #fff;
                float: left;
                color: #333;
                display: inline-block;
                padding: 5px 10px;
                border-radius: 6px;
                clear: both;
                margin-bottom: 5px;
                margin-top: 5px;
                font-size: 18px;
                max-width: 70%;
            }
            .send {
                background: #dcf8c6;
                float: right;
                color: #333;
                display: inline-block;
                padding: 5px 10px;
                border-radius: 6px;
                clear: both;
                margin-bottom: 5px;
                margin-top: 5px;
                font-size: 18px;
                border: 1px solid #c9efac;
                max-width: 70%;
            }
            #chat-footer {
                clear: both;
                background: #f5f5f5;
                border: 1px solid #ccc;
                position: absolute;
                bottom: 0;
                width: 96.5%;
                height: 86px;
            }
            #chat-footer textarea {
                border-radius: 25px;
            }
            #chat-footer .content {
                min-height: 0;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper"> <?php echo $__env->make('admin/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="content-wrapper" style="background:#fff;">
                <section class="content-alert">
                    <div class="row">
                        <div class="col-xs-12" style="padding: 5px 20px;">
                            <?php echo $__env->make('admin/includes/front_alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>                            
                    </div>
                </section>
                <section class="content chat-section">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="users-list">
                                <ul id="MyUsersList">
                                    <?php
                                    foreach ($Staff as $stf) {
                                        ?>
                                        <li id="mUser<?php echo e($stf->AdminID); ?>"><a class="<?php echo e(($stf->AdminID == $StaffID ? 'active' : '')); ?>" href="<?php echo e(url('admin/staff-chat/'.$stf->AdminID)); ?>"><img style="float: left;" src="<?php echo e(url('resources/assets/admin/dist/img/avatar.png')); ?>" /> <div style="float: left;"><?php echo $stf->FirstName.' '.$stf->LastName.'<br>('.$stf->TypeName.')'; ?></div>
                                                <?php
                                                if ($stf->ChatCount > 0) {
                                                    ?>
                                                    <span class="pull-right-container">
                                                        <span style="margin: 20px 10px 0 0;" class="label label-primary pull-right"><?php echo e($stf->ChatCount); ?></span>
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                                <span class="pull-right-container ajax-user-chat" id="ajax-user-chat<?php echo e($stf->AdminID); ?>" style="display: none;">
                                                    <span style="margin: 20px 10px 0 0;" class="label label-primary pull-right"></span>
                                                </span>
                                                <div class="clearfix"></div></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="chat-area" id="chatarea">
                                <div id="chat-header">
                                    <img src="<?php echo e(url('resources/assets/admin/dist/img/avatar.png')); ?>" /> <?php echo e($StaffName); ?>

                                    <button type="button" class="btn btn-default pull-right btn-send-sms" style="margin-top: 10px; margin-right: 10px;">Send SMS</button>
                                </div>
                                <div id="chat-body">
                                    <?php
                                    $ChatID = 0;
                                    foreach ($Chat as $msg) {
                                        ?>
                                        <p class="<?php echo e(($msg->From == Session::get('AdminID') ? 'send' : 'rcv')); ?>"><?php echo $msg->Message; ?>
                                        <span style="display: block;
                                                  margin-left: 20px;
                                                  margin-top: 10px;
                                                  font-size: 13px;
                                                  color: #7b7979;
                                                  line-height: 12px; float: right;">
                                                <small><?php echo $msg->Dated; ?></small>
                                                <?php
                                                if ($msg->From == Session::get('AdminID') && $msg->Status == 1) {
                                                    ?>
                                                    <img width="15" src="<?php echo e(url('resources/assets/admin/images/check.png')); ?>" />
                                                    <?php
                                                }
                                                if ($msg->From == Session::get('AdminID')) {
                                                    ?>
                                                    <input type="checkbox" class="chatids" name="ChatIDs[]" value="<?php echo e($msg->Message); ?>" />
                                                    <input type="hidden" class="FacultyID" name="FacultyID" value="<?php echo e($msg->To); ?>" />
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </p>
                                        <?php
                                        $ChatID = $msg->StaffChatID;
                                    }
                                    ?>
                                        <div id="ajax-chat-body"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="chat-footer">
                                    <div class="content">
                                        <?php echo Form::open([ 'url' => 'admin/staff-chat/'.$StaffID, 'class' => 'print-hidden']); ?>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <textarea name="message" style="resize: none;" placeholder="Type a message" rows="2" class="form-control"></textarea>
                                                <input type="hidden" id="ChatID" name="ChatID" value="<?php echo e($ChatID); ?>" />
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" style="width:92%; font-size: 20px; padding: 11px 0;" class="btn btn-success">Send</button>
                                            </div>
                                        </div>
                                        <?php echo FORM::close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::open([ 'url' => 'admin/send-staff-chat-sms', 'id' => 'smsform']); ?>

                        <input type="hidden" id="FrmFacultyID" name="FrmFacultyID" value="" />
                        <input type="hidden" id="FrmSms" name="FrmSms" value="" />
                    <?php echo FORM::close(); ?>

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
        <script src="<?php echo e(url('resources/assets/admin/')); ?>/plugins/select2/select2.full.min.js"></script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script>
function updateScroll() {
    var elemt = document.getElementById('chat-area');
    console.log(elemt);
    elemt.scrollTop = elemt.scrollHeight;
}

$(document).ready(function () {
    document.getElementById('chatarea').scrollTop = 9999999999;
//    updateScroll();
});
        </script>
        <?php echo $__env->make('admin/includes/scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script>
            $(document).ready(function () {
            var ChatID = 0;
            var mUserID = 0;
            setInterval(function () {
            ChatID = $('#ChatID').val();
            $.ajax({
            type: "POST",
                    url: "<?php echo e(url('admin/get-staff-chat-messages')); ?>",
                    'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                    data: {'ChatID': ChatID},
                    dataType: "JSON",
                    success: function (data) {
                    if (data.Chat && data.Chat != "") {
                    var mJSON = data.Chat;
                    for (var i = 0; i < mJSON.length; i++) {
                    $('#ajax-user-chat' + mJSON[i].From).show();
                    $('#ajax-user-chat' + mJSON[i].From + ' span').html('new');
                    $('#mUser' + mJSON[i].From).prependTo('#MyUsersList');
                    if (mJSON[i].From == <?php echo e($StaffID); ?>) {
                    mUserID = mJSON[i].From;
                    $('#ajax-chat-body').append('<p class="rcv">' + mJSON[i].Message + '</p>');
                    document.getElementById('chatarea').scrollTop = 9999999999;
                    }
                    }
                    }
                    },
                    complete: function () {
                    if (mUserID > 0) {
                    $.ajax({
                    type: "POST",
                            url: "<?php echo e(url('admin/update-staff-chat-status')); ?>",
                            'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                            data: {'UserID': mUserID},
                            dataType: "JSON",
                            success: function (data) {
                            if (data.Status) {
                            $('#ajax-user-chat' + mUserID).hide();
                            $('#ajax-user-chat' + mUserID + ' span').html('');
                            }
                            },
                            complete: function () {
                            
                            }
                    });
                    }
                    }
            });
            },
                    5000);
                    
                    $('.btn-send-sms').click(function() {
                    var MessageIDs = $('.chatids:checked').map(function () {
                        return this.value;
                    }).get().join(",\n");

                    var FacultyID = $('.FacultyID').val();
                    
                    if(FacultyID != "" && MessageIDs != "") {
                        if(confirm("Are you sure? you want to send sms to staff?")) {
                            $('#FrmFacultyID').val(FacultyID);
                            $('#FrmSms').val(MessageIDs);
                            $('#smsform').submit();
                        }
                    } else {
                        alert("Please select message to send by sms");
                    }
                });
                    
            });
        </script>

    </body>
</html>
