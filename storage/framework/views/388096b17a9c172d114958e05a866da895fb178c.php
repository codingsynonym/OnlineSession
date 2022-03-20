<?php
$segment = Request::segment(2);
$segment2 = Request::segment(3);

$FacultyType = 0;
if (\Request::has('FacultyType')) {
    $FacultyType = (int) \Request::get('FacultyType');
}

$chat = ["faculty-chat", "staff-chat"];
$config = ["faculties", "days", "time", "labs", "users", "user_group", "user_types", "curriculums", "semesters", "modules"];
$accounts = ["dcr", "pay-fees", "cr", "cr-yearly", "cr-daily", "cr-monthly", "cr-royalty", "cr-royalty-sheet", "fee-voucher", "student-ledger", "internal-report", "future-internal", "internal-actual", "internal-extra", "internal-defaulters", "internal-fee-not-paid", "online-not-online-students", "internal-fee-completed", "internal-summary"];
$finance = ["exp-head", "exp-sub-head", "expense-types", "expenses", "deposits"];
$payroll = ["month-employees", "month-faculties", "staff-attendance", "salary-sheet", "salary-sheet-display", "perm-faculty-attendance"];
$inquiry = ["areas", "pic", "report"];
$academics = ["batches", "end-batches", "timetable", "timetable2", "attendance"];
$sro = ["general-requests", "mark-attendance", "view-attendance", "feedback", "feedback-report", "feedback-summary"];
$students = ["students", "assign-studentno", "upgrade-students"];
$reports = ["deactive-batch-students"];
$profile = ["profile"];
$messages = ["messages", "message-types", "message-templates", "inquiries-message", "message-logs", "allstudents-message"];
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (\Session::get('AdminProfilePicture') != "" && \Session::get('AdminProfilePicture') != null) { ?>
                    <?php echo \Html::image('/public/uploads/administrators/' . \Session::get('AdminProfilePicture'), \Session::get('AdminProfilePicture'), ['class' => 'img-circle' ]); ?>

                <?php } else { ?>
                    <img src="<?php echo e(url('resources/assets/admin/')); ?>/dist/img/avatar.png" class="img-circle" alt="User Image">
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?php echo \Session::get('AdminFullName'); ?></p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview<?php echo ($segment == " dashboard" ? 'active' : '') ?>"> <a href="<?php echo e(url('admin/dashboard')); ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
            <li class="treeview <?php echo (in_array($segment, $chat) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-comment"></i> <span>Chat <?php echo (($ChatFacultyCheck + $ChatStaffCheck) > 0 ? '<span class="pull-right-container"><span class="label label-primary pull-right">'.($ChatFacultyCheck + $ChatStaffCheck).'</span></span>' : '<i class="fa fa-angle-left pull-right"></i>'); ?></span>

                    <span class="pull-right-container" id="all-ajax-msg" style="display: none;">
                        <span class="label label-primary pull-right"></span>
                    </span>

                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "faculty-chat" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/faculty-chat')); ?>"><i class="fa fa-circle-o"></i> Faculty
                            <?php
                            if ($ChatFacultyCheck > 0) {
                                ?>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right"><?php echo e($ChatFacultyCheck); ?></span>
                                </span>
                                <?php
                            }
                            ?>
                            <span class="pull-right-container" id="faculty-ajax-msg" style="display: none;">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a></li>
                    <li <?php echo ($segment == "staff-chat" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/staff-chat')); ?>"> <i class="fa fa-circle-o"></i> <span> Staff</span>
                            <?php
                            if ($ChatStaffCheck > 0) {
                                ?>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right"><?php echo e($ChatStaffCheck); ?></span>
                                </span>
                                <?php
                            }
                            ?>
                            <span class="pull-right-container" id="staff-ajax-msg" style="display: none;">
                                <span class="label label-primary pull-right"></span>
                            </span>
                        </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo ((in_array($segment2, $config) && $segment == "config") || in_array($segment, $config) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-cogs"></i> <span>Configurations</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment2 == "faculties" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/config/faculties')); ?>"><i class="fa fa-circle-o"></i> Faculties</a></li>
                    <li <?php echo ($segment == "days" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/days')); ?>"><i class="fa fa-circle-o"></i> Days</a></li>
                    <li <?php echo ($segment == "time" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/time')); ?>"><i class="fa fa-circle-o"></i> Time</a></li>
                    <li <?php echo ($segment == "labs" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/labs')); ?>"><i class="fa fa-circle-o"></i> Labs</a></li>
                    <li <?php echo ($segment == "curriculums" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/curriculums')); ?>"><i class="fa fa-circle-o"></i> Curriculums</a></li>
                    <li <?php echo ($segment == "semesters" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/semesters')); ?>"><i class="fa fa-circle-o"></i> Semesters</a></li>
                    <li <?php echo ($segment == "modules" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/modules')); ?>"><i class="fa fa-circle-o"></i> Modules</a></li>
                    <li <?php echo ($segment == "user_types" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/user_types')); ?>"><i class="fa fa-circle-o"></i> User Types</a></li>
                    <li <?php echo ($segment == "user_group" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/user_group')); ?>"><i class="fa fa-circle-o"></i> User Groups</a></li>
                    <li <?php echo ($segment == "users" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/users')); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $inquiry) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-book"></i> <span>Inquiry</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "areas" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/areas')); ?>"><i class="fa fa-circle-o"></i> Areas</a></li>
                    <li <?php echo ($segment == "pic" && $segment2 != "report" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/pic')); ?>"> <i class="fa fa-users"></i> <span>Inquiries</span> </a> </li>
                    <li <?php echo ($segment2 == "report" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/pic/report')); ?>"> <i class="fa fa-users"></i> <span>Report</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $academics) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-book"></i> <span>Academics</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "batches" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/batches')); ?>"><i class="fa fa-circle-o"></i> Batches</a></li>
                    <li <?php echo ($segment == "end-batches" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/end-batches')); ?>"><i class="fa fa-circle-o"></i> End Batches</a></li>
                    <li <?php echo ($segment == "timetable2" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/timetable2')); ?>"> <i class="fa fa-circle-o"></i> <span>Time Table</span> </a> </li>
                    <li <?php echo ($segment == "timetable" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/timetable')); ?>"> <i class="fa fa-circle-o"></i> <span>Time Table Report</span> </a> </li>
                    <li <?php echo ($segment == "attendance" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/attendance')); ?>"> <i class="fa fa-circle-o"></i> <span>Attendance</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $payroll) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-cogs"></i> <span>Payroll</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "month-employees" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/month-employees')); ?>"> <i class="fa fa-circle-o"></i> <span>Monthly Employees</span> </a> </li>
                    <li <?php echo ($segment == "month-faculties" && $FacultyType == 1 ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/month-faculties?FacultyType=1')); ?>"> <i class="fa fa-circle-o"></i> <span>Monthly Permanent Faculties</span> </a> </li>
                    <li <?php echo ($segment == "month-faculties" && $FacultyType == 2 ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/month-faculties?FacultyType=2')); ?>"> <i class="fa fa-circle-o"></i> <span>Monthly Visiting Faculties</span> </a> </li>
                    <li <?php echo ($segment == "staff-attendance" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/staff-attendance')); ?>"> <i class="fa fa-circle-o"></i> <span>Staff Attendance</span> </a> </li>
                    <li <?php echo ($segment == "perm-faculty-attendance" && $FacultyType == 1 ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/perm-faculty-attendance?FacultyType=1')); ?>"> <i class="fa fa-circle-o"></i> <span>Permanent Faculty Attendance</span> </a> </li>
                    <li <?php echo ($segment == "perm-faculty-attendance" && $FacultyType == 2 ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/perm-faculty-attendance?FacultyType=2')); ?>"> <i class="fa fa-circle-o"></i> <span>Visiting Faculty Attendance</span> </a> </li>
                    <li <?php echo ($segment == "salary-sheet-display" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/salary-sheet-display')); ?>"> <i class="fa fa-circle-o"></i> <span>Salary Sheet</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $students) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-users"></i> <span>Admissions</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin/students')); ?>"><i class="fa fa-user"></i> Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=1')); ?>"><i class="fa fa-user"></i> Active Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=5')); ?>"><i class="fa fa-user"></i> Waiting Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=2')); ?>"><i class="fa fa-user"></i> Break Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=3')); ?>"><i class="fa fa-user"></i> Dropout Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=4')); ?>"><i class="fa fa-user"></i> Passout Students</a></li>
                    <li><a href="<?php echo e(url('admin/students?StudentStatus=6')); ?>"><i class="fa fa-user"></i> Exam + E-Projects</a></li>
                    <li <?php echo ($segment == "assign-studentno" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/assign-studentno')); ?>"> <i class="fa fa-circle-o"></i> <span>Assign Student No.</span> </a> </li>
                    <li <?php echo ($segment == "upgrade-students" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/upgrade-students')); ?>"> <i class="fa fa-circle-o"></i> <span>Upgrade Student</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $accounts) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-cogs"></i> <span>Accounts</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "pay-fees" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/pay-fees')); ?>"> <i class="fa fa-circle-o"></i> <span>Pay Fees</span> </a> </li>
                    <li <?php echo ($segment == "cr" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr')); ?>"> <i class="fa fa-circle-o"></i> <span>CR</span> </a> </li>
                    <li <?php echo ($segment == "cr-yearly" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr-yearly')); ?>"> <i class="fa fa-circle-o"></i> <span>CR Report</span> </a> </li>
                    <li <?php echo ($segment == "cr-daily" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr-daily')); ?>"> <i class="fa fa-circle-o"></i> <span>CR Daily Report</span> </a> </li>
                    <li <?php echo ($segment == "cr-monthly" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr-monthly')); ?>"> <i class="fa fa-circle-o"></i> <span>CR Monthly Report</span> </a> </li>
                    <li <?php echo ($segment == "cr-royalty" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr-royalty')); ?>"> <i class="fa fa-circle-o"></i> <span>CR Royalty</span> </a> </li>
                    <li <?php echo ($segment == "cr-royalty-sheet" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/cr-royalty-sheet')); ?>"> <i class="fa fa-circle-o"></i> <span>CR Royalty Report</span> </a> </li>
                    <li <?php echo ($segment == "fee-voucher" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/fee-voucher')); ?>"> <i class="fa fa-circle-o"></i> <span>Fee Voucher</span> </a> </li>
                    <li <?php echo ($segment == "student-ledger" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/student-ledger')); ?>"> <i class="fa fa-circle-o"></i> <span>Student Ledger</span> </a> </li>
                    <li <?php echo ($segment == "dcr" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/dcr')); ?>"><i class="fa fa-circle-o"></i> DCR</a></li>
                    <li <?php echo ($segment == "internal-report" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-report')); ?>"><i class="fa fa-circle-o"></i> Internal Report</a></li>
                    <li <?php echo ($segment == "future-internal" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/future-internal')); ?>"><i class="fa fa-circle-o"></i> Future Internal</a></li>
                    <li <?php echo ($segment == "internal-actual" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-actual')); ?>"><i class="fa fa-circle-o"></i> Current Month Internal Received</a></li>
                    <li <?php echo ($segment == "internal-extra" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-extra')); ?>"><i class="fa fa-circle-o"></i> Internal Extra Received</a></li>
                    <li <?php echo ($segment == "internal-fee-not-paid" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-fee-not-paid')); ?>"><i class="fa fa-circle-o"></i> Internal Not Received</a></li>
                    <li <?php echo ($segment == "online-not-online-students" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/online-not-online-students')); ?>"><i class="fa fa-circle-o"></i> Online not Online Students</a></li>
                    <li <?php echo ($segment == "internal-defaulters" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-defaulters')); ?>"><i class="fa fa-circle-o"></i> Outstanding List</a></li>
                    <li <?php echo ($segment == "internal-fee-completed" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/internal-fee-completed')); ?>"><i class="fa fa-circle-o"></i> Fee Completed</a></li>
                    <li <?php echo ($segment == "internal-summary" ? 'class="active"' : '') ?>> <a href="<?php echo e(url('admin/internal-summary')); ?>"> <i class="fa fa-circle-o"></i> <span>Internal Summary</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $finance) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-cogs"></i> <span>Finance</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "exp-head" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/exp-head')); ?>"><i class="fa fa-circle-o"></i> Expense Head</a></li>
                    <li <?php echo ($segment == "exp-sub-head" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/exp-sub-head')); ?>"><i class="fa fa-circle-o"></i> Expense Sub Head</a></li>
                    <li <?php echo ($segment == "expense-types" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/expense-types')); ?>"><i class="fa fa-circle-o"></i> Expense Sub (Sub) Head</a></li>
                    <li <?php echo ($segment == "expenses" && $segment2 != "report" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/expenses')); ?>"><i class="fa fa-circle-o"></i> Expenses</a></li>
                    <li <?php echo ($segment == "deposits" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/deposits')); ?>"><i class="fa fa-circle-o"></i> Deposits</a></li>
                    <li <?php echo ($segment2 == "report" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/expenses/report')); ?>"><i class="fa fa-circle-o"></i> Expense Report</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $sro) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-user"></i> <span>SRO</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "general-requests" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/general-requests')); ?>"><i class="fa fa-circle-o"></i> General Requests</a></li>
                    <!--<li <?php echo ($segment == "mark-attendance" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/mark-attendance')); ?>"><i class="fa fa-circle-o"></i> Mark Attendance</a></li>-->
                    <li <?php echo ($segment == "view-attendance" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/view-attendance')); ?>"><i class="fa fa-circle-o"></i> View Attendance</a></li>
                    <li <?php echo ($segment == "feedback" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/feedback')); ?>"> <i class="fa fa-check"></i> <span>Feedbacks</span> </a> </li>
                    <li <?php echo ($segment == "feedback-report" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/feedback-report')); ?>"> <i class="fa fa-check"></i> <span>Feedback Report</span> </a> </li>
                    <li <?php echo ($segment == "feedback-summary" ? 'class="active"' : ''); ?>> <a href="<?php echo e(url('admin/feedback-summary')); ?>"> <i class="fa fa-list"></i> <span>Feedback Summary</span> </a> </li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $reports) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-list"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "deactive-batch-students" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/deactive-batch-students')); ?>"><i class="fa fa-circle-o"></i> Deactive Batch Students</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo (in_array($segment, $messages) ? 'active' : ''); ?>"> 
                <a href="#"> <i class="fa fa-envelope-o"></i> <span>Messages</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li <?php echo ($segment == "message-types" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/message-types')); ?>"><i class="fa fa-circle-o"></i> Message Types</a></li>
                    <li <?php echo ($segment == "message-templates" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/message-templates')); ?>"><i class="fa fa-circle-o"></i> Message Templates</a></li>
                    <li <?php echo ($segment == "messages" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/messages')); ?>"><i class="fa fa-circle-o"></i> Compose Message</a></li>
                    <li <?php echo ($segment == "inquiries-message" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/inquiries-message')); ?>"><i class="fa fa-circle-o"></i> Compose Inquiry Message</a></li>
                    <li <?php echo ($segment == "allstudents-message" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/allstudents-message')); ?>"><i class="fa fa-circle-o"></i> Compose All Students Message</a></li>
                    <li <?php echo ($segment == "message-logs" ? 'class="active"' : ''); ?>><a href="<?php echo e(url('admin/message-logs')); ?>"><i class="fa fa-circle-o"></i> Message Log</a></li>
                </ul>
            </li>
            <li class="treeview<?php echo (in_array($segment, $profile) ? ' active' : '') ?>"> <a href="<?php echo e(url('admin/profile')); ?>"> <i class="fa fa-user"></i> <span>Profile</span> </a> </li>
            <li> <a href="<?php echo e(url('admin/logout')); ?>"> <i class="fa fa-power-off"></i> <span>Sign Out</span> </a> </li>
        </ul>
    </section>
</aside>
