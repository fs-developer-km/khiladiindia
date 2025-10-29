<div class="widget-offcanvas offcanvas-xl offcanvas-start" tabindex="-1" id="widgetOffcanvas"
  aria-labelledby="widgetOffcanvas">
  <div class="offcanvas-header px-20">
    <h4 class="offcanvas-title">Filter</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#widgetOffcanvas"
      aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-3 p-xl-0">
    <aside class="widget-area pb-10" data-aos="fade-up">


      <form action="<?php echo e(route('shop.products')); ?>" method="get" id="categorysearchForm">
        <div class="widget radius-md mb-30">
          <h5 class="title">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#brands"
              aria-expanded="true" aria-controls="brands">
              <?php echo e(__('Categories')); ?>

            </button>
          </h5>
          <div id="brands" class="collapse show">
            <div class="accordion-body scroll-y">
              <ul class="list-group custom-radio">
                <li>
                  <input class="input-radio" type="radio"
                    onclick="document.getElementById('categorysearchForm').submit()" name="category" id="radio1"
                    value="" <?php echo e(empty(request()->input('category')) ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radio1"><span><?php echo e(__('All')); ?></span><span
                      class="qty">(<?php echo e($total_products); ?>)</span></label>
                </li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <input class="input-radio" type="radio"
                      onclick="document.getElementById('categorysearchForm').submit()" name="category"
                      id="radio1-<?php echo e($loop->iteration); ?>" value="<?php echo e($category->slug); ?>"
                      <?php echo e(request()->input('category') == $category->slug ? 'checked' : ''); ?>>
                    <label class="form-radio-label"
                      for="radio1-<?php echo e($loop->iteration); ?>"><span><?php echo e($category->name); ?></span>
                      <span class="qty">(<?php echo e($category->products()->get()->count()); ?>)</span>
                    </label>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
      </form>

      <form action="<?php echo e(route('shop.products')); ?>" method="get" id="searchForm">
        <input type="hidden" name="category" value="<?php echo e(request()->input('category')); ?>">
        <div class="widget radius-md mb-30">
          <h5 class="title">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#input"
              aria-expanded="true" aria-controls="input">
              <?php echo e(__('Product Name')); ?>

            </button>
          </h5>
          <div id="input" class="collapse show">
            <div class="accordion-body scroll-y">
              <input type="text" name="product_name" value="<?php echo e(request()->input('product_name')); ?>"
                placeholder="<?php echo e(__('Search by Title')); ?>" id="searchByProductName" class="form-control">
            </div>
          </div>
        </div>

        <div class="widget widget-price radius-md mb-30">
          <h5 class="title">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price"
              aria-expanded="true" aria-controls="price">
              <?php echo e(__('Pricing')); ?>

            </button>
          </h5>
          <div id="price" class="collapse show">
            <div class="accordion-body scroll-y">
              <div class="row gx-sm-3 d-none">
                <div class="col-md-6">
                  <div class="form-group mb-30">
                    <input class="form-control" type="hidden"
                      value="<?php echo e(request()->filled('min') ? request()->input('min') : $min); ?>" name="min"
                      id="min">
                    <input class="form-control" type="hidden" value="<?php echo e($min); ?>" id="o_min">
                    <input class="form-control" type="hidden" value="<?php echo e($max); ?>" id="o_max">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-30">
                    <input class="form-control"
                      value="<?php echo e(request()->filled('max') ? request()->input('max') : $max); ?>" type="hidden"
                      name="max" id="max">
                  </div>
                </div>
              </div>
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
        <div class="widget widget-ratings radius-md mb-30">
          <h5 class="title">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ratings"
              aria-expanded="true" aria-controls="ratings">
              <?php echo e(__('Ratings')); ?>

            </button>
          </h5>
          <div id="ratings" class="collapse show">
            <div class="accordion-body scroll-y">
              <ul class="list-group custom-radio">
                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR" value=""
                    <?php echo e(empty(request()->input('rating')) ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR"><span><?php echo e(__('All')); ?></span></label>
                </li>

                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR-5" value="5"
                    <?php echo e(request()->input('rating') == 5 ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR-5"><span><?php echo e(__('5 stars')); ?> </span>
                  </label>
                </li>
                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR-4" value="4"
                    <?php echo e(request()->input('rating') == 4 ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR-4"><span><?php echo e(__('4 stars and higher')); ?></span>
                  </label>
                </li>

                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR-3" value="3"
                    <?php echo e(request()->input('rating') == 3 ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR-3"><span><?php echo e(__('3 stars and higher')); ?></span>
                  </label>
                </li>

                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR-2" value="2"
                    <?php echo e(request()->input('rating') == 2 ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR-2"><span><?php echo e(__('2 stars and higher')); ?></span>
                  </label>
                </li>

                <li>
                  <input class="input-radio" type="radio" onclick="document.getElementById('searchForm').submit()"
                    name="rating" id="radioR-1" value="1"
                    <?php echo e(request()->input('rating') == 1 ? 'checked' : ''); ?>>
                  <label class="form-radio-label" for="radioR-1"><span><?php echo e(__('1 star and higher')); ?></span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="cta">
          <a href="<?php echo e(route('shop.products')); ?>" class="btn btn-lg btn-primary icon-start w-100"><i
              class="fal fa-sync-alt"></i><?php echo e(__('Reset All')); ?></a>
        </div>
      </form>
      <!-- Spacer -->
      <div class="pb-40"></div>
      <?php if(!empty(showAd(1))): ?>
        <div class="text-center mt-40">
          <?php echo showAd(1); ?>

        </div>
      <?php endif; ?>
    </aside>
  </div>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/shop/side-bar.blade.php ENDPATH**/ ?>