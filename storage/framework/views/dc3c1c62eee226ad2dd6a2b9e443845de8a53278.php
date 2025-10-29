<div class="main-header">
  <!-- Logo Header Start -->
  <div class="logo-header"
    data-background-color="<?php echo e(Session::get('vendor_theme_version') == 'light' ? 'white' : 'dark2'); ?>">

    <?php if(!empty($websiteInfo->logo)): ?>
      <a href="<?php echo e(route('index')); ?>" class="logo" target="_blank">
        <img src="<?php echo e(asset('assets/img/' . $websiteInfo->logo)); ?>" alt="logo" class="navbar-brand" width="120">
      </a>
    <?php endif; ?>

    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="icon-menu"></i>
      </span>
    </button>
    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>

    <div class="nav-toggle">
      <button class="btn btn-toggle toggle-sidebar">
        <i class="icon-menu"></i>
      </button>
    </div>
  </div>
  <!-- Logo Header End -->

  <!-- Navbar Header Start -->
  <nav class="navbar navbar-header navbar-expand-lg"
    data-background-color="<?php echo e(Session::get('vendor_theme_version') == 'light' ? 'white2' : 'dark'); ?>">
    <div class="container-fluid">
      <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        <?php
          $vendorId = Auth::guard('vendor')->user()->id;
          $current_packages = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

        ?>
        <?php if($current_packages != '[]'): ?>

          <?php
            $vendorId = Auth::guard('vendor')->user()->id;

            if ($vendorId) {
                $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);
                if ($current_package) {
                    $listingCanAdd = packageTotalListing($vendorId) - vendorTotalListing($vendorId);

                    if (!empty($current_package) && !empty($current_package->features)) {
                        $permissions = json_decode($current_package->features, true);
                        $additionalFeatureLimit = packageTotalAdditionalSpecification($vendorId);
                        $SocialLinkLimit = packageTotalSocialLink($vendorId);
                    } else {
                        $permissions = null;
                        $additionalFeatureLimit = 0;
                        $SocialLinkLimit = 0;
                    }
                }
            } else {
                $permissions = null;
                $additionalFeatureLimit = 0;
                $SocialLinkLimit = 0;
            }
          ?>
          <li>
            <button type="button" class="btn  btn-secondary mr-2  btn-sm btn-round" id="aa" data-toggle="modal"
              data-target="#checkLimitModal">
              <?php if(
                  $listingFaqDown ||
                      $listingProductDown ||
                      $listingImgDown ||
                      $featureDown ||
                      $socialLinkDown ||
                      $amenitieDown ||
                      $listingProductImgDown ||
                      $listingCanAdd < 0): ?>
                <i class="fas fa-exclamation-triangle text-danger"></i>
              <?php endif; ?>
              <?php echo e(__('Check Limit')); ?>

            </button>
          </li>
        <?php endif; ?>
        <?php if($current_packages != '[]'): ?>
          <li>
            <a class="btn btn-primary btn-sm btn-round" target="_blank"
              href="<?php echo e(route('frontend.vendor.details', ['username' => Auth::guard('vendor')->user()->username])); ?>"
              title="View Profile">
              <i class="fas fa-eye"></i>
            </a>
          </li>
        <?php endif; ?>
        <form action="<?php echo e(route('vendor.change_theme')); ?>" class="form-inline mr-3" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <div class="selectgroup selectgroup-secondary selectgroup-pills">
              <label class="selectgroup-item">
                <input type="radio" name="vendor_theme_version" value="light" class="selectgroup-input"
                  <?php echo e(Session::get('vendor_theme_version') == 'light' ? 'checked' : ''); ?> onchange="this.form.submit()">
                <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-sun"></i></span>
              </label>

              <label class="selectgroup-item">
                <input type="radio" name="vendor_theme_version" value="dark" class="selectgroup-input"
                  <?php echo e(Session::get('vendor_theme_version') == 'dark' || Session::get('vendor_theme_version') == '' ? 'checked' : ''); ?>

                  onchange="this.form.submit()">
                <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-moon"></i></span>
              </label>
            </div>
          </div>
        </form>

        <li class="nav-item dropdown hidden-caret">
          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
              <?php if(Auth::guard('vendor')->user()->photo != null): ?>
                <img src="<?php echo e(asset('assets/admin/img/vendor-photo/' . Auth::guard('vendor')->user()->photo)); ?>"
                  alt="Vendor Image" class="avatar-img rounded-circle">
              <?php else: ?>
                <img src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="" class="avatar-img rounded-circle">
              <?php endif; ?>
            </div>
          </a>

          <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
              <li>
                <div class="user-box">
                  <div class="avatar-lg">
                    <?php if(Auth::guard('vendor')->user()->photo != null): ?>
                      <img src="<?php echo e(asset('assets/admin/img/vendor-photo/' . Auth::guard('vendor')->user()->photo)); ?>"
                        alt="Vendor Image" class="avatar-img rounded-circle">
                    <?php else: ?>
                      <img src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt=""
                        class="avatar-img rounded-circle">
                    <?php endif; ?>
                  </div>

                  <div class="u-text">
                    <h4>
                      <?php echo e(Auth::guard('vendor')->user()->username); ?>

                    </h4>
                    <p class="text-muted"><?php echo e(Auth::guard('vendor')->user()->email); ?></p>
                  </div>
                </div>
              </li>

              <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('vendor.edit.profile')); ?>">
                  <?php echo e(__('Edit Profile')); ?>

                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('vendor.change_password')); ?>">
                  <?php echo e(__('Change Password')); ?>

                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('vendor.logout')); ?>">
                  <?php echo e(__('Logout')); ?>

                </a>
              </li>
            </div>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar Header End -->
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/partials/top-navbar.blade.php ENDPATH**/ ?>