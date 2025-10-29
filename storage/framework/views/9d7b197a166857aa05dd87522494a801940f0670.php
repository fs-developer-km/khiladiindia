<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Forget Password')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_forget_password); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_forget_password); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->forget_password_page_title : __('Forget Password'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->forget_password_page_title : __('Forget Password'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!-- Authentication-area start -->
  <div class="authentication-area ptb-100">
    <div class="container">
      <div class="auth-form border radius-md">
        <?php if(Session::has('success')): ?>
          <div class="alert alert-success"><?php echo e(__(Session::get('success'))); ?></div>
        <?php endif; ?>
        <?php if(Session::has('warning')): ?>
          <div class="alert alert-success"><?php echo e(__(Session::get('warning'))); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('user.send_forget_password_mail')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="title">
            <h4 class="mb-20"><?php echo e(__('Forget Password')); ?></h4>
          </div>
          <div class="form-group mb-30">
            <input type="text" class="form-control"value="<?php echo e(old('email')); ?>" name="email" placeholder="<?php echo e(__('Email Address')); ?>">
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
          <button type="submit"
            class="btn btn-lg btn-primary radius-md w-100"><?php echo e(__('Send me a recovery link')); ?></button>
        </form>
      </div>
    </div>
  </div>
  <!-- Authentication-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/forget-password.blade.php ENDPATH**/ ?>