<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Product Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($details)): ?>
    <?php echo e($details->meta_keywords); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($details)): ?>
    <?php echo e($details->meta_description); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/shop.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  

  <?php if ($__env->exists('frontend.partials.details-breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'heading' => @$details->title,
      'title' => !empty($pageHeading) ? $pageHeading->products_page_title : 'product',
  ])) echo $__env->make('frontend.partials.details-breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'heading' => @$details->title,
      'title' => !empty($pageHeading) ? $pageHeading->products_page_title : 'product',
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

  <!-- Shop-single-area start -->
  <div class="shop-single-area pt-100 pb-60">
    <div class="container">
      <div class="row gx-xl-5 align-items-center">
        <div class="col-lg-6">
          <div class="shop-single-gallery mb-40" data-aos="fade-up">
            <div class="swiper shop-single-slider">
              <div class="swiper-wrapper">
                <?php $sliderImages = json_decode($details->slider_images); ?>
                <?php $__currentLoopData = $sliderImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliderImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="swiper-slide">
                    <figure class="lazy-container ratio ratio-1-1">
                      <a href="<?php echo e(asset('assets/img/products/slider-images/' . $sliderImage)); ?>" class="lightbox-single">
                        <img class="lazyload" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/products/slider-images/' . $sliderImage)); ?>"
                          alt="product image" />
                      </a>
                    </figure>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
              <!-- Slider navigation buttons -->
              <div class="slider-navigation">
                <button type="button" title="Slide prev" class="slider-btn slider-btn-prev radius-0">
                  <i class="fal fa-angle-left"></i>
                </button>
                <button type="button" title="Slide next" class="slider-btn slider-btn-next radius-0">
                  <i class="fal fa-angle-right"></i>
                </button>
              </div>
            </div>
            <div class="shop-thumb">
              <div class="swiper shop-thumbnails">
                <div class="swiper-wrapper">
                  <?php $__currentLoopData = $sliderImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliderImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                      <div class="thumbnail-img lazy-container ratio ratio-1-1">
                        <img class="lazyload" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/products/slider-images/' . $sliderImage)); ?>"
                          alt="product image" />
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="product-single-details mb-40" data-aos="fade-up">
            <h3 class="product-title mb-3 mb-xl-4"><?php echo e($details->title); ?></h3>
            <div class="ratings mb-10">
              <?php if(!empty($details->average_rating)): ?>
                <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                  <div class="rating-icon"
                    style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($details->average_rating * 20 . '%;'); ?>">
                  </div>
                </div>
              <?php endif; ?>
              <span class="ratings-total">(<?php echo e($details->average_rating); ?>)</span>
              <?php
                $totalReview = App\Models\Shop\ProductReview::Where('product_id', $details->id)->count();
              ?>
              <span class="ratings-total"><?php echo e($totalReview); ?> <?php echo e(__('Reviews')); ?></span>
            </div>
            <div class="product-price mb-3 mb-xl-4">
              <h4 class="new-price color-primary mb-0"><?php echo e(symbolPrice($details->current_price)); ?></h4>
              <?php if(!empty($details->previous_price)): ?>
                <span class="old-price h5 color-medium mb-0"><?php echo e(symbolPrice($details->previous_price)); ?></span>
              <?php endif; ?>
            </div>
            <div class="product-desc">
              <?php echo $details->summary; ?>

            </div>
            <div class="btn-groups mt-3 mt-xl-3">
              <div class="quantity-input">
                <div class="quantity-down">
                  <i class="fal fa-minus"></i>
                </div>
                <input type="text" value="1" name="quantity" id="product-quantity" spellcheck="false"
                  data-ms-editor="true">
                <div class="quantity-up">
                  <i class="fal fa-plus"></i>
                </div>
              </div>
              <a href="<?php echo e(route('shop.product.add_to_cart', ['id' => $details->id, 'quantity' => 'qty'])); ?>"
                class="btn btn-md btn-primary add-to-cart-btn" title="<?php echo e(__('Add to Cart')); ?>"
                target="_self"><?php echo e(__('Add to Cart')); ?></a>
            </div>
            <div class="social-link style-2 mt-3 mt-xl-3">
              <a href="//www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank"
                title="<?php echo e(__('Facebook')); ?>"><i class="fab fa-facebook-f"></i></a>

              <a href="//twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"
                target="_blank" title="<?php echo e(__('Twitter')); ?>"><i class="fab fa-twitter"></i></a>

              <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>&amp;title=<?php echo e($details->title); ?>"
                target="_blank" title="<?php echo e(__('Linkedin')); ?>"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="product-category mt-3 mt-xl-3">
              <?php echo e(__('Category') . ':'); ?>

              <a
                href="<?php echo e(route('shop.products', ['category' => $details->categorySlug])); ?>"><?php echo e($details->categoryName); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="description mb-40" data-aos="fade-up">
        <div class="tabs-navigation tabs-navigation-2 mb-30">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <button class="nav-link active btn-md" data-bs-toggle="tab" data-bs-target="#tab1"
                type="button"><?php echo e(__('Description')); ?></button>
            </li>
            <li class="nav-item">
              <button class="nav-link btn-md" data-bs-toggle="tab" data-bs-target="#tab2"
                type="button"><?php echo e(__('Reviews')); ?></button>
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab1">
            <!-- Product description -->
            <div class="product-desc">
              <?php echo replaceBaseUrl($details->content, 'summernote'); ?>

            </div>
          </div>
          <div class="tab-pane fade" id="tab2">
            <?php if(count($reviews) == 0): ?>
              <h5><?php echo e(__('This product has no review yet') . '!'); ?></h5>
            <?php else: ?>
              <h5 class="title mb-15">
                <?php echo e(__('All Reviews')); ?>

              </h5>
              <div class="reviews">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="author">
                    <div class="image">
                      <?php if(empty($review->user->image)): ?>
                        <img class="lazyload blur-up" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/user.png')); ?>" alt="Person Image">
                      <?php else: ?>
                        <img class="lazyload blur-up" src="assets/images/placeholder.png"
                          data-src="<?php echo e(asset('assets/img/users/' . $review->user->image)); ?>" alt="Person Image">
                      <?php endif; ?>
                    </div>
                    <div class="author-info">
                      <h6 class="mb-2 lh-1"><?php echo e($review->user->username); ?></h6>
                      <span class="font-sm"><?php echo e(date_format($review->created_at, 'F d, Y')); ?></span>
                      <div class="ratings mb-2">
                        <div class="rate" style="background-image:url('<?php echo e(asset($rateStar)); ?>')">
                          <div class="rating-icon"
                            style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($review->rating * 20 . '%;'); ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>

            <?php if(auth()->guard('web')->check()): ?>
              <div class="shop-review-form mt-30">
                <h5 class="title mb-10">
                  Add Review
                </h5>
                <form action="<?php echo e(route('shop.product_details.store_review', ['id' => $details->id])); ?>" method="POST"
                  id="reviewSubmitForm">
                  <?php echo csrf_field(); ?>
                  <div class="form-group mb-20">
                    <label class="mb-1"><?php echo e(__('Comment')); ?></label>
                    <textarea class="form-control" placeholder="<?php echo e(__('Comment')); ?>" name="comment"><?php echo e(old('comment')); ?></textarea>
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
                  <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary" value="<?php echo e(__('Submit')); ?>">
                  </div>
                </form>
              </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
    <?php if(!empty(showAd(3))): ?>
      <div class="text-center mt-40">
        <?php echo showAd(3); ?>

      </div>
    <?php endif; ?>

  </div>
  <!-- Shop-single-area end -->

  <!-- Related Product-area start -->
  <?php if(count($related_products) > 0): ?>
    <div class="shop-area pb-75" data-aos="fade-up">
      <div class="container">
        <div class="section-title title-inline mb-30">
          <h3 class="title mb-20"><?php echo e(__('Related Products')); ?></h3>
          <!-- Slider navigation buttons -->
          <div class="slider-navigation mb-20">
            <button type="button" title="Slide prev" class="slider-btn slider-btn-prev btn-outline radius-0"
              id="shop-slider-prev">
              <i class="fal fa-angle-left"></i>
            </button>
            <button type="button" title="Slide next" class="slider-btn slider-btn-next btn-outline radius-0"
              id="shop-slider-next">
              <i class="fal fa-angle-right"></i>
            </button>
          </div>
        </div>
        <div class="swiper shop-slider mb-40">
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <div class="product-default shadow-none text-center mb-25">
                  <figure class="product-img mb-15">
                    <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"
                      class="lazy-container ratio ratio-1-1">
                      <img class="lazyload" src="<?php echo e(asset('assets/front/images/placeholder.png')); ?>"
                        data-src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                        alt="Product">
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
                      <div class="rate" style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                        <div class="rating-icon"
                          style="background-image: url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($product->average_rating * 20 . '%;'); ?>">
                        </div>
                      </div>
                    </div>
                    <h5 class="product-title mb-2">
                      <a
                        href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"><?php echo e(strlen($product->title) > 15 ? mb_substr($product->title, 0, 15, 'UTF-8') . '...' : $product->title); ?></a>
                    </h5>
                    <div class="product-price justify-content-center">
                      <h6 class="new-price"><?php echo e(symbolPrice($product->current_price)); ?></h6>
                      <?php if(!empty($product->previous_price)): ?>
                        <span class="old-price font-sm"><?php echo e(symbolPrice($product->previous_price)); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div><!-- product-default -->
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>


      </div>
      <?php if(!empty(showAd(3))): ?>
        <div class="text-center mt-40">
          <?php echo showAd(3); ?>

        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  </div>
  <!-- Shop-single-area end -->

  <!-- Related Product-area start -->
  <?php if(count($related_products) > 0): ?>
    <div class="shop-area pb-75" data-aos="fade-up">
      <div class="container">
        <div class="section-title title-inline mb-30">
          <h3 class="title mb-20"><?php echo e(__('Related Products')); ?></h3>
          <!-- Slider navigation buttons -->
          <div class="slider-navigation mb-20">
            <button type="button" title="Slide prev" class="slider-btn slider-btn-prev btn-outline radius-0"
              id="shop-slider-prev">
              <i class="fal fa-angle-left"></i>
            </button>
            <button type="button" title="Slide next" class="slider-btn slider-btn-next btn-outline radius-0"
              id="shop-slider-next">
              <i class="fal fa-angle-right"></i>
            </button>
          </div>
        </div>
        <div class="swiper shop-slider mb-40">
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <div class="product-default shadow-none text-center mb-25">
                  <figure class="product-img mb-15">
                    <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"
                      class="lazy-container ratio ratio-1-1">
                      <img class="lazyload" src="<?php echo e(asset('assets/front/images/placeholder.png')); ?>"
                        data-src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                        alt="Product">
                    </a>
                    <?php if($product->product_type == 'digital'): ?>
                      <span class="badge"><?php echo e($product->product_type); ?></span>
                    <?php endif; ?>
                    <div class="product-overlay">
                      <a href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>" target="_self"
                        title="<?php echo e(__('View Details')); ?>" class="icon"><i class="fas fa-eye"></i></a>
                      <a href="<?php echo e(route('shop.product.add_to_cart', ['id' => $product->id, 'quantity' => 1])); ?>"
                        target="_self" title="<?php echo e(__('Add to Cart')); ?>" class="icon cart-btn add-to-cart-btn">
                        <i class="fas fa-shopping-cart"></i>
                      </a>
                    </div>
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
                        href="<?php echo e(route('shop.product_details', ['slug' => $product->slug])); ?>"><?php echo e(strlen($product->title) > 15 ? mb_substr($product->title, 0, 15, 'UTF-8') . '...' : $product->title); ?></a>
                    </h5>
                    <div class="product-price justify-content-center">
                      <h6 class="new-price"><?php echo e(symbolPrice($product->current_price)); ?></h6>
                      <?php if(!empty($product->previous_price)): ?>
                        <span class="old-price font-sm"><?php echo e(symbolPrice($product->previous_price)); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div><!-- product-default -->
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>


      </div>
      <?php if(!empty(showAd(3))): ?>
        <div class="text-center mt-40">
          <?php echo showAd(3); ?>

        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <!-- Related Product-area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/front/js/shop.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/shop/product-details.blade.php ENDPATH**/ ?>