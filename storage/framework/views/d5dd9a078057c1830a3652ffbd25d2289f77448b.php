<div id="zx">
  <div class="widget-offcanvas offcanvas-xl offcanvas-start" tabindex="-1" id="widgetOffcanvas"
    aria-labelledby="widgetOffcanvas">
    <div class="offcanvas-header px-20">
      <h4 class="offcanvas-title">Filter</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#widgetOffcanvas"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3 p-xl-0" id="xx">
      <aside class="widget-area pb-10">
        <form action="<?php echo e(route('frontend.listings')); ?>" id="asdfgkyjueu" method="GET">
          <div class="widget widget-categories radius-md mb-30">
            <h5 class="title">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categories"
                aria-expanded="true" aria-controls="categories">
                <?php echo e(__('Categories')); ?>

              </button>
            </h5>
            <div id="categories" class="collapse show">
              <div class="accordion-body">
                <ul class="list-group"data-toggle-list="categoriesToggle" data-toggle-show="5">
                  <li class="list-item <?php if(request()->input('category_id') == null): ?> open <?php endif; ?>">
                    <a href="#" class="category-toggle  <?php if(request()->input('category_id') == null): ?>  <?php endif; ?>" id="">
                      <?php echo e(__('All')); ?>

                    </a>
                  </li>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-item <?php if(request()->input('category_id') == $categorie->slug): ?> open <?php endif; ?>">
                      <a href="#" class="category-toggle" id="<?php echo e($categorie->slug); ?>">
                        <?php echo e($categorie->name); ?>

                      </a>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span class="show-more font-sm" data-toggle-btn="toggleListBtn">
                  <?php echo e(__('Show More')); ?> +
                </span>
              </div>
            </div>
          </div>
          <div id="filter-div">
            <div class="widget radius-md mb-30">
              <h5 class="title">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#options"
                  aria-expanded="true" aria-controls="options">
                  <?php echo e(__('Filters')); ?>

                </button>
              </h5>
              <div id="options" class="collapse show">
                <div class="accordion-body">
                  <div class="form-group icon-end mb-20 ">
                    <input type="text" class="form-control" value="<?php echo e(request()->input('title')); ?>"
                      id="searchBytTitle" name="title" placeholder="<?php echo e(__('Enter Title')); ?>">
                    <label class="mb-0 color-primary"><i class="fal fa-search"></i></label>
                  </div>
                  <div class="form-group icon-end mb-20">
                    <input type="text" class="form-control"id="searchBytLocation"
                      value="<?php echo e(request()->input('location')); ?>" name="location"
                      placeholder="<?php echo e(__('Enter Location')); ?> ">
                    <label class="mb-0 color-primary"><i class="fal fa-map-marker-alt"></i></label>
                  </div>

                  <div class="form-group mb-20">
                    <select class="form-control select2 vendorDropdown" id="vendorDropdown"
                      aria-labelledby="vendorLabel">
                      <option value="" selected disabled><?php echo e(__('Select Vendor')); ?></option>
                      <option value=""><?php echo e(__('All')); ?></option>
                      <option value="admin"><?php echo e(__('Admin')); ?></option>
                      <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($vendor->vendor_id); ?>"><?php echo e($vendor->username); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                  <?php if($countries->count() > 0): ?>
                    <div class="form-group mb-20">
                      <select class="form-control select2 countryDropdown" id="countryDropdown">
                        <option value="" selected disabled><?php echo e(__('Select Country')); ?></option>
                        <option value=""><?php echo e(__('All')); ?></option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  <?php endif; ?>

                  <?php if($states->count() > 0): ?>
                    <div class="form-group mb-20 hide_state">
                      <select class="form-control select2 stateDropdown" id="stateDropdown">
                        <option value="" selected disabled><?php echo e(__('Select State')); ?></option>
                        <option value=""><?php echo e(__('All')); ?></option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  <?php endif; ?>

                  <?php if($cities->count() > 0): ?>
                    <div class="form-group">
                      <select class="form-control select2 cityDropdown" id="cityDropdown">
                        <option value="" selected disabled><?php echo e(__('Select City')); ?></option>
                        <option value=""><?php echo e(__('All')); ?></option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option <?php if(request()->input('city') == $city->id): ?> selected <?php endif; ?> value="<?php echo e($city->id); ?>">
                            <?php echo e($city->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div id="amenities-div">
            <div class="widget widget-amenities radius-md mb-30">
              <h5 class="title">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#amenities"
                  aria-expanded="true" aria-controls="amenities">
                  <?php echo e(__('Amenities')); ?>


                </button>
              </h5>
              <div id="amenities" class="collapse show">
                <div class="accordion-body">
                  <ul class="list-group custom-checkbox toggle-list" data-toggle-list="amenitiesToggle"
                    data-toggle-show="5">
                    <?php
                      $aminities = App\Models\Aminite::where('language_id', $language->id)->get();
                      $vv = request()->input('amenitie');
                      $hasaminitie = explode(',', $vv);
                    ?>

                    <?php $__currentLoopData = $aminities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aminitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(in_array($aminitie->id, $hasaminitie)): ?>
                        <li>
                          <input class="input-checkbox" type="checkbox" name="checkbox"
                            id="checkbox_<?php echo e($aminitie->id); ?>" value="<?php echo e($aminitie->id); ?>" checked>
                          <label class="form-check-label"
                            for="checkbox_<?php echo e($aminitie->id); ?>"><span><?php echo e($aminitie->title); ?></label>
                        </li>
                      <?php else: ?>
                        <li>
                          <input class="input-checkbox" type="checkbox" name="checkbox"
                            id="checkbox_<?php echo e($aminitie->id); ?>" value="<?php echo e($aminitie->id); ?>">
                          <label class="form-check-label"
                            for="checkbox_<?php echo e($aminitie->id); ?>"><span><?php echo e($aminitie->title); ?></span></label>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </ul>
                  <span class="show-more font-sm" data-toggle-btn="toggleListBtn">
                    <?php echo e(__('Show More')); ?> +
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="widget widget-price radius-md mb-30">
            <h5 class="title">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price"
                aria-expanded="true" aria-controls="price">
                <?php echo e(__('Pricing Filter')); ?>

              </button>
            </h5>
            <div id="price" class="collapse show">
              <div class="accordion-body">
                <input class="form-control" type="hidden"
                  value="<?php echo e(request()->filled('min_val') ? request()->input('min_val') : $min); ?>" name="min"
                  id="min">
                <input class="form-control" type="hidden" value="<?php echo e($min); ?>" id="o_min">
                <input class="form-control" type="hidden" value="<?php echo e($max); ?>" id="o_max">
                <input class="form-control"
                  value="<?php echo e(request()->filled('max_val') ? request()->input('max_val') : $max); ?>" type="hidden"
                  name="max" id="max">
                <input type="hidden" id="currency_symbol" value="<?php echo e($basicInfo->base_currency_symbol); ?>">
                <div class="price-item">
                  <div class="price-slider" data-range-slider='filterPriceSlider'></div>
                  <div class="price-value">
                    <span class="color-dark"><?php echo e(__('Price')); ?>:
                      <span class="filter-price-range" data-range-value='filterPriceSliderValue'></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rating-div">
            <div class="widget widget-rating radius-md mb-30">
              <h5 class="title">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rating"
                  aria-expanded="true" aria-controls="rating">
                  <?php echo e(__('Rating')); ?>

                </button>
              </h5>
              <div id="rating" class="collapse fade show">
                <div class="accordion-body">
                  <ul class="list-group custom-radio">
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio6"
                        value="0"<?php if(request()->input('ratings') == ''): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio6">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('All')); ?></span>
                        </div>
                      </label>
                    </li>
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio1" value="5"
                        <?php if(request()->input('ratings') == '5'): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio1">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('5 stars')); ?></span>
                        </div>
                      </label>
                    </li>
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio2"
                        value="4"<?php if(request()->input('ratings') == '4'): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio2">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('4 stars and above')); ?></span>
                        </div>
                      </label>
                    </li>
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio3"
                        value="3"<?php if(request()->input('ratings') == '3'): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio3">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('3 stars and above')); ?></span>
                        </div>
                      </label>
                    </li>
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio4"
                        value="2"<?php if(request()->input('ratings') == '2'): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio4">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('2 stars and above')); ?></span>
                        </div>
                      </label>
                    </li>
                    <li>
                      <input class="input-radio" type="radio" name="radio" id="radio5"
                        value="1"<?php if(request()->input('ratings') == '1'): ?> checked <?php endif; ?>>
                      <label class="form-radio-label" for="radio5">
                        <div class="product-ratings text-xsm">
                          <span><?php echo e(__('1 star and above')); ?></span>
                        </div>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
          <div class="cta mb-30">
            <a href="<?php echo e(route('frontend.listings')); ?>" class="btn btn-lg btn-primary icon-start w-100"><i
                class="fal fa-sync-alt"></i><?php echo e(__('Reset All')); ?></a>
          </div>
          <form>
      </aside>
    </div>
  </div>

</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/listing/side-bar.blade.php ENDPATH**/ ?>