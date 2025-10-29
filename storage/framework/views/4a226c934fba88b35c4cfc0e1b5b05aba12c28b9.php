<?php
  Config::set('app.timezone', App\Models\BasicSettings\Basic::first()->timezone);
?>

<?php
  $vendor = Auth::guard('vendor')->user();
  $package = \App\Http\Helpers\VendorPermissionHelper::currentPackagePermission($vendor->id);
?>
<?php $__env->startSection('content'); ?>
  <?php if(is_null($package)): ?>
    <?php
      $pendingMemb = \App\Models\Membership::query()
          ->where([['vendor_id', '=', $vendor->id], ['status', 0]])
          ->whereYear('start_date', '<>', '9999')
          ->orderBy('id', 'DESC')
          ->first();
      $pendingPackage = isset($pendingMemb) ? \App\Models\Package::query()->findOrFail($pendingMemb->package_id) : null;
    ?>

    <?php if($pendingPackage): ?>
      <div class="alert alert-warning text-dark">
        <?php echo e(__('You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified via mail once an action is taken.')); ?>

      </div>
      <div class="alert alert-warning text-dark">
        <strong><?php echo e(__('Pending Package') . ':'); ?> </strong> <?php echo e($pendingPackage->title); ?>

        <span class="badge badge-secondary"><?php echo e($pendingPackage->term); ?></span>
        <span class="badge badge-warning"><?php echo e(__('Decision Pending')); ?></span>
      </div>
    <?php else: ?>
      <?php
        $newMemb = \App\Models\Membership::query()
            ->where([['vendor_id', '=', Auth::id()], ['status', 0]])
            ->first();
      ?>
      <?php if($newMemb): ?>
        <div class="alert alert-warning text-dark">
          <?php echo e(__('Your membership is expired. Please purchase a new package / extend the current package.')); ?>

        </div>
      <?php endif; ?>
      <div class="alert alert-warning text-dark">
        <?php echo e(__('Please purchase a new package .')); ?>

      </div>
    <?php endif; ?>
  <?php else: ?>
    <div class="row justify-content-center align-items-center mb-1">
      <div class="col-12">
        <div class="alert border-left border-primary text-dark">
          <?php if($package_count >= 2 && $next_membership): ?>
            <?php if($next_membership->status == 0): ?>
              <strong
                class="text-danger"><?php echo e(__('You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified via mail once an action is taken.')); ?></strong><br>
            <?php elseif($next_membership->status == 1): ?>
              <strong
                class="text-danger"><?php echo e(__('You have another package to activate after the current package expires. You cannot purchase / extend any package, until the next package is activated')); ?></strong><br>
            <?php endif; ?>
          <?php endif; ?>

          <strong><?php echo e(__('Current Package') . ':'); ?> </strong> <?php echo e($current_package->title); ?>

          <span class="badge badge-secondary"><?php echo e($current_package->term); ?></span>
          <?php if($current_membership->is_trial == 1): ?>
            (<?php echo e(__('Expire Date') . ':'); ?>

            <?php echo e(Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
            <span class="badge badge-primary"><?php echo e(__('Trial')); ?></span>
          <?php else: ?>
            (<?php echo e(__('Expire Date') . ':'); ?>

            <?php echo e($current_package->term === 'lifetime' ? 'Lifetime' : Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')); ?>)
          <?php endif; ?>

          <?php if($package_count >= 2 && $next_package): ?>
            <div>
              <strong><?php echo e(__('Next Package To Activate') . ':'); ?> </strong> <?php echo e($next_package->title); ?> <span
                class="badge badge-secondary"><?php echo e($next_package->term); ?></span>
              <?php if($current_package->term != 'lifetime' && $current_membership->is_trial != 1): ?>
                (
                <?php echo e(__('Activation Date') . ':'); ?>

                <?php echo e(Carbon\Carbon::parse($next_membership->start_date)->format('M-d-Y')); ?>,
                <?php echo e(__('Expire Date') . ':'); ?>

                <?php echo e($next_package->term === 'lifetime' ? 'Lifetime' : Carbon\Carbon::parse($next_membership->expire_date)->format('M-d-Y')); ?>)
              <?php endif; ?>
              <?php if($next_membership->status == 0): ?>
                <span class="badge badge-warning"><?php echo e(__('Decision Pending')); ?></span>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row mb-5 justify-content-center">
    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $permissions = $package->features;
        if (!empty($package->features)) {
            $permissions = json_decode($permissions, true);
        }
      ?>

      <div class="col-md-3 pr-md-0 mb-5">
        <div class="card-pricing2 <?php if(isset($current_package->id) && $current_package->id === $package->id): ?> card-success <?php else: ?> card-primary <?php endif; ?>">
          <div class="pricing-header">
            <h3 class="fw-bold d-inline-block">
              <?php echo e($package->title); ?>

            </h3>
            <?php if(isset($current_package->id) && $current_package->id === $package->id): ?>
              <h3 class="badge badge-danger d-inline-block float-right ml-2"><?php echo e(__('Current')); ?></h3>
            <?php endif; ?>
            <?php if($package_count >= 2): ?>
              <?php if($next_package): ?>
                <?php if($next_package->id == $package->id): ?>
                  <h3 class="badge badge-warning d-inline-block float-right ml-2"><?php echo e(__('Next')); ?></h3>
                <?php endif; ?>
              <?php endif; ?>
            <?php endif; ?>
            <span class="sub-title"></span>
          </div>
          <div class="price-value">
            <div class="value">
              <span class="amount"><?php echo e($package->price == 0 ? 'Free' : format_price($package->price)); ?></span>
              <?php if($package->term == 'monthly'): ?>
                <span class="month">/ Monthly</span>
              <?php elseif($package->term == 'yearly'): ?>
                <span class="month">/ Yearly</span>
              <?php elseif($package->term == 'lifetime'): ?>
                <span class="month">/ Lifetime</span>
              <?php endif; ?>

            </div>
          </div>

          <ul class="pricing-content">
            <li>
              <?php if($package->number_of_listing == 999999): ?>
                <?php echo e(__('Listing (Unlimited)')); ?>

              <?php elseif($package->number_of_listing == 1): ?>
                <?php echo e(__('Listing')); ?> (<?php echo e($package->number_of_listing); ?>)
              <?php else: ?>
                <?php echo e(__('Listings')); ?>(<?php echo e($package->number_of_listing); ?>)
              <?php endif; ?>
            </li>

            <li>
              <?php if($package->number_of_images_per_listing == 999999): ?>
                <?php echo e(__('Images Per Listing (Unlimited)')); ?>

              <?php elseif($package->number_of_images_per_listing == 1): ?>
                <?php echo e(__('Image Per Listing')); ?>(<?php echo e($package->number_of_images_per_listing); ?>)
              <?php else: ?>
                <?php echo e(__('Image Per Listings')); ?>(<?php echo e($package->number_of_images_per_listing); ?>)
              <?php endif; ?>
            </li>

            <li class="<?php if(is_array($permissions) && !in_array('Listing Enquiry Form', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('Listing Enquiry Form')); ?>

            </li>

            <li class="<?php if(is_array($permissions) && !in_array('Video', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('Video')); ?></li>

            <li class="<?php if(is_array($permissions) && !in_array('Amenities', $permissions)): ?> disable <?php endif; ?>">
              <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
                <?php if($package->number_of_amenities_per_listing == 999999): ?>
                  <?php echo e(__('Amenities Per Listing(Unlimited)')); ?>

                <?php elseif($package->number_of_amenities_per_listing == 1): ?>
                  <?php echo e(__('Amenitie Per Listing')); ?>(<?php echo e($package->number_of_amenities_per_listing); ?>)
                <?php else: ?>
                  <?php echo e(__('Amenities Per Listing')); ?>(<?php echo e($package->number_of_amenities_per_listing); ?>)
                <?php endif; ?>
              <?php else: ?>
                <?php echo e(__('Amenities Per Listing')); ?>

              <?php endif; ?>
            </li>

            <li class="<?php if(is_array($permissions) && !in_array('Feature', $permissions)): ?> disable <?php endif; ?>">
              <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                <?php if($package->number_of_additional_specification == 999999): ?>
                  <?php echo e(__('Feature Per Listing (Unlimited)')); ?>

                <?php elseif($package->number_of_additional_specification == 1): ?>
                  <?php echo e(__('Feature Per Listing')); ?> (<?php echo e($package->number_of_additional_specification); ?>)
                <?php else: ?>
                  <?php echo e(__('Features Per Listing')); ?> (<?php echo e($package->number_of_additional_specification); ?>)
                <?php endif; ?>
              <?php else: ?>
                <?php echo e(__('Feature Per Listing')); ?>

              <?php endif; ?>
            </li>
            <li class="<?php if(is_array($permissions) && !in_array('Social Links', $permissions)): ?> disable <?php endif; ?>">
              <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                <?php if($package->number_of_social_links == 999999): ?>
                  <?php echo e(__('Social Links Per Listing(Unlimited)')); ?>

                <?php elseif($package->number_of_social_links == 1): ?>
                  <?php echo e(__('Social Link Per Listing')); ?>(<?php echo e($package->number_of_social_links); ?>)
                <?php else: ?>
                  <?php echo e(__('Social Links Per Listing')); ?> (<?php echo e($package->number_of_social_links); ?>)
                <?php endif; ?>
              <?php else: ?>
                <?php echo e(__('Social Link Per Listing')); ?>

              <?php endif; ?>
            </li>
            <li class="<?php if(is_array($permissions) && !in_array('FAQ', $permissions)): ?> disable <?php endif; ?>">
              <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
                <?php if($package->number_of_faq == 999999): ?>
                  <?php echo e(__('FAQs Per Listing(Unlimited)')); ?>

                <?php elseif($package->number_of_faq == 1): ?>
                  <?php echo e(__('FAQ Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                <?php else: ?>
                  <?php echo e(__('FAQs Per Listing')); ?> (<?php echo e($package->number_of_faq); ?>)
                <?php endif; ?>
              <?php else: ?>
                <?php echo e(__('FAQ Per Listing')); ?>

              <?php endif; ?>
            </li>

            <li class="<?php if(is_array($permissions) && !in_array('Business Hours', $permissions)): ?> disable <?php endif; ?>">
              <?php echo e(__('Business Hours')); ?>

            </li>

            <li class="<?php if(is_array($permissions) && !in_array('Products', $permissions)): ?> disable <?php endif; ?>">
              <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                <?php if($package->number_of_products == 999999): ?>
                  <?php echo e(__('Products Per Listing (Unlimited)')); ?>

                <?php elseif($package->number_of_products == 1): ?>
                  <?php echo e(__('Product Per Listing')); ?>(<?php echo e($package->number_of_products); ?>)
                <?php else: ?>
                  <?php echo e(__('Products Per Listing')); ?>(<?php echo e($package->number_of_products); ?>)
                <?php endif; ?>
              <?php else: ?>
                <?php echo e(__('Products Per Listing')); ?>

              <?php endif; ?>
            </li>

            <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
              <li class="<?php if(is_array($permissions) && !in_array('Products', $permissions)): ?> disable <?php endif; ?>">
                <?php if($package->number_of_images_per_products == 999999): ?>
                  <?php echo e(__('Product Image Per Product (Unlimited)')); ?>

                <?php elseif($package->number_of_images_per_products == 1): ?>
                  <?php echo e(__('Product Image Per Product')); ?>(<?php echo e($package->number_of_images_per_products); ?>)
                <?php else: ?>
                  <?php echo e(__('Product Images Per Product')); ?> (<?php echo e($package->number_of_images_per_products); ?>)
                <?php endif; ?>
              </li>
            <?php else: ?>
              <li class="<?php if(is_array($permissions) && !in_array('Products', $permissions)): ?> disable <?php endif; ?>">
                <?php echo e(__('Product Image Per Product')); ?></li>
            <?php endif; ?>

            <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
              <li class="<?php if(is_array($permissions) && (!in_array('Products', $permissions) || !in_array('Product Enquiry Form', $permissions))): ?> disable <?php endif; ?>">
                <?php echo e(__('Product Enquiry Form')); ?>

              </li>
            <?php else: ?>
              <li class="<?php if(is_array($permissions) && (!in_array('Products', $permissions) || !in_array('Product Enquiry Form', $permissions))): ?> disable <?php endif; ?>">
                <?php echo e(__('Product Enquiry Form')); ?></li>
            <?php endif; ?>
            <li class="<?php if(is_array($permissions) && !in_array('Messenger', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('Messenger')); ?></li>
            <li class="<?php if(is_array($permissions) && !in_array('WhatsApp', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('WhatsApp')); ?></li>
            <li class="<?php if(is_array($permissions) && !in_array('Telegram', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('Telegram')); ?></li>
            <li class="<?php if(is_array($permissions) && !in_array('Tawk.To', $permissions)): ?> disable <?php endif; ?>"><?php echo e(__('Tawk.To')); ?></li>

            <?php if(!is_null($package->custom_features)): ?>
              <?php
                $features = explode("\n", $package->custom_features);
              ?>
              <?php if(count($features) > 0): ?>
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($value); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endif; ?>

          </ul>

          <?php
            $hasPendingMemb = \App\Http\Helpers\VendorPermissionHelper::hasPendingMembership(Auth::id());
          ?>
          <?php if($package_count < 2 && !$hasPendingMemb): ?>
            <div class="px-4">
              <?php if(isset($current_package->id) && $current_package->id === $package->id): ?>
                <?php if($package->term != 'lifetime' || $current_membership->is_trial == 1): ?>
                  <a href="<?php echo e(route('vendor.plan.extend.checkout', $package->id)); ?>"
                    class="btn btn-success btn-lg w-75 fw-bold mb-3"><?php echo e(__('Extend')); ?></a>
                <?php endif; ?>
              <?php else: ?>
                <a href="<?php echo e(route('vendor.plan.extend.checkout', $package->id)); ?>"
                  class="btn btn-primary btn-block btn-lg fw-bold mb-3"><?php echo e(__('Buy Now')); ?></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/buy_plan/index.blade.php ENDPATH**/ ?>