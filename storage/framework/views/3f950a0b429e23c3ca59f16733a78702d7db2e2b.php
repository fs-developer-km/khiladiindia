<?php $__env->startSection('content'); ?>
  <div class="mt-2 mb-4">
    <h2 class="pb-2"><?php echo e(__('Welcome back,')); ?> <?php echo e($authAdmin->first_name . ' ' . $authAdmin->last_name . '!'); ?></h2>
  </div>

  
  <?php
    if (!is_null($roleInfo)) {
        $rolePermissions = json_decode($roleInfo->permissions);
    }
  ?>

  <div class="row dashboard-items">

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Listing Managements', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.listing_management.listing', ['language' => $defaultLang->code])); ?>">
          <div class="card card-stats card-success card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Listings')); ?></p>
                    <h4 class="card-title"><?php echo e($totalListings); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Subscription Log', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.payment-log.index')); ?>">
          <div class="card card-stats card-primary card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fas fa-money-check-alt"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Subscription Log')); ?></p>
                    <h4 class="card-title"><?php echo e($payment_log); ?>

                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Shop Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.shop_management.products', ['language' => $defaultLang->code])); ?>">
          <div class="card card-stats card-primary card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-box-alt"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Products')); ?></p>
                    <h4 class="card-title"><?php echo e($totalProduct); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Shop Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.shop_management.orders')); ?>">
          <div class="card card-stats card-warning card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-shopping-cart"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Orders')); ?></p>
                    <h4 class="card-title"><?php echo e($totalOrder); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Blog Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.blog_management.blogs', ['language' => $defaultLang->code])); ?>">
          <div class="card card-stats card-info card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-blog"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Blog')); ?></p>
                    <h4 class="card-title"><?php echo e($totalBlog); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Vendors Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.vendor_management.registered_vendor')); ?>">
          <div class="card card-stats card-secondary card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Vendors')); ?></p>
                    <h4 class="card-title">
                      <?php echo e($vendors); ?>

                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('User Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.user_management.registered_users')); ?>">
          <div class="card card-stats card-orchid card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="la flaticon-users"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Users')); ?></p>
                    <h4 class="card-title"><?php echo e($totalUser); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('User Management', $rolePermissions))): ?>
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo e(route('admin.user_management.subscribers')); ?>">
          <div class="card card-stats card-dark card-round">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="fal fa-bell"></i>
                  </div>
                </div>

                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category"><?php echo e(__('Subscribers')); ?></p>
                    <h4 class="card-title"><?php echo e($totalSubscriber); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endif; ?>
    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('Package Management', $rolePermissions))): ?>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><?php echo e(__('Monthly Package Purchase')); ?> (<?php echo e(date('Y')); ?>)</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="packagePurchaseChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(is_null($roleInfo) || (!empty($rolePermissions) && in_array('User Management', $rolePermissions))): ?>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><?php echo e(__('Month wise registered users')); ?> (<?php echo e(date('Y')); ?>)</div>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="userChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  </div>

  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

  <script>
    "use strict";
    const monthArr = <?php echo json_encode($monthArr) ?>;
    const packagePurchaseIncomesArr = <?php echo json_encode($packagePurchaseIncomesArr) ?>;
    const totalUsersArr = <?php echo json_encode($totalUsersArr) ?>;
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/chart.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/chart-init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/admin/dashboard.blade.php ENDPATH**/ ?>