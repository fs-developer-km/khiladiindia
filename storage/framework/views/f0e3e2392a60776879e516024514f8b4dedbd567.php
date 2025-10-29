<?php
  use App\Models\Language;
  $selLang = Language::where('code', request()->input('language'))->first();
?>
<?php if(!empty($selLang->language) && $selLang->language->rtl == 1): ?>
  <?php $__env->startSection('styles'); ?>
    <style>
      form input,
      form textarea,
      form select {
        direction: rtl;
      }

      form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
      }
    </style>
  <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Edit package')); ?></h4>
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
        <a href="#"><?php echo e(__('Package Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Edit Package')); ?></a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Edit package')); ?></div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="<?php echo e(route('admin.package.index')); ?>">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
        </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="ajaxForm" class="" action="<?php echo e(route('admin.package.update')); ?>" method="post"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
                <div class="form-group">
                  <label for="title"><?php echo e(__('Package title')); ?>*</label>
                  <input id="title" type="text" class="form-control" name="title" value="<?php echo e($package->title); ?>"
                    placeholder="<?php echo e(__('Enter name')); ?>">
                  <p id="err_title" class="mt-2 mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label for="price"><?php echo e(__('Price')); ?> (<?php echo e($settings->base_currency_text); ?>)*</label>
                  <input id="price" type="number" class="form-control" name="price"
                    placeholder="<?php echo e(__('Enter Package price')); ?>" value="<?php echo e($package->price); ?>">
                  <p class="text-warning">
                    <small><?php echo e(__('If price is 0 , than it will appear as free')); ?></small>
                  </p>
                  <p id="err_price" class="mt-2 mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label for=""><?php echo e(__('Icon') . '*'); ?></label>
                  <div class="btn-group d-block">
                    <button type="button" class="btn btn-primary iconpicker-component">
                      <i class="<?php echo e($package->icon); ?>"></i>
                    </button>
                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car"
                      data-toggle="dropdown"></button>
                    <div class="dropdown-menu"></div>
                  </div>
                  <input type="hidden" id="inputIcon" name="icon">
                </div>

                <div class="form-group">
                  <label for="plan_term"><?php echo e(__('Package term')); ?>*</label>
                  <select id="plan_term" name="term" class="form-control">
                    <option value="" selected disabled><?php echo e(__('Select a Term')); ?></option>
                    <option value="monthly" <?php echo e($package->term == 'monthly' ? 'selected' : ''); ?>>
                      <?php echo e(__('Monthly')); ?></option>
                    <option value="yearly" <?php echo e($package->term == 'yearly' ? 'selected' : ''); ?>>
                      <?php echo e(__('Yearly')); ?></option>
                    <option value="lifetime" <?php echo e($package->term == 'lifetime' ? 'selected' : ''); ?>>
                      <?php echo e('Lifetime'); ?></option>
                  </select>
                  <p id="err_term" class="mb-0 text-danger em"></p>
                </div>


                <?php
                  $permissions = $package->features;
                  if (!empty($package->features)) {
                      $permissions = json_decode($permissions, true);
                  }
                ?>

                <div class="form-group">
                  <label class="form-label"><?php echo e(__('Package Features')); ?></label>
                  <div class="selectgroup selectgroup-pills">

                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Listing Enquiry Form"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Listing Enquiry Form', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Listing Enquiry Form')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Video"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Video', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Video')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Amenities"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Amenities')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Feature" class="selectgroup-input"
                        <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Features')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Social Links"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Social Links')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="FAQ"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('FAQ')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Business Hours"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Business Hours', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Business Hours')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Products"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Products', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Products')); ?></span>
                    </label>
                    <label class="selectgroup-item <?php if(is_array($permissions) && in_array('Products', $permissions)): ?> <?php else: ?> d-none <?php endif; ?>"
                      id="productEnquiryFormLabel">
                      <input type="checkbox" name="features[]" value="Product Enquiry Form"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Product Enquiry Form', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Product Enquiry Form')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Messenger"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Messenger', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Messenger')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="WhatsApp"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('WhatsApp', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('WhatsApp')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Telegram"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Telegram', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Telegram')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="checkbox" name="features[]" value="Tawk.To"
                        class="selectgroup-input"<?php if(is_array($permissions) && in_array('Tawk.To', $permissions)): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Tawk.To')); ?></span>
                    </label>
                  </div>
                  <p id="err_features" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label class="form-label"><?php echo e(__('Number of Listings')); ?> *</label>
                  <input type="number" class="form-control" name="number_of_listing"
                    placeholder="<?php echo e(__('Enter Number of Listings')); ?>"value="<?php echo e($package->number_of_listing); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_listing" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label class="form-label"><?php echo e(__('Number of images per Listing')); ?> *</label>
                  <input type="number" class="form-control" name="number_of_images_per_listing"
                    placeholder="<?php echo e(__('Enter Number of images per Listing')); ?>"value="<?php echo e($package->number_of_images_per_listing); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_images_per_listing" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group  <?php if(is_array($permissions) && in_array('Amenities', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> amenities-box">
                  <label for=""><?php echo e(__('Number of Amenities per Listing')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_amenities_per_listing"
                    placeholder="<?php echo e(__('Enter Number of Amenities per Listing')); ?>"
                    value="<?php echo e($package->number_of_amenities_per_listing); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_amenities_per_listing" class="mb-0 text-danger em"></p>
                </div>

                <div
                  class="form-group <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> additional-specification-box">
                  <label for=""><?php echo e(__('Number of Features per Listing')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_additional_specification"
                    value="<?php echo e($package->number_of_additional_specification); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_additional_specification" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> social-links-box">
                  <label for=""><?php echo e(__('Number of Social Links per Listing')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_social_links"
                    value="<?php echo e($package->number_of_social_links); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_social_links" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> FAQ-box">
                  <label for=""><?php echo e(__('Number of FAQs per Listing')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_faq"
                    value="<?php echo e($package->number_of_faq); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_faq" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group <?php if(is_array($permissions) && in_array('Products', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> Products-box">
                  <label for=""><?php echo e(__('Number of Products per Listing')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_products"
                    value="<?php echo e($package->number_of_products); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_products" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group <?php if(is_array($permissions) && in_array('Products', $permissions)): ?> <?php else: ?> d-none <?php endif; ?> image-product-box">
                  <label for=""><?php echo e(__('Number of Images per Product ')); ?> * </label>
                  <input type="number" class="form-control" name="number_of_images_per_products"
                    value="<?php echo e($package->number_of_images_per_products); ?>">
                  <p class="text-warning"><?php echo e(__('Enter 999999 , then it will appear as unlimited')); ?></p>
                  <p id="err_number_of_images_per_products" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="status"><?php echo e(__('Status')); ?>*</label>
                  <select id="status" class="form-control ltr" name="status">
                    <option value="" selected disabled><?php echo e(__('Select a status')); ?></option>
                    <option value="1" <?php echo e($package->status == '1' ? 'selected' : ''); ?>>
                      <?php echo e(__('Active')); ?></option>
                    <option value="0" <?php echo e($package->status == '0' ? 'selected' : ''); ?>>
                      <?php echo e(__('Deactive')); ?></option>
                  </select>
                  <p id="err_status" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label class="form-label"><?php echo e(__('Popular')); ?> </label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="recommended" value="1"
                        class="selectgroup-input"<?php if($package->recommended == '1'): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('Yes')); ?></span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="recommended" value="0" class="selectgroup-input"
                        <?php if($package->recommended == '0'): ?> checked <?php endif; ?>>
                      <span class="selectgroup-button"><?php echo e(__('No')); ?></span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label><?php echo e(__('Custom Features')); ?></label>
                  <textarea class="form-control" name="custom_features" rows="5" placeholder="Enter Custom Features"><?php echo e($package->custom_features); ?></textarea>
                  <p class="text-warning">
                    <small><?php echo e(__('Enter new line to seperate features')); ?></small>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success"><?php echo e(__('Update')); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/admin/js/packages-edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/packages/edit.blade.php ENDPATH**/ ?>