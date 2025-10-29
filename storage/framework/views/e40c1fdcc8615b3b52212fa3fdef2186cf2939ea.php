<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Section Show') . '/' . __('Hide')); ?></h4>
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
        <a href="#"><?php echo e(__('Home Page')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Section Show') . '/' . __('Hide')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form action="<?php echo e(route('admin.home_page.update_section_status')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="card-title d-inline-block"><?php echo e(__('Customize Sections')); ?></div>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">

                <div class="form-group">
                  <label><?php echo e(__('Category Section Status')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="category_section_status" value="1" class="selectgroup-input"
                        <?php echo e($sectionInfo->category_section_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="category_section_status" value="0" class="selectgroup-input"
                        <?php echo e($sectionInfo->category_section_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                    </label>
                  </div>
                  <?php $__errorArgs = ['category_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label><?php echo e(__('Featured Listing Section Status')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="featured_listing_section_status" value="1"
                        class="selectgroup-input"
                        <?php echo e($sectionInfo->featured_listing_section_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="featured_listing_section_status" value="0"
                        class="selectgroup-input"
                        <?php echo e($sectionInfo->featured_listing_section_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                    </label>
                  </div>
                  <?php $__errorArgs = ['featured_listing_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <?php if($themeVersion == 2): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Latest Listing Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="latest_listing_section_status" value="1"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->latest_listing_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="latest_listing_section_status" value="0"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->latest_listing_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['latest_listing_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>

                <div class="form-group">
                  <label><?php echo e(__('Package Section Status')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="package_section_status" value="1" class="selectgroup-input"
                        <?php echo e($sectionInfo->package_section_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="package_section_status" value="0" class="selectgroup-input"
                        <?php echo e($sectionInfo->package_section_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                    </label>
                  </div>
                  <?php $__errorArgs = ['package_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <?php if($themeVersion == 1 || $themeVersion == 3): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Counter Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="counter_section_status" value="1" class="selectgroup-input"
                          <?php echo e($sectionInfo->counter_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="counter_section_status" value="0" class="selectgroup-input"
                          <?php echo e($sectionInfo->counter_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['counter_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>

                <?php if($themeVersion == 3 || $themeVersion == 2): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Location Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="location_section_status" value="1" class="selectgroup-input"
                          <?php echo e($sectionInfo->location_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="location_section_status" value="0" class="selectgroup-input"
                          <?php echo e($sectionInfo->location_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['location_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php endif; ?>

                <?php if($themeVersion == 1 || $themeVersion == 4): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Work Process Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="work_process_section_status" value="1"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->work_process_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="work_process_section_status" value="0"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->work_process_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['work_process_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>

                <?php if($themeVersion == 2 || $themeVersion == 4): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Video Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="video_section" value="1" class="selectgroup-input"
                          <?php echo e($sectionInfo->video_section == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="video_section" value="0" class="selectgroup-input"
                          <?php echo e($sectionInfo->video_section == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['video_section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>
                <?php if($themeVersion == 2 || $themeVersion == 3): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Testimonial Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="testimonial_section_status" value="1"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->testimonial_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="testimonial_section_status" value="0"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->testimonial_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['testimonial_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>

                <?php if($themeVersion == 1 || $themeVersion == 4): ?>
                  <div class="form-group">
                    <label><?php echo e(__('Call To Action Section Status')); ?></label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="call_to_action_section_status" value="1"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->call_to_action_section_status == 1 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                      </label>

                      <label class="selectgroup-item">
                        <input type="radio" name="call_to_action_section_status" value="0"
                          class="selectgroup-input"
                          <?php echo e($sectionInfo->call_to_action_section_status == 0 ? 'checked' : ''); ?>>
                        <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                      </label>
                    </div>
                    <?php $__errorArgs = ['call_to_action_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <label><?php echo e(__('Blog Section Status')); ?></label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="blog_section_status" value="1" class="selectgroup-input"
                        <?php echo e($sectionInfo->blog_section_status == 1 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Enable')); ?></span>
                    </label>

                    <label class="selectgroup-item">
                      <input type="radio" name="blog_section_status" value="0" class="selectgroup-input"
                        <?php echo e($sectionInfo->blog_section_status == 0 ? 'checked' : ''); ?>>
                      <span class="selectgroup-button"><?php echo e(__('Disable')); ?></span>
                    </label>
                  </div>
                  <?php $__errorArgs = ['blog_section_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mb-0 text-danger"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/home-page/section-customization.blade.php ENDPATH**/ ?>