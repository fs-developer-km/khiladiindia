@extends('frontend.layout')

@section('pageHeading')
  {{ !empty($pageHeading) ? $pageHeading->vendor_login_page_title : __('Login') }}
@endsection
@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keywords_vendor_login }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_vendor_login }}
  @endif
@endsection

@section('content')
@includeIf('frontend.partials.breadcrumb', [
    'breadcrumb' => $bgImg->breadcrumb,
    'title' => !empty($pageHeading) ? $pageHeading->vendor_login_page_title : __('Login'),
])
<!-- Authentication-area start -->
<div class="authentication-area ptb-100">
  <div class="container">
    <div class="auth-form border radius-md p-4 shadow-sm" style="max-width: 400px; margin: 0 auto;">
      @if (Session::has('success'))
        <div class="alert alert-success">{{ __(Session::get('success')) }}</div>
      @endif
      @if (Session::has('error'))
        <div class="alert alert-danger">{{ __(Session::get('error')) }}</div>
      @endif

      <form id="vendorLoginForm" method="POST" action="{{ route('vendor.login_submit') }}">
        @csrf
        <div class="title text-center mb-4">
          <h4>{{ __('Login with OTP') }}</h4>
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
          {{ __("Don't have an account?") }} <a href="{{ route('vendor.signup') }}">Signup</a>
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

    fetch("{{ route('vendor.send_login_otp') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
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
@endsection
