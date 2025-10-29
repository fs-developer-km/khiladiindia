<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($listing)): ?>
    <?php echo e($listing->listing_content->first()->title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($listing)): ?>
    <?php echo e($listing->listing_content->first()->meta_keyword); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($listing)): ?>
    <?php echo e($listing->listing_content->first()->meta_description); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sharetitle'); ?>
  <?php if(!empty($listing)): ?>
    <?php echo e($listing->listing_content->first()->title); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('shareimage'); ?>
  <?php if(!empty($listing)): ?>
    <?php echo e(asset('assets/img/listing/' . $listing->feature_image)); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php
    if ($listing->vendor_id == 0) {
        $permissions = [
            'Listing Enquiry Form',
            'Video',
            'Amenities',
            'Feature',
            'Social Links',
            'FAQ',
            'Business Hours',
            'Products',
            'Product Enquiry Form',
            'Messenger',
            'WhatsApp',
            'Telegram',
            'Tawk.To',
        ];
    } else {
        $vendorId = $listing->vendor_id;
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);
        $permissions = $current_package->features;
        if (!empty($current_package->features)) {
            $permissions = json_decode($permissions, true);
        }
        $additionalFeatureLimit = packageTotalAdditionalSpecification($vendorId);
        $SocialLinkLimit = packageTotalSocialLink($vendorId);
    }

  ?>

  <!-- Listing start -->
  <div class="listing-single header-next border-top pt-40 pb-60">
    <div class="container">
      <div class="row gx-xl-5">
        <div class="col-lg-8 col-xl-9">
          <div class="product-single-details mb-40">
            <div class="row" data-aos="fade-up">
              <div class="col-12">
                <h2 class="product-title mt-1 mb-2"><?php echo e($listing->listing_content->first()->title); ?></h2>
              </div>
              <div class="col-12">
                <ul class="info-list list-unstyled">
                  <li>
                    <?php
                      $categorySlug = App\Models\ListingCategory::findorfail(
                          $listing->listing_content->first()->category_id,
                      );
                    ?>
                    <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>" title="Link"
                      class="product-category font-sm icon-start">
                      <span class="product-category color-primary icon-start">
                        <i class="<?php echo e($listing->listing_content->first()->category->icon); ?>"></i>
                        <?php echo e($listing->listing_content->first()->category->name); ?>

                      </span></a>
                  </li>
                  <li>
                    <?php
                      if ($listing->listing_content->first()->city_id) {
                          $city = App\Models\Location\City::Where(
                              'id',
                              $listing->listing_content->first()->city_id,
                          )->first()->name;
                      }
                      if ($listing->listing_content->first()->state_id) {
                          $State = App\Models\Location\State::Where(
                              'id',
                              $listing->listing_content->first()->state_id,
                          )->first()->name;
                      }
                      if ($listing->listing_content->first()->country_id) {
                          $country = App\Models\Location\Country::Where(
                              'id',
                              $listing->listing_content->first()->country_id,
                          )->first()->name;
                      }

                    ?>
                    <span class="product-location icon-start">
                      <i class="fal fa-map-marker-alt"></i>
                      <?php echo e(@$city); ?>

                      <?php if(@$State): ?>
                        ,<?php echo e($State); ?>

                        <?php endif; ?> <?php if(@$country): ?>
                          ,<?php echo e(@$country); ?>

                        <?php endif; ?>
                    </span>
                  </li>
                  <li>
                    <div class="ratings">
                      <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                        <div class="rating-icon"
                          style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing->average_rating * 20 . '%;'); ?>">
                        </div>
                      </div>
                      <span class="ratings-total">(<?php echo e(number_format($listing->average_rating, 2)); ?>)</span>
                      <span class="ratings-total ms-1"><?php echo e($numOfReview); ?>

                        <?php echo e(__('Reviews')); ?></span>
                    </div>
                  </li>
                  <li>
                    <span class="ratings-total ms-1">
                      <?php echo e(__('From')); ?> :<?php echo e(symbolPrice($listing->min_price)); ?> -
                      <?php echo e(symbolPrice($listing->max_price)); ?>

                    </span>
                  </li>
                  <li>
                    <a class="btn blue icon-start" href="#" data-bs-toggle="modal"
                      data-bs-target="#socialMediaModal">
                      <i class="far fa-share-alt"></i>
                      <?php echo e(__('Share')); ?>

                    </a>
                  </li>
                  <li>
                    <?php if(Auth::guard('web')->check()): ?>
                      <?php
                        $user_id = Auth::guard('web')->user()->id;
                        $checkWishList = checkWishList($listing->id, $user_id);
                      ?>
                    <?php else: ?>
                      <?php
                        $checkWishList = false;
                      ?>
                    <?php endif; ?>
                    <a href="<?php echo e($checkWishList == false ? route('addto.wishlist', $listing->id) : route('remove.wishlist', $listing->id)); ?>"
                      class="btn btn-icon icon-start <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>"
                      data-tooltip="tooltip" data-bs-placement="right"
                      title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
                      <i class="fal fa-heart"></i><?php echo e($checkWishList == false ? __('Save') : __('Saved')); ?>

                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="product-single-gallery gallery-popup" data-aos="fade">
            <!-- Slider navigation buttons -->
            <div class="slider-navigation">
              <button type="button" title="Slide prev" class="slider-btn slider-btn-prev rounded-pill"
                id="product-single-prev">
                <i class="fal fa-angle-left"></i>
              </button>
              <button type="button" title="Slide next" class="slider-btn slider-btn-next rounded-pill"
                id="product-single-next">
                <i class="fal fa-angle-right"></i>
              </button>
            </div>
            <div class="swiper product-single-slider">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $listingImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide radius-lg">
                    <figure class="lazy-container ratio ratio-16-9">
                      <a href="<?php echo e(asset('assets/img/listing-gallery/' . $gallery->image)); ?>">
                        <img class="lazyload" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/listing-gallery/' . $gallery->image)); ?>" alt="product image" />
                      </a>
                    </figure>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <div class="swiper slider-thumbnails">
              <div class="swiper-wrapper">

                <?php $__currentLoopData = $listingImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide">
                    <div class="thumbnail-img lazy-container radius-md ratio ratio-16-9">
                      <img class="lazyload" data-src="<?php echo e(asset('assets/img/listing-gallery/' . $gallery->image)); ?>"
                        alt="product image" />
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>

          <!-- Section gap -->
          <div class="pt-40 d-none d-lg-block"></div>

          <div class="product-single-details">
            <div class="tabs-navigation tabs-navigation-2 text-center mb-40" data-aos="fade-up">
              <ul class="nav nav-tabs w-100 radius-sm" data-hover="fancyHover">
                <li class="nav-item active">
                  <button class="nav-link hover-effect radius-sm active" data-bs-toggle="tab"
                    data-bs-target="#description" type="button"><?php echo e(__('Description')); ?></button>
                </li>
                <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                  <li class="nav-item">
                    <button class="nav-link hover-effect radius-sm" data-bs-toggle="tab" data-bs-target="#features"
                      type="button"><?php echo e(__('Features')); ?></button>
                  </li>
                <?php endif; ?>
                <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                  <li class="nav-item">
                    <button class="nav-link hover-effect radius-sm" data-bs-toggle="tab" data-bs-target="#products"
                      type="button"><?php echo e(__('Products')); ?></button>
                  </li>
                <?php endif; ?>
                <li class="nav-item">
                  <button class="nav-link hover-effect radius-sm" data-bs-toggle="tab" data-bs-target="#reviews"
                    type="button"><?php echo e(__('Reviews')); ?></button>
                </li>
                <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
                  <li class="nav-item">
                    <button class="nav-link hover-effect radius-sm" data-bs-toggle="tab" data-bs-target="#faq"
                      type="button"><?php echo e(__('FAQ')); ?></button>
                  </li>
                <?php endif; ?>
              </ul>
            </div>

            <div class="tab-content" data-aos="fade-up">
              <div class="tab-pane slide show active" id="description">
                <div class="product-desc mb-40">
                  <h3 class="mb-15"><?php echo e(__('Description')); ?></h3>
                  <div class="tinymce-content">
                    <?php echo optional($listing->listing_content->first())->description; ?>

                  </div>
                </div>
                <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
                  <div class="product-amenities mb-40">
                    <h3 class="mb-20"><?php echo e(__('Amenities')); ?></h3>
                    <ul class="amenities-list list-unstyled p-0 m-0">
                      <?php
                        $aminities = App\Models\Aminite::where('language_id', $language->id)->get();
                        $hasaminitie = json_decode($listing->listing_content->first()->aminities);
                      ?>
                      <?php $__currentLoopData = $aminities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aminitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($aminitie->id, $hasaminitie)): ?>
                          <li class="icon-start">
                            <i class="<?php echo e($aminitie->icon); ?>"></i>
                            <span><?php echo e($aminitie->title); ?></span>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                <?php endif; ?>
                <?php if(is_array($permissions) && in_array('Video', $permissions)): ?>
                  <?php if($listing->video_url): ?>
                    <div class="video-banner position-relative mb-40 radius-md">
                      <div class="overlay opacity-75"></div>
                      <!-- Background Image -->
                      <div class="lazy-container ratio ratio-21-9">
                        <img class="lazyload blur-up"
                          src="<?php echo e(asset('assets/img/listing/video/' . $listing->video_background_image)); ?>"
                          alt="Bg-img">
                      </div>
                      <a href="<?php echo e($listing->video_url); ?>"
                        class="video-btn youtube-popup position-absolute top-50 start-50 translate-middle">
                        <i class="fas fa-play"></i>
                      </a>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if(!empty(showAd(3))): ?>
                  <div class="text-center mt-40">
                    <?php echo showAd(3); ?>

                  </div>
                <?php endif; ?>
              </div>
              <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                <div class="tab-pane slide" id="features">
                  <?php if(count($listing_features) == 0): ?>
                    <h3 class="text-center"><?php echo e(__('NO FEATURE FOUND') . '!'); ?></h3>
                  <?php else: ?>
                    <?php $__currentLoopData = $listing_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="product-featured mb-30">
                        <h3 class="mb-15"><?php echo e($listing_feature->feature_heading); ?> </h3>
                        <?php
                          $values = json_decode($listing_feature->feature_value);
                        ?>

                        <ul class="featured-list list-unstyled p-0 m-0">
                          <?php if($values): ?>
                            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="d-inline-block icon-start">
                                <i class="fal fa-check-square"></i>
                                <span><?php echo e($value); ?></span>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </ul>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <?php if(!empty(showAd(3))): ?>
                    <div class="text-center mt-40">
                      <?php echo showAd(3); ?>

                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <div class="tab-pane slide" id="products">
                <div class="products mb-40">
                  <div class="swiper products-slider">

                    <?php if(count($product_contents) == 0): ?>
                      <h3 class="text-center"><?php echo e(__('NO PRODUCT FOUND') . '!'); ?></h3>
                    <?php else: ?>
                      <div class="swiper-wrapper">
                        <?php $__currentLoopData = $product_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="swiper-slide">
                            <div class="product-default border radius-md">
                              <figure class="product-img">
                                <a href="#productsModal_<?php echo e($product->id); ?>" data-bs-toggle="modal"
                                  class="lazy-container ratio ratio-2-3">
                                  <img class="lazyload"
                                    data-src="<?php echo e(asset('assets/img/listing/product/' . $product->feature_image)); ?>"
                                    alt="Product">
                                </a>
                              </figure>
                              <div class="product-details">
                                <a href="#productsModal_<?php echo e($product->id); ?>" data-bs-toggle="modal">
                                  <h5 class="product-title">
                                    <?php echo e($product->title); ?>


                                  </h5>
                                </a>
                                <div class="product-bottom mt-10">
                                  <div class="product-price">
                                    <span class="color-medium me-2"><?php echo e(__('Price')); ?></span>
                                    <h6 class="price mb-0 lh-1">
                                      $<?php echo e($product->current_price); ?>

                                      <?php if($product->previous_price): ?>
                                        <span class="prev-price">$<?php echo e($product->previous_price); ?></span>
                                      <?php endif; ?>
                                    </h6>
                                  </div>
                                  <button type="button" class="btn-text color-primary" data-bs-toggle="modal"
                                    data-bs-target="#productsModal_<?php echo e($product->id); ?>"><?php echo e(__('View Details')); ?></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </div>
                    <?php endif; ?>
                    <!-- Slider Pagination -->
                    <div class="swiper-pagination position-static mt-20" id="products-slider-pagination"></div>
                  </div>
                </div>
                <?php if(!empty(showAd(3))): ?>
                  <div class="text-center mt-40">
                    <?php echo showAd(3); ?>

                  </div>
                <?php endif; ?>
              </div>

              <div class="tab-pane slide" id="reviews">
                <?php if($numOfReview > 0): ?>
                  <div class="review-box mb-40">
                    <h3 class="mb-15"><?php echo e(__('Customer Review')); ?></h3>
                    <div class="review-box-inner radius-lg">
                      <ul class="review-list">
                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="review list-unstyled p-0 mb-30">
                            <div class="review-body">
                              <div class="author">
                                <div class="lazy-container ratio ratio-1-1 radius-md">
                                  <?php if(empty($review->user->image)): ?>
                                    <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                      data-src="<?php echo e(asset('assets/img/user.png')); ?>" alt="Person Image">
                                  <?php else: ?>
                                    <img class="lazyload blur-up" src="assets/images/placeholder.png"
                                      data-src="<?php echo e(asset('assets/img/users/' . $review->user->image)); ?>"
                                      alt="Person Image">
                                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="content">
                                <h6 class="m-0"><?php echo e($review->user->username); ?></h6>

                                <span class="font-sm"><?php echo e(date('dS F Y, h.i A', strtotime($review->updated_at))); ?></span>
                                <div class="product-ratings mb-1">
                                  <div class="ratings">
                                    <div class="rate" style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                                      <div class="rating-icon"
                                        style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($review->rating * 20 . '%;'); ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <p>
                                  <?php echo e($review->review); ?>

                                </p>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                <?php else: ?>
                  <h3 class="text-center"><?php echo e(__('NO REVIEW FOUND') . '!'); ?></h3>
                <?php endif; ?>

                <?php if(auth()->guard('web')->check()): ?>
                  <div class="review-form radius-lg mb-40">
                    <h3 class="mb-10"><?php echo e(__('Write a Review')); ?></h3>
                    <form action="<?php echo e(route('listing.listing_details.store_review', ['id' => $listing->id])); ?>"
                      method="POST" id="reviewSubmitForm">
                      <?php echo csrf_field(); ?>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group mb-20">
                            <textarea class="form-control" name="review" id="review" cols="30" rows="9"
                              placeholder="Write your review"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="mb-1"><?php echo e(__('Rating') . '*'); ?></label>
                        <ul class="rating list-unstyled mb-20">
                          <li class="review-value review-1">
                            <span class="fas fa-star" data-ratingVal="1"></span>
                          </li>
                          <li class="review-value review-2">
                            <span class="fas fa-star" data-ratingVal="2"></span>
                            <span class="fas fa-star" data-ratingVal="2"></span>
                          </li>
                          <li class="review-value review-3">
                            <span class="fas fa-star" data-ratingVal="3"></span>
                            <span class="fas fa-star" data-ratingVal="3"></span>
                            <span class="fas fa-star" data-ratingVal="3"></span>
                          </li>
                          <li class="review-value review-4">
                            <span class="fas fa-star" data-ratingVal="4"></span>
                            <span class="fas fa-star" data-ratingVal="4"></span>
                            <span class="fas fa-star" data-ratingVal="4"></span>
                            <span class="fas fa-star" data-ratingVal="4"></span>
                          </li>
                          <li class="review-value review-5">
                            <span class="fas fa-star" data-ratingVal="5"></span>
                            <span class="fas fa-star" data-ratingVal="5"></span>
                            <span class="fas fa-star" data-ratingVal="5"></span>
                            <span class="fas fa-star" data-ratingVal="5"></span>
                            <span class="fas fa-star" data-ratingVal="5"></span>
                          </li>
                        </ul>
                      </div>
                      <input type="hidden" id="rating-id" name="rating">

                      <div class="form-group mt-10">
                        <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Submit Review')); ?></button>
                      </div>
                    </form>

                  </div>
                <?php endif; ?>
                <?php if(auth()->guard('web')->guest()): ?>
                  <div class="login-text mb-40">
                    <span><?php echo e(__('Please')); ?> <a href="<?php echo e(route('user.login', ['redirectPath' => 'listingDetails'])); ?>"
                        title="Login"><?php echo e(__('Login')); ?></a>
                      <?php echo e(__('To Give Your Review')); ?>

                      .</span>

                  </div>
                <?php endif; ?>
                <?php if(!empty(showAd(3))): ?>
                  <div class="text-center mt-40">
                    <?php echo showAd(3); ?>

                  </div>
                <?php endif; ?>
              </div>

              <div class="tab-pane slide" id="faq">
                <?php if(count($faqs) != 0): ?>
                  <h3 class="mb-15"><?php echo e(__('Frequently Asked Questions')); ?></h3>
                <?php endif; ?>

                <div class="faq-area">
                  <div class="accordion pb-25" id="faqAccordion">
                    <?php if(count($faqs) == 0): ?>
                      <h3 class="text-center"><?php echo e(__('NO FAQ FOUND') . '!'); ?></h3>
                    <?php else: ?>
                      <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item mb-30">
                          <h6 class="accordion-header" id="headingOne_<?php echo e($faq->id); ?>">
                            <button class="accordion-button <?php echo e($loop->iteration == 1 ? '' : 'collapsed'); ?>"
                              type="button" data-bs-toggle="collapse"
                              data-bs-target="#collapseOne_<?php echo e($faq->id); ?>" aria-expanded="true"
                              aria-controls="collapseOne_<?php echo e($faq->id); ?>">
                              <?php echo e($faq->serial_number); ?>. <?php echo e($faq->question); ?>

                            </button>
                          </h6>
                          <div id="collapseOne_<?php echo e($faq->id); ?>"
                            class="accordion-collapse collapse <?php echo e($loop->iteration == 1 ? 'show' : ''); ?>"
                            aria-labelledby="headingOne_<?php echo e($faq->id); ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                              <p>
                                <?php echo e($faq->answer); ?>

                              </p>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
                <?php if(!empty(showAd(3))): ?>
                  <div class="text-center mt-40">
                    <?php echo showAd(3); ?>

                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xl-3"><!-- Section gap -->
          <div class="pt-40 d-lg-none"></div>
          <aside class="widget-area" data-aos="fade-up">
            <?php if(is_array($permissions) && in_array('Listing Enquiry Form', $permissions)): ?>
              <div class="widget widget-form radius-md mb-30">
                <h5 class="title mb-20">
                  <?php echo e(__('Contact Information')); ?>

                </h5>
                <div class="user mb-20">
                  <div class="user-img">

                    <div class="lazy-container ratio ratio-1-1 rounded-pill">
                      <a href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>" target="_self">
                        <?php if($listing->vendor_id == 0): ?>
                          <img class="lazyload" src="assets/images/placeholder.png"
                            data-src="<?php echo e(asset('assets/img/admins/' . $vendor->image)); ?>" alt="Vendor">
                        <?php else: ?>
                          <?php if($vendor->photo): ?>
                            <img class="lazyload"
                              data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>"
                              alt="Person Image">
                          <?php else: ?>
                            <img class="lazyload" data-src="<?php echo e(asset('assets/front/images/avatar-1.jpg')); ?>"
                              alt="Person Image">
                          <?php endif; ?>
                        <?php endif; ?>
                      </a>
                    </div>
                  </div>
                  <div class="user-info">
                    <a href="<?php echo e(route('frontend.vendor.details', ['username' => $userName])); ?>" target="_self">
                      <h6 class="mb-1"><?php echo e($vendor->username); ?></h6>
                    </a>
                    <?php if($listing->vendor_id != 0): ?>
                      <h6 class="mb-1"><?php echo e($vendorInfo->name); ?></h6>
                    <?php endif; ?>
                    <?php if($vendor->show_phone_number == 1): ?>
                      <?php if(!is_null($vendor->phone)): ?>
                        <a href="tel:<?php echo e($vendor->phone); ?>"><?php echo e($vendor->phone); ?></a>
                      <?php endif; ?>
                    <?php endif; ?>
                    <br>
                    <?php if($vendor->show_email_addresss == 1): ?>
                      <a href="mailto:<?php echo e($vendor->to_mail); ?>"><?php echo e($vendor->to_mail); ?></a>
                    <?php endif; ?>
                  </div>
                </div>
                <form id="contactForm" action="<?php echo e(route('frontend.listings.contact_message')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group mb-20">
                    <input type="text" name="name" class="form-control" required
                      placeholder="<?php echo e(__('Name')); ?>*">
                  </div>
                  <div class="form-group mb-20">
                    <input type="email" name="email" class="form-control" required
                      placeholder="<?php echo e(__('Email Address')); ?>*">
                  </div>
                  <div class="form-group mb-20">
                    <input type="number" name="phone" class="form-control" required
                      placeholder="<?php echo e(__('Phone Number')); ?>*">
                  </div>
                  <div class="form-group mb-20">
                    <textarea name="message" id="message" class="form-control" cols="30" rows="8" required
                      data-error="Please enter your message" placeholder="<?php echo e(__('Message')); ?>*..."></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <input type="hidden" id="vendor_id" value="<?php echo e($listing->vendor_id); ?>" name="vendor_id">
                  <input type="hidden" id="listing_id" value="<?php echo e($listing->id); ?>" name="listing_id">
                  <button type="submit"
                    class="btn btn-md btn-primary w-100 showLoader"><?php echo e(__('Send message')); ?></button>
                </form>
              </div>
            <?php endif; ?>

            <div class="widget widget-address radius-md mb-30">
              <h5 class="title">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#amenities"
                  aria-expanded="true" aria-controls="amenities">
                  <?php echo e(__('Our Address')); ?>

                </button>
              </h5>
              <div id="amenities" class="collapse show">
                <div class="accordion-body">
                  <div class="lazy-container radius-md ratio ratio-2-3">
                    <div id="map"></div>
                  </div>
                  <ul class="list-group mt-20">



                    <li class="icon-start">
                      <i class="fal fa-map-marker-alt"></i>
                      <span><?php echo e($listing->listing_content->first()->address); ?></span>
                    </li>
                    <li class="icon-start">
                      <i class="fal fa-phone"></i>
                      <a href="<?php echo e($listing->phone); ?>"><?php echo e($listing->phone); ?></a>
                    </li>
                    <li class="icon-start">
                      <i class="fal fa-envelope"></i>
                      <a href="mailto:info@example.com"><?php echo e($listing->mail); ?></a>
                    </li>
                  </ul>
                  <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                    <div class="social-link mt-20">
                      <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($link->link); ?>" target="_blank"><i class="<?php echo e($link->icon); ?>"></i></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <?php if(is_array($permissions) && in_array('Business Hours', $permissions)): ?>
              <div class="widget widget-days radius-md mb-30">
                <h5 class="title">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price"
                    aria-expanded="true" aria-controls="price">
                    <?php echo e(__('Business Hours')); ?>

                  </button>
                </h5>
                <div id="price" class="collapse show">
                  <div class="accordion-body">
                    <ul class="list-group">
                      <?php $__currentLoopData = $businessHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($day->holiday == 1): ?>
                          <li class="d-flex align-items-center justify-content-between font-sm">
                            <span><?php echo e(__($day->day)); ?></span>
                            <span dir="ltr"><?php echo e($day->start_time); ?> - <?php echo e($day->end_time); ?></span>
                          </li>
                        <?php else: ?>
                          <li class="d-flex align-items-center justify-content-between font-sm">
                            <span><?php echo e(__($day->day)); ?></span>
                            <span class="text-danger"><?php echo e(__('Closed')); ?></span>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <div class="widget-banner mb-40">
              <?php if(!empty(showAd(1))): ?>
                <div class="text-center mt-40">
                  <?php echo showAd(1); ?>

                </div>
              <?php endif; ?>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- Listing end -->


  <?php echo $__env->make('frontend.listing.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('frontend.listing.product-details', $product_contents, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<!-- ✅ Add These in <head> of your layout or view -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/floating-whatsapp@1.0.1/floating-wpp.min.css">-->

<!-- You can move this to head or leave it here as well -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/floating-whatsapp@1.0.1/floating-wpp.min.js"></script>

<script>
  "use strict";
  var visitor_store_url = "<?php echo e(route('frontend.store_visitor')); ?>";
  var listing_id = "<?php echo e($listing->id); ?>";
  var latitude = "<?php echo e($listing->latitude); ?>";
  var longitude = "<?php echo e($listing->longitude); ?>";
</script>

<!-- Your Existing JS -->
<script src="<?php echo e(asset('assets/front/js/single-map.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/review.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/store-visitor.js')); ?>"></script>

<div class="floating-btns">
  <!-- WhatsApp Chat Button -->
  <div id="WAButton2"></div>

  <?php if(is_array($permissions) && in_array('WhatsApp', $permissions)): ?>
    <?php if($listing->whatsapp_status == 1): ?>
      <script type="text/javascript">
        var whatsapp_popup = "<?php echo e($listing->whatsapp_popup_status); ?>";
        var whatsappImg = "<?php echo e(asset('assets/img/whatsapp.svg')); ?>";

        $(function () {
          $('#WAButton2').floatingWhatsApp({
            phone: "<?php echo e($listing->whatsapp_number); ?>",
            headerTitle: "<?php echo e($listing->whatsapp_header_title); ?>",
            popupMessage: `<?php echo nl2br($listing->whatsapp_popup_message); ?>`,
            showPopup: whatsapp_popup == 1 ? true : false,
            buttonImage: '<img src="' + whatsappImg + '" />',
            position: "right"
          });
        });
      </script>
    <?php endif; ?>
  <?php endif; ?>

  
  <?php if(is_array($permissions) && in_array('Telegram', $permissions)): ?>
    <?php if($listing->telegram_status == 1): ?>
      <a class="telegram-btn" href="//telegram.me/<?php echo e($listing->telegram_username); ?>" target="_blank">
        <img src="<?php echo e(asset('assets/front/images/telegram.png')); ?>" alt="Image">
      </a>
    <?php endif; ?>
  <?php endif; ?>

  
  <?php if(is_array($permissions) && in_array('Messenger', $permissions)): ?>
    <?php if($listing->messenger_status == 1): ?>
      <a class="facebook-btn" href="<?php echo e($listing->messenger_direct_chat_link); ?>" target="_blank">
        <img src="<?php echo e(asset('assets/front/images/messenger.png')); ?>" alt="Image">
      </a>
    <?php endif; ?>
  <?php endif; ?>

  <!-- Tawk.to Script -->
  <?php if(is_array($permissions) && in_array('Tawk.To', $permissions)): ?>
    <?php if($listing->tawkto_status == 1): ?>
      <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
          Tawk_LoadStart = new Date();
        (function () {
          var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
          s1.async = true;
          s1.src = "<?php echo e($listing->tawkto_direct_chat_link); ?>";
          s1.charset = 'UTF-8';
          s1.setAttribute('crossorigin', '*');
          s0.parentNode.insertBefore(s1, s0);
        })();
      </script>
    <?php endif; ?>
  <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/listing/listing-details.blade.php ENDPATH**/ ?>