<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Features')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('vendor.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Listings Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a
          href="<?php echo e(route('vendor.listing_management.listing', ['language' => $defaultLang->code])); ?>"><?php echo e(__('Manage Listings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <?php
        $dContent = App\Models\Listing\ListingContent::where('listing_id', $listing_id)
            ->where('language_id', $defaultLang->id)
            ->first();
        $title = !empty($dContent) ? $dContent->title : '';
      ?>
      <li class="nav-item">
        <a href="#">
          <?php if(!empty($title)): ?>
            <?php echo e(strlen(@$title) > 20 ? mb_substr(@$title, 0, 20, 'utf-8') . '...' : @$title); ?>

          <?php endif; ?>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Features')); ?></a>
      </li>
    </ul>
  </div>

  <?php
    $vendorId = Auth::guard('vendor')->user()->id;

    if ($vendorId) {
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

        if (!empty($current_package) && !empty($current_package->features)) {
            $permissions = json_decode($current_package->features, true);
            $additionalFeatureLimit = packageTotalAdditionalSpecification($vendorId) - $totalFeature;
        } else {
            $permissions = null;
            $additionalFeatureLimit = 0;
        }
    } else {
        $permissions = null;
        $additionalFeatureLimit = 0;
    }
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Features')); ?></div>
          <a class="btn btn-info btn-sm float-right d-inline-block"
            href="<?php echo e(route('vendor.listing_management.listing', ['language' => $defaultLang->code])); ?>">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
          <?php
            $dContent = App\Models\Listing\ListingContent::where('listing_id', $listing_id)
                ->where('language_id', $defaultLang->id)
                ->first();
            $slug = !empty($dContent) ? $dContent->slug : '';
          ?>
          <?php if($dContent): ?>
            <a class="btn btn-success btn-sm float-right mr-1 d-inline-block"
              href="<?php echo e(route('frontend.listing.details', ['slug' => $slug, 'id' => $listing_id])); ?>" target="_blank">
              <span class="btn-label">
                <i class="fas fa-eye"></i>
              </span>
              <?php echo e(__('Preview')); ?>

            </a>
          <?php endif; ?>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
              </div>

              <form id="listingForm"
                action="<?php echo e(route('vendor.listing_management.update_additional_specification', $listing_id)); ?>"
                method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="listing_id" value="<?php echo e($listing_id); ?>">

               <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <h4><?php echo e(__('Features')); ?></h4>
                      <div class="js-repeater">
                        <div class="mb-3">
                          <button class="btn btn-primary js-repeater-add"
                            type="button">+<?php echo e(__('Add Feature')); ?></button>
                        </div>
                        <div id="js-repeater-container">
                          <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="js-repeater-item p-3 pb-0" data-item="<?php echo e($feature->indx); ?>">
                              <div class="row align-items-end gutters-2">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php
                                    $feature_content = App\Models\Listing\ListingFeatureContent::where([
                                        ['language_id', $language->id],
                                        ['listing_feature_id', $feature->id],
                                    ])->first();
                                  ?>

                                  <div class="col-sm-4 col-lg-3 <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                    <label for="form" class="form-label mb-1"><?php echo e(__('Label')); ?>

                                      (In <?php echo e($language->name); ?>)
                                    </label>
                                    <div class="mb-2">
                                      <input class="form-control" required
                                        value="<?php echo e($feature_content->feature_heading ?? ''); ?>" type="text"
                                        placeholder="" name="<?php echo e($language->code); ?>_feature_heading[]">
                                    </div>
                                  </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a href="javascript:void(0)" data-feature="<?php echo e($feature->id); ?>"
                                  class="btn btn-danger btn-sm js-repeater-remove mb-2 mr-2 deleteFeature">
                                  X</a>
                                <button class="btn btn-success btn-sm js-repeater-child-add mb-2" type="button"
                                  data-it="<?php echo e($feature->indx); ?>"><?php echo e(__('Add Option')); ?>

                                </button>

                                <div class="repeater-child-list col-12" id="options<?php echo e($feature->indx); ?>">
                                  <?php
                                    $feature_content = App\Models\Listing\ListingFeatureContent::where(
                                        'listing_feature_id',
                                        $feature->id,
                                    )->get();

                                    $op = json_decode($feature_content[0]['feature_value']);
                                  ?>
                                  <?php if($op): ?>
                                    <?php $__currentLoopData = $op; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opIn => $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="repeater-child-item" id="options<?php echo e($feature->indx); ?>">
                                        <div class="row align-items-end gutters-2">
                                          <?php
                                            $opArr = [];
                                            for ($i = 0; $i < count($languages); $i++) {
                                                $opArr[$i] = json_decode($feature_content[$i]['feature_value'] ?? '');
                                            }
                                          ?>
                                          <?php for($i = 0; $i < count($languages); $i++): ?>
                                            <div
                                              class="col-sm-4 col-lg-3 mb-2 <?php echo e($languages[$i]->direction == 1 ? 'rtl text-right' : ''); ?>">
                                              <label for="form" class="form-label mb-1"><?php echo e(__('Value')); ?>

                                                (In <?php echo e($languages[$i]->name); ?>)
                                              </label>
                                              <input class="form-control"
                                                name="<?php echo e($languages[$i]->code); ?>_feature_value_<?php echo e($feature->indx); ?>[]"
                                                type="text" value="<?php echo e($opArr[$i][$opIn] ?? ''); ?>" placeholder="">
                                            </div>
                                          <?php endfor; ?>
                                          <div class="col-sm-4 col-lg-3 mb-2">
                                            <button class="btn btn-danger js-repeater-child-remove btn-sm" type="button"
                                              onclick="$(this).parents('.repeater-child-item').remove()">X</button>
                                          </div>
                                        </div>
                                      </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="listingForm" class="btn btn-primary">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/feature.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/admin-listing.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('variables'); ?>
  <script>
    "use strict";
    var featureRmvUrl = "<?php echo e(route('vendor.listing_management.feature_delete')); ?>"
    var additionalFeatureLimit = <?php echo e($additionalFeatureLimit - 1); ?>;
    var languages = <?php echo json_encode($languages); ?>;
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/listing/feature.blade.php ENDPATH**/ ?>