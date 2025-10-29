<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Edit Profile')); ?></h4>
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
        <a href="#"><?php echo e(__('Edit Profile')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-title"><?php echo e(__('Edit Profile')); ?></div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <ul></ul>
              </div>
              <form id="listingForm" action="<?php echo e(route('vendor.update_profile')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <h2><?php echo e(__('Details')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Photo')); ?></label>
                      <br>
                      <div class="thumb-preview">
                        <?php if($vendor->photo != null): ?>
                          <img src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>" alt="..."
                            class="uploaded-img">
                        <?php else: ?>
                          <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
                        <?php endif; ?>

                      </div>

                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Photo')); ?>

                          <input type="file" class="img-input" name="photo">
                        </div>
                        <p id="editErr_photo" class="mt-1 mb-0 text-danger em"></p>
                        <p class="mt-2 mb-0 text-warning"><?php echo e(__('Image Size 80x80')); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Username*')); ?></label>
                      <input type="text" value="<?php echo e($vendor->username); ?>" class="form-control" name="username">
                      <p id="editErr_username" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Email*')); ?></label>
                      <input type="text" value="<?php echo e($vendor->email); ?>" class="form-control" name="email">
                      <p id="editErr_email" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Phone')); ?></label>
                      <input type="tel" value="<?php echo e($vendor->phone); ?>" class="form-control" name="phone">
                      <p id="editErr_phone" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" <?php echo e($vendor->show_email_addresss == 1 ? 'checked' : ''); ?>

                              name="show_email_addresss" class="custom-control-input" id="show_email_addresss">
                            <label class="custom-control-label"
                              for="show_email_addresss"><?php echo e(__('Show Email Address in Profile Page')); ?></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" <?php echo e($vendor->show_phone_number == 1 ? 'checked' : ''); ?>

                              name="show_phone_number" class="custom-control-input" id="show_phone_number">
                            <label class="custom-control-label"
                              for="show_phone_number"><?php echo e(__('Show Phone Number in Profile Page')); ?></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" <?php echo e($vendor->show_contact_form == 1 ? 'checked' : ''); ?>

                              name="show_contact_form" class="custom-control-input" id="show_contact_form">
                            <label class="custom-control-label"
                              for="show_contact_form"><?php echo e(__('Show  Contact Form')); ?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div id="accordion" class="mt-5">
                      <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="version">
                          <div class="version-header" id="heading<?php echo e($language->id); ?>">
                            <h5 class="mb-0">
                              <button type="button"
                                class="btn btn-link <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>"
                                data-toggle="collapse" data-target="#collapse<?php echo e($language->id); ?>"
                                aria-expanded="<?php echo e($language->is_default == 1 ? 'true' : 'false'); ?>"
                                aria-controls="collapse<?php echo e($language->id); ?>">
                                <?php echo e($language->name . __(' Language')); ?>

                                <?php echo e($language->is_default == 1 ? '(Default)' : ''); ?>

                              </button>
                            </h5>
                          </div>

                          <?php
                            $vendor_info = App\Models\VendorInfo::where('vendor_id', $vendor->id)
                                ->where('language_id', $language->id)
                                ->first();
                          ?>
                          
                          <div id="collapse<?php echo e($language->id); ?>"
                            class="collapse <?php echo e($language->is_default == 1 ? 'show' : ''); ?>"
                            aria-labelledby="heading<?php echo e($language->id); ?>" data-parent="#accordion">
                            <div class="version-body <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                              <div class="row">
                                <div class="col-lg-8">
                                  <div class="form-group">
                                    <label><?php echo e(__('Name*')); ?></label>
                                    <input type="text" value="<?php echo e(!empty($vendor_info) ? $vendor_info->name : ''); ?>"
                                      class="form-control" name="<?php echo e($language->code); ?>_name" placeholder="Enter Name">
                                    <p id="editErr_<?php echo e($language->code); ?>_name" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>

                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label><?php echo e(__('Country')); ?></label>
                                    <input type="text"
                                      value="<?php echo e(!empty($vendor_info) ? $vendor_info->country : ''); ?>"
                                      class="form-control" name="<?php echo e($language->code); ?>_country"
                                      placeholder="Enter Country">
                                    <p id="editErr_<?php echo e($language->code); ?>_country" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label><?php echo e(__('City')); ?></label>
                                    <input type="text" value="<?php echo e(!empty($vendor_info) ? $vendor_info->city : ''); ?>"
                                      class="form-control" name="<?php echo e($language->code); ?>_city" placeholder="Enter City">
                                    <p id="editErr_<?php echo e($language->code); ?>_city" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label><?php echo e(__('State')); ?></label>
                                    <input type="text" value="<?php echo e(!empty($vendor_info) ? $vendor_info->state : ''); ?>"
                                      class="form-control" name="<?php echo e($language->code); ?>_state"
                                      placeholder="Enter State">
                                    <p id="editErr_<?php echo e($language->code); ?>_state" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label><?php echo e(__('Zip Code')); ?></label>
                                    <input type="text"
                                      value="<?php echo e(!empty($vendor_info) ? $vendor_info->zip_code : ''); ?>"
                                      class="form-control" name="<?php echo e($language->code); ?>_zip_code"
                                      placeholder="Enter Zip Code">
                                    <p id="editErr_<?php echo e($language->code); ?>_zip_code" class="mt-1 mb-0 text-danger em">
                                    </p>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label><?php echo e(__('Address')); ?></label>
                                    <textarea name="<?php echo e($language->code); ?>_address" class="form-control" placeholder="Enter Address"><?php echo e(!empty($vendor_info) ? $vendor_info->address : ''); ?></textarea>
                                    <p id="editErr_<?php echo e($language->code); ?>_email" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label><?php echo e(__('Details')); ?></label>
                                    <textarea name="<?php echo e($language->code); ?>_details" class="form-control" rows="5" placeholder="Enter Details"><?php echo e(!empty($vendor_info) ? $vendor_info->details : ''); ?></textarea>
                                    <p id="editErr_<?php echo e($language->code); ?>_details" class="mt-1 mb-0 text-danger em"></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="listingForm" class="btn btn-success">
                <?php echo e(__('Update')); ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-listing.js')); ?>"></script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/vendor/auth/edit-profile.blade.php ENDPATH**/ ?>