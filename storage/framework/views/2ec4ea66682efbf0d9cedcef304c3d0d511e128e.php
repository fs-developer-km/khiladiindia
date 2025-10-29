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
    <div class="auth-form border radius-md p-4 shadow-sm" style="max-width: 400px; margin: 0 auto;">
      <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(__(Session::get('success'))); ?></div>
      <?php endif; ?>
      <?php if(Session::has('error')): ?>
        <div class="alert alert-danger"><?php echo e(__(Session::get('error'))); ?></div>
      <?php endif; ?>

      <form id="vendorLoginForm" method="POST" action="<?php echo e(route('vendor.login_submit')); ?>">
        <?php echo csrf_field(); ?>
        <div class="title text-center mb-4">
          <h4><?php echo e(__('Login with OTP')); ?></h4>
        </div>

        <!-- Phone -->
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
        </div>

        <!-- Send OTP Button -->
        <div class="form-group mb-3">
          <button type="button" id="sendOtpBtn" class="btn btn-outline-primary w-100 btn-lg no-hover">
            <i class="fas fa-paper-plane me-2"></i> Send OTP
          </button>
        </div>

        <!-- Loader -->
        <div id="otpLoader" class="text-center d-none mb-3">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Sending...</span>
          </div>
          <p class="mt-2 mb-0">Sending OTP...</p>
        </div>

        <!-- OTP Field (Hidden Initially) -->
        <div class="form-group mb-3 d-none" id="otpField">
          <input type="text" class="form-control" name="otp" placeholder="Enter OTP">
        </div>

        <!-- Login Button -->
        <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
        </div>

        <!-- Optional: Signup link -->
        <div class="text-center mt-3">
          <?php echo e(__("Don't have an account?")); ?> <a href="<?php echo e(route('vendor.signup')); ?>">Signup</a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Authentication-area end -->

<style>
/* Outline button with no hover effect */
.btn-outline-primary.no-hover {
    border-color: #3f60a0;
    color: #3f60a0;
    background-color: transparent;
}
.btn-outline-primary.no-hover:hover,
.btn-outline-primary.no-hover:focus,
.btn-outline-primary.no-hover:active {
    background-color: transparent;
    color: #3f60a0;
    border-color: #3f60a0;
    box-shadow: none;
}

/* Inputs rounded and subtle shadow */
.form-control {
    border-radius: 6px;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
}
.auth-form {
    background: #fff;
    border-radius: 10px;
}
</style>

<script>
document.getElementById('sendOtpBtn').addEventListener('click', function() {
    let phone = document.getElementById('phone').value;
    if(!phone) {
        alert("Please enter phone number first!");
        return;
    }

    // Show loader
    const btn = document.getElementById('sendOtpBtn');
    document.getElementById('otpLoader').classList.remove('d-none');
    btn.disabled = true;

    fetch("<?php echo e(route('vendor.send_login_otp')); ?>", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ phone: phone })
    }).then(res => res.json())
      .then(data => {
          document.getElementById('otpLoader').classList.add('d-none');
          btn.disabled = false;

          if(data.success){
              alert("OTP sent via WhatsApp!");
              document.getElementById('otpField').classList.remove('d-none');
          } else {
              alert(data.message || "Failed to send OTP");
          }
      }).catch(err => {
          document.getElementById('otpLoader').classList.add('d-none');
          btn.disabled = false;
          alert("Something went wrong!");
      });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/vendor/auth/login.blade.php ENDPATH**/ ?>