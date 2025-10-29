<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Edit Profile')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->edit_profile_page_title : __('Edit Profile'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->edit_profile_page_title : __('Edit Profile'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60" style="background-color: #0c0b2d;">
    <div class="container">
      <div class="row gx-xl-5">
        <?php if ($__env->exists('frontend.user.side-navbar')) echo $__env->make('frontend.user.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
          <div class="user-profile-details mb-40">
            <div class="account-info radius-md">
              <div class="title">
                <h4><?php echo e(__('Edit Profile')); ?></h4>
              </div>
              <div class="edit-info-area">
                <?php if(Session::has('success')): ?>
                  <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('user.update_profile')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="upload-img">
                    <div class="file-upload-area">
                      <div class="file-edit">
                        <input type='file' id="imageUpload" name="image" />
                        <label for="imageUpload"></label>
                      </div>
                      <div class="file-preview">
                        <?php if(Auth::guard('web')->user()->image != null): ?>
                          <div id="imagePreview">
                            <img class="lazyload bg-img"
                              src="<?php echo e(asset('assets/img/users/' . Auth::guard('web')->user()->image)); ?>" alt="Bg-img">
                          </div>
                        <?php else: ?>
                          <div id="imagePreview">
                            <img class="lazyload bg-img" src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="Bg-img">
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <p class="mt-2 mb-0 text-warning"><?php echo e(__('Image Size')); ?> 80x80</p>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div id="errorMsg"></div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Name') . ' *'); ?></label>
                    <input type="text" class="form-control"
                      value="<?php echo e(old('name') ? old('name') : Auth::guard('web')->user()->name); ?>"
                      placeholder="<?php echo e(__('Name')); ?>" name="name">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Username') . ' *'); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Username')); ?>" name="username"
                      value="<?php echo e(old('username') ? old('username') : Auth::guard('web')->user()->username); ?>">
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Email') . ' *'); ?></label>
                    <input type="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>" name="email"
                      value="<?php echo e(Auth::guard('web')->user()->email); ?>" readonly>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Phone')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Phone')); ?>" name="phone"
                      value="<?php echo e(old('phone') ? old('phone') : Auth::guard('web')->user()->phone); ?>">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Country')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Country')); ?>" name="country"
                      value="<?php echo e(old('country') ? old('country') : Auth::guard('web')->user()->country); ?>">
                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('City')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('City')); ?>" name="city"
                      value="<?php echo e(old('city') ? old('city') : Auth::guard('web')->user()->city); ?>">
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('State')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('State')); ?>" name="state"
                      value="<?php echo e(old('state') ? old('state') : Auth::guard('web')->user()->state); ?>">
                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Zip Code')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Zip Code')); ?>" name="zip_code"
                      value="<?php echo e(old('zip_code') ? old('zip_code') : Auth::guard('web')->user()->zip_code); ?>">
                    <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group mb-30">
                    <label for="" class="mb-1"><?php echo e(__('Address')); ?></label>
                    <textarea name="address" id="" class="form-control" rows="3" placeholder="<?php echo e(__('Address')); ?>"><?php echo e(old('address') ? old('address') : Auth::guard('web')->user()->address); ?></textarea>
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="text-danger mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

                <div class="col-lg-12 mb-15">
                  <div class="form-button">
                    <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Update Profile')); ?></button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--====== End Dashboard Section ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/edit-profile.blade.php ENDPATH**/ ?>