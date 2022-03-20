<div id="error_msg" class="alert <?php echo e((Session::has('errors')) ? '' : 'hidden'); ?> alert-danger fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-exclamation-circle"></i>
	<strong>Errors(s)!</strong>
	<div class="msg">
		<?php if(gettype($errors) == 'object'): ?>
			
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				<?php echo e($msg); ?> <br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php elseif(Session::has('errors')): ?>
			<?php $__currentLoopData = Session::get('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
				<?php echo e($error); ?>  <br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</div>
</div>
<div id="warning_msg" class="alert <?php echo e((Session::has('warning_msg')) ? '' : 'hidden'); ?> alert-warning fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-warning"></i>
	<strong>Warning!</strong> <div class="msg">
		<?php if(Session::has('warning_msg')): ?>
		<?php echo e(Session::get('warning_msg')); ?>

		<?php endif; ?>
	</div>
</div>
<div id="info_msg" class="alert <?php echo e((Session::has('info_msg')) ? '' : 'hidden'); ?> alert-info fade in alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-info"></i>
	<strong>Information!</strong> <div class="msg">
		<?php if(Session::has('info_msg')): ?>
		<?php echo e(Session::get('info_msg')); ?>

		<?php endif; ?>
	</div>
</div>
<div id="success_msg" class="alert <?php echo e((Session::has('success')) ? '' : 'hidden'); ?> alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa-lg fa fa-check"></i>
	<strong>Success :</strong> <div class="msg">
		<?php if(Session::has('success')): ?>
		<?php echo Session::get('success'); ?>

		<?php endif; ?>
	</div>
</div>

<div id="success_msg" class="alert <?php echo e((Session::has('status')) ? '' : 'hidden'); ?> alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
		<?php if(Session::has('status')): ?>
		<?php echo Session::get('status'); ?>

		<?php endif; ?>
	</div>