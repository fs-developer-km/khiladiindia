<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Settings')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Advertisements')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Settings')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="<?php echo e(route('admin.advertise.update_settings')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title"><?php echo e(__('Update Settings')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="form-group">
                  <label><?php echo e(__('Google Adsense Publisher ID') . '*'); ?></label>
                  <input type="text" class="form-control" name="google_adsense_publisher_id"
                    value="<?php echo e($data->google_adsense_publisher_id != null ? $data->google_adsense_publisher_id : ''); ?>"
                    placeholder="Enter Google Adsense Publisher ID">
                  <?php if($errors->has('google_adsense_publisher_id')): ?>
                    <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('google_adsense_publisher_id')); ?></p>
                  <?php endif; ?>
                  <p class="mt-2 mb-0">
                    <a href="//prnt.sc/1uvqtdw" target="_blank" class="redirect-link"><?php echo e(__('Click Here')); ?></a>
                    <?php echo e(__('to find the punlisher id in your google adsense account') . '.'); ?>

                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">
                  <?php echo e(__('Update')); ?>

                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/advertisement/settings.blade.php ENDPATH**/ ?>