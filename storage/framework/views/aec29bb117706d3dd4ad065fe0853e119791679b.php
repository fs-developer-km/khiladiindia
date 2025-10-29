<?php
  Config::set('app.timezone', App\Models\BasicSettings\Basic::first()->timezone);
?>
<?php $__env->startSection('content'); ?>
  <?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong><?php echo e($message); ?></strong>
    </div>
  <?php endif; ?>
  <?php if(!empty($membership) && ($membership->package->term == 'lifetime' || $membership->is_trial == 1)): ?>
    <div class="alert bg-warning alert-warning text-white text-center">
      <h3><?php echo e(__('If you purchase this package')); ?> <strong class="text-dark">(<?php echo e($package->title); ?>)</strong>,
        <?php echo e(__('then your current package')); ?> <strong class="text-dark">(<?php echo e($membership->package->title); ?><?php if($membership->is_trial == 1): ?>
            <span class="badge badge-secondary"><?php echo e(__('Trial')); ?></span>
          <?php endif; ?>)</strong>
        <?php echo e(__('will be replaced immediately')); ?>

      </h3>
    </div>
  <?php endif; ?>
  <div class="row justify-content-center align-items-center mb-1">
    <div class="col-md-1 pl-md-0">
    </div>
    <div class="col-md-6 pl-md-0 pr-md-0">
      <div class="card card-pricing card-pricing-focus card-secondary">
        <form id="my-checkout-form" action="<?php echo e(route('vendor.plan.checkout')); ?>" method="post"
          enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
          <input type="hidden" name="vendor_id" value="<?php echo e(auth()->id()); ?>">
          <input type="hidden" name="payment_method" id="payment" value="<?php echo e(old('payment_method')); ?>">
          <div class="card-header">
            <h4 class="card-title"><?php echo e($package->title); ?></h4>
            <div class="card-price">
              <span class="price"><?php echo e($package->price == 0 ? 'Free' : format_price($package->price)); ?></span>
              <span class="text">/<?php echo e($package->term); ?></span>
            </div>
          </div>
          <div class="card-body">
            <ul class="specification-list">
              <li>
                <span class="name-specification"><?php echo e(__('Membership')); ?></span>
                <span class="status-specification"><?php echo e(__('Yes')); ?></span>
              </li>
              <li>
                <span class="name-specification"><?php echo e(__('Start Date')); ?></span>
                <?php if(
                    (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                        (!empty($membership) && $membership->is_trial == 1)): ?>
                  <input type="hidden" name="start_date"
                    value="<?php echo e(\Illuminate\Support\Carbon::yesterday()->format('d-m-Y')); ?>">
                  <span class="status-specification"><?php echo e(\Illuminate\Support\Carbon::today()->format('d-m-Y')); ?></span>
                <?php else: ?>
                  <input type="hidden" name="start_date"
                    value="<?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? \Carbon\Carbon::yesterday())->addDay()->format('d-m-Y')); ?>">
                  <span
                    class="status-specification"><?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? \Carbon\Carbon::yesterday())->addDay()->format('d-m-Y')); ?></span>
                <?php endif; ?>
              </li>
              <li>
                <span class="name-specification"><?php echo e(__('Expire Date')); ?></span>
                <span class="status-specification">
                  <?php if($package->term == 'monthly'): ?>
                    <?php if(
                        (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                            (!empty($membership) && $membership->is_trial == 1)): ?>
                      <?php echo e(\Illuminate\Support\Carbon::parse(now())->addMonth()->format('d-m-Y')); ?>

                      <input type="hidden" name="expire_date"
                        value="<?php echo e(\Illuminate\Support\Carbon::parse(now())->addMonth()->format('d-m-Y')); ?>">
                    <?php else: ?>
                      <?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addMonth()->format('d-m-Y')); ?>

                      <input type="hidden" name="expire_date"
                        value="<?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addMonth()->format('d-m-Y')); ?>">
                    <?php endif; ?>
                  <?php elseif($package->term == 'lifetime'): ?>
                    <?php echo e(__('Lifetime')); ?>

                    <input type="hidden" name="expire_date"
                      value="<?php echo e(\Illuminate\Support\Carbon::maxValue()->format('d-m-Y')); ?>">
                  <?php else: ?>
                    <?php if(
                        (!empty($previousPackage) && $previousPackage->term == 'lifetime') ||
                            (!empty($membership) && $membership->is_trial == 1)): ?>
                      <?php echo e(\Illuminate\Support\Carbon::parse(now())->addYear()->format('d-m-Y')); ?>

                      <input type="hidden" name="expire_date"
                        value="<?php echo e(\Illuminate\Support\Carbon::parse(now())->addYear()->format('d-m-Y')); ?>">
                    <?php else: ?>
                      <?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addYear()->format('d-m-Y')); ?>

                      <input type="hidden" name="expire_date"
                        value="<?php echo e(\Illuminate\Support\Carbon::parse($membership->expire_date ?? now())->addYear()->format('d-m-Y')); ?>">
                    <?php endif; ?>
                  <?php endif; ?>
                </span>
              </li>
              <li>
                <span class="name-specification"><?php echo e(__('Total Cost')); ?></span>
                <input type="hidden" name="price" value="<?php echo e($package->price); ?>">
                <span class="status-specification">
                  <?php echo e($package->price == 0 ? 'Free' : format_price($package->price)); ?>

                </span>
              </li>
              <?php if($package->price != 0): ?>
                <li>
                  <div class="form-group px-0">
                    <label class="text-white"><?php echo e(__('Payment Method')); ?></label>
                    <select name="payment_method" class="form-control input-solid" id="payment-gateway" required>
                      <option value="" disabled selected><?php echo e(__('Select a Payment Method')); ?></option>
                      <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($payment_method->name); ?>"
                          <?php echo e(old('payment_method') == $payment_method->name ? 'selected' : ''); ?>>
                          <?php echo e($payment_method->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </li>
              <?php endif; ?>
              <div id="instructions" class="text-left"></div>
              <input type="hidden" name="is_receipt" value="0" id="is_receipt">

              <div id="stripe-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display form errors -->
              <?php
                $display = 'none';
              ?>
              <div id="stripe-errors" class="pb-2 text-danger text-left" role="alert"></div>

              
              <div class="row gateway-details pt-3" id="tab-anet" style="display: <?php echo e($display); ?>;">
                <div class="col-lg-6">
                  <div class="form-group mb-3">
                    <input class="form-control" type="text" id="anetCardNumber" placeholder="Card Number" disabled />
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="form-group">
                    <input class="form-control" type="text" id="anetExpMonth" placeholder="Expire Month" disabled />
                  </div>
                </div>
                <div class="col-lg-6 ">
                  <div class="form-group">
                    <input class="form-control" type="text" id="anetExpYear" placeholder="Expire Year" disabled />
                  </div>
                </div>
                <div class="col-lg-6 ">
                  <div class="form-group">
                    <input class="form-control" type="text" id="anetCardCode" placeholder="Card Code" disabled />
                  </div>
                </div>
                <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" disabled />
                <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" disabled />
                <ul id="anetErrors" style="display: <?php echo e($display); ?>;"></ul>
              </div>
              
            </ul>
          </div>
          <div class="card-footer">
            <button class="btn btn-light btn-block" type="submit"><b><?php echo e(__('Checkout Now')); ?></b></button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="https://js.stripe.com/v3/"></script>
  
  <?php
    $anet = App\Models\PaymentGateway\OnlineGateway::find(21);
    $anerInfo = $anet->convertAutoData();
    $anetTest = $anerInfo['sandbox_check'];

    if ($anetTest == 1) {
        $anetSrc = 'https://jstest.authorize.net/v1/Accept.js';
    } else {
        $anetSrc = 'https://js.authorize.net/v1/Accept.js';
    }
  ?>
  <script type="text/javascript" src="<?php echo e($anetSrc); ?>" charset="utf-8"></script>
  

  <script>
    "use strict";
    let stripe_key = "<?php echo e($stripe_key); ?>";
    let public_key = "<?php echo e($anerInfo['public_key']); ?>";
    var paymentInstructionsRoute = "<?php echo e(route('vendor.payment.instructions')); ?>";
    var offlineData = <?php echo json_encode($offline, 15, 512) ?>;
    let login_id = "<?php echo e($anerInfo['login_id']); ?>";
  </script>

  <script src="<?php echo e(asset('assets/admin /js/vendor-checkout.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/buy_plan/checkout.blade.php ENDPATH**/ ?>