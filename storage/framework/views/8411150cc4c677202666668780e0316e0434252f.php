<!-- Products Modal -->
<?php $__currentLoopData = $product_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="modal fade products-modal" id="productsModal_<?php echo e($product->id); ?>"
    aria-labelledby="productsModal_<?php echo e($product->id); ?>Label">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="productsModal_<?php echo e($product->id); ?>Label"><?php echo e($product->title); ?>

          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="product-modal-gallery gallery-popup mb-40">
                <div class="swiper product-modal-single-slider">
                  <div class="swiper-wrapper">
                    <?php $__currentLoopData = $product->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="swiper-slide">
                        <figure class="lazy-container ratio ratio-2-3 radius-sm">
                          <a href="<?php echo e(asset('assets/img/listing/product-gallery/' . $gallery->image)); ?>">
                            <img class="lazyload"
                              data-src="<?php echo e(asset('assets/img/listing/product-gallery/' . $gallery->image)); ?>"
                              alt="product image" />
                          </a>
                        </figure>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                  <!-- Slider navigation buttons -->
                  <div class="slider-navigation">
                    <button type="button" title="Slide prev" class="slider-btn slider-btn-prev rounded-pill"
                      id="slider-btn-prev">
                      <i class="fal fa-angle-left"></i>
                    </button>
                    <button type="button" title="Slide next" class="slider-btn slider-btn-next rounded-pill"
                      id="slider-btn-next">
                      <i class="fal fa-angle-right"></i>
                    </button>
                  </div>
                  <!-- Slider Pagination -->
                  <div class="swiper-pagination position-static mt-20" id="product-modal-single-slider-pagination">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-single-details mb-40">
                <div class="product-desc">
                  <div class="tinymce-content">
                    <?php echo optional($product)->content; ?>

                  </div>
                  <div class="product-price mt-15">
                    <span class="h5 mb-0 color-primary"><?php echo e(__('Price')); ?>: </span>
                    <div class="price">
                      <span class="h5 mb-0">$<?php echo e($product->current_price); ?></span>
                      <span class="h6 mb-0">$<?php echo e($product->previous_price); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if(is_array($permissions) && in_array('Product Enquiry Form', $permissions)): ?>
            <div class="query-form">
              <h3 class="mb-10"><?php echo e(__('Make Query')); ?></h3>
              <form id="contactForm" action="<?php echo e(route('frontend.product.contact_message')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row gx-xl-3">
                  <div class="col-lg-6">
                    <div class="form-group mb-15">
                      <input type="text" name="name" class="form-control" required
                        placeholder="<?php echo e(__('Name')); ?>*">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-15">
                      <input type="email" name="email" class="form-control" required
                        placeholder="<?php echo e(__('Email Address')); ?>*">
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="form-group mb-15">
                      <textarea name="message" id="message" class="form-control" cols="25" rows="6" required
                        data-error="Please enter your message" placeholder="<?php echo e(__('Message')); ?>*..."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <input type="hidden" id="vendor_id" value="<?php echo e($listing->vendor_id); ?>" name="vendor_id">
                  <input type="hidden" id="product_id" value="<?php echo e($product->id); ?>" name="product_id">
                  <div class="col-12">
                    <div class="form-group">
                      <button type="submit"
                        class="btn btn-md btn-primary w-100 showLoader"><?php echo e(__('Submit Message')); ?></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/listing/product-details.blade.php ENDPATH**/ ?>