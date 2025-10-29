<div class="col-lg-3">
  <!-- Google Font (once in master layout) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <aside class="widget-area mb-4">
    <div class="rounded p-3 shadow h-100" style="background-color:#171141;font-family:'Poppins',sans-serif;">
      <ul class="nav flex-column">
        
        <li class="nav-item mb-2">
          <a href="<?php echo e(route('user.dashboard')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded
                    <?php echo e(request()->routeIs('user.dashboard') ? 'active bg-primary text-white' : 'text-light'); ?>">
            <span class="bg-primary bg-opacity-75 text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-home"></i>
            </span>
            <?php echo e(__('Dashboard')); ?>

          </a>
        </li>

        
        <li class="nav-item mb-2">
          <a href="<?php echo e(route('user.wishlist')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded
                    <?php echo e(request()->routeIs('user.wishlist') ? 'active bg-primary text-white' : 'text-light'); ?>">
            <span class="bg-danger bg-opacity-75 text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-heart"></i>
            </span>
            <?php echo e(__('My Wishlist')); ?>

          </a>
        </li>

        
        <?php if($basicInfo->shop_status==1): ?>
        <li class="nav-item mb-2">
          <a href="<?php echo e(route('user.order.index')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded
                    <?php echo e(request()->routeIs('user.order.index')||request()->routeIs('user.order.details') ? 'active bg-primary text-white' : 'text-light'); ?>">
            <span class="bg-info bg-opacity-75 text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-box"></i>
            </span>
            <?php echo e(__('Product Orders')); ?>

          </a>
        </li>
        <?php endif; ?>

        
        <li class="nav-item mb-2">
          <a href="<?php echo e(route('user.change_password')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded
                    <?php echo e(request()->routeIs('user.change_password') ? 'active bg-primary text-white' : 'text-light'); ?>">
            <span class="bg-warning bg-opacity-75 text-dark rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-key"></i>
            </span>
            <?php echo e(__('Change Password')); ?>

          </a>
        </li>

        
        <li class="nav-item mb-2">
          <a href="<?php echo e(route('user.edit_profile')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded
                    <?php echo e(request()->routeIs('user.edit_profile') ? 'active bg-primary text-white' : 'text-light'); ?>">
            <span class="bg-success bg-opacity-75 text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-user-edit"></i>
            </span>
            <?php echo e(__('Edit Profile')); ?>

          </a>
        </li>

        
        <li class="nav-item">
          <a href="<?php echo e(route('user.logout')); ?>"
             class="nav-link d-flex align-items-center px-3 py-3 fw-medium rounded text-light">
            <span class="bg-secondary bg-opacity-75 text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3"
                  style="width:38px;height:38px;">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            <?php echo e(__('Logout')); ?>

          </a>
        </li>
      </ul>
    </div>
  </aside>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/side-navbar.blade.php ENDPATH**/ ?>