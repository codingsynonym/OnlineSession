<header class="main-header">
  <a href="<?php echo e(url('admin')); ?>" class="logo">
  <span class="logo-mini"><img class="img-responsive" src="<?php echo e(url('resources/assets/admin/')); ?>/images/header-logo-icon.png" style="height: 49px;margin-top: 4px; margin: 0 auto; background: #fff;"></span>
  <span class="logo-lg"><img class="img-responsive" src="<?php echo e(url('resources/assets/admin/')); ?>/images/header-logo.png" style="height: 49px;margin-top: 4px; margin: 0 auto;"></span> 
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php if(\Session::get('AdminProfilePicture') != "" && \Session::get('AdminProfilePicture') != null) { ?>
          <?php echo \Html::image('/public/uploads/administrators/' . \Session::get('AdminProfilePicture'), \Session::get('AdminProfilePicture'), ['class' => 'user-image' ]); ?>

          <?php } else { ?>
          <img src="<?php echo e(url('resources/assets/admin/')); ?>/dist/img/avatar.png" class="user-image" alt="User Image">
          <?php } ?>
          <span class="hidden-xs"><?php echo \Session::get('AdminFullName'); ?></span> </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <?php if(\Session::get('AdminProfilePicture') != "" && \Session::get('AdminProfilePicture') != null) { ?>
              <?php echo \Html::image('/public/uploads/administrators/' . \Session::get('AdminProfilePicture'), \Session::get('AdminProfilePicture'), ['class' => 'img-circle' ]); ?>

              <?php } else { ?>
              <img src="<?php echo e(url('resources/assets/admin/')); ?>/dist/img/avatar.png" class="img-circle" alt="User Image">
              <?php } ?>
              <p> <?php echo \Session::get('AdminFullName'); ?> </p>
            </li>
            <li class="user-footer">
              <div class="pull-left"> <a href="<?php echo e(url('admin/profile')); ?>" class="btn btn-default btn-flat">Profile</a> </div>
              <div class="pull-right"> <a href="<?php echo e(url('admin/logout')); ?>" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
