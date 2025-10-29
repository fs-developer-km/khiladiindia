<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Payment Success')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('vendor.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Payment Success')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-5">
              <div class="card-title d-inline-block">
                <?php echo e(__('Payment Success')); ?>

              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 mx-auto">
              <div class="card p-4 text-center">
                <div class="mb-3">
                  <i class="fas fa-check color-white p-3 rounded-circle bg-success text-white"></i>
                </div>
                <h1><?php echo e(__('Success')); ?></h1>
                <p class="mb-0"><?php echo e(__('Your payment is successful.')); ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer"></div>
      </div>

    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/success.blade.php ENDPATH**/ ?>