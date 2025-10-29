<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->listing_page_title); ?>

  <?php else: ?>
    <?php echo e(__('Pricing')); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_listings); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_listings); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <!-- Listing-map-area start -->
  <div class="listing-map-area header-next border-top pt-40">
    <div class="container">
      <div class="row">
        <div class="col-xl-3" data-aos="fade-up">
          <?php echo $__env->make('frontend.listing.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-xl-9" data-aos="fade-up">
          <div class="product-sort-area pb-15">
            <div class="row align-items-center">
              <div class="col-4 d-xl-none">
                <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#widgetOffcanvas" aria-controls="widgetOffcanvas">
                  Filter <i class="fal fa-filter"></i>
                </button>
              </div>
              <div class="col-sm-8 col-xl-12">
                <div class="sort-item d-flex align-items-center justify-content-end mb-20">
                  <div class="item">
                    <form>
                      <label class="color-dark" for="select_sort"><?php echo e(__('Sort By')); ?>:</label>
                      <select name="select_sort" id="select_sort" class="niceselect right color-dark">
                        <option <?php echo e(request()->input('sort') == 'new' ? 'selected' : ''); ?> value="new">
                          <?php echo e(__('Date : Newest on top')); ?>

                        </option>
                        <option <?php echo e(request()->input('sort') == 'old' ? 'selected' : ''); ?> value="old">
                          <?php echo e(__('Date : Oldest on top')); ?>

                        </option>
                        <option <?php echo e(request()->input('sort') == 'low' ? 'selected' : ''); ?> value="low">
                          <?php echo e(__('Price : Low to High')); ?></option>
                        <option <?php echo e(request()->input('sort') == 'high' ? 'selected' : ''); ?> value="high">
                          <?php echo e(__('Price : High to Low')); ?></option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-container">
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
                          <img class="lazyload"
                            data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
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
                          data-bs-placement="top"
                          title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
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
                            <a class="color-medium"
                              href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>" target="_self"
                              title=<?php echo e($vendorInfo->username); ?>>

                              <?php if($listing_content->vendor_id == 0): ?>
                                <img class="lazyload" src="assets/images/placeholder.png"
                                  data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                              <?php else: ?>
                                <?php if($vendorInfo->photo != null): ?>
                                  <img class="blur-up lazyload"
                                    data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>"
                                    alt="Image">
                                <?php else: ?>
                                  <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>"
                                    alt="Image">
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
                          <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                            title="Link" class="product-category font-sm icon-start">
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
                            <span
                              class="ratings-total font-sm">(<?php echo e(number_format($listing_content->average_rating, 2)); ?>)</span>
                            <span
                              class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

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
                              $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                  ->name;
                          }
                          if ($listing_content->country_id) {
                              $country = App\Models\Location\Country::Where('id', $listing_content->country_id)->first()
                                  ->name;
                          }

                        ?>
                        <span class="product-location icon-start font-sm"><i
                            class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?><?php if(@$State): ?>
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
                          <img class="lazyload"
                            data-src="<?php echo e(asset('assets/img/listing/' . $listing_content->feature_image)); ?>"
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
                          data-bs-placement="top"
                          title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
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
                            <a class="color-medium"
                              href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>" target="_self"
                              title=<?php echo e($vendorInfo->username); ?>>

                              <?php if($listing_content->vendor_id == 0): ?>
                                <img class="lazyload" src="assets/images/placeholder.png"
                                  data-src="<?php echo e(asset('assets/img/admins/' . $vendorInfo->image)); ?>" alt="Vendor">
                              <?php else: ?>
                                <?php if($vendorInfo->photo != null): ?>
                                  <img class="blur-up lazyload"
                                    data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendorInfo->photo)); ?>"
                                    alt="Image">
                                <?php else: ?>
                                  <img class="blur-up lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>"
                                    alt="Image">
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
                          <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                            title="Link" class="product-category font-sm icon-start">
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
                            <span
                              class="ratings-total font-sm">(<?php echo e(number_format($listing_content->average_rating, 2)); ?>)</span>
                            <span
                              class="ratings-total color-medium ms-1 font-sm"><?php echo e(totalListingReview($listing_content->id)); ?>

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
                              $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                  ->name;
                          }
                          if ($listing_content->country_id) {
                              $country = App\Models\Location\Country::Where('id', $listing_content->country_id)->first()
                                  ->name;
                          }

                        ?>
                        <span class="product-location icon-start font-sm"><i
                            class="fal fa-map-marker-alt"></i><?php echo e(@$city); ?><?php if(@$State): ?>
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
                    <li class="page-item <?php if($i == 1): ?> active <?php endif; ?>">
                      <a class="page-link" data-page="<?php echo e($i); ?>"><?php echo e($i); ?></a>
                    </li>
                  <?php endfor; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Listing-map-area end -->

  <form action="<?php echo e(route('frontend.listings')); ?>" id="searchForm" method="GET">
    <input type="hidden" name="title" id="title"value="<?php echo e(request()->input('title')); ?>">
    <input type="hidden" name="location" id="location"value="<?php echo e(request()->input('location')); ?>">
    <input type="hidden" name="category_id" id="category_id"value="<?php echo e(request()->input('category_id')); ?>">
    <input type="hidden" name="max_val" id="max_val"value="<?php echo e(request()->input('max_val')); ?>">
    <input type="hidden" name="min_val" id="min_val"value="<?php echo e(request()->input('min_val')); ?>">
    <input type="hidden" name="ratings" id="ratings"value="<?php echo e(request()->input('ratings')); ?>">
    <input type="hidden" name="amenitie" id="amenitie"value="<?php echo e(request()->input('amenitie')); ?>">
    <input type="hidden" name="sort" id="sort"value="<?php echo e(request()->input('sort')); ?>">
    <input type="hidden" name="vendor" id="vendor"value="<?php echo e(request()->input('vendor')); ?>">
    <input type="hidden" name="country" id="country"value="<?php echo e(request()->input('country')); ?>">
    <input type="hidden" name="state" id="state"value="<?php echo e(request()->input('state')); ?>">
    <input type="hidden" name="city" id="city"value="<?php echo e(request()->input('city')); ?>">
    <input type="hidden" name="page" id="page"value="">
  </form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <!-- Map JS -->
  <script src="<?php echo e(asset('assets/front/js/map.js')); ?>"></script>
  <script>
    "use strict";
    var featured_contents = <?php echo json_encode($featured_contents); ?>;
    var listing_contents = <?php echo json_encode($listing_contents); ?>;
    var searchUrl = "<?php echo e(route('frontend.search_listing')); ?>";
    var getStateUrl = "<?php echo e(route('frontend.listings.get-state')); ?>";
    var getCityUrl = "<?php echo e(route('frontend.listings.get-city')); ?>";
  </script>
  <script src="<?php echo e(asset('assets/front/js/search.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/listing/listing-gird.blade.php ENDPATH**/ ?>