<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add Listing')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
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
        <a href="#"><?php echo e(__('Add Listing')); ?></a>
      </li>
    </ul>
  </div>

  <?php

    $vendorId = $vendor_id;

    if ($vendorId == 0) {
        $permissions = [
            'Listing Enquiry Form',
            'Video',
            'Amenities',
            'Feature',
            'Social Links',
            'FAQ',
            'Business Hours',
            'Products',
            'Product Enquiry Form',
            'Messenger',
            'WhatsApp',
            'Telegram',
            'Tawk.To',
        ];
        $additionalFeatureLimit = 99999999;
        $SocialLinkLimit = 99999999;
        $numberoffImages = 99999999;
        $can_listing_add = 1;
    } else {
        if ($vendorId) {
            $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

            $dowgraded = App\Http\Helpers\VendorPermissionHelper::packagesDowngraded($vendor_id);
            $listingCanAdd = packageTotalListing($vendor_id) - vendorTotalListing($vendor_id);

            if (!empty($current_package) && !empty($current_package->features)) {
                $permissions = json_decode($current_package->features, true);
            } else {
                $permissions = null;
            }
            if ($current_package != '[]') {
                $numberoffImages = $current_package->number_of_images_per_listing;
            } else {
                $numberoffImages = 0;
            }
        } else {
            $permissions = null;
            $numberoffImages = 0;
        }
    }

  ?>

  <div class="row">
    <div class="col-md-12">
      <?php if($vendorId != 0): ?>
        <?php if($current_package != '[]'): ?>
          <?php if(vendorTotalAddedListing($vendorId) >= $current_package->number_of_listing): ?>
            <div class="alert alert-warning">
              <?php echo e(__('You cannot add more listings for this vendor. Vendor will need to upgrade his plan')); ?>

            </div>
            <?php
              $can_listing_add = 2;
            ?>
          <?php else: ?>
            <?php
              $can_listing_add = 1;
            ?>
          <?php endif; ?>
        <?php else: ?>
          <?php
            $pendingMemb = \App\Models\Membership::query()
                ->where([['vendor_id', '=', $vendor_id], ['status', 0]])
                ->whereYear('start_date', '<>', '9999')
                ->orderBy('id', 'DESC')
                ->first();
            $pendingPackage = isset($pendingMemb)
                ? \App\Models\Package::query()->findOrFail($pendingMemb->package_id)
                : null;
          ?>
          <?php if($pendingPackage): ?>
            <div class="alert alert-warning">
              <?php echo e(__('You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified via mail once an action is taken.')); ?>

            </div>
            <div class="alert alert-warning">
              <strong><?php echo e(__('Pending Package') . ':'); ?> </strong> <?php echo e($pendingPackage->title); ?>

              <span class="badge badge-secondary"><?php echo e($pendingPackage->term); ?></span>
              <span class="badge badge-warning"><?php echo e(__('Decision Pending')); ?></span>
            </div>
          <?php else: ?>
            <?php
              $newMemb = \App\Models\Membership::query()
                  ->where([['vendor_id', '=', $vendor_id], ['status', 0]])
                  ->first();
            ?>
            <?php if($newMemb): ?>
              <div class="alert alert-warning">
                <?php echo e(__('Your membership is expired. Please purchase a new package / extend the current package.')); ?>

              </div>
            <?php endif; ?>
            <div class="alert alert-warning">
              <?php echo e(__('Please purchase a new package to add Listing.')); ?>

            </div>
          <?php endif; ?>
          <?php
            $can_listing_add = 0;
          ?>
        <?php endif; ?>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6">
              <div class="card-title d-inline-block"><?php echo e(__('Add Listing')); ?></div>
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
              <div class="btn-groups gap-10 justify-content-sm-end">
                <?php if($vendor_id != 0): ?>
                  <button type="button" class="btn btn-primary btn-sm btn-sm btn-round" id="aa"
                    data-toggle="modal" data-target="#adminCheckLimitModal">

                    <?php if(
                        $dowgraded['listingImgDown'] ||
                            $dowgraded['listingFaqDown'] ||
                            $dowgraded['listingProductDown'] ||
                            $dowgraded['featureDown'] ||
                            $dowgraded['socialLinkDown'] ||
                            $dowgraded['amenitieDown'] ||
                            $dowgraded['listingProductImgDown'] ||
                            $listingCanAdd < 0): ?>
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Check Limit')); ?>

                  </button>
                <?php endif; ?>

                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.listing_management.select_vendor')); ?>">
                  <span class="btn-label">
                    <i class="fas fa-backward"></i>
                  </span>
                  <?php echo e(__('Back')); ?>

                </a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <ul></ul>
              </div>
              <div class="col-lg-12">
                <label for="" class="mb-2"><strong><?php echo e(__('Gallery Images')); ?> *</strong></label>
                <form action="<?php echo e(route('admin.listing.imagesstore')); ?>" id="my-dropzone" enctype="multipart/formdata"
                  class="dropzone create">
                  <?php echo csrf_field(); ?>
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                </form>
                <p class="em text-danger mb-0" id="errslider_images"></p>
              </div>

              <form id="listingForm" action="<?php echo e(route('admin.listing_management.store_listing')); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Featured  Image') . '*'); ?></label>
                      <br>
                      <div class="thumb-preview">
                        <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
                      </div>

                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Image')); ?>

                          <input type="file" class="img-input" name="feature_image">
                        </div>
                      </div>
                      <p class="mt-2 mb-0 text-warning"><?php echo e(__('Image Size 600x400')); ?></p>
                    </div>

                  </div>
                  <?php if(is_array($permissions) && in_array('Video', $permissions)): ?>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for=""><?php echo e(__('Video Image')); ?></label>
                        <br>
                        <?php
                          $display = 'none';
                        ?>
                        <div class="thumb-preview">
                          <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img2">
                          <button class="remove-img2 btn btn-remove" type="button" style="display:<?php echo e($display); ?>;">
                            <i class="fal fa-times"></i>
                          </button>
                        </div>

                        <div class="mt-3">
                          <div role="button" class="btn btn-primary btn-sm upload-btn">
                            <?php echo e(__('Choose Image')); ?>

                            <input type="file" class="video-img-input" name="video_background_image">
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="row">
                  <?php if(is_array($permissions) && in_array('Video', $permissions)): ?>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label><?php echo e(__('Video Link')); ?> </label>
                        <input type="text" class="form-control" name="video_url" placeholder="Enter Your video url">
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Mail')); ?> *</label>
                      <input type="text" class="form-control" name="mail" placeholder="Enter Contact Mail">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Phone')); ?> *</label>
                      <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                    </div>
                  </div>
                  <?php
                    $approve = App\Models\BasicSettings\Basic::select('admin_approve_status')->first();
                    $status = $approve->admin_approve_status;
                  ?>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Approve Status')); ?> *</label>
                      <select name="status" id="status" class="form-control">
                        <option <?php if($status == 1): ?> selected <?php endif; ?> value="1"><?php echo e(__('Approved')); ?>

                        </option>
                        <option <?php if($status == 0): ?> selected <?php endif; ?> value="0"><?php echo e(__('Pending')); ?>

                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Hide/Show')); ?> </label>
                      <select name="visibility" id="visibility" class="form-control">
                        <option value="1"><?php echo e(__('Show')); ?>

                        </option>
                        <option selected value="0"><?php echo e(__('Hide')); ?>

                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Latitude')); ?> *</label>
                      <input type="text" class="form-control" name="latitude" placeholder="Enter Latitude">
                      <p class="text-warning">
                        <?php echo e(__('The Latitude must be between -90 and 90. Ex:49.43453')); ?></p>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Longitude')); ?> *</label>
                      <input type="text" class="form-control" name="longitude" placeholder="Enter Longitude">
                      <p class="text-warning">
                        <?php echo e(__('The Longitude must be between -180 and 180. Ex:149.91553')); ?></p>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Min Price')); ?>(<?php echo e($settings->base_currency_text); ?>)*</label>
                      <input type="text" class="form-control" name="min_price" placeholder="Enter Min Price">
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Max Price')); ?>(<?php echo e($settings->base_currency_text); ?>)*</label>
                      <input type="text" class="form-control" name="max_price" placeholder="Enter Max Price">
                    </div>
                  </div>
                  <input type="hidden" name="can_listing_add" id="can_listing_add" value="1">
                  <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e($vendor_id); ?>">

                </div>

                <div id="accordion" class="mt-3 ">
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="version">
                      <div class="version-header" id="heading<?php echo e($language->id); ?>">
                        <h5 class="mb-0">
                          <button type="button" class="btn btn-link" data-toggle="collapse"
                            data-target="#collapse<?php echo e($language->id); ?>"
                            aria-expanded="<?php echo e($language->is_default == 1 ? 'true' : 'false'); ?>"
                            aria-controls="collapse<?php echo e($language->id); ?>">
                            <?php echo e($language->name . __(' Language')); ?> <?php echo e($language->is_default == 1 ? '(Default)' : ''); ?>

                          </button>
                        </h5>
                      </div>

                      <div id="collapse<?php echo e($language->id); ?>"
                        class="collapse <?php echo e($language->is_default == 1 ? 'show' : ''); ?>"
                        aria-labelledby="heading<?php echo e($language->id); ?>" data-parent="#accordion">
                        <div class="version-body <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label><?php echo e(__('Title')); ?> *</label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_title"
                                  placeholder="Enter Title">
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                <label><?php echo e(__('Address') . '*'); ?></label>
                                <input type="text" name="<?php echo e($language->code); ?>_address" class="form-control"
                                  placeholder="Enter Address">
                              </div>
                            </div>

                            <div class="col-lg-3">
                              <div class="form-group">
                                <?php
                                  $categories = App\Models\ListingCategory::where('language_id', $language->id)
                                      ->where('status', 1)
                                      ->get();
                                ?>

                                <label><?php echo e(__('Category')); ?> *</label>
                                <select name="<?php echo e($language->code); ?>_category_id"
                                  class="form-control js-example-basic-single2">
                                  <option selected disabled><?php echo e(__('Select a Category')); ?></option>

                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                            <?php
                              $Countries = App\Models\Location\Country::where('language_id', $language->id)->get();
                              $totalCountry = $Countries->count();
                            ?>

                            <?php if($totalCountry > 0): ?>
                              <div class="col-lg-3">
                                <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">

                                  <label><?php echo e(__('Country*')); ?></label>
                                  <select name="<?php echo e($language->code); ?>_country_id"
                                    class="form-control js-example-basic-single3" data-code="<?php echo e($language->code); ?>">
                                    <option selected disabled><?php echo e(__('Select Country')); ?></option>
                                    <?php $__currentLoopData = $Countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($Country->id); ?>"><?php echo e($Country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                              </div>
                            <?php endif; ?>

                            <?php
                              $States = App\Models\Location\State::where('language_id', $language->id)->get();
                              $totalState = $States->count();
                            ?>

                            <?php if($totalState > 0): ?>
                              <div class="col-lg-3 <?php echo e($language->code); ?>_hide_state">
                                <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">

                                  <label><?php echo e(__('State*')); ?> </label>
                                  <select name="<?php echo e($language->code); ?>_state_id"
                                    class="form-control js-example-basic-single4 <?php echo e($language->code); ?>_country_state_id"data-code="<?php echo e($language->code); ?>">
                                    <option selected disabled><?php echo e(__('Select State')); ?></option>
                                    <?php $__currentLoopData = $States; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $State): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($State->id); ?>"><?php echo e($State->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                              </div>
                            <?php endif; ?>

                            <?php
                              $cities = App\Models\Location\City::where('language_id', $language->id)->get();
                              $totalCity = $cities->count();
                            ?>

                            <div class="col-lg-3">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">

                                <label><?php echo e(__('City')); ?> *</label>
                                <select name="<?php echo e($language->code); ?>_city_id"
                                  class="form-control js-example-basic-single5 <?php echo e($language->code); ?>_state_city_id">
                                  <option selected disabled><?php echo e(__('Select a City')); ?></option>
                                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $City): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($City->id); ?>"><?php echo e($City->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>

                            <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?>
                              <div class="col-lg-12">
                                <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                  <?php
                                    $aminities = App\Models\Aminite::where('language_id', $language->id)->get();
                                  ?>
                                  <label><?php echo e(__('Select Amenities')); ?> *</label>
                                  <div class="dropdown-content" id="checkboxes">
                                    <?php $__currentLoopData = $aminities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <input type="checkbox" id="<?php echo e($amenity->id); ?>"
                                        name="<?php echo e($language->code); ?>_aminities[]" value="<?php echo e($amenity->id); ?>">
                                      <label
                                        class="amenities-label <?php echo e($language->direction == 1 ? 'ml-2 mr-0' : 'mr-2'); ?>"
                                        for="<?php echo e($amenity->id); ?>"><?php echo e($amenity->title); ?></label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                                </div>
                              </div>
                            <?php endif; ?>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Description')); ?> *</label>
                                <textarea id="<?php echo e($language->code); ?>_description" class="form-control summernote"
                                  name="<?php echo e($language->code); ?>_description" data-height="300"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Keywords')); ?> </label>
                                <input class="form-control" name="<?php echo e($language->code); ?>_meta_keyword"
                                  placeholder="Enter Meta Keywords" data-role="tagsinput">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Description')); ?> </label>
                                <textarea class="form-control" name="<?php echo e($language->code); ?>_meta_description" rows="5"
                                  placeholder="Enter Meta Description"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <?php $currLang = $language; ?>
                              <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($language->id == $currLang->id) continue; ?>
                                <div class="form-check py-0">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"
                                      onchange="cloneInput('collapse<?php echo e($currLang->id); ?>', 'collapse<?php echo e($language->id); ?>', event)">
                                    <span class="form-check-sign"><?php echo e(__('Clone for')); ?> <strong
                                        class="text-capitalize text-secondary"><?php echo e($language->name); ?></strong>
                                      <?php echo e(__('language')); ?></span>
                                  </label>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="sliders">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="listingForm" data-can_listing_add="<?php echo e($can_listing_add); ?>"
                class="btn btn-success">
                <?php echo e(__('Save')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($__env->exists('admin.listing.check-limit')) echo $__env->make('admin.listing.check-limit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    'use strict';
    var storeUrl = "<?php echo e(route('admin.listing.imagesstore')); ?>";
    var removeUrl = "<?php echo e(route('admin.listing.imagermv')); ?>";
    var getStateUrl = "<?php echo e(route('admin.listing_management.get-state')); ?>";
    var getCityUrl = "<?php echo e(route('admin.listing_management.get-city')); ?>";
    var galleryImages = <?php echo e($numberoffImages); ?>;
    const baseURL = "<?php echo e(url('/')); ?>";
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-listing.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-dropzone.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/create.blade.php ENDPATH**/ ?>