<?php
  $vendorId = $vendor_id;
  $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);
  if (!empty($current_package) && !empty($current_package->features)) {
      $permissions = json_decode($current_package->features, true);
  } else {
      $permissions = null;
  }

  $vendor_id = $vendor_id;

  if ($vendor_id != 0) {
      $dowgraded = App\Http\Helpers\VendorPermissionHelper::packagesDowngraded($vendor_id);
      $listingCanAdd = packageTotalListing($vendor_id) - vendorTotalListing($vendor_id);
  }

?>
<?php if($current_package != '[]'): ?>

  <div class="modal fade" id="adminCheckLimitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title card-title" id="exampleModalLabel">
            <?php echo e(__('All Limit')); ?></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
            $listingCanAdd = packageTotalListing($vendorId) - vendorTotalListing($vendorId);
          ?>
          <div class="alert alert-warning">
            <span
              class="text-warning"><?php echo e(__('If any feature  is downgraded , you can\'t create or edit any feature.')); ?></span>
          </div>
          <ul class="list-group border ">

            <li class="list-group-item">
              <div class="d-flex  justify-content-between">
                <span class="text-focus">
                  <?php if($listingCanAdd < 0): ?>
                    <i class="fas fa-exclamation-circle text-danger"></i>
                  <?php endif; ?>
                  <?php echo e(__('Listings Left')); ?> :
                </span>

                <span class="badge badge-primary badge-sm">
                  <?php echo e($current_package->number_of_listing - vendorTotalListing($vendorId) >= 999999 ? 'Unlimited' : ($current_package->number_of_listing - vendorTotalListing($vendorId) < 0 ? 0 : $current_package->number_of_listing - vendorTotalListing($vendorId))); ?>

                </span>
              </div>

              <?php if(vendorTotalListing($vendorId) > $current_package->number_of_listing): ?>
                <p class="text-warning m-0"><?php echo e(__('Limit has been crossed,vendor has to delete')); ?>


                  <?php echo e(abs($current_package->number_of_listing - vendorTotalListing($vendorId))); ?>

                  <?php echo e(abs($current_package->number_of_listing - vendorTotalListing($vendorId)) == 1 ? 'listing' : 'listings'); ?>


                </p>
              <?php endif; ?>
              <?php if(vendorTotalListing($vendorId) == $current_package->number_of_listing): ?>
                <p class="text-info m-0"><?php echo e(__('You reach your limit')); ?>

                </p>
              <?php endif; ?>
            </li>
            <li class="list-group-item ">
              <div class="d-flex  justify-content-between">
                <span class="text-focus">
                  <?php if($dowgraded['listingImgDown']): ?>
                    <i class="fas fa-exclamation-circle text-danger"></i>
                  <?php endif; ?>
                  <?php echo e(__('Listing Images (Per Listing)')); ?> :
                </span>
                <span class="badge badge-primary badge-sm">
                  <?php echo e($current_package->number_of_images_per_listing); ?>

                </span>

              </div>
              <?php if($dowgraded['listingImgDown']): ?>
                <p class="text-warning m-0"><?php echo e(__('Limit has been crossed,vendor has to delete')); ?>

                  <?php echo e(__('gallery images')); ?>

                </p>
              <?php endif; ?>
            </li>
            <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['listingProductDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Products (Per Listing)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_products); ?>

                  </span>
                </div>
                <?php if($dowgraded['listingProductDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete,products')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>
            <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['listingFaqDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Faqs (Per Listing)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_faq); ?>

                  </span>
                </div>
                <?php if($dowgraded['listingFaqDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete faqs')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>

            <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['featureDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Features  (Per Listing)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_additional_specification); ?>

                  </span>
                </div>
                <?php if($dowgraded['featureDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete Specifications')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>

            <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['socialLinkDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Socail Links (Per Listing)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_social_links); ?>

                  </span>
                </div>
                <?php if($dowgraded['socialLinkDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete Social Links')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>

            <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['amenitieDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Amenities (Per Listing)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_amenities_per_listing); ?>

                  </span>
                </div>
                <?php if($dowgraded['amenitieDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete Amenities')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>

            <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
              <li class="list-group-item ">
                <div class="d-flex  justify-content-between">
                  <span class="text-focus">
                    <?php if($dowgraded['listingProductImgDown']): ?>
                      <i class="fas fa-exclamation-circle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Product Images (Per Product.)')); ?> :
                  </span>
                  <span class="badge badge-primary badge-sm">
                    <?php echo e($current_package->number_of_images_per_products); ?>

                  </span>
                </div>
                <?php if($dowgraded['listingProductImgDown']): ?>
                  <p class="text-warning m-0"><?php echo e(__('Limit has been crossed, vendor has to delete')); ?>

                    <?php echo e(__('gallery images')); ?>

                  </p>
                <?php endif; ?>
              </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"
            data-dismiss="modal"><?php echo e($keywords['Close'] ?? __('Close')); ?></button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/check-limit.blade.php ENDPATH**/ ?>