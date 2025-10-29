<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(!empty($pageHeading) ? $pageHeading->vendor_forget_password_page_title : __('Forget Password')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keywords_vendor_forget_password); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_descriptions_vendor_forget_password); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_forget_password_page_title : __('Forget Password'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_forget_password_page_title : __('Forget Password'),
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
        <form action="<?php echo e(route('vendor.forget.mail')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="title">
            <h4 class="mb-20"><?php echo e(__('Forget Password')); ?></h4>
          </div>
          <div class="form-group mb-30">
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email Address')); ?>" required>
            <?php $__errorArgs = ['email'];
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
          <button type="submit" class="btn btn-lg btn-primary radius-md w-100"> <?php echo e(__('Submit')); ?> </button>
        </form>
      </div>
    </div>
  </div>
  <!-- Authentication-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/vendor/auth/forget-password.blade.php ENDPATH**/ ?>