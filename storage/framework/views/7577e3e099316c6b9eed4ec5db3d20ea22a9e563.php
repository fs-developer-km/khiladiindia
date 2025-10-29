<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(!empty($pageHeading) ? $pageHeading->vendor_login_page_title : __('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keywords_vendor_login); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_vendor_login); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_login_page_title : __('Login'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_login_page_title : __('Login'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Authentication-area start -->
  <div class="authentication-area ptb-100">
    <div class="container">
      <div class="auth-form border radius-md">
        <?php if(Session::has('success')): ?>
          <div class="alert alert-success"><?php echo e(__(Session::get('success'))); ?></div>
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
          <div class="alert alert-danger"><?php echo e(__(Session::get('error'))); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('vendor.login_submit')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="title">
            <h4 class="mb-20"><?php echo e(__('Login')); ?></h4>
          </div>
          <div class="form-group mb-30">
            <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>"
              placeholder="<?php echo e(__('Username')); ?>" required>
            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="text-danger mt-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group mb-30">
            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>"v
              placeholder="<?php echo e(__('Password')); ?>" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="text-danger mt-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <?php if($bs->google_recaptcha_status == 1): ?>
            <div class="form-group mb-30">
              <?php echo NoCaptcha::renderJs(); ?>

              <?php echo NoCaptcha::display(); ?>


              <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-1 text-danger"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          <?php endif; ?>
          <div class="row align-items-center mb-20">
            <div class="col-4 col-xs-12">
              <div class="link">
                <a href="<?php echo e(route('vendor.forget.password')); ?>"><?php echo e(__('Forgot password') . '?'); ?></a>
              </div>
            </div>
            <div class="col-8 col-xs-12">
              <div class="link go-signup">
                <?php echo e(__("don't have an account") . '?'); ?> <a
                  href="<?php echo e(route('vendor.signup')); ?>"><?php echo e(__('Click Here')); ?></a>
                <?php echo e(__('to Signup')); ?>

              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary radius-md w-100"> <?php echo e(__('Login')); ?> </button>
        </form>
      </div>
    </div>
  </div>
  <!-- Authentication-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/vendor/auth/login.blade.php ENDPATH**/ ?>