
  <style>
    /* Modal dialog slide-up on mobile */
    @media (max-width: 768px) {
      #loginPopup .modal-dialog {
        margin: 0;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        transform: translateY(100%);
        animation: slideUp 0.3s ease-out forwards;
      }
    }
    @keyframes slideUp {
      to {
        transform: translateY(0);
      }
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    @keyframes fadeText {
      0% {
        opacity: 0;
        transform: translateY(10px);
      }
      100% {
        opacity: 1;
        transform: translateY(0px);
      }
    }
    .animate-fade {
      animation: fadeText 0.5s ease-in-out;
    }
    .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.55) !important;
    }
    /* Renewed modal content design */
    .kh-login-box {
      background: #fff;
      border-radius: 16px 16px 0 0;
      padding: 30px 25px;
      font-weight: 500;
      box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.2);
      position: relative;
      overflow: hidden;
    }
    .kh-header {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .kh-header img {
      width: 120px;
      border-radius: 8px;
      /* Optional subtle border */
      border: 1px solid #eee;
    }
    .kh-login-box p {
      text-align: center;
      font-size: 15px;
      color: #555;
      margin-bottom: 15px;
    }
    /* Updated input styling */
    .kh-input-box {
      border: 1px solid #ddd;
      border-radius: 8px;
      display: flex;
      align-items: center;
      padding: 8px;
      margin-bottom: 12px;
      background: #fafafa;
    }
    .kh-code-text {
      padding-left: 10px;
      font-size: 16px;
      font-weight: 600;
      color: #333;
    }
    .kh-divider {
      width: 1px;
      height: 30px;
      background-color: #ddd;
      margin: 0 10px;
    }
    .kh-input-field {
      border: none;
      font-size: 16px;
      padding: 4px 0;
      flex: 1;
      font-weight: 500;
      color: #333;
      background: transparent;
      outline: none;
    }
    /* Button styling with gradient */
    .kh-login-btn {
      background: linear-gradient(145deg, #007bff, #0056b3);
      color: white;
      border: none;
      padding: 12px;
      font-weight: bold;
      border-radius: 8px;
      width: 100%;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .kh-login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }
    .kh-maybe-later {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #888;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    .kh-maybe-later:hover {
      color: #555;
    }
    .otp-slide-in {
      animation: fadeIn 0.5s ease-in-out;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px;
      margin-top: 20px;
      background: #f9f9f9;
    }
    .validation-msg {
      font-size: 14px;
      margin-bottom: 10px;
      padding-left: 5px;
    }
    .validation-error {
      color: #d9534f;
    }
    .validation-success {
      color: #5cb85c;
    }
    .otp-box-wrapper {
      display: flex;
      justify-content: space-between;
      gap: 8px;
      margin-top: 10px;
    }
    .otp-input-box {
      width: 45px;
      height: 55px;
      text-align: center;
      font-size: 24px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fff;
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .otp-input-box:focus {
      border-color: #007bff;
      box-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
    }
    /* Google login button */
    .google-login-btn {
      background: #fff;
      border: 1px solid #ddd;
      padding: 10px 16px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 15px;
      color: #444;
      display: inline-flex;
      align-items: center;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .google-login-btn:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      transform: scale(1.03);
    }
    .google-login-btn img {
      margin-right: 8px;
    }
    /* Separator line style */
    .separator {
      margin: 15px 0;
      color: #aaa;
      font-size: 14px;
      text-align: center;
      position: relative;
    }
    .separator::before,
    .separator::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background: #ddd;
    }
    .separator::before {
      left: 0;
    }
    .separator::after {
      right: 0;
    }
  </style>


  <!-- Modal -->
<!-- Modal -->
<!-- Popup Login Modal -->
<div class="modal fade" id="loginPopup" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 border-0 shadow-sm">
      <div class="modal-body p-4">

        <!-- Logo -->
        <div class="text-center mb-3">
          <img src="./assets/popuplogo/logo2.png" alt="logo" style="max-height: 70px;">
        </div>

        <p class="text-center mb-4 fs-6 text-secondary">
          Welcome! Get started instantly using your mobile number or continue with your Google account.
        </p>

        <!-- Laravel Alerts -->
        <?php if(Session::has('success')): ?>
          <div class="alert alert-success text-center"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
          <div class="alert alert-danger text-center"><?php echo e(Session::get('error')); ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="<?php echo e(route('user.login_submit')); ?>">
          <?php echo csrf_field(); ?>
          <!-- Mobile Number Input -->
          <div class="mb-3">
            <label for="mobile" class="form-label fw-semibold">Mobile Number</label>
            <input type="text" class="form-control form-control-lg" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="<?php echo e(old('mobile', session('mobile'))); ?>" required pattern="\d{10}" maxlength="10">
          </div>

          <!-- OTP input shown only if session has showOtpField -->
          <?php if(session('showOtpField')): ?>
          <div class="mb-3">
            <label for="otp" class="form-label fw-semibold">Enter OTP sent to +91 <?php echo e(session('mobile')); ?></label>
            <input type="text" class="form-control form-control-lg text-center" id="otp" name="otp" placeholder="Enter 5-digit OTP" required pattern="\d{5}" maxlength="5" inputmode="numeric" autocomplete="one-time-code">
          </div>
          <?php endif; ?>

          <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold mb-3">
            <?php if(session('showOtpField')): ?> Verify OTP & Login <?php else: ?> Send OTP <?php endif; ?>
          </button>
          



          <!-- Google Login Button -->
          <button type="button" id="googleLoginBtn" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20" aria-hidden="true" focusable="false">
              <path fill="#4285f4" d="M533.5 278.4c0-17.7-1.4-34.8-4.1-51.4H272v97.3h146.9c-6.4 34.3-25.9 63.4-55.2 82.7v68h89.4c52.3-48.2 82.4-119.3 82.4-196.6z"/>
              <path fill="#34a853" d="M272 544.3c74.4 0 136.8-24.6 182.4-66.8l-89.4-68c-24.9 16.8-56.8 26.6-92.9 26.6-71.4 0-131.9-48.1-153.7-112.9H28.9v70.8c45.6 90 139.3 150.3 243.1 150.3z"/>
              <path fill="#fbbc04" d="M118.3 321.4c-11.9-34.3-11.9-71.5 0-105.8V144.7H28.9c-42.3 82.7-42.3 181.6 0 264.3l89.4-70.8z"/>
              <path fill="#ea4335" d="M272 107.7c39.9-.6 78.2 15 107.4 43.2l80.4-80.4C406.8 24 344.4 0 272 0 168.2 0 74.5 60.3 28.9 150.3l89.4 70.8c21.8-64.8 82.3-112.9 153.7-113.4z"/>
            </svg>
            Continue with Google
          </button>

          <div class="text-center">
            <button type="button" class="btn btn-link p-0" id="closeModal">Maybe Later</button>
          </div>
          
          <!-- New User Register Link -->
<div class="text-center mt-3">
  <h6>If you're a new user, please <a href="<?php echo e(route('user.signup')); ?>" class="text-primary fw-bold">click here to register</a>.</h6>
</div>
          
        </form>

      </div>
    </div>
  </div>
</div>




  <!-- Bootstrap JS (and dependencies) -->
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>-->

<?php if(session('showOtpField')): ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = new bootstrap.Modal(document.getElementById('loginPopup'));
  modal.show();

  document.getElementById('step1').style.display = 'none';
  document.getElementById('step2').style.display = 'block';
  document.getElementById('displayMobile').textContent = "<?php echo e(session('mobile')); ?>";
});
</script>
<?php endif; ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = new bootstrap.Modal(document.getElementById('loginPopup'));

  // Auto show after 10s if not OTP phase
  <?php if(!session('showOtpField')): ?>
  setTimeout(() => {
    modal.show();
  }, 10000);
  <?php endif; ?>

  document.getElementById('closeModal').addEventListener('click', () => modal.hide());

  // Google login placeholder
  document.getElementById('googleLoginBtn')?.addEventListener('click', function () {
    alert("🔐 Google Login integration coming soon!");
  });

  // OTP inputs handle focus
  const otpInputs = document.querySelectorAll('.otp-input-box');
  otpInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
      if (input.value.length === 1 && index < otpInputs.length - 1) {
        otpInputs[index + 1].focus();
      }
    });
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && input.value === '' && index > 0) {
        otpInputs[index - 1].focus();
      }
    });
  });

  // Validate mobile & submit form
  document.getElementById('sendOtpBtn').addEventListener('click', function () {
    const mobile = document.getElementById('mobileNumber').value.trim();
    const validationMsg = document.getElementById('validationMsg');

    if (mobile === "") {
      validationMsg.textContent = "Mobile number is required!";
      validationMsg.className = "validation-msg validation-error animate-fade";
      return;
    } else if (!/^[0-9]{10}$/.test(mobile)) {
      validationMsg.textContent = "Please enter a valid 10-digit mobile number.";
      validationMsg.className = "validation-msg validation-error animate-fade";
      return;
    }

    // ✅ Submit form to backend
    document.getElementById('mobileLoginForm').submit();
  });

  // Join OTP before submit
  document.getElementById('mobileLoginForm').addEventListener('submit', function (e) {
    if (document.getElementById('step2').style.display === 'block') {
      const otp = Array.from(otpInputs).map(i => i.value).join('');
      if (otp.length !== 5) {
        e.preventDefault();
        document.getElementById('otpValidationMsg').textContent = "Enter full 5-digit OTP";
        return;
      }
      document.getElementById('hiddenOtpInput').value = otp;
    }
  });
});
</script>




<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/login_popup.blade.php ENDPATH**/ ?>