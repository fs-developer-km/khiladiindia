<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Select Vendor')); ?></h4>
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
        <a href="#"><?php echo e(__('Listings Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Select Vendor')); ?></a>
      </li>
    </ul>
  </div>
  <div class="alert alert-danger d-none" id="vendorMessage">

  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Select Vendor')); ?></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
              </div>


              <form id="vendorSelect"action="<?php echo e(route('admin.listing_management.find_vendor_id')); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Vendor')); ?></label>
                      <select name="vendor_id" class="form-control js-example-basic-single1">
                        <option selected value="0"><?php echo e(__('Please Select')); ?></option>
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->username); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <p class="text-warning">
                        <?php echo e(__('if you do not select any vendor, then this Listing will be listed for Admin')); ?></p>
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
              <button type="submit" form="vendorSelect" class="btn btn-success">
                <?php echo e(__('Next')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
  <script>
    'use strict';
  </script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-dropzone.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/select-vendor.blade.php ENDPATH**/ ?>