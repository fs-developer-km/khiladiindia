<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Hero Section')); ?></h4>
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
        <a href="#"><?php echo e(__('Hero Section')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <div class="card-title"><?php echo e(__('Update Hero Section Image')); ?></div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="col-lg-12">
            <form id="actionImgForm" action="<?php echo e(route('admin.home_page.hero_section.store')); ?>" method="POST"
              enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="form-group">
                  <label for=""><?php echo e(__('Image') . '*'); ?></label>
                  <br>
                  <div class="thumb-preview">
                    <?php if(!empty($info->hero_section_background_img)): ?>
                      <img src="<?php echo e(asset('assets/img/hero-section/' . $info->hero_section_background_img)); ?>"
                        alt="image" class="uploaded-img">
                    <?php else: ?>
                      <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
                    <?php endif; ?>
                  </div>

                  <div class="mt-3">
                    <div role="button" class="btn btn-primary btn-sm upload-btn">
                      <?php echo e(__('Choose Image')); ?>

                      <input type="file" class="img-input" name="hero_section_background_img">
                    </div>
                  </div>
                  <?php $__errorArgs = ['hero_section_background_img'];
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
            </form>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <div class="row">
          <div class="col-12 text-center">
            <button type="submit" form="actionImgForm" class="btn btn-success">
              <?php echo e(__('Update')); ?>

            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-8">
            <div class="card-title"><?php echo e(__('Update Hero Section')); ?></div>
          </div>
          <div class="col-lg-4">
            <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <form id="actionForm"
              action="<?php echo e(route('admin.home_page.hero_section.update', ['language' => request()->input('language')])); ?>"
              method="POST">
              <?php echo csrf_field(); ?>
              <div class="col-lg-12">
                <div class="form-group">
                  <label for=""><?php echo e(__('Title')); ?></label>
                  <input type="text" class="form-control" name="title"
                    value="<?php echo e(empty($data->title) ? '' : $data->title); ?>" placeholder="Enter Title">
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for=""><?php echo e(__('Text')); ?></label>
                  <textarea name="text" class="form-control" rows="1" placeholder="Enter Text"><?php echo e(empty($data->text) ? '' : $data->text); ?></textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <div class="row">
          <div class="col-12 text-center">
            <button type="submit" form="actionForm" class="btn btn-success">
              <?php echo e(__('Update')); ?>

            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/home-page/hero-section/index.blade.php ENDPATH**/ ?>