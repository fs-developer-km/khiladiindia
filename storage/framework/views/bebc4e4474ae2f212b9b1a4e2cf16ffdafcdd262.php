<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_products); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_products); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/shop.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->products_page_title : __('Products'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->products_page_title : __('Products'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Shop-area start -->
  <div class="shop-area pt-100 pb-60">
    <div class="container">
      <div class="row gx-xl-5">

        <div class="col-xl-3">
          <?php if ($__env->exists('frontend.shop.side-bar')) echo $__env->make('frontend.shop.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-xl-9">
          <div class="product-sort-area" data-aos="fade-up">
            <div class="row align-items-center">
              <div class="col-xl-6">
                <?php if($total_products > 0): ?>
                  <h4 class="mb-20"><?php echo e($total_products); ?> <?php echo e($total_products > 1 ? __('Products') : __('Product')); ?>

                    <?php echo e(__('Found')); ?></h4>
                <?php endif; ?>

              </div>
              <div class="col-4 d-xl-none">
                <button class="btn btn-sm btn-outline icon-end radius-sm mb-20" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#widgetOffcanvas" aria-controls="widgetOffcanvas">
                  <?php echo e(__('Filter')); ?> <i class="fal fa-filter"></i>
                </button>
              </div>
              <div class="col-8 col-xl-6">
                <ul class="product-sort-list list-unstyled mb-20">
                  <li class="item">
                    <div class="sort-item d-flex align-items-center">
                      <label class="me-2 font-sm"><?php echo e(__('Sort By')); ?>:</label>
                      <form action="<?php echo e(route('shop.products')); ?>" method="get" id="SortForm">
                        <?php if(!empty(request()->input('category'))): ?>
                          <input type="hidden" name="category" value="<?php echo e(request()->input('category')); ?>">
                        <?php endif; ?>

                        <?php if(!empty(request()->input('min'))): ?>
                          <input type="hidden" name="min" value="<?php echo e(request()->input('min')); ?>">
                        <?php endif; ?>
                        <?php if(!empty(request()->input('max'))): ?>
                          <input type="hidden" name="max" value="<?php echo e(request()->input('max')); ?>">
                        <?php endif; ?>
                        <select name="sort" class="niceselect right color-dark"
                          onchange="document.getElementById('SortForm').submit()">
                          <option <?php echo e(request()->input('newest') == 'default' ? 'selected' : ''); ?> value="newest">
                            <?php echo e(__('Date : Newest on top')); ?>

                          </option>
                          <option <?php echo e(request()->input('sort') == 'oldest' ? 'selected' : ''); ?> value="oldest">
                            <?php echo e(__('Date : Oldest on top')); ?>

                          </option>
                          <option <?php echo e(request()->input('sort') == 'high-to-low' ? 'selected' : ''); ?> value="high-to-low">
                            <?php echo e(__('Price : High to Low')); ?></option>
                          <option <?php echo e(request()->input('sort') == 'low-to-high' ? 'selected' : ''); ?> value="low-to-high">
                            <?php echo e(__('Price : Low to High')); ?></option>
                        </select>
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <?php if($total_products == 0): ?>
              <h3 class="text-center"><?php echo e(__('NO PRODUCT FOUND') . '!'); ?></h3>
            <?php else: ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up">
                  <div class="product-default shadow-none text-center mb-25">
                    <figure class="product-img mb-15">
                      <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"
                        class="lazy-container ratio ratio-1-1">
                        <img class="lazyload" src="<?php echo e(asset('assets/admin/front/images/placeholder.png')); ?>"
                          data-src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                          alt="<?php echo e($product->title); ?>">
                      </a>
                      <?php if($product->product_type == 'digital'): ?>
                        <span class="badge"><?php echo e($product->product_type); ?></span>
                      <?php endif; ?>
                      <?php if($product->product_type == 'physical'): ?>
                        <?php if($product->stock == 0): ?>
                          <div class="stock-overlay">
                            <span><?php echo e(__('Stock Out')); ?></span>
                          </div>
                        <?php endif; ?>
                      <?php endif; ?>
                      <?php if($product->product_type == 'physical'): ?>
                        <?php if($product->stock != 0): ?>
                          <div class="product-overlay">
                            <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>" target="_self"
                              title="<?php echo e(__('View Details')); ?>" class="icon">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('shop.product.add_to_cart', ['id' => $product->id, 'quantity' => 1])); ?>"
                              target="_self" title="<?php echo e(__('Add to Cart')); ?>" class="icon cart-btn add-to-cart-btn">
                              <i class="fas fa-shopping-cart"></i>
                            </a>
                          </div>
                        <?php endif; ?>
                      <?php endif; ?>

                      <?php if($product->product_type == 'digital'): ?>
                        <div class="product-overlay">
                          <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>" target="_self"
                            title="<?php echo e(__('View Details')); ?>" class="icon">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a href="<?php echo e(route('shop.product.add_to_cart', ['id' => $product->id, 'quantity' => 1])); ?>"
                            target="_self" title="<?php echo e(__('Add to Cart')); ?>" class="icon cart-btn add-to-cart-btn">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </div>
                      <?php endif; ?>

                    </figure>
                    <div class="product-details p-0">
                      <div class="ratings ratings justify-content-center mb-10">
                        <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                          <div class="rating-icon"
                            style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($product->average_rating * 20 . '%;'); ?>">
                          </div>
                        </div>
                      </div>
                      <h5 class="product-title mb-2">
                        <a
                          href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"><?php echo e(strlen($product->title) > 50 ? mb_substr($product->title, 0, 50, 'UTF-8') . '...' : $product->title); ?></a>
                      </h5>
                      <div class="product-price justify-content-center">
                        <h6 class="new-price mb-0"><?php echo e(symbolPrice($product->current_price)); ?></h6>
                        <?php if(!empty($product->previous_price)): ?>
                          <span class="old-price font-sm"><?php echo e(symbolPrice($product->previous_price)); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div><!-- product-default -->
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </div>
          <div class="pagination mt-20 mb-40 justify-content-center" data-aos="fade-up">
            <?php echo e($products->appends([
                    'keyword' => request()->input('keyword'),
                    'category' => request()->input('category'),
                    'rating' => request()->input('rating'),
                    'min' => request()->input('min'),
                    'max' => request()->input('max'),
                    'sort' => request()->input('sort'),
                ])->links()); ?>

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
  <!-- Shop-area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/front/js/shop.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/shop/products.blade.php ENDPATH**/ ?>