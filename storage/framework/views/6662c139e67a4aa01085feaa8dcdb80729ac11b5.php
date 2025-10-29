<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add Product')); ?></h4>
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
        <a href="#"><?php echo e(__('Shop Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Manage Products')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Products')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Add Product')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">
            <?php echo e(__('Add Product') . ' (' . __('Type') . ' - ' . ucfirst($productType) . ')'); ?>

          </div>
          <a class="btn btn-info btn-sm float-right d-inline-block"
            href="<?php echo e(route('admin.shop_management.select_product_type')); ?>">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="alert alert-danger pb-1 dis-none" id="productErrors">
                <ul></ul>
              </div>

              <div class="ml-2">
                <label for=""><strong><?php echo e(__('Slider Images') . '*'); ?></strong></label>
                <form id="slider-dropzone" enctype="multipart/form-data" class="dropzone mt-2 mb-0">
                  <?php echo csrf_field(); ?>
                  <div class="fallback"></div>
                </form>
                <p class="em text-danger mt-3 mb-0" id="err_slider_image"></p>
              </div>

              <form id="productForm" action="<?php echo e(route('admin.shop_management.store_product')); ?>"
                enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_type" value="<?php echo e($productType); ?>">

                <div id="slider-image-id"></div>

                <div class="form-group">
                  <label for=""><?php echo e(__('Featured Image') . '*'); ?></label>
                  <br>
                  <div class="thumb-preview">
                    <img src="<?php echo e(asset('assets/admin/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
                  </div>

                  <div class="mt-3">
                    <div role="button" class="btn btn-primary btn-sm upload-btn">
                      <?php echo e(__('Choose Image')); ?>

                      <input type="file" class="img-input" name="featured_image">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Status') . '*'); ?></label>
                      <select name="status" class="form-control">
                        <option selected disabled><?php echo e(__('Select a Status')); ?></option>
                        <option value="show"><?php echo e(__('Show')); ?></option>
                        <option value="hide"><?php echo e(__('Hide')); ?></option>
                      </select>
                    </div>
                  </div>

                  <?php if($productType == 'digital'): ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label><?php echo e(__('Input Type') . '*'); ?></label>
                        <select name="input_type" class="form-control">
                          <option selected disabled><?php echo e(__('Select a Type')); ?></option>
                          <option value="upload"><?php echo e(__('File Upload')); ?></option>
                          <option value="link"><?php echo e(__('File Download Link')); ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group d-none" id="file-input">
                        <label><?php echo e(__('File') . '*'); ?></label>
                        <br>
                        <input type="file" name="file">
                        <p class="text-warning mt-2 mb-0">
                          <small><?php echo e(__('Only .zip file is allowed.')); ?></small>
                        </p>
                      </div>

                      <div class="form-group d-none" id="link-input">
                        <label><?php echo e(__('Link') . '*'); ?></label>
                        <input type="url" class="form-control" name="link" placeholder="Enter Download Link">
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($productType == 'physical'): ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label><?php echo e(__('Stock') . '*'); ?></label>
                        <input type="number" class="form-control" name="stock" placeholder="Enter Product Stock">
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php $currencyText = $currencyInfo->base_currency_text; ?>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Current Price') . '* (' . $currencyText . ')'); ?></label>
                      <input type="number" step="0.01" class="form-control" name="current_price"
                        placeholder="Enter Product Current Price">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Previous Price') . ' (' . $currencyText . ')'); ?></label>
                      <input type="number" step="0.01" class="form-control" name="previous_price"
                        placeholder="Enter Product Previous Price">
                    </div>
                  </div>
                </div>

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
                            <?php echo e($language->name . __(' Language')); ?> <?php echo e($language->is_default == 1 ? '(Default)' : ''); ?>

                          </button>
                        </h5>
                      </div>

                      <div id="collapse<?php echo e($language->id); ?>"
                        class="collapse <?php echo e($language->is_default == 1 ? 'show' : ''); ?>"
                        aria-labelledby="heading<?php echo e($language->id); ?>" data-parent="#accordion">
                        <div class="version-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Title') . '*'); ?></label>
                                <input type="text" class="form-control" name="<?php echo e($language->code); ?>_title"
                                  placeholder="Enter Title">
                              </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <?php $categories = $language->categories; ?>

                                <label><?php echo e(__('Category') . '*'); ?></label>
                                <select name="<?php echo e($language->code); ?>_category_id" class="form-control">
                                  <option selected disabled><?php echo e(__('Select a Category')); ?></option>

                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Summary') . '*'); ?></label>
                                <textarea class="form-control" name="<?php echo e($language->code); ?>_summary" placeholder="Enter Summary" rows="4"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Content') . '*'); ?></label>
                                <textarea class="form-control summernote" name="<?php echo e($language->code); ?>_content" data-height="300"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Keywords')); ?></label>
                                <input class="form-control" name="<?php echo e($language->code); ?>_meta_keywords"
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
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="productForm" class="btn btn-success">
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
    const imgUpUrl = "<?php echo e(route('admin.shop_management.upload_slider_image')); ?>";
    const imgRmvUrl = "<?php echo e(route('admin.shop_management.remove_slider_image')); ?>";
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/slider-image.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/shop/product/create.blade.php ENDPATH**/ ?>