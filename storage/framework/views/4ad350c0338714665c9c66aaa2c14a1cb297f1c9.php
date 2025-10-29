<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Category Section')); ?></h4>
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
        <a href="#"><?php echo e(__('Category Section')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title"><?php echo e(__('Category Section')); ?></div>
            </div>

            <div class="col-lg-4">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="categoryForm"
                action="<?php echo e(route('admin.home_page.update_category_section', ['language' => request()->input('language')])); ?>"
                method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-6 mx-auto">
                    <div class="form-group">
                      <label for=""><?php echo e(__('Title*')); ?></label>
                      <input type="text" class="form-control" name="title"
                        value="<?php echo e(empty($data->title) ? '' : $data->title); ?>" placeholder="Enter Title">
                      <?php if($errors->has('title')): ?>
                        <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('title')); ?></p>
                      <?php endif; ?>
                    </div>
                    <?php if($settings->theme_version == 3): ?>
                      <div class="form-group">
                        <label for=""><?php echo e(__('Subtitle')); ?></label>
                        <input type="text" class="form-control" name="subtitle"
                          value="<?php echo e(empty($data->subtitle) ? '' : $data->subtitle); ?>" placeholder="Enter Subtitle">
                      </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for=""><?php echo e(__('Button Text*')); ?></label>
                      <input type="text" class="form-control" name="button_text"
                        value="<?php echo e(empty($data->button_text) ? '' : $data->button_text); ?>"
                        placeholder="Enter Button Text">
                      <?php if($errors->has('button_text')): ?>
                        <p class="mt-1 mb-0 text-danger"><?php echo e($errors->first('button_text')); ?></p>
                      <?php endif; ?>
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
              <button type="submit" form="categoryForm" class="btn btn-success">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/home-page/category-section.blade.php ENDPATH**/ ?>