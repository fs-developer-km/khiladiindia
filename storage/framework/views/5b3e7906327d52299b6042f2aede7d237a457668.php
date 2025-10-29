<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Edit Product')); ?></h4>
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
        <a href="#"><?php echo e(__('Edit Product')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">
            <?php echo e(__('Edit Product') . ' (' . __('Type') . ' - ' . ucfirst($productType) . ')'); ?>

          </div>
          <a class="btn btn-info btn-sm float-right d-inline-block"
            href="<?php echo e(route('admin.shop_management.products', ['language' => $defaultLang->code])); ?>">
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

                <?php $sliderImages = json_decode($product->slider_images); ?>

                <?php if(count($sliderImages) > 0): ?>
                  <div id="reload-slider-div">
                    <div class="row mt-2">
                      <div class="col">
                        <table class="table" id="img-table">
                          <?php $__currentLoopData = $sliderImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sliderImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-row" id="<?php echo e('slider-image-' . $key); ?>">
                              <td>
                                <img class="thumb-preview wf-150"
                                  src="<?php echo e(asset('assets/img/products/slider-images/' . $sliderImage)); ?>"
                                  alt="slider image">
                              </td>
                              <td>
                                <i class="fa fa-times-circle"
                                  onclick="rmvStoredImg(<?php echo e($product->id); ?>, <?php echo e($key); ?>)"></i>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <form id="slider-dropzone" enctype="multipart/form-data" class="dropzone mt-2 mb-0">
                  <?php echo csrf_field(); ?>
                  <div class="fallback"></div>
                </form>
                <p class="em text-danger mt-3 mb-0" id="err_slider_image"></p>
              </div>

              <form id="productForm" action="<?php echo e(route('admin.shop_management.update_product', ['id' => $product->id])); ?>"
                enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_type" value="<?php echo e($productType); ?>">

                <div id="slider-image-id"></div>

                <div class="form-group">
                  <label for=""><?php echo e(__('Featured Image') . '*'); ?></label>
                  <br>
                  <div class="thumb-preview">
                    <img src="<?php echo e(asset('assets/img/products/featured-images/' . $product->featured_image)); ?>"
                      alt="image" class="uploaded-img">
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
                        <option disabled><?php echo e(__('Select a Status')); ?></option>
                        <option value="show" <?php echo e($product->status == 'show' ? 'selected' : ''); ?>>
                          <?php echo e(__('Show')); ?>

                        </option>
                        <option value="hide" <?php echo e($product->status == 'hide' ? 'selected' : ''); ?>>
                          <?php echo e(__('Hide')); ?>

                        </option>
                      </select>
                    </div>
                  </div>

                  <?php if($productType == 'digital'): ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label><?php echo e(__('Input Type') . '*'); ?></label>
                        <select name="input_type" class="form-control">
                          <option disabled><?php echo e(__('Select a Type')); ?></option>
                          <option value="upload" <?php echo e($product->input_type == 'upload' ? 'selected' : ''); ?>>
                            <?php echo e(__('File Upload')); ?>

                          </option>
                          <option value="link" <?php echo e($product->input_type == 'link' ? 'selected' : ''); ?>>
                            <?php echo e(__('File Download Link')); ?>

                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group <?php echo e($product->input_type == 'upload' ? '' : 'd-none'); ?>" id="file-input">
                        <label><?php echo e(__('File') . '*'); ?></label>
                        <br>
                        <input type="file" name="file">
                        <p class="text-warning mt-2 mb-0">
                          <small><?php echo e(__('Only .zip file is allowed.')); ?></small>
                        </p>
                        <?php if($product->file): ?>
                          <a href="<?php echo e(asset('assets/file/products/' . $product->file)); ?>"
                            download><?php echo e(__('Download File')); ?></a>
                        <?php endif; ?>
                      </div>
                      <div class="form-group <?php echo e($product->input_type == 'link' ? '' : 'd-none'); ?>" id="link-input">
                        <label><?php echo e(__('Link') . '*'); ?></label>
                        <input type="url" class="form-control" name="link" placeholder="Enter Download Link"
                          value="<?php echo e($product->link); ?>">
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($productType == 'physical'): ?>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label><?php echo e(__('Stock') . '*'); ?></label>
                        <input type="number" class="form-control" name="stock" placeholder="Enter Product Stock"
                          value="<?php echo e($product->stock); ?>">
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php $currencyText = $currencyInfo->base_currency_text; ?>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Current Price') . '* (' . $currencyText . ')'); ?></label>
                      <input type="number" step="0.01" class="form-control" name="current_price"
                        placeholder="Enter Product Current Price" value="<?php echo e($product->current_price); ?>">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Previous Price') . ' (' . $currencyText . ')'); ?></label>
                      <input type="number" step="0.01" class="form-control" name="previous_price"
                        placeholder="Enter Product Previous Price" value="<?php echo e($product->previous_price); ?>">
                    </div>
                  </div>
                </div>

                <div id="accordion" class="mt-5">
                  <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $productData = $language->productData; ?>

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
                                  placeholder="Enter Title"
                                  value="<?php echo e(is_null($productData) ? '' : $productData->title); ?>">
                              </div>
                            </div>
                            <?php $categories = $language->categories; ?>
                            <div class="col-lg-6">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Category') . '*'); ?></label>
                                <select name="<?php echo e($language->code); ?>_category_id" class="form-control">
                                  <option disabled><?php echo e(__('Select a Category')); ?></option>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                      <?php echo e($category->id == @$productData->product_category_id ? 'selected' : ''); ?>>
                                      <?php echo e($category->name); ?>

                                    </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Summary') . '*'); ?></label>
                                <textarea class="form-control" name="<?php echo e($language->code); ?>_summary" placeholder="Enter Summary" rows="4"><?php echo e(is_null($productData) ? '' : $productData->summary); ?></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Content') . '*'); ?></label>
                                <textarea class="form-control summernote" name="<?php echo e($language->code); ?>_content" data-height="300"><?php echo e(is_null($productData) ? '' : replaceBaseUrl($productData->content, 'summernote')); ?></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Keywords')); ?></label>
                                <input class="form-control" name="<?php echo e($language->code); ?>_meta_keywords"
                                  placeholder="Enter Meta Keywords" data-role="tagsinput"
                                  value="<?php echo e(is_null($productData) ? '' : $productData->meta_keywords); ?>">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>">
                                <label><?php echo e(__('Meta Description')); ?></label>
                                <textarea class="form-control" name="<?php echo e($language->code); ?>_meta_description" rows="5"
                                  placeholder="Enter Meta Description"><?php echo e(is_null($productData) ? '' : $productData->meta_description); ?></textarea>
                              </div>
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
  <script>
    'use strict';
    const imgUpUrl = "<?php echo e(route('admin.shop_management.upload_slider_image')); ?>";
    const imgRmvUrl = "<?php echo e(route('admin.shop_management.remove_slider_image')); ?>";
    const imgDetachUrl = "<?php echo e(route('admin.shop_management.detach_slider_image')); ?>";
  </script>

  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/slider-image.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/shop/product/edit.blade.php ENDPATH**/ ?>