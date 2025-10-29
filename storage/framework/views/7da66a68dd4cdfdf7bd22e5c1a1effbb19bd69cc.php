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
        <a href="#"><?php echo e(__('Vendor Management')); ?></a>
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
    <div class="col-md-12 mx-auto">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-title"><?php echo e(__('Settings')); ?></div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 mx-auto">
              <form id="VendorSettingForm" action="<?php echo e(route('admin.vendor_management.setting.update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox vendor_admin_approvalbtn">
                        <input type="checkbox" <?php echo e($setting->vendor_admin_approval == 1 ? 'checked' : ''); ?>

                          name="vendor_admin_approval" class="custom-control-input" id="vendor_admin_approval">
                        <label class="custom-control-label"
                          for="vendor_admin_approval"><?php echo e(__('Needs Admin Approval')); ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" <?php echo e($setting->vendor_email_verification == 1 ? 'checked' : ''); ?>

                          name="vendor_email_verification" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2"><?php echo e(__('Email Verificaiton')); ?></label>
                      </div>
                    </div>
                  </div>
                  <div
                    class="col-lg-12 <?php echo e($setting->vendor_admin_approval == 0 ? 'd-none' : ''); ?> admin_approval_notice">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Admin Approval Notice')); ?></label>
                      <textarea id="" rows="4" name="admin_approval_notice" class="form-control"><?php echo e($setting->admin_approval_notice); ?></textarea>
                      <p class="text-warning"><?php echo e(__('This text will be visible in Vendor Dashboard')); ?></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" id="VendorSettingBtn" class="btn btn-success">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/end-user/vendor/settings.blade.php ENDPATH**/ ?>