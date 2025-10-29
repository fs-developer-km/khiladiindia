<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(!empty($pageHeading) ? $pageHeading->login_page_title : __('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_login); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_login); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
  .login-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: stretch;
    background-color: #f5f7fa;
    padding: 60px 20px;
  }

  .login-box {
    display: flex;
    max-width: 1000px;
    width: 100%;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
  }

  .login-img {
    flex: 1;
    min-height: 500px;
    background: url('/assets/logoo.png') no-repeat center center;
    background-size: cover;
  }

  .login-form-section {
    flex: 1;
    padding: 40px 35px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .login-form-section h4 {
    font-size: 24px;
    font-weight: 700;
    color: #222;
    margin-bottom: 10px;
  }

  .login-form-section h6 {
    font-size: 16px;
    margin-bottom: 20px;
    color: #555;
  }

  .login-form-section input.form-control {
    border: 2px solid #007bff;
    border-radius: 6px;
    padding: 10px 15px;
    margin-bottom: 20px;
    font-size: 15px;
  }

  .login-form-section .btn {
    background-color: #007bff;
    color: #fff;
    font-weight: 600;
    padding: 12px;
    font-size: 16px;
    border-radius: 6px;
  }

  .login-form-section .btn:hover {
    background-color: #0056b3;
  }

  .alert {
    font-size: 14px;
    padding: 10px 15px;
    margin-bottom: 15px;
  }

  @media (max-width: 768px) {
    .login-box {
      flex-direction: column;
    }
    .login-img {
      min-height: 250px;
    }
  }
</style>

<?php if ($__env->exists('frontend.partials.breadcrumb', [
    'breadcrumb' => $bgImg->breadcrumb,
    'title' => !empty($pageHeading) ? $pageHeading->login_page_title : __('Login'),
])) echo $__env->make('frontend.partials.breadcrumb', [
    'breadcrumb' => $bgImg->breadcrumb,
    'title' => !empty($pageHeading) ? $pageHeading->login_page_title : __('Login'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="login-wrapper">
  <div class="login-box">

    <!-- 🎯 Left Image Side -->
    <div class="login-img"></div>

    <!-- 🔐 Right Form Side -->
    <div class="login-form-section">

      <?php if(Session::has('success')): ?>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: "<?php echo e(Session::get('success')); ?>",
              confirmButtonColor: '#007bff'
            });
          });
        </script>
      <?php endif; ?>

      <?php if(Session::has('error')): ?>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: "<?php echo e(Session::get('error')); ?>",
              confirmButtonColor: '#dc3545'
            });
          });
        </script>
      <?php endif; ?>

      <h4>Welcome to Khiladi India User Profile Login</h4>
      <hr>
      <h6><?php echo e(__('Login via Mobile OTP')); ?></h6>

    <form action="<?php echo e(route('user.login_submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <input type="text" class="form-control mb-2" name="mobile"
           value="<?php echo e(old('mobile', session('mobile'))); ?>"
           placeholder="Enter Mobile Number" required>
    <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <p class="text-danger mt-2"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php if(session()->has('showOtpField')): ?>
        <input type="text" class="form-control mb-2" name="otp"
               placeholder="Enter OTP received on WhatsApp" required>
        <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="text-danger mt-2"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        
        <?php if(session('isNewUser')): ?>
            <input type="text" class="form-control mb-2" name="name"
                   placeholder="Enter Your Name" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="text-danger mt-2"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php endif; ?>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary w-100">
      <?php echo e(session()->has('showOtpField') ? 'Verify OTP' : 'Send OTP'); ?>

    </button>
</form>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/user/login.blade.php ENDPATH**/ ?>