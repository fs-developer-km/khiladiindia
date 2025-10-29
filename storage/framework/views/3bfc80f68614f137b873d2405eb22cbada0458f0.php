<?php $__env->startSection('pageHeading'); ?>
  <?php echo e($vendor->username); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('metaKeywords'); ?>
  <?php echo e($vendor->username); ?>, <?php echo e(!request()->filled('admin') ? @$vendorInfo->name : ''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php echo e(!request()->filled('admin') ? @$vendorInfo->details : ''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Page title start-->
  <div class="page-title-area ptb-100">
    <!-- Background Image -->
    <img class="lazyload blur-up bg-img"
      <?php if(!empty($bgImg->breadcrumb)): ?> src="<?php echo e(asset('assets/img/' . $bgImg->breadcrumb)); ?>" <?php else: ?>
    src="<?php echo e(asset('assets/front/images/page-title-bg.jpg')); ?>" <?php endif; ?>
      alt="Bg-img">
    <div class="container">
      <div class="content">
        <div class="vendor mb-15">
          <figure class="vendor-img">
            <a href="javaScript:void(0)" class="lazy-container ratio ratio-1-1 radius-md">
              <?php if($vendor_id == 0): ?>
                <img class="lazyload" src="assets/images/placeholder.png"
                  data-src="<?php echo e(asset('assets/img/admins/' . $vendor->image)); ?>" alt="Vendor">
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
          </figure>
          <div class="vendor-info">
            <h5 class="mb-1 color-white"><?php echo e($vendor->username); ?></h5>
            <span class="text-light font-sm">
              <?php echo e($vendor->first_name ? @$vendor->first_name : @$vendorInfo->name); ?>

            </span>
            <span class="text-light font-sm d-block"><?php echo e(__('Member since')); ?>

              <?php echo e(\Carbon\Carbon::parse($vendor->created_at)->format('F Y')); ?></span>
            <span class="text-light font-sm d-block"><?php echo e(__('Total Listings') . ' : '); ?>

              <?php
                $total_vendor_listing = App\Models\Listing\Listing::where([
                    ['vendor_id', $vendor_id],
                    ['listings.status', '=', '1'],
                    ['listings.visibility', '=', '1'],
                ])
                    ->get()
                    ->count();
              ?>
              <?php echo e($total_vendor_listing); ?>

            </span>
          </div>
        </div>
        <ul class="list-unstyled">
          <li class="d-inline"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li>
          <li class="d-inline">/</li>
          <li class="d-inline active opacity-75">
            <?php echo e(__('Vendor Details')); ?></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page title end-->

  <!-- Vendor-area start -->
  <div class="vendor-area pt-100 pb-60">
    <div class="container">
      <div class="row gx-xl-5">
        <div class="col-lg-9">
          <h4 class="title mb-20"><?php echo e(__('All Listings')); ?></h4>
          <div class="tabs-navigation tabs-navigation-3 mb-20">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <button class="nav-link btn-md active" data-bs-toggle="tab" data-bs-target="#tab_all"
                  type="button"><?php echo e(__('All Listings')); ?></button>
              </li>
              <?php
                if (request()->filled('admin')) {
                    $vendor_id = 0;
                } else {
                    $vendor_id = $vendor_id;
                }
              ?>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $category_id = $category->id;
                  $listings_count = App\Models\Listing\Listing::join(
                      'listing_contents',
                      'listing_contents.listing_id',
                      'listings.id',
                  )
                      ->where([
                          ['vendor_id', $vendor_id],
                          ['listings.status', '=', '1'],
                          ['listings.visibility', '=', '1'],
                      ])
                      ->where('listing_contents.language_id', $language->id)
                      ->where('listing_contents.category_id', $category_id)
                      ->get()
                      ->count();
                ?>
                <?php if($listings_count > 0): ?>
                  <li class="nav-item">
                    <button class="nav-link btn-md" data-bs-toggle="tab" data-bs-target="#tab_<?php echo e($category->id); ?>"
                      type="button"><?php echo e($category->name); ?></button>
                  </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <div class="tab-content" data-aos="fade-up">
            <div class="tab-pane fade show active" id="tab_all">
              <div class="row">
                <?php if(count($listings) > 0): ?>
                  <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $listing_content = App\Models\Listing\ListingContent::where([
                          ['language_id', $language->id],
                          ['listing_id', $listing->id],
                      ])->first();
                      $total_review = App\Models\Listing\ListingReview::where('listing_id', $listing->id)->count();
                      $today_date = now()->format('Y-m-d');
                      $feature = App\Models\FeatureOrder::where('order_status', '=', 'completed')
                          ->where('listing_id', $listing->id)
                          ->whereDate('end_date', '>=', $today_date)
                          ->first();
                    ?>
                    <?php if(!empty($listing_content)): ?>
                      <div class="col-md-6 col-xl-4" data-aos="fade-up">
                        <div
                          class="product-default border radius-md mb-25 <?php if($feature): ?> active <?php endif; ?>">
                          <figure class="product-img">
                            <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing->id])); ?>"
                              class="lazy-container ratio ratio-2-3">
                              <img class="lazyload"
                                data-src="<?php echo e(asset('assets/img/listing/' . $listing->feature_image)); ?>"
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
                              class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>"
                              data-tooltip="tooltip" data-bs-placement="top"
                              title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
                              <i class="fal fa-heart"></i>
                            </a>
                          </figure>

                          <div class="product-details">
                            <?php
                              $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                            ?>
                            <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                              title="Link" class="product-category font-sm icon-start">
                              <i class="<?php echo e($categorySlug->icon); ?>"></i><?php echo e($categorySlug->name); ?>

                            </a>

                            <h5 class="product-title mb-10 mt-1">
                              <a
                                href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"><?php echo e(optional($listing_content)->title); ?></a>
                            </h5>
                            <div class="product-ratings mb-10">
                              <div class="ratings">
                                <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                                  <div class="rating-icon"
                                    style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing->average_rating * 20 . '%;'); ?>">
                                  </div>
                                </div>
                                <span
                                  class="ratings-total font-xsm">(<?php echo e(number_format($listing->average_rating, 2)); ?>)</span>
                                <span class="ratings-total color-medium ms-2"><?php echo e($listing_content->review_count); ?>

                                  <?php echo e($total_review); ?> <?php echo e(__('Reviews')); ?></span>
                              </div>
                            </div>
                            <?php
                              if ($listing_content->city_id) {
                                  $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()
                                      ->name;
                              }
                              if ($listing_content->state_id) {
                                  $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                      ->name;
                              }
                              if ($listing_content->country_id) {
                                  $country = App\Models\Location\Country::Where(
                                      'id',
                                      $listing_content->country_id,
                                  )->first()->name;
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
                              <div class="product-price mt-10">
                                <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                                <h6 class="price mb-0 lh-1">
                                  <?php echo e($currencyInfo->base_currency_symbol); ?><?php echo e($listing_content->min_price); ?>

                                  -
                                  <?php echo e($currencyInfo->base_currency_symbol); ?><?php echo e($listing_content->max_price); ?>

                                </h6>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div><!-- product-default -->
                      </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <h4 class="text-center mt-4 mb-4"><?php echo e(__('NO LISTING FOUND')); ?></h4>
                <?php endif; ?>
              </div>
            </div>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $category_id = $category->id;
                $listings = App\Models\Listing\Listing::join(
                    'listing_contents',
                    'listing_contents.listing_id',
                    'listings.id',
                )
                    ->where([
                        ['vendor_id', $vendor_id],
                        ['listings.status', '=', '1'],
                        ['listings.visibility', '=', '1'],
                    ])
                    ->where('listing_contents.language_id', $language->id)
                    ->where('listing_contents.category_id', $category_id)
                    ->select('listings.*', 'listing_contents.slug', 'listing_contents.title')
                    ->orderBy('id', 'desc')
                    ->get();
              ?>
              <?php if(count($listings) > 0): ?>
                <div class="tab-pane fade" id="tab_<?php echo e($category->id); ?>">
                  <div class="row">
                    <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $listing_content = App\Models\Listing\ListingContent::where([
                            ['language_id', $language->id],
                            ['listing_id', $listing->id],
                        ])->first();
                        $total_review = App\Models\Listing\ListingReview::where('listing_id', $listing->id)->count();
                        $today_date = now()->format('Y-m-d');
                        $feature = App\Models\FeatureOrder::where('order_status', '=', 'completed')
                            ->where('listing_id', $listing->id)
                            ->whereDate('end_date', '>=', $today_date)
                            ->first();
                      ?>
                      <?php if(!empty($listing_content)): ?>
                        <div class="col-md-6 col-xl-4" data-aos="fade-up">
                          <div
                            class="product-default border radius-md mb-25 <?php if($feature): ?> active <?php endif; ?>">
                            <figure class="product-img">
                              <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing->id])); ?>"
                                class="lazy-container ratio ratio-2-3">
                                <img class="lazyload"
                                  data-src="<?php echo e(asset('assets/img/listing/' . $listing->feature_image)); ?>"
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
                                class="btn-icon <?php echo e($checkWishList == false ? '' : 'wishlist-active'); ?>"
                                data-tooltip="tooltip" data-bs-placement="top"
                                title="<?php echo e($checkWishList == false ? __('Save to Wishlist') : __('Saved')); ?>">
                                <i class="fal fa-heart"></i>
                              </a>
                            </figure>

                            <div class="product-details">
                              <?php
                                $categorySlug = App\Models\ListingCategory::findorfail($listing_content->category_id);
                              ?>
                              <a href="<?php echo e(route('frontend.listings', ['category_id' => $categorySlug->slug])); ?>"
                                title="Link" class="product-category font-sm icon-start">
                                <i class="<?php echo e($categorySlug->icon); ?>"></i><?php echo e($categorySlug->name); ?>

                              </a>

                              <h5 class="product-title mb-10 mt-1">
                                <a
                                  href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->id])); ?>"><?php echo e(optional($listing_content)->title); ?></a>
                              </h5>
                              <div class="product-ratings mb-10">
                                <div class="ratings">
                                  <div class="rate"
                                    style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                                    <div class="rating-icon"
                                      style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($listing->average_rating * 20 . '%;'); ?>">
                                    </div>
                                  </div>
                                  <span
                                    class="ratings-total font-xsm">(<?php echo e(number_format($listing->average_rating, 2)); ?>)</span>
                                  <span class="ratings-total color-medium ms-2"><?php echo e($listing_content->review_count); ?>

                                    <?php echo e($total_review); ?> <?php echo e(__('Reviews')); ?></span>
                                </div>
                              </div>
                              <?php
                                if ($listing_content->city_id) {
                                    $city = App\Models\Location\City::Where('id', $listing_content->city_id)->first()
                                        ->name;
                                }
                                if ($listing_content->state_id) {
                                    $State = App\Models\Location\State::Where('id', $listing_content->state_id)->first()
                                        ->name;
                                }
                                if ($listing_content->country_id) {
                                    $country = App\Models\Location\Country::Where(
                                        'id',
                                        $listing_content->country_id,
                                    )->first()->name;
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
                                <div class="product-price mt-10">
                                  <span class="color-medium me-2"><?php echo e(__('From')); ?></span>
                                  <h6 class="price mb-0 lh-1">
                                    <?php echo e($currencyInfo->base_currency_symbol); ?><?php echo e($listing_content->min_price); ?>

                                    -
                                    <?php echo e($currencyInfo->base_currency_symbol); ?><?php echo e($listing_content->max_price); ?>

                                  </h6>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div><!-- product-default -->
                        </div>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php if(!empty(showAd(3))): ?>
            <div class="text-center mb-4">
              <?php echo showAd(3); ?>

            </div>
          <?php endif; ?>
        </div>
        <div class="col-lg-3">
          <aside class="widget-area" data-aos="fade-up">
            <div class="widget-vendor mb-40 border p-3">
              <div class="vendor mb-20 text-center">
                <figure class="vendor-img mx-auto mb-15">
                  <div class="lazy-container ratio ratio-1-1 radius-md">

                    <?php if($vendor_id == 0): ?>
                      <img class="lazyload" src="assets/images/placeholder.png"
                        data-src="<?php echo e(asset('assets/img/admins/' . $vendor->image)); ?>" alt="Vendor">
                    <?php else: ?>
                      <?php if($vendor->photo != null): ?>
                        <img class="lazyload" data-src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>"
                          alt="Vendor">
                      <?php else: ?>
                        <img class="lazyload" data-src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="Vendor">
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </figure>
                <div class="vendor-info">
                  <h5 class="mb-1"><?php echo e($vendor->username); ?></h5>
                  <span class="verification">
                    <?php echo e($vendor->first_name ? @$vendor->first_name : @$vendorInfo->name); ?>

                  </span>
                </div>
              </div>
              <!-- about text -->
              <?php if(request()->input('admin') == true): ?>
                <?php if(!is_null($vendor->details)): ?>
                  <div class="font-sm">
                    <div class="click-show">
                      <p class="text mb-0">
                        <span class="color-dark"><b><?php echo e(__('About') . ':'); ?></b></span>
                        <?php echo e($vendor->details); ?>

                      </p>
                    </div>
                    <div class="read-more-btn"><span><?php echo e(__('Read more')); ?></span></div>
                  </div>
                <?php endif; ?>
              <?php else: ?>
                <?php if(!is_null(@$vendorInfo->details)): ?>
                  <div class="font-sm">
                    <div class="click-show">
                      <p class="text mb-0">
                        <span class="color-dark"><b><?php echo e(__('About') . ':'); ?></b></span>
                        <?php echo e(@$vendorInfo->details); ?>

                      </p>
                    </div>
                    <div class="read-more-btn"><span><?php echo e(__('Read more')); ?></span></div>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <hr>
              <!-- Toggle list start -->
              <ul class="toggle-list list-unstyled mt-15" id="toggleList" data-toggle-show="6">
                <li>
                  <span class="first"><?php echo e(__('Total Listings') . ':'); ?></span>
                  <span class="last"><?php echo e($total_vendor_listing); ?> </span>
                </li>

                <?php if($vendor->show_email_addresss == 1): ?>
                  <li>
                    <span class="first"><?php echo e(__('Email') . ':'); ?></span>
                    <span class="last"><a href="mailto:<?php echo e($vendor->email); ?>"><?php echo e($vendor->email); ?></a></span>
                  </li>
                <?php endif; ?>

                <?php if($vendor->show_phone_number == 1): ?>
                  <li>
                    <span class="first"><?php echo e(__('Phone')); ?></span>
                    <span class="last"><a
                        href="tel:<?php echo e($vendor->phone); ?>"><?php echo e($vendor->phone != null ? $vendor->phone : '-'); ?></a></span>
                  </li>
                <?php endif; ?>

                <?php if(request()->input('admin') != true): ?>
                  <?php if(!is_null(@$vendorInfo->city)): ?>
                    <li>
                      <span class="first"><?php echo e(__('City') . ':'); ?></span>
                      <span class="last"><?php echo e(@$vendorInfo->city); ?></span>
                    </li>
                  <?php endif; ?>

                  <?php if(!is_null(@$vendorInfo->state)): ?>
                    <li>
                      <span class="first"><?php echo e(__('State') . ':'); ?></span>
                      <span class="last"><?php echo e(@$vendorInfo->state); ?></span>
                    </li>
                  <?php endif; ?>

                  <?php if(!is_null(@$vendorInfo->country)): ?>
                    <li>
                      <span class="first"><?php echo e(__('Country') . ':'); ?></span>
                      <span class="last"><?php echo e(@$vendorInfo->country); ?></span>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if(request()->input('admin') == true): ?>
                  <li>
                    <span class="first"><?php echo e(__('Address') . ' : '); ?></span>
                    <span class="last"><?php echo e($vendor->address != null ? $vendor->address : '-'); ?></span>
                  </li>
                <?php else: ?>
                  <li>
                    <span class="first"><?php echo e(__('Address') . ' : '); ?></span>
                    <span class="last"><?php echo e(@$vendorInfo->address != null ? @$vendorInfo->address : '-'); ?></span>
                  </li>
                <?php endif; ?>

                <?php if(request()->input('admin') != true): ?>
                  <?php if(!is_null(@$vendorInfo->zip_code)): ?>
                    <li>
                      <span class="first"><?php echo e(__('Zip Code') . ':'); ?></span>
                      <span class="last"><?php echo e(@$vendorInfo->zip_code); ?></span>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>


                <?php if(request()->input('admin') != true): ?>
                  <li>
                    <span class="first"><?php echo e(__('Member since') . ':'); ?></span>
                    <span class="last font-sm"><?php echo e(\Carbon\Carbon::parse($vendor->created_at)->format('F Y')); ?></span>
                  </li>
                <?php endif; ?>

              </ul>
              <span class="show-more-btn" data-toggle-btn="toggleListBtn">
                <?php echo e(__('Show More') . ' +'); ?>

              </span>
              <hr>
              <!-- Toggle list end -->
              <?php if($vendor->show_contact_form == 1): ?>
                <div class="cta-btn mt-20">
                  <button class="btn btn-lg btn-primary w-100" data-bs-toggle="modal" data-bs-target="#contactModal"
                    type="button" aria-label="button"><?php echo e(__('Contact Now')); ?></button>
                </div>
              <?php endif; ?>
            </div>

            <?php if(!empty(showAd(1))): ?>
              <div class="text-center mb-40">
                <?php echo showAd(1); ?>

              </div>
            <?php endif; ?>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- Vendor-area end -->

  <!-- Contact Modal -->
  <div class="modal contact-modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title mb-0" id="contactModalLabel"><?php echo e(__('Contact Now')); ?></h1>
            <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('vendor.contact.message')); ?>" method="POST" id="vendorContactForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="vendor_email" value="<?php echo e($vendor->email); ?>">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mb-20">
                  <input type="text" class="form-control" placeholder="<?php echo e(__('Enter Your Full Name')); ?>"
                    name="name" required>
                  <p class="text-danger em" id="err_name"></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-20">
                  <input type="email" class="form-control" placeholder="<?php echo e(__('Enter Your Email')); ?>"
                    name="email" required>
                  <p class="text-danger em" id="err_email"></p>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-20">
                  <input type="text" class="form-control" placeholder="<?php echo e(__('Enter Subject')); ?>" name="subject"
                    required>
                  <p class="text-danger em" id="err_subject"></p>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-20">
                  <textarea name="message" class="form-control"required placeholder="<?php echo e(__('Message')); ?>"></textarea>
                  <p class="text-danger em" id="err_message"></p>
                </div>
              </div>
              <?php if($info->google_recaptcha_status == 1): ?>
                <div class="col-md-12">
                  <div class="form-group mb-20">
                    <?php echo NoCaptcha::renderJs(); ?>

                    <?php echo NoCaptcha::display(); ?>

                    <p class="text-danger em" id="err_g-recaptcha-response"></p>
                  </div>
                </div>
              <?php endif; ?>
              <div class="col-lg-12 text-center">
                <button class="btn btn-lg btn-primary" id="vendorSubmitBtn" type="submit"
                  aria-label="button"><?php echo e(__('Send message')); ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/vendor/details.blade.php ENDPATH**/ ?>