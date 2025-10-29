<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Checkout')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaKeywords'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_keyword_home); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaDescription'); ?>
  <?php if(!empty($seoInfo)): ?>
    <?php echo e($seoInfo->meta_description_home); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/shop.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->checkout_page_title : __('Checkout'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->checkout_page_title : __('Checkout'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Checkout-area start -->
  <div class="shopping-area pt-100 pb-60">
    <div class="container">
      <form action="<?php echo e(route('shop.purchase_product')); ?>" method="POST" enctype="multipart/form-data" id="payment-form">
        <?php echo csrf_field(); ?>
        <div class="row gx-xl-5">
          <div class="col-lg-8">
            <div class="billing-details">
              <h4 class="mb-20"><?php echo e(__('Billing Details')); ?></h4>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for="firstName"><?php echo e(__('Name') . '*'); ?></label>
                    <input type="text" class="form-control" name="billing_name"
                      placeholder="<?php echo e(__('Enter Full Name')); ?>"
                      value="<?php echo e(old('billing_name') ? old('billing_name') : $authUser->name); ?>">
                    <?php $__errorArgs = ['billing_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for=""><?php echo e(__('Phone Number') . '*'); ?></label>
                    <input id="" type="text" class="form-control" name="billing_phone"
                      placeholder="<?php echo e(__('Phone Number')); ?>"
                      value="<?php echo e(old('billing_phone') ? old('billing_phone') : $authUser->phone); ?>">
                    <?php $__errorArgs = ['billing_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for=""><?php echo e(__('Email Address')); ?></label>
                    <input type="email" class="form-control" name="billing_email"
                      placeholder="<?php echo e(__('Email Address')); ?>"
                      value="<?php echo e(old('billing_email') ? old('billing_email') : $authUser->email); ?>">
                    <?php $__errorArgs = ['billing_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for=""><?php echo e(__('City') . '*'); ?></label>
                    <input type="text" class="form-control" name="billing_city" placeholder="<?php echo e(__('City')); ?>"
                      value="<?php echo e(old('billing_city') ? old('billing_city') : $authUser->city); ?>">
                    <?php $__errorArgs = ['billing_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for=""><?php echo e(__('State')); ?></label>
                    <input id="" type="text" class="form-control" name="billing_state"
                      placeholder="<?php echo e(__('State')); ?>"
                      value="<?php echo e(old('billing_state') ? old('billing_state') : $authUser->state); ?>">

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <label for=""><?php echo e(__('Country')); ?></label>
                    <input id="" type="text" class="form-control" name="billing_country"
                      placeholder="<?php echo e(__('Country')); ?>"
                      value="<?php echo e(old('billing_country') ? old('billing_country') : $authUser->country); ?>">
                    <?php $__errorArgs = ['billing_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group mb-3">
                    <label for="address"><?php echo e(__('Address')); ?></label>
                    <textarea name="billing_address" class="form-control" rows="2"><?php echo e($authUser ? $authUser->address : old('billing_address')); ?></textarea>
                    <?php $__errorArgs = ['billing_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="ship-details mb-10">
              <div class="form-group mb-20">
                <div class="custom-checkbox">
                  <input class="input-checkbox" type="checkbox" name="checkbox" id="differentaddress" value="1"
                    <?php echo e(old('checkbox') == 1 ? ' checked' : ''); ?>>
                  <label class="form-check-label" data-bs-toggle="collapse" data-target="#collapseAddress"
                    href="#collapseAddress" aria-controls="collapseAddress"
                    for="differentaddress"><span><?php echo e(__('Ship to a different address') . '?'); ?></span></label>
                </div>
              </div>
              <div id="collapseAddress" class="collapse <?php echo e(old('checkbox') == 1 ? 'show' : ''); ?>">
                <h4 class="mb-20"><?php echo e(__('Shipping Details')); ?></h4>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="firstName"><?php echo e(__('Name') . '*'); ?></label>
                      <input type="text" class="form-control" name="shipping_name" placeholder="<?php echo e(__('Name')); ?>"
                        value="<?php echo e(Auth::guard('web')->user()->name); ?>">
                      <?php $__errorArgs = ['shipping_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="phone"><?php echo e(__('Phone Number') . '*'); ?></label>
                      <input id="phone" type="text" class="form-control" name="shipping_phone"
                        placeholder="<?php echo e(__('Phone Number')); ?>"
                        value="<?php echo e($authUser->phone ? $authUser->phone : old('shipping_phone')); ?>">
                      <?php $__errorArgs = ['shipping_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="email"><?php echo e(__('Email Address') . '*'); ?></label>
                      <input id="email" type="email" class="form-control" name="shipping_email"
                        placeholder="<?php echo e(__('Email Address')); ?>"
                        value="<?php echo e($authUser->email ? $authUser->email : Auth::guard('web')->user()->email); ?>">
                      <?php $__errorArgs = ['shipping_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="city"><?php echo e(__('City') . '*'); ?></label>
                      <input id="city" type="text" class="form-control" name="shipping_city"
                        placeholder="<?php echo e(__('City')); ?>"
                        value="<?php echo e(old('shipping_city') ? old('shipping_city') : $authUser->city); ?>">
                      <?php $__errorArgs = ['shipping_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="state"><?php echo e(__('State')); ?></label>
                      <input id="state" type="text" class="form-control" name="shipping_state"
                        placeholder="<?php echo e(__('State')); ?>"
                        value="<?php echo e(old('shipping_state') ? old('shipping_state') : $authUser->state); ?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mb-3">
                      <label for="country"><?php echo e(__('Country') . '*'); ?></label>
                      <input id="country" type="text" class="form-control" name="shipping_country"
                        placeholder="<?php echo e(__('Country')); ?>"
                        value="<?php echo e(old('shipping_country') ? old('shipping_country') : $authUser->country); ?>">
                      <?php $__errorArgs = ['shipping_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group mb-3">
                      <label for="address"><?php echo e(__('Address') . '*'); ?></label>
                      <textarea name="shipping_address" class="form-control" rows="2" placeholder="<?php echo e(__('Address')); ?>"> <?php echo e(old('shipping_address') ? old('shipping_address') : $authUser->address); ?>

                      </textarea>
                      <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php if(!onlyDigitalItemsInCart()): ?>
              <div class="ship-details mb-10">
                <h4 class="mb-20"><?php echo e(__('Shipping Method')); ?></h4>
                <table class="shopping-table shadow-none table-responsive">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo e(__('Method')); ?></th>
                      <th><?php echo e(__('Charge')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <input type="radio" id="shipping_<?php echo e($charge->id); ?>" name="shipping_method"
                            value="<?php echo e($charge->id); ?>" class="shipping_method"
                            data-shipping_charge="<?php echo e($charge->shipping_charge); ?>"
                            <?php echo e(Session::get('shipping_id') == $charge->id ? 'checked' : ''); ?>>
                        </td>
                        <td>
                          <label for="shipping_<?php echo e($charge->id); ?>"><?php echo e($charge->title); ?>

                            <br>
                            <small><?php echo e($charge->short_text); ?></small></label>
                        </td>
                        <td><?php echo e(symbolPrice($charge->shipping_charge)); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>

          </div>
          <div class="col-lg-4">
            <div class="order-summery form-block border radius-md mb-30">
              <h4 class="pb-15 mb-15 border-bottom"><?php echo e(__('Order Summary')); ?></h4>
              <?php
                $total = 0;
              ?>
              <?php $__currentLoopData = $productItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $product = App\Models\Shop\Product::where('id', $key)->first();
                  $total += $item['price'];
                  // calculate tax
                  $taxAmount = $tax->product_tax_amount;

                ?>
                <div class="item">
                  <div class="product-img">
                    <div class="image">
                      <a target="_blank" href="<?php echo e(route('shop.product_details', ['slug' => @$item['slug']])); ?>"
                        class="lazy-container radius-md ratio ratio-1-1">
                        <img class="lazyload"
                          data-src="<?php echo e(asset('assets/img/products/featured-images/' . $item['image'])); ?>"
                          alt="Product">
                      </a>
                    </div>
                  </div>
                  <div class="product-desc">
                    <h6 class="mb-1">
                      <a class="product-title" href="<?php echo e(route('shop.product_details', ['slug' => @$item['slug']])); ?>">
                        <?php echo e(strlen(@$item['title']) > 60 ? mb_substr(@$item['title'], 0, 60, 'UTF-8') . '...' : @$item['title']); ?>

                      </a>
                    </h6>
                    <div class="ratings mb-10">
                      <div class="rate" style="background-image: url('<?php echo e(asset($rateStar)); ?>')">
                        <div class="rating-icon"
                          style="background-image:url('<?php echo e(asset($rateStar)); ?>'); width: <?php echo e($product->average_rating * 20 . '%;'); ?>">
                        </div>
                      </div>
                      <span class="ratings-total">(<?php echo e($product->average_rating); ?>)</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 font-sm">
                      <span class="color-primary"><?php echo e($item['quantity']); ?> x
                        <?php echo e(symbolPrice($product->current_price)); ?></span>
                      <h6 class="font-sm mb-0"><?php echo e(symbolPrice($item['quantity'] * $product->current_price)); ?></h6>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <hr>
              <div id="couponReload">
                <?php
                  $position = $currencyInfo->base_currency_symbol_position;
                  $symbol = $currencyInfo->base_currency_symbol;
                ?>
                <div class="sub-total d-flex justify-content-between">
                  <h6 class="font-medium color-dark mb-0"><?php echo e(__('Cart Total')); ?></h6>
                  <span class="price"><?php echo e($position == 'left' ? $symbol : ''); ?><span
                      id="subtotal-amount"><?php echo e($total); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                </div>
                <?php if(Session::has('discount')): ?>
                  <div class="sub-total d-flex justify-content-between">
                    <h6 class="font-medium color-dark mb-0"><?php echo e(__('Discount')); ?></h6>
                    <span class="price">- <?php echo e($position == 'left' ? $symbol : ''); ?><span
                        id="discount"><?php echo e(Session::get('discount')); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                  </div>

                  <div class="sub-total d-flex justify-content-between">
                    <h6 class="font-medium color-dark mb-0"><?php echo e(__('Subtotal ')); ?></h6>
                    <span class="price"><?php echo e($position == 'left' ? $symbol : ''); ?><span
                        id="subtotal-amount"><?php echo e($total - Session::get('discount')); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                  </div>
                <?php endif; ?>

                <?php
                  $tax_amount = ($total - Session::get('discount')) * ($taxAmount / 100);
                ?>

                <div class="sub-total d-flex justify-content-between">
                  <h6 class="font-medium color-dark mb-0"><?php echo e(__('Tax')); ?> <span
                      dir="ltr"><?php echo e($tax->product_tax_amount . '%'); ?></span></h6>
                  <span class="price">+ <?php echo e($position == 'left' ? $symbol : ''); ?><span
                      id="tax-amount"><?php echo e(number_format($tax_amount, 2, '.', ',')); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                </div>
                <?php if(!onlyDigitalItemsInCart()): ?>
                  <?php
                    $shipping_id = Session::get('shipping_id');
                    if ($shipping_id != null) {
                        $charge = App\Models\Shop\ShippingCharge::where('id', $shipping_id)->first();
                        $shipping_charge = $charge->shipping_charge;
                    } else {
                        $charge = App\Models\Shop\ShippingCharge::first();
                        $shipping_charge = $charge->shipping_charge;
                    }
                  ?>
                  <div class="sub-total d-flex justify-content-between">
                    <h6 class="font-medium color-dark mb-0"><?php echo e(__('Shipping Charge')); ?></h6>
                    <span class="price">+ <?php echo e($position == 'left' ? $symbol : ''); ?><span
                        class="shipping-charge-amount"><?php echo e($shipping_charge); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?></span>
                  </div>
                <?php else: ?>
                  <?php
                    $shipping_charge = 0;
                  ?>
                <?php endif; ?>
                <hr>

                <?php
                  // calculate grand total
                  $grandTotal = $total - Session::get('discount') + $shipping_charge + $tax_amount;
                ?>
                <div class="total d-flex justify-content-between">
                  <h6><?php echo e(__('Total')); ?></h6>
                  <span class="price" dir="ltr"><?php echo e($position == 'left' ? $symbol : ''); ?>

                    <span id="grandtotal-amount"><?php echo e(number_format($grandTotal, 2, '.', ',')); ?> </span>
                    <?php echo e($position == 'right' ? $symbol : ''); ?>

                  </span>
                </div>
              </div>
            </div>

            <div class="form-inline mb-40">
              <?php echo csrf_field(); ?>
              <div class="input-group radius-sm border">
                <input type="text" class="form-control" placeholder="<?php echo e(__('Enter Coupon Code')); ?>"
                  id="coupon-code">
                <button class="btn btn-lg btn-primary radius-sm"
                  onclick="applyCoupon(event)"><?php echo e(__('Apply')); ?></button>
              </div>
            </div>

            <div class="order-payment form-block border radius-md mb-30">
              <h4 class="mb-20"><?php echo e(__('Payment Method')); ?></h4>
              <div class="form-group mb-20">
                <select name="gateway" id="gateway" class="niceselect form-control payment-gateway">
                  <option value="" selected="" disabled><?php echo e(__('Choose a Payment Method')); ?></option>
                  <?php $__currentLoopData = $onlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(old('gateway') == $onlineGateway->keyword): echo 'selected'; endif; ?> value="<?php echo e($onlineGateway->keyword); ?>">
                      <?php echo e(__($onlineGateway->name)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php if(count($offline_gateways) > 0): ?>
                    <?php $__currentLoopData = $offline_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php if(old('gateway') == $offlineGateway->id): echo 'selected'; endif; ?> value="<?php echo e($offlineGateway->id); ?>">
                        <?php echo e(__($offlineGateway->name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                </select>
                <?php if(Session::has('error')): ?>
                  <p class="mt-2 text-danger"><?php echo e(Session::get('error')); ?></p>
                <?php endif; ?>

                <div id="stripe-element" class="mt-10">
                  <!-- A Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors -->
                <div id="stripe-errors" role="alert"></div>

                
                <div class="row gateway-details" id="tab-anet" style="display: none;">
                  <div class="col-lg-12">
                    <div class="form-group mt-10">
                      <input class="form-control" type="text" id="anetCardNumber" placeholder="Card Number"
                        disabled />
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4">
                    <div class="form-group mt-10">
                      <input class="form-control" type="text" id="anetExpMonth" placeholder="Expire Month"
                        disabled />
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4">
                    <div class="form-group mt-10">
                      <input class="form-control" type="text" id="anetExpYear" placeholder="Expire Year"
                        disabled />
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4">
                    <div class="form-group mt-10">
                      <input class="form-control" type="text" id="anetCardCode" placeholder="Card Code" disabled />
                    </div>
                  </div>
                  <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
                  <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" disabled />
                  <ul id="anetErrors" style="display: none;" class="mt-10"></ul>
                </div>
                

                <?php $__currentLoopData = $offline_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="<?php if($errors->has('attachment') && request()->session()->get('gatewayId') == $offlineGateway->id): ?> d-block <?php else: ?> d-none <?php endif; ?> offline-gateway-info"
                    id="<?php echo e('offline-gateway-' . $offlineGateway->id); ?>">
                    <?php if(!is_null($offlineGateway->short_description)): ?>
                      <div class="form-group mt-10">
                        <label><?php echo e(__('Description')); ?></label>
                        <p><?php echo e($offlineGateway->short_description); ?></p>
                      </div>
                    <?php endif; ?>

                    <?php if(!is_null($offlineGateway->instructions)): ?>
                      <div class="form-group mt-10">
                        <label><?php echo e(__('Instructions')); ?></label>
                        <?php echo replaceBaseUrl($offlineGateway->instructions, 'summernote'); ?>

                      </div>
                    <?php endif; ?>

                    <?php if($offlineGateway->has_attachment == 1): ?>
                      <div class="form-group mt-10">
                        <label><?php echo e(__('Attachment') . '*'); ?></label>
                        <br>
                        <input type="file" name="attachment">
                        <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <p class="text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="text-center">
                <button class="btn btn-lg btn-primary radius-md w-100" type="submit"><?php echo e(__('Place Order')); ?>

                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Checkout-area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="<?php echo e($anetSource); ?>"></script>
  <script src="<?php echo e(asset('assets/front/js/shop.js')); ?>"></script>
  <script>
    "use strict";
    let stripe_key = "<?php echo e($stripe_key); ?>";
    let public_key = "<?php echo e($anetClientKey); ?>";
    let login_id = "<?php echo e($anetLoginId); ?>";
  </script>
  <script src="<?php echo e(asset('assets/front/js/product_checkout.js')); ?>"></script>
  <script>
    "use strict";
    <?php if(old('gateway') == 'autorize.net'): ?>
      $(document).ready(function() {
        $('#stripe-element').removeClass('d-none');
      })
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/shop/checkout.blade.php ENDPATH**/ ?>