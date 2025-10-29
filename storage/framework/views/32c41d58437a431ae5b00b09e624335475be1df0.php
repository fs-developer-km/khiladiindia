<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Contact Page')); ?></h4>
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
        <a href="#"><?php echo e(__('Basic Settings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Contact Page')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="<?php echo e(route('admin.basic_settings.contact_page.update')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title"><?php echo e(__('Contact Page')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Email Address') . '*'); ?></label>
                      <input type="email" class="form-control" name="email_address"
                        value="<?php echo e($data->email_address != null ? $data->email_address : ''); ?>"
                        placeholder="Enter Email Address">
                      <?php if($errors->has('email_address')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('email_address')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Contact Number') . '*'); ?></label>
                      <input type="text" class="form-control" name="contact_number"
                        value="<?php echo e($data->contact_number != null ? $data->contact_number : ''); ?>"
                        placeholder="Enter Contact Number">
                      <?php if($errors->has('contact_number')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('contact_number')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Latitude') . '*'); ?></label>
                      <input type="text" class="form-control" name="latitude"
                        value="<?php echo e($data->latitude != null ? $data->latitude : ''); ?>" placeholder="Enter Latitude">
                      <?php if($errors->has('latitude')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('latitude')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Longitude') . '*'); ?></label>
                      <input type="text" class="form-control" name="longitude"
                        value="<?php echo e($data->longitude != null ? $data->longitude : ''); ?>" placeholder="Enter Longitude">
                      <?php if($errors->has('longitude')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('longitude')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo e(__('Address') . '*'); ?></label>
                      <input type="text" class="form-control" name="address"
                        value="<?php echo e($data->address != null ? $data->address : ''); ?>" placeholder="Enter Longitude">
                      <?php if($errors->has('address')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('address')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/basic-settings/contact.blade.php ENDPATH**/ ?>