<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add a ticket')); ?></h4>
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
        <a href="#"><?php echo e(__('Support Tickets')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Add a ticket')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="<?php echo e(route('vendor.support_ticket.store')); ?>" enctype="multipart/form-data" method="POST">
          <div class="card-header">
            <div class="card-title d-inline-block"><?php echo e(__('Add a ticket')); ?></div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                <div class="alert alert-danger pb-1 dis-none" id="equipmentErrors">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <ul></ul>
                </div>

                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Email') . '*'); ?></label>
                      <input type="email" class="form-control" value="<?php echo e(Auth::guard('vendor')->user()->email); ?>"
                        name="email" placeholder="Enter Email">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Subject') . '*'); ?></label>
                      <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                    </div>
                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label><?php echo e(__('Description')); ?></label>
                      <textarea name="description" rows="4" class="form-control summernote"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Attachment')); ?></label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="file" class="custom-file-input"
                            data-href="<?php echo e(route('vendor.support_ticket.zip_file.upload')); ?>" name="file"
                            id="zip_file">
                          <label class="custom-file-label" for="zip_file"><?php echo e(__('Choose file')); ?></label>
                        </div>
                      </div>
                      <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="em text-danger mb-0"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <div class="progress progress-sm d-none">
                        <div class="progress-bar bg-success " role="progressbar" aria-valuenow="" aria-valuemin="0"
                          aria-valuemax=""></div>
                      </div>

                      <p class="text-warning"><?php echo e(__('Upload only ZIP Files, Max File Size is 20 MB')); ?></p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <?php
                  $vendorId = Auth::guard('vendor')->user()->id;
                  $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);
                ?>
                <?php if($current_package == '[]'): ?>
                  <button type="button" class="btn btn-success noPackage">
                    <?php echo e(__('Save')); ?>

                  </button>
                <?php else: ?>
                  <button type="submit" class="btn btn-success">
                    <?php echo e(__('Save')); ?>

                  </button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/support-ticket.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/support_ticket/create.blade.php ENDPATH**/ ?>