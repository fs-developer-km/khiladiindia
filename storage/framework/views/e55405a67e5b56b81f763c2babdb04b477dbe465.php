<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add User')); ?></h4>
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
        <a href="#"><?php echo e(__('Users Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Add User')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title"><?php echo e(__('Add User')); ?></div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <form id="ajaxEditForm" action="<?php echo e(route('admin.user_management.registered_user.store')); ?>" method="post"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Photo') . '*'); ?></label>
                      <br>
                      <div class="thumb-preview">
                        <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">

                      </div>

                      <div class="mt-3">
                        <div role="button" class="btn btn-primary btn-sm upload-btn">
                          <?php echo e(__('Choose Photo')); ?>

                          <input type="file" class="img-input" name="image">
                        </div>
                        <p id="editErr_image" class="mt-1 mb-0 text-danger em"></p>
                        <p class="mt-2 mb-0 text-warning"><?php echo e(__('Image Size 80x80')); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Name*')); ?></label>
                      <input type="text" class="form-control" name="name">
                      <p id="editErr_name" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Username*')); ?></label>
                      <input type="text" class="form-control" name="username">
                      <p id="editErr_username" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Email*')); ?></label>
                      <input type="text" class="form-control" name="email">
                      <p id="editErr_email" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Phone')); ?></label>
                      <input type="text" class="form-control" name="phone">
                      <p id="editErr_phone" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Country')); ?></label>
                      <input type="text" class="form-control" name="country">
                      <p id="editErr_country" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('City')); ?></label>
                      <input type="text" class="form-control" name="city">
                      <p id="editErr_city" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('State')); ?></label>
                      <input type="text" class="form-control" name="state">
                      <p id="editErr_state" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Zip Code')); ?></label>
                      <input type="text" class="form-control" name="zip_code">
                      <p id="editErr_zip_code" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Address')); ?></label>
                      <input type="text" class="form-control" name="address">
                      <p id="editErr_address" class="mt-1 mb-0 text-danger em"></p>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label><?php echo e(__('Password*')); ?></label>
                      <input type="password" class="form-control" name="password">
                      <p id="editErr_password" class="mt-1 mb-0 text-danger em"></p>
                      <p class="text-warning"> <?php echo e(__('The password must be at least 6 characters.')); ?></p>
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
              <button type="submit" id="updateBtn" class="btn btn-success">
                <?php echo e(__('Save')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/end-user/user/create.blade.php ENDPATH**/ ?>