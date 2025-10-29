@extends('frontend.layout')

@section('pageHeading')
  {{ !empty($pageHeading) ? $pageHeading->vendor_signup_page_title : __('Signup') }}
@endsection
@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keywords_vendor_signup }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_vendor_signup }}
  @endif
@endsection

@section('content')
@includeIf('frontend.partials.breadcrumb', [
    'breadcrumb' => $bgImg->breadcrumb,
    'title' => !empty($pageHeading) ? $pageHeading->vendor_signup_page_title : __('Signup'),
])
<!-- Authentication-area start -->
<div class="authentication-area ptb-100">
  <div class="container">
    <div class="auth-form border radius-md p-4 shadow-sm">
      @if (Session::has('success'))
        <div class="alert alert-success">{{ __(Session::get('success')) }}</div>
      @endif
      <form id="vendorSignupForm" method="POST" action="{{ route('vendor.signup_submit') }}">
        @csrf
        <div class="title text-center mb-4">
          <h4>{{ __('Signup') }}</h4>
        </div>

        <!-- Username -->
        <div class="form-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>

        <!-- Phone + Send OTP -->
        <div class="form-group mb-3 d-flex">
          <input type="text" class="form-control me-2" id="phone" name="phone" placeholder="Phone Number" required>
          <button type="button" class="btn btn-outline-primary no-hover" id="sendOtpBtn">Send OTP</button>
        </div>

        <!-- OTP Field (Hidden Initially) -->
        <div class="form-group mb-3 d-none" id="otpField">
          <input type="text" class="form-control" name="otp" placeholder="Enter OTP">
        </div>

        <!-- Signup Button -->
        <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary w-100 btn-lg">Signup</button>
        </div>
      </form>

      <!-- Optional: Already have account -->
      <div class="text-center mt-3">
        {{ __("Already have an account?") }} <a href="{{ route('vendor.login') }}">Login</a>
      </div>
    </div>
  </div>
</div>
<!-- Authentication-area end -->

<style>
/* Pure outline button with no hover effect */
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

/* Optional: subtle shadow on input */
.form-control {
    border-radius: 6px;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
}

/* Container shadow and rounded corners */
.auth-form {
    background: #fff;
    max-width: 450px;
    margin: 0 auto;
}
</style>

<script>
document.getElementById('sendOtpBtn').addEventListener('click', function() {
    let phone = document.getElementById('phone').value;
    let username = document.querySelector('[name="username"]').value;
    let email = document.querySelector('[name="email"]').value;

    if(!phone || !username || !email) {
        alert("Please fill username, email, and phone first!");
        return;
    }

    // Show loader inside button
    const btn = document.getElementById('sendOtpBtn');
    btn.disabled = true;
    const originalText = btn.innerHTML;
    btn.innerHTML = 'Sending...';

    fetch("{{ route('vendor.send_otp') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            username: username,
            email: email,
            phone: phone
        })
    }).then(res => res.json())
      .then(data => {
          btn.disabled = false;
          btn.innerHTML = originalText;
          if(data.success){
              alert("OTP sent via WhatsApp!");
              document.getElementById('otpField').classList.remove('d-none');
          } else {
              alert(JSON.stringify(data.errors || data.message));
          }
      }).catch(() => {
          btn.disabled = false;
          btn.innerHTML = originalText;
          alert('Something went wrong, please try again!');
      });
});
</script>
@endsection
