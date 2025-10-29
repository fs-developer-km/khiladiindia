@extends('frontend.layout')

@section('pageHeading')
  {{ !empty($pageHeading) ? $pageHeading->login_page_title : __('Login') }}
@endsection

@section('metaKeywords')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_keyword_login }}
  @endif
@endsection

@section('metaDescription')
  @if (!empty($seoInfo))
    {{ $seoInfo->meta_description_login }}
  @endif
@endsection

@section('content')

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

@includeIf('frontend.partials.breadcrumb', [
    'breadcrumb' => $bgImg->breadcrumb,
    'title' => !empty($pageHeading) ? $pageHeading->login_page_title : __('Login'),
])

<div class="login-wrapper">
  <div class="login-box">

    <!-- 🎯 Left Image Side -->
    <div class="login-img"></div>

    <!-- 🔐 Right Form Side -->
    <div class="login-form-section">

      @if (Session::has('success'))
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: "{{ Session::get('success') }}",
              confirmButtonColor: '#007bff'
            });
          });
        </script>
      @endif

      @if (Session::has('error'))
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: "{{ Session::get('error') }}",
              confirmButtonColor: '#dc3545'
            });
          });
        </script>
      @endif

      <h4>Welcome to Khiladi India User Profile Login</h4>
      <hr>
      <h6>{{ __('Login via Mobile OTP') }}</h6>

    <form action="{{ route('user.login_submit') }}" method="POST">
    @csrf

    <input type="text" class="form-control mb-2" name="mobile"
           value="{{ old('mobile', session('mobile')) }}"
           placeholder="Enter Mobile Number" required>
    @error('mobile')
      <p class="text-danger mt-2">{{ $message }}</p>
    @enderror

    @if (session()->has('showOtpField'))
        <input type="text" class="form-control mb-2" name="otp"
               placeholder="Enter OTP received on WhatsApp" required>
        @error('otp')
          <p class="text-danger mt-2">{{ $message }}</p>
        @enderror

        {{-- Show Name field only for new users --}}
        @if (session('isNewUser'))
            <input type="text" class="form-control mb-2" name="name"
                   placeholder="Enter Your Name" required>
            @error('name')
              <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        @endif
    @endif

    <button type="submit" class="btn btn-primary w-100">
      {{ session()->has('showOtpField') ? 'Verify OTP' : 'Send OTP' }}
    </button>
</form>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
