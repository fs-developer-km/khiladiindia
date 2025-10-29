<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/front/css/shop.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->cart_page_title : __('Cart'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->cart_page_title : __('Cart'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Cart-area start -->
  <div class="shopping-area cart user-dashboard pt-100 pb-60">
    <div class="container">
      <?php if(count($productCart) == 0): ?>
        <div class="row text-center">
          <div class="col">
            <h3><?php echo e(__('Cart is Empty') . '!'); ?></h3>
          </div>
        </div>
      <?php else: ?>
        <div class="row text-center">
          <div class="col">
            <h3 id="cart-message"></h3>
          </div>
        </div>
        <?php
          $totalItems = count($productCart);
          $position = $currencyInfo->base_currency_symbol_position;
          $symbol = $currencyInfo->base_currency_symbol;

          $totalPrice = 0;

          foreach ($productCart as $key => $product) {
              $totalPrice += $product['price'];
          }

          $totalPrice = number_format($totalPrice, 2, '.', '');
        ?>
        <div class="row justify-content-center gx-xl-5" id="cart-table">
          <div class="col-lg-10">
            <form action="#">
              <div class="item-list border radius-md mb-30 table-responsive">
                <table class="shopping-table shadow-none table table-borderless">
                  <thead>
                    <tr class="table-heading">
                      <th scope="col" colspan="2" class="first"><?php echo e(__('Product')); ?></th>
                      <th scope="col"><?php echo e(__('Quantity')); ?></th>
                      <th scope="col"><?php echo e(__('Price')); ?></th>
                      <th scope="col"><?php echo e(__('Total')); ?></th>
                      <th scope="col" class="last"><?php echo e(__('Remove')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $cart_total_qty = 0;
                      $cart_total_price = 0;
                    ?>
                    <?php $__currentLoopData = $productCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $c_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $product = App\Models\Shop\Product::where('id', $key)->first();
                      ?>

                      <input type="hidden" class="product-id" id="<?php echo e('in-product-id' . $key); ?>"
                        value="<?php echo e($key); ?>">
                      <tr class="item" id="cart-product-item<?php echo e($key); ?>">

                        <td class="product-img">
                          <div class="image">
                            <a href="<?php echo e(route('shop.product_details', ['slug' => @$c_product['slug']])); ?>"
                              class="lazy-container radius-md ratio ratio-1-1">
                              <img class="lazyload" src="assets/images/placeholder.png"
                                data-src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                                alt="Product">
                            </a>
                          </div>
                        </td>
                        <td class="product-desc">
                          <h6>
                            <a class="product-title mb-10"
                              href="<?php echo e(route('shop.product_details', ['slug' => $c_product['slug']])); ?>">
                              <?php echo e(strlen(@$c_product['title']) > 50 ? mb_substr(@$c_product['title'], 0, 50, 'UTF-8') . '...' : @$c_product['title']); ?>

                            </a>
                          </h6>
                          <div class="ratings">
                            <div class="rate"
                              style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                              <div class="rating-icon"
                                style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($product->average_rating * 20 . '%;'); ?>">
                              </div>
                            </div>
                            <span class="ratings-total">(<?php echo e($product->average_rating); ?>)</span>
                          </div>
                        </td>
                        <td class="qty">
                          <div class="quantity-input">
                            <div class="quantity-down">
                              <i class="fal fa-minus"></i>
                            </div>
                            <input type="text" name="quantity" spellcheck="false" data-ms-editor="true"
                              value="<?php echo e($c_product['quantity']); ?>" class="product-qty">
                            <div class="quantity-up">
                              <i class="fal fa-plus"></i>
                            </div>
                          </div>
                        </td>
                        <td class="product-price">
                          <h6 dir="ltr" class="m-0"><?php echo e($position == 'left' ? $symbol : ''); ?>

                            <span
                              class="product-unit-price"><?php echo e($product->current_price); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?>

                          </h6>
                        </td>
                        <td>
                          <h6 dir="ltr" class="m-0"><?php echo e($position == 'left' ? $symbol : ''); ?>

                            <span class="per-product-total"><?php echo e($product->current_price * $c_product['quantity']); ?></span>
                            <?php echo e($position == 'right' ? $symbol : ''); ?>

                          </h6>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo e(route('shop.cart.remove_product', ['id' => $key])); ?>"
                            class="btn btn-remove rounded-pill mx-auto remove-product-icon"
                            data-product_id="<?php echo e($key); ?>">
                            <i class="fal fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      <?php
                        $cart_total_qty += $c_product['quantity'];
                        $cart_total_price += $product->current_price * $c_product['quantity'];
                      ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <div class="btn-groups text-end mb-20">
                <h6><?php echo e(__('Total Quantity') . ' :'); ?> <span id="cart_total_qty"><?php echo e($cart_total_qty); ?></span></h6>
                <h6><?php echo e(__('Total Price') . ' :'); ?> <span dir="ltr"><?php echo e($position == 'left' ? $symbol : ''); ?><span
                      id="cart_total_price"><?php echo e($cart_total_price); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                </h6>
              </div>
              <div class="btn-groups text-end mb-40">
                <a href="<?php echo e(route('shop.update_cart')); ?>" class="btn btn-md btn-primary" title="<?php echo e(__('Update Cart')); ?>"
                  id="update-cart-btn"><?php echo e(__('Update Cart')); ?></a>
                <a href="<?php echo e(route('shop.checkout')); ?>" class="btn btn-md btn-primary" title="<?php echo e(__('Checkout')); ?>"
                  target="_self"><?php echo e(__('Checkout')); ?></a>
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- Cart-area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    'use strict';
    let cartEmptyTxt = "<?php echo e(__('Cart is Empty') . '!'); ?>";
  </script>
  <script src="<?php echo e(asset('assets/front/js/shop.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/shop/cart.blade.php ENDPATH**/ ?>