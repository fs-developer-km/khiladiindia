<?php $__env->startSection('pageHeading'); ?>
  <?php if(!empty($pageHeading)): ?>
    <?php echo e($pageHeading->pricing_page_title); ?>

  <?php else: ?>
    <?php echo e(__('Pricing')); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_pricing); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_pricing); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Page title start-->
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->pricing_page_title : __('Pricing'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->pricing_page_title : __('Pricing'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Page title end-->

  <section class="pricing-area pt-100 pb-75">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title title-center mb-40" data-aos="fade-up">
            <h2 class="title"><?php echo e($packageSecInfo ? $packageSecInfo->title : 'Most Affordable Package'); ?></h2>
          </div>
          <div class="tabs-navigation tabs-navigation-2 text-center mb-40" data-aos="fade-up">
            <ul class="nav nav-tabs rounded-pill bg-light" data-hover="fancyHover">
              <?php
                $totalTerms = count($terms);
                $middleTerm = intdiv($totalTerms, 2);
              ?>
              <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item <?php echo e($index == $middleTerm ? 'active' : ''); ?>">
                  <button class="nav-link hover-effect rounded-pill <?php echo e($index == $middleTerm ? 'active' : ''); ?>"
                    data-bs-toggle="tab" data-bs-target="#<?php echo e(strtolower($term)); ?>" type="button">
                    <?php echo e(__($term)); ?>

                  </button>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content">
            <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php echo e($index == $middleTerm ? 'show active' : ''); ?>" id="<?php echo e(strtolower($term)); ?>">
                <div class="row justify-content-center">
                  <?php
                    $packages = \App\Models\Package::where('status', '1')->where('term', strtolower($term))->get();
                    $totalItems = count($packages);
                    $middleIndex = intdiv($totalItems, 2);
                  ?>
                  <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $permissions = $package->features;
                      if (!empty($package->features)) {
                          $permissions = json_decode($permissions, true);
                      }
                    ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                      <div class="pricing-item radius-lg <?php echo e($package->recommended ? 'active' : ''); ?> mb-30">
                        <div class="d-flex align-items-center">
                          <div class="icon"><i class="<?php echo e($package->icon); ?>"></i></div>
                          <div class="label">
                            <h3> <?php echo e(__($package->title)); ?></h3>
                            <?php if($package->recommended == '1'): ?>
                              <span><?php echo e(__('Popular')); ?></span>
                            <?php endif; ?>

                          </div>
                        </div>
                        <p class="text"></p>
                        <div class="d-flex align-items-center">
                          <span class="price"><?php echo e(symbolPrice($package->price)); ?></span>
                          <?php if($package->term == 'monthly'): ?>
                            <span class="period">/ <?php echo e(__('Monthly')); ?></span>
                          <?php elseif($package->term == 'yearly'): ?>
                            <span class="period">/ <?php echo e(__('Yearly')); ?></span>
                          <?php elseif($package->term == 'lifetime'): ?>
                            <span class="period">/ <?php echo e(__('Lifetime')); ?></span>
                          <?php endif; ?>
                        </div>
                        <h5><?php echo e(__('What\'s Included')); ?></h5>
                        <ul class="item-list list-unstyled p-0 pricing-list">

                          <li><i class="fal fa-check"></i>
                            <?php if($package->number_of_listing == 999999): ?>
                              <?php echo e(__('Listing (Unlimited)')); ?>

                            <?php elseif($package->number_of_listing == 1): ?>
                              <?php echo e(__('Listing')); ?> (<?php echo e($package->number_of_listing); ?>)
                            <?php else: ?>
                              <?php echo e(__('Listings')); ?> (<?php echo e($package->number_of_listing); ?>)
                            <?php endif; ?>
                          </li>

                          <li><i class="fal fa-check"></i>
                            <?php if($package->number_of_images_per_listing == 999999): ?>
                              <?php echo e(__('Images Per Listing (Unlimited)')); ?>

                            <?php elseif($package->number_of_images_per_listing == 1): ?>
                              <?php echo e(__('Image Per Listing')); ?> (<?php echo e($package->number_of_images_per_listing); ?>)
                            <?php else: ?>
                              <?php echo e(__('Images Per Listings')); ?> (<?php echo e($package->number_of_images_per_listing); ?>)
                            <?php endif; ?>
                          </li>
                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('Listing Enquiry Form', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Enquiry Form')); ?>

                          </li>

                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('Video', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Video')); ?>

                          </li>

                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                            <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
                              <?php if($package->number_of_amenities_per_listing == 999999): ?>
                                <?php echo e(__('Amenities Per Listing(Unlimited)')); ?>

                              <?php elseif($package->number_of_amenities_per_listing == 1): ?>
                                <?php echo e(__('Amenitie Per Listing')); ?> (<?php echo e($package->number_of_amenities_per_listing); ?>)
                              <?php else: ?>
                                <?php echo e(__('Amenities Per Listing')); ?>

                                (<?php echo e($package->number_of_amenities_per_listing); ?>)
                              <?php endif; ?>
                            <?php else: ?>
                              <?php echo e(__('Amenities Per Listing')); ?>

                            <?php endif; ?>
                          </li>

                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                            <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                              <?php if($package->number_of_additional_specification == 999999): ?>
                                <?php echo e(__('Feature Per Listing (Unlimited)')); ?>

                              <?php elseif($package->number_of_additional_specification == 1): ?>
                                <?php echo e(__('Feature Per Listing')); ?>

                                (<?php echo e($package->number_of_additional_specification); ?>)
                              <?php else: ?>
                                <?php echo e(__('Features Per Listing')); ?>

                                (<?php echo e($package->number_of_additional_specification); ?>)
                              <?php endif; ?>
                            <?php else: ?>
                              <?php echo e(__('Feature Per Listing')); ?>

                            <?php endif; ?>
                          </li>
                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>

                            <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                              <?php if($package->number_of_social_links == 999999): ?>
                                <?php echo e(__('Social Links Per Listing(Unlimited)')); ?>

                              <?php elseif($package->number_of_social_links == 1): ?>
                                <?php echo e(__('Social Link Per Listing')); ?> (<?php echo e($package->number_of_social_links); ?>)
                              <?php else: ?>
                                <?php echo e(__('Social Links Per Listing')); ?> (<?php echo e($package->number_of_social_links); ?>)
                              <?php endif; ?>
                            <?php else: ?>
                              <?php echo e(__('Social Link Per Listing')); ?>

                            <?php endif; ?>
                          </li>
                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
                              <?php if($package->number_of_faq == 999999): ?>
                                <?php echo e(__('FAQ Per Listing(Unlimited)')); ?>

                              <?php elseif($package->number_of_faq == 1): ?>
                                <?php echo e(__('FAQ Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                              <?php else: ?>
                                <?php echo e(__('FAQs Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                              <?php endif; ?>
                            <?php else: ?>
                              <?php echo e(__('FAQ Per Listing')); ?>

                            <?php endif; ?>
                          </li>

                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('Business Hours', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Business Hours')); ?>

                          </li>
                          <li><i
                              class=" <?php if(is_array($permissions) && in_array('Products', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                              <?php if($package->number_of_products == 999999): ?>
                                <?php echo e(__('Products Per Listing (Unlimited)')); ?>

                              <?php elseif($package->number_of_products == 1): ?>
                                <?php echo e(__('Product Per Listing')); ?> (<?php echo e($package->number_of_products); ?>)
                              <?php else: ?>
                                <?php echo e(__('Products Per Listing')); ?> (<?php echo e($package->number_of_products); ?>)
                              <?php endif; ?>
                            <?php else: ?>
                              <?php echo e(__('Products Per Listing')); ?>

                            <?php endif; ?>
                          </li>

                          <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                            <li><i class="fal fa-check"></i>
                              <?php if($package->number_of_images_per_products == 999999): ?>
                                <?php echo e(__('Product Image Per Product (Unlimited)')); ?>

                              <?php elseif($package->number_of_images_per_products == 1): ?>
                                <?php echo e(__('Product Image Per Product')); ?>

                                (<?php echo e($package->number_of_images_per_products); ?>)
                              <?php else: ?>
                                <?php echo e(__('Product Images Per Product')); ?>

                                (<?php echo e($package->number_of_images_per_products); ?>)
                              <?php endif; ?>

                            </li>
                          <?php else: ?>
                            <li><i class="fal fa-times not-active"></i>
                              <?php echo e(__('Product Image Per Product')); ?></li>
                          <?php endif; ?>


                          <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                            <li><i
                                class=" <?php if(is_array($permissions) && in_array('Product Enquiry Form', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                              <?php echo e(__('Product Enquiry Form')); ?> </li>
                          <?php else: ?>
                            <li><i class="fal fa-times not-active"></i>
                              <?php echo e(__('Product Enquiry Form')); ?></li>
                          <?php endif; ?>
                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('Messenger', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Messenger')); ?>

                          </li>
                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('WhatsApp', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('WhatsApp')); ?>

                          </li>
                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('Telegram', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Telegram')); ?>

                          </li>
                          <li>
                            <i
                              class=" <?php if(is_array($permissions) && in_array('Tawk.To', $permissions)): ?> fal fa-check <?php else: ?> fal fa-times not-active <?php endif; ?>"></i>
                            <?php echo e(__('Tawk.To')); ?>

                          </li>


                          <?php if(!is_null($package->custom_features)): ?>
                            <?php
                              $features = explode("\n", $package->custom_features);
                            ?>
                            <?php if(count($features) > 0): ?>
                              <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><i class="fal fa-check"></i><?php echo e(__($value)); ?>

                                </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          <?php endif; ?>

                        </ul>
                        <?php if(auth()->guard('vendor')->check()): ?>
                          <a href="<?php echo e(route('vendor.plan.extend.checkout', $package->id)); ?>" class="btn btn-outline btn-lg"
                            title="Purchase" target="_self"><?php echo e(__('Purchase')); ?></a>
                        <?php endif; ?>
                        <?php if(auth()->guard('vendor')->guest()): ?>
                          <a href="<?php echo e(route('vendor.login', ['redirectPath' => 'buy_plan', 'package' => $package->id])); ?>"
                            class="btn btn-outline btn-lg" title="Purchase" target="_self"><?php echo e(__('Purchase')); ?></a>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Bg Shape -->
    <div class="shape">
      <img class="shape-1" src="<?php echo e(asset('assets/front/images/shape/shape-4.svg')); ?>" alt="Shape">
      <img class="shape-2" src="<?php echo e(asset('assets/front/images/shape/shape-3.svg')); ?>" alt="Shape">
      <img class="shape-3" src="<?php echo e(asset('assets/front/images/shape/shape-5.svg')); ?>" alt="Shape">
      <img class="shape-4" src="<?php echo e(asset('assets/front/images/shape/shape-6.svg')); ?>" alt="Shape">
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/pricing.blade.php ENDPATH**/ ?>