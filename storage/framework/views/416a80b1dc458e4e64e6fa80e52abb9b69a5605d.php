<?php if(count($featured_contents) < 1 && count($currentPageData) < 1): ?>
  <div class="p-4 text-center bg-light radius-md">
    <h3 class="mb-0"><?php echo e(__('NO LISTING FOUND')); ?></h3>
  </div>
<?php else: ?>
  <div class="row">
    <?php $__currentLoopData = $featured_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <div class="product-default border radius-md mb-25 active">
          <figure class="product-img">
            <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"
              class="lazy-container ratio ratio-2-3">
              <img class="lazyload" data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
                alt="<?php echo e(optional($listing_content)->title); ?>">
            </a>

            <?php if(Auth::guard('web')->check()): ?>
              <?php
                $user_id = Auth::guard('web')->user()->id;
                $checkWishList = checkWishList($listing_content->id, $user_id);
              ?>
            <?php else: ?>
              <?php
                $checkWishList = false;
              ?>
            <?php endif; ?>
            <a href="<?php echo e($checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id)); ?>"
              class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>" data-tooltip="tooltip"
              data-bs-placement="top" title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
              <i class="fal fa-heart"></i>
            </a>
          </figure>

          <div class="product-details">
            <div class="product-top mb-10">

              <?php
                if ($listing_content->vendor_id == 0) {
                    $vendorInfo = App\Models\Admin::first();
                    $userName = 'admin';
                } else {
                    $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                    $userName = $vendorInfo->username;
                }
              ?>

              <div class="author">
                <a class="color-medium" href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>"
                  target="_self" title=<?php echo e($vendorInfo->username); ?>>

                  <?php if($listing_content->vendor_id == 0): ?>
                    <img class="lazyload" src="assets/images/placeholder.png"
                      data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                  <?php else: ?>
                    <?php if($vendorInfo->photo != null): ?>
                      <img class="blur-up lazyload"
                        data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>" alt="Image">
                    <?php else: ?>
                      <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="Image">
                    <?php endif; ?>
                  <?php endif; ?>
                  <span><?php echo e(__('By')); ?>

                    <?php echo e($vendorInfo->username); ?>


                  </span>
                </a>
              </div>
              <?php
                $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
              ?>
              <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>" title="Link"
                class="product-category font-sm icon-start">
                <i class="<?php echo e($listing_content->icon); ?>"></i><?php echo e($listing_content->category_name); ?>

              </a>
            </div>
            <h6 class="product-title mb-10"><a
                href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"><?php echo e(optional($listing_content)->title); ?></a>
            </h6>
            <div class="product-ratings mb-10">
              <div class="ratings">
                <div class="rate" style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                  <div class="rating-icon"
                    style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing_content->average_rating * 20 . '%;'); ?>">
                  </div>
                </div>
                <span class="ratings-total font-sm">(<?php echo e(number_format($listing_content->average_rating, 2)); ?>)</span>
                <span class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

                  <?php echo e(__('Reviews')); ?></span>
              </div>
            </div>
            <?php
              $city = null;
              $State = null;
              $country = null;

              if ($listing_content->city_id) {
                  $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()->name;
              }
              if ($listing_content->state_id) {
                  $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()->name;
              }
              if ($listing_content->country_id) {
                  $country = App\Models\Location\Country::Where('id', $listing_content->country_id)->first()->name;
              }

            ?>
            <span class="product-location icon-start font-sm"><i class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?>

              <?php if(@$State): ?>
                ,<?php echo e($State); ?>

                <?php endif; ?> <?php if(@$country): ?>
                  ,<?php echo e(@$country); ?>

                <?php endif; ?>
            </span>

            <?php if($listing_content->max_price && $listing_content->min_price): ?>
              <div class="product-price mt-10 pt-10 border-top">
                <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                <h6 class="price mb-0 lh-1">
                  <?php echo e(symbolPrice($listing_content->min_price)); ?> -
                  <?php echo e(symbolPrice($listing_content->max_price)); ?>

                </h6>
              </div>
            <?php endif; ?>
          </div>
        </div><!-- product-default -->
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $currentPageData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <div class="product-default border radius-md mb-25">
          <figure class="product-img">
            <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"
              class="lazy-container ratio ratio-2-3">
              <img class="lazyload" data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
                alt="<?php echo e(optional($listing_content)->title); ?>">
            </a>

            <?php if(Auth::guard('web')->check()): ?>
              <?php
                $user_id = Auth::guard('web')->user()->id;
                $checkWishList = checkWishList($listing_content->id, $user_id);
              ?>
            <?php else: ?>
              <?php
                $checkWishList = false;
              ?>
            <?php endif; ?>
            <a href="<?php echo e($checkWishList == false ? route('addto.wishlist', $listing_content->id) : route('remove.wishlist', $listing_content->id)); ?>"
              class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>" data-tooltip="tooltip"
              data-bs-placement="top" title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
              <i class="fal fa-heart"></i>
            </a>
          </figure>

          <div class="product-details">
            <div class="product-top mb-10">

              <?php
                if ($listing_content->vendor_id == 0) {
                    $vendorInfo = App\Models\Admin::first();
                    $userName = 'admin';
                } else {
                    $vendorInfo = App\Models\Vendor::findorfail($listing_content->vendor_id);
                    $userName = $vendorInfo->username;
                }
              ?>

              <div class="author">
                <a class="color-medium" href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>"
                  target="_self" title=<?php echo e($vendorInfo->username); ?>>

                  <?php if($listing_content->vendor_id == 0): ?>
                    <img class="lazyload" src="assets/images/placeholder.png"
                      data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                  <?php else: ?>
                    <?php if($vendorInfo->photo != null): ?>
                      <img class="blur-up lazyload"
                        data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>" alt="Image">
                    <?php else: ?>
                      <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="Image">
                    <?php endif; ?>
                  <?php endif; ?>
                  <span><?php echo e(__('By')); ?>

                    <?php echo e($vendorInfo->username); ?>

                  </span>
                </a>
              </div>
              <?php
                $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
              ?>
              <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>" title="Link"
                class="product-category font-sm icon-start">
                <i class="<?php echo e($listing_content->icon); ?>"></i><?php echo e($listing_content->category_name); ?>

              </a>
            </div>
            <h6 class="product-title mb-10"><a
                href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"><?php echo e(optional($listing_content)->title); ?></a>
            </h6>
            <div class="product-ratings mb-10">
              <div class="ratings">
                <div class="rate" style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                  <div class="rating-icon"
                    style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing_content->average_rating * 20 . '%;'); ?>">
                  </div>
                </div>
                <span class="ratings-total font-sm">(<?php echo e(number_format($listing_content->average_rating, 2)); ?>)</span>
                <span class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

                  <?php echo e(__('Reviews')); ?></span>
              </div>
            </div>
            <?php
              $city = null;
              $State = null;
              $country = null;

              if ($listing_content->city_id) {
                  $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()->name;
              }
              if ($listing_content->state_id) {
                  $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()->name;
              }
              if ($listing_content->country_id) {
                  $country = App\Models\Location\Country::Where('id', $listing_content->country_id)->first()->name;
              }

            ?>
            <span class="product-location icon-start font-sm"><i class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?>

              <?php if(@$State): ?>
                ,<?php echo e($State); ?>

                <?php endif; ?> <?php if(@$country): ?>
                  ,<?php echo e(@$country); ?>

                <?php endif; ?>
            </span>

            <?php if($listing_content->max_price && $listing_content->min_price): ?>
              <div class="product-price mt-10 pt-10 border-top">
                <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                <h6 class="price mb-0 lh-1">
                  <?php echo e(symbolPrice($listing_content->min_price)); ?> -
                  <?php echo e(symbolPrice($listing_content->max_price)); ?>

                </h6>
              </div>
            <?php endif; ?>
          </div>
        </div><!-- product-default -->
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php if($listing_contents->count() / $perPage > 1): ?>
    <div class="pagination mt-20 mb-40 justify-content-center" data-aos="fade-up">
      <?php for($i = 1; $i <= ceil($listing_contents->count() / $perPage); $i++): ?>
        <li class="page-item <?php if(request()->input('page') == $i): ?> active <?php endif; ?>">
          <a class="page-link" data-page="<?php echo e($i); ?>"><?php echo e($i); ?></a>
        </li>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>
<script>
  "use strict";
  var featured_contents = <?php echo json_encode($featured_contents); ?>;
  var listing_contents = <?php echo json_encode($listing_contents); ?>;
</script>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/listing/search-listing.blade.php ENDPATH**/ ?>