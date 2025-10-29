<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Change Password')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->change_password_page_title : __('Change Password'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->change_password_page_title : __('Change Password'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60">
    <div class="container">
      <div class="row gx-xl-5">
        <?php if ($__env->exists('frontend.user.side-navbar')) echo $__env->make('frontend.user.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
          <div class="user-profile-details mb-40">
            <div class="account-info radius-md">
              <div class="title">
                <h4><?php echo e(__('Change Password')); ?></h4>
              </div>
              <div class="edit-info-area mt-30">
                <?php if(Session::has('success')): ?>
                  <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('user.update_password')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group mb-20">
                    <input type="password" class="form-control" placeholder="<?php echo e(__('Current Password')); ?>"
                      name="current_password" required>
                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group mb-20">
                    <input type="password" class="form-control" placeholder="<?php echo e(__('New Password')); ?>" name="new_password"
                      required>
                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group mb-20">
                    <input type="password" class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>"
                      name="new_password_confirmation" required>
                  </div>
                  <div class="mb-15">
                    <div class="form-button">
                      <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Submit')); ?></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--====== End Dashboard Section ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/change-password.blade.php ENDPATH**/ ?>