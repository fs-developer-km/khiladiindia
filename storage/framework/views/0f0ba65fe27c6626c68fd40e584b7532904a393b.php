<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Page Headings')); ?></h4>
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
        <a href="#"><?php echo e(__('Page Headings')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form
          action="<?php echo e(route('admin.basic_settings.update_page_headings', ['language' => request()->input('language')])); ?>"
          method="post">
          <?php echo csrf_field(); ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-10">
                <div class="card-title"><?php echo e(__('Update Page Headings')); ?></div>
              </div>
              <div class="col-lg-2">
                <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Listing Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="listing_page_title"
                        value="<?php echo e($data != null ? $data->listing_page_title : ''); ?>">
                      <?php $__errorArgs = ['listing_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Vendors Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="vendor_page_title"
                        value="<?php echo e($data != null ? $data->vendor_page_title : ''); ?>">
                      <?php $__errorArgs = ['vendor_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Products Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="products_page_title"
                        value="<?php echo e($data != null ? $data->products_page_title : ''); ?>">
                      <?php $__errorArgs = ['products_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Cart Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="cart_page_title"
                        value="<?php echo e($data != null ? $data->cart_page_title : ''); ?>">
                      <?php $__errorArgs = ['cart_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Checkout Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="checkout_page_title"
                        value="<?php echo e($data != null ? $data->checkout_page_title : ''); ?>">
                      <?php $__errorArgs = ['checkout_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('User Login Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="login_page_title"
                        value="<?php echo e($data != null ? $data->login_page_title : ''); ?>">
                      <?php $__errorArgs = ['login_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('User Signup Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="signup_page_title"
                        value="<?php echo e($data != null ? $data->signup_page_title : ''); ?>">
                      <?php $__errorArgs = ['signup_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('User Forget Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="forget_password_page_title"
                        value="<?php echo e($data != null ? $data->forget_password_page_title : ''); ?>">
                      <?php $__errorArgs = ['forget_password_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Vendor Login Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="vendor_login_page_title"
                        value="<?php echo e($data != null ? $data->vendor_login_page_title : ''); ?>">
                      <?php $__errorArgs = ['vendor_login_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Vendor Signup Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="vendor_signup_page_title"
                        value="<?php echo e($data != null ? $data->vendor_signup_page_title : ''); ?>">
                      <?php $__errorArgs = ['vendor_signup_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Vendor Forget Password Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="vendor_forget_password_page_title"
                        value="<?php echo e($data != null ? $data->vendor_forget_password_page_title : ''); ?>">
                      <?php $__errorArgs = ['vendor_forget_password_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('404 Error Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="error_page_title"
                        value="<?php echo e($data != null ? $data->error_page_title : ''); ?>">
                      <?php $__errorArgs = ['error_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('About Us Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="about_us_title"
                        value="<?php echo e($data != null ? $data->about_us_title : ''); ?>">
                      <?php $__errorArgs = ['about_us_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Blog Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="blog_page_title"
                        value="<?php echo e($data != null ? $data->blog_page_title : ''); ?>">
                      <?php $__errorArgs = ['blog_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('FAQ Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="faq_page_title"
                        value="<?php echo e($data != null ? $data->faq_page_title : ''); ?>">
                      <?php $__errorArgs = ['faq_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Contact Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="contact_page_title"
                        value="<?php echo e($data != null ? $data->contact_page_title : ''); ?>">
                      <?php $__errorArgs = ['contact_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Wishlist Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="wishlist_page_title"
                        value="<?php echo e($data != null ? $data->wishlist_page_title : ''); ?>">
                      <?php $__errorArgs = ['wishlist_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Dashboard Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="dashboard_page_title"
                        value="<?php echo e($data != null ? $data->dashboard_page_title : ''); ?>">
                      <?php $__errorArgs = ['dashboard_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Orders Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="orders_page_title"
                        value="<?php echo e($data != null ? $data->orders_page_title : ''); ?>">
                      <?php $__errorArgs = ['orders_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Support Ticket Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="support_ticket_page_title"
                        value="<?php echo e($data != null ? $data->support_ticket_page_title : ''); ?>">
                      <?php $__errorArgs = ['support_ticket_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Support Ticket Create Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="support_ticket_create_page_title"
                        value="<?php echo e($data != null ? $data->support_ticket_create_page_title : ''); ?>">
                      <?php $__errorArgs = ['support_ticket_create_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Change Password Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="change_password_page_title"
                        value="<?php echo e($data != null ? $data->change_password_page_title : ''); ?>">
                      <?php $__errorArgs = ['change_password_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Edit Profile Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="edit_profile_page_title"
                        value="<?php echo e($data != null ? $data->edit_profile_page_title : ''); ?>">
                      <?php $__errorArgs = ['edit_profile_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?php echo e(__('Pricing Page Title') . '*'); ?></label>
                      <input type="text" class="form-control" name="pricing_page_title"
                        value="<?php echo e($data != null ? $data->pricing_page_title : ''); ?>">
                      <?php $__errorArgs = ['pricing_page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 mb-0 text-danger"><?php echo e($message); ?></p>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/basic-settings/page-headings.blade.php ENDPATH**/ ?>