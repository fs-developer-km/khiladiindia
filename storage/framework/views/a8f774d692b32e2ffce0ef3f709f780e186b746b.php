<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('General Settings')); ?></h4>
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
        <a href="#"><?php echo e(__('Basic Settings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('General Settings')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="<?php echo e(route('admin.basic_settings.general_settings.update')); ?>" method="post"
          enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title"><?php echo e(__('Update General Settings')); ?></div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <h2 class="mt-3 text-warning"><?php echo e(__('Information')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo e(__('Website Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="website_title"
                        value="<?php echo e($data->website_title != null ? $data->website_title : ''); ?>"
                        placeholder="Enter Website Title">
                      <?php if($errors->has('website_title')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('website_title')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Favicon') . '*'); ?></label>
                      <br>
                      <div class="thumb-preview">
                        <?php if(!empty($data->favicon)): ?>
                          <img src="<?php echo e(asset('assets/img/' . $data->favicon)); ?>" alt="favicon" class="uploaded-img">
                        <?php else: ?>
                          <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
                        <?php endif; ?>
                      </div>

                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Image')); ?>

                          <input type="file" class="img-input" name="favicon">
                        </div>
                      </div>
                      <?php if($errors->has('favicon')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('favicon')); ?></p>
                      <?php endif; ?>
                      <p class="text-warning mt-2 mb-0">
                        <?php echo e(__('Upload 40X40 pixel size image or squre size image for best quality.')); ?></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Website Logo') . '*'); ?></label>
                      <br>
                      <div class="thumb-preview">
                        <?php if(!empty($data->logo)): ?>
                          <img src="<?php echo e(asset('assets/img/' . $data->logo)); ?>" alt="logo" class="uploaded-img2">
                        <?php else: ?>
                          <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img2">
                        <?php endif; ?>
                      </div>

                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Image')); ?>

                          <input type="file" class="img-input2" name="logo">
                        </div>
                      </div>
                      <?php if($errors->has('logo')): ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('logo')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-10 mx-auto">
                <h2 class="mt-3"><?php echo e(__('Preloader')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Status')); ?></label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="preloader_status" value="1" class="selectgroup-input"
                            <?php echo e($data->preloader_status == 1 ? 'checked' : ''); ?>>
                          <span class="selectgroup-button"><?php echo e(__('Active')); ?></span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="preloader_status" value="0" class="selectgroup-input"
                            <?php echo e($data->preloader_status == 0 ? 'checked' : ''); ?>>
                          <span class="selectgroup-button"><?php echo e(__('Deactive')); ?></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Preloader') . ' *'); ?></label>
                      <br>
                      <div class="thumb-preview" id="thumbPreview1">
                        <?php if(!empty($data->preloader)): ?>
                          <img src="<?php echo e(asset('assets/img/' . $data->preloader)); ?>" alt="Preloader"
                            class="preloader-uploaded-img">
                        <?php else: ?>
                          <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..."
                            class="preloader-uploaded-img">
                        <?php endif; ?>
                      </div>
                      <br>
                      <br>


                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Image')); ?>

                          <input type="file" class="preloader-input" name="preloader">
                        </div>
                      </div>


                      <p class="text-warning mb-0"><?php echo e(__('JPG, PNG, JPEG, GIF, SVG images are allowed')); ?></p>
                      <?php if($errors->has('preloader')): ?>
                        <p class="text-danger mb-0"><?php echo e($errors->first('preloader')); ?></p>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-10 mx-auto">
                <h2 class="mt-3 text-warning"><?php echo e(__('Set Timezone')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label><?php echo e(__('Timezone') . '*'); ?></label>
                      <select name="timezone" id="" class="form-control select2">
                        <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option <?php echo e($item->timezone == $data->timezone ? 'selected' : ''); ?>

                            value="<?php echo e($item->timezone); ?>">
                            <?php echo e($item->timezone); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <?php if($errors->has('timezone')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('timezone')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-10 mx-auto">
                <h2 class="mt-3 text-warning"><?php echo e(__('Currency')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Base Currency Symbol') . '*'); ?></label>
                      <input type="text" class="form-control ltr" name="base_currency_symbol"
                        value="<?php echo e($data->base_currency_symbol); ?>">
                      <?php if($errors->has('base_currency_symbol')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('base_currency_symbol')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Base Currency Symbol Position') . '*'); ?></label>
                      <select name="base_currency_symbol_position" class="form-control ltr">
                        <option selected disabled><?php echo e(__('Select')); ?></option>
                        <option value="left" <?php echo e($data->base_currency_symbol_position == 'left' ? 'selected' : ''); ?>>
                          <?php echo e(__('Left')); ?></option>
                        <option value="right" <?php echo e($data->base_currency_symbol_position == 'right' ? 'selected' : ''); ?>>
                          <?php echo e(__('Right')); ?></option>
                      </select>
                      <?php if($errors->has('base_currency_symbol_position')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('base_currency_symbol_position')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Base Currency Text') . '*'); ?></label>
                      <input type="text" class="form-control ltr" name="base_currency_text"
                        value="<?php echo e($data->base_currency_text); ?>">
                      <?php if($errors->has('base_currency_text')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('base_currency_text')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label><?php echo e(__('Base Currency Text Position') . '*'); ?></label>
                      <select name="base_currency_text_position" class="form-control ltr">
                        <option selected disabled><?php echo e(__('Select')); ?></option>
                        <option value="left" <?php echo e($data->base_currency_text_position == 'left' ? 'selected' : ''); ?>>
                          <?php echo e(__('Left')); ?></option>
                        <option value="right" <?php echo e($data->base_currency_text_position == 'right' ? 'selected' : ''); ?>>
                          <?php echo e(__('Right')); ?></option>
                      </select>
                      <?php if($errors->has('base_currency_text_position')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('base_currency_text_position')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label><?php echo e(__('Base Currency Rate') . '*'); ?></label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><?php echo e(__('1 USD =')); ?></span>
                        </div>
                        <input type="text" name="base_currency_rate" class="form-control ltr"
                          value="<?php echo e($data->base_currency_rate); ?>">
                        <div class="input-group-append">
                          <span class="input-group-text"><?php echo e($data->base_currency_text); ?></span>
                        </div>
                      </div>
                      <?php if($errors->has('base_currency_rate')): ?>
                        <p class="mb-0 text-danger"><?php echo e($errors->first('base_currency_rate')); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-10 mx-auto">
                <h2 class="mt-3 text-warning"><?php echo e(__('Website Appearance')); ?></h2>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><?php echo e(__('Primary Color') . '*'); ?></label>
                          <input class="jscolor form-control ltr" name="primary_color"
                            value="<?php echo e($data->primary_color); ?>">
                          <?php if($errors->has('primary_color')): ?>
                            <p class="mt-2 mb-0 text-danger"><?php echo e($errors->first('primary_color')); ?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">
                  <?php echo e(__('Update')); ?>

                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/basic-settings/general-settings.blade.php ENDPATH**/ ?>