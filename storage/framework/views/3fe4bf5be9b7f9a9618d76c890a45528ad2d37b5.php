<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(!empty($pageHeading) ? $pageHeading->vendor_page_title : __('Vendors')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keywords_vendor_page); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_vendor_page); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_page_title : __('Vendors'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->vendor_page_title : __('Vendors'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Vendor-area start -->
  <div class="vendor-area pt-100 pb-75">
    <div class="container">
      <div class="product-sort-area pb-20" data-aos="fade-up">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <?php if(count($vendors) + ($admin ? 1 : 0) > 0): ?>
              <h4 class="mb-20"><?php echo e(count($vendors) + ($admin ? 1 : 0)); ?>

                <?php echo e(count($vendors) + ($admin ? 1 : 0) > 1 ? __('Vendors') : __('Vendor')); ?> <?php echo e(__('Found')); ?></h4>
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <form action="<?php echo e(route('frontend.vendors')); ?>" method="GET">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group icon-start mb-20">
                    <span class="icon color-primary">
                      <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="name" value="<?php echo e(request()->input('name')); ?>"
                      class="form-control radius-0 border-primary" placeholder="<?php echo e(__('Vendor name/username')); ?>">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group icon-start mb-20">
                    <span class="icon color-primary">
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <input type="text" name="location" class="form-control radius-0 border-primary"
                      value="<?php echo e(request()->input('location')); ?>" placeholder="<?php echo e(__('Enter location')); ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group icon-start">
                    <button type="submit" class="btn btn-icon bg-primary color-white w-100">
                      <i class="fal fa-search"></i>
                      <span class="d-inline-block d-md-none">&nbsp;<?php echo e(__('Search')); ?></span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <?php if(count($vendors) + ($admin ? 1 : 0) == 0): ?>
          <h3 class="text-center"><?php echo e(__('NO VENDOR FOUND') . '!'); ?></h3>
        <?php else: ?>
          <?php if($admin): ?>
            <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
              <div class="card mb-25 shadow-md radius-0">
                <div class="card-info-area bg-primary-light p-3">
                  <div class="card-img">
                    <a href="<?php echo e(route('frontend.vendor.details', ['username' => 'admin'])); ?>"
                      class="lazy-container ratio ratio-1-1 rounded-circle">
                      <img class="lazyload" src="assets/images/placeholder.png"
                        data-src="<?php echo e(asset('assets/img/admins/' . $admin->image)); ?>" alt="Vendor">
                    </a>
                  </div>
                  <div class="card-info">
                    <h6 class="title mb-1">
                      <a href="<?php echo e(route('frontend.vendor.details', ['username' => 'admin'])); ?>" target="_self"
                        title="Vendor"><?php echo e($admin->username); ?>

                      </a>
                    </h6>
                    <div>
                      <span class="text-muted mb-1"><a
                          href="<?php echo e(route('frontend.vendor.details', ['username' => 'admin'])); ?>"><?php echo e($admin->first_name); ?>

                          <?php echo e($admin->last_name); ?></a>
                      </span>
                    </div>
                    <div>
                      <?php
                        $total_listings = App\Models\Listing\Listing::where('vendor_id', 0)->get()->count();
                      ?>
                      <span><?php echo e(__('Total Listings') . ':'); ?>&nbsp;</span>
                      <span class="color-dark"><?php echo e($total_listings); ?></span>
                    </div>
                  </div>
                </div>
                <div class="card-details p-3">
                  <ul class="card-list list-unstyled">

                    <?php if($admin->address != null): ?>
                      <li class="icon-start font-sm">
                        <i class="fal fa-map-marker-alt"></i>
                        <span><?php echo e($admin->address); ?></span>
                      </li>
                    <?php endif; ?>

                    <?php if($admin->show_phone_number == 1): ?>
                      <?php if(!is_null($admin->phone)): ?>
                        <li class="icon-start font-sm">
                          <i class="fal fa-phone-plus"></i>
                          <span><a href="tel:<?php echo e($admin->phone); ?>"class="text-dark"><?php echo e($admin->phone); ?></a></span>
                        </li>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if($admin->show_email_address == 1): ?>
                      <li class="icon-start font-sm">
                        <i class="fal fa-envelope"></i>
                        <span><a href="mailto:<?php echo e($admin->email); ?>"class="text-dark"><?php echo e($admin->email); ?></a></span>
                      </li>
                    <?php endif; ?>

                  </ul>
                  <div class="btn-groups d-flex gap-3 flex-wrap mt-20">
                    <a href="<?php echo e(route('frontend.vendor.details', ['username' => 'admin'])); ?>"
                      class="btn btn-md btn-primary w-100" title="<?php echo e(__('Visit Profile')); ?>"
                      target="_self"><?php echo e(__('Visit Profile')); ?></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
              <div class="card mb-25 shadow-md radius-0">
                <div class="card-info-area bg-primary-light p-3">
                  <div class="card-img">
                    <a href="<?php echo e(route('frontend.vendor.details', ['username' => $vendor->username])); ?>"
                      class="lazy-container ratio ratio-1-1 rounded-circle">
                      <?php
                        if ($vendor->id == 0) {
                            $vendorInfo = App\Models\Admin::first();
                        }
                      ?>
                      <?php if($vendor->id == 0): ?>
                        <img class="lazyload" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                      <?php else: ?>
                        <?php if($vendor->photo != null): ?>
                          <img class="lazyload" src="assets/images/placeholder.png"
                            data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>" alt="Vendor">
                        <?php else: ?>
                          <img class="lazyload" src="assets/images/placeholder.png"
                            data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="Vendor">
                        <?php endif; ?>
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="card-info">
                    <h6 class="title mb-1">
                      <a href="<?php echo e(route('frontend.vendor.details', ['username' => $vendor->username])); ?>" target="_self"
                        title="Vendor"><?php echo e($vendor->username); ?>

                      </a>
                    </h6>
                    <div>
                      <?php
                        $vendor_info = App\Models\VendorInfo::where([
                            ['vendor_id', $vendor->vendorId],
                            ['language_id', $language->id],
                        ])
                            ->select('name')
                            ->first();
                      ?>
                      <span class="text-muted mb-1"><a
                          href="<?php echo e(route('frontend.vendor.details', ['username' => $vendor->username])); ?>"><?php echo e(@$vendor_info->name); ?></a>
                      </span>
                    </div>
                    <div>
                      <?php
                        $total_listings = App\Models\Listing\Listing::where('vendor_id', $vendor->vendorId)
                            ->get()
                            ->count();
                      ?>
                      <span><?php echo e(__('Total Listings') . ':'); ?>&nbsp;</span>
                      <span class="color-dark"><?php echo e($total_listings); ?></span>
                    </div>
                  </div>
                </div>
                <div class="card-details p-3">
                  <ul class="card-list list-unstyled">
                    <?php
                      $vendorInfo = App\Models\VendorInfo::where([
                          ['vendor_id', $vendor->vendorId],
                          ['language_id', $language->id],
                      ])->first();
                    ?>
                    <?php if($vendorInfo): ?>
                      <?php if($vendorInfo->address != null): ?>
                        <li class="icon-start font-sm">
                          <i class="fal fa-map-marker-alt"></i>
                          <span><?php echo e($vendorInfo->address); ?></span>
                        </li>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if($vendor->show_phone_number == 1): ?>
                      <?php if(!is_null($vendor->phone)): ?>
                        <li class="icon-start font-sm">
                          <i class="fal fa-phone-plus"></i>
                          <span><a href="tel:<?php echo e($vendor->phone); ?>"class="text-dark"><?php echo e($vendor->phone); ?></a></span>
                        </li>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if($vendor->show_email_addresss == 1): ?>
                      <li class="icon-start font-sm">
                        <i class="fal fa-envelope"></i>
                        <span><a href="mailto:<?php echo e($vendor->email); ?>"class="text-dark"><?php echo e($vendor->email); ?></a></span>
                      </li>
                    <?php endif; ?>

                  </ul>
                  <div class="btn-groups d-flex gap-3 flex-wrap mt-20">
                    <a href="<?php echo e(route('frontend.vendor.details', ['username' => $vendor->username])); ?>"
                      class="btn btn-md btn-primary w-100" title="<?php echo e(__('Visit Profile')); ?>"
                      target="_self"><?php echo e(__('Visit Profile')); ?></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <div class="pagination mt-20 mb-25 justify-content-center" data-aos="fade-up">
        <?php echo e($vendors->links()); ?>

      </div>

      <?php if(!empty(showAd(3))): ?>
        <div class="text-center mt-4">
          <?php echo showAd(3); ?>

        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- Vendor-area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/vendor/index.blade.php ENDPATH**/ ?>