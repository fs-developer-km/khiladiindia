<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add Listing')); ?></h4>
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
        <a href="#"><?php echo e(__('Add Listing')); ?></a>
      </li>
    </ul>
  </div>

  <?php
    $vendorId = Auth::guard('vendor')->user()->id;

    if ($vendorId) {
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

        if ($current_package != '[]') {
            $numberoffImages = $current_package->number_of_images_per_listing;
        } else {
            $numberoffImages = 0;
        }
        if (!empty($current_package) && !empty($current_package->features)) {
            $permissions = json_decode($current_package->features, true);
        } else {
            $permissions = null;
        }
    } else {
        $permissions = null;
    }
  ?>


  <div class="row">
    <div class="col-md-12">
      <?php if($current_package != '[]'): ?>
        <?php if(vendorTotalAddedListing($vendorId) >= $current_package->number_of_listing): ?>
          <div class="alert alert-warning">
            <?php echo e(__("You can't add more Listing. Please buy/extend a plan to add Listing")); ?>

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
              ->where([['vendor_id', '=', Auth::id()], ['status', 0]])
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
                ->where([['vendor_id', '=', Auth::id()], ['status', 0]])
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
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Add Listing')); ?></div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-lg-10 offset-lg-1">


              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <ul></ul>
              </div>
              <div class="col-lg-12">
                <label for="" class="mb-2"><strong><?php echo e(__('Gallery Images')); ?> *</strong></label>
                <form action="<?php echo e(route('vendor.listing.imagesstore')); ?>" id="my-dropzone" enctype="multipart/formdata"
                  class="dropzone create">
                  <?php echo csrf_field(); ?>
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                </form>
                <p class="em text-danger mb-0" id="errslider_images"></p>
                <?php if($current_package != '[]'): ?>
                  <?php if(vendorTotalAddedListing($vendorId) <= $current_package->number_of_listing): ?>
                    <p class="text-warning">
                      <?php echo e(__('You can upload maximum ' . $current_package->number_of_images_per_listing . ' images under one listing')); ?>

                    </p>
                  <?php endif; ?>
                <?php endif; ?>
              </div>

              <form id="listingForm" action="<?php echo e(route('vendor.listing_management.store_listing')); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Featured Image') . '*'); ?></label>
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
                  <?php
                    $approve = App\Models\BasicSettings\Basic::select('admin_approve_status')->first();
                    $status = $approve->admin_approve_status;
                  ?>
                  <input type="hidden" value="<?php echo e($status); ?>"name="status" id="status">

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

                  <input type="hidden" name="vendor_id" id="vendor_id"
                    value="<?php echo e(Auth::guard('vendor')->user()->id); ?>">
                  <input type="hidden" name="can_listing_add" value="<?php echo e($can_listing_add); ?>">
                </div>

                <div id="accordion" class="mt-3">
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
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Title')); ?> *</label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_title"
                                  placeholder="Enter Title">
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Address') . '*'); ?></label>
                                <input type="text" name="<?php echo e($language->code); ?>_address" class="form-control"
                                  placeholder="Enter Address">
                              </div>
                            </div>

                            <div class="col-lg-3">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
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
                                <label><?php echo e(__('Meta Keywords')); ?></label>
                                <input class="form-control" name="<?php echo e($language->code); ?>_meta_keyword"
                                  placeholder="Enter Meta Keywords" data-role="tagsinput">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Description')); ?></label>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    'use strict';
    var storeUrl = "<?php echo e(route('vendor.listing.imagesstore')); ?>";
    var removeUrl = "<?php echo e(route('vendor.listing.imagermv')); ?>";
    var getStateUrl = "<?php echo e(route('vendor.listing_management.get-state')); ?>";
    var getCityUrl = "<?php echo e(route('vendor.listing_management.get-city')); ?>";
    var galleryImages = <?php echo e($numberoffImages); ?>;
    var languages = <?php echo json_encode($languages); ?>;
    const baseURL = "<?php echo e(url('/')); ?>";
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-partial.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-listing.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-dropzone.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/listing/create.blade.php ENDPATH**/ ?>