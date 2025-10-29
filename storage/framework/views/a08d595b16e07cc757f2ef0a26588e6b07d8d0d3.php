<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Edit Keyword')); ?></h4>
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
        <a href="#"><?php echo e(__('Language Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Edit Keyword')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">
            <?php echo e(__('Keywords of') . ' ' . $language->name . ' ' . __('Language')); ?>

          </div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="<?php echo e(route('admin.language_management')); ?>">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="languageKeywordForm"
                action="<?php echo e(route('admin.language_management.update_keyword', ['id' => $language->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mt-2">
                      <div class="form-group">
                        <label class="control-label ws-normal">
                          <?php echo e($keyword); ?>

                        </label>

                        <div class="input-group">
                          <input class="form-control form-control-lg" type="text" name="keyValues[<?php echo e($keyword); ?>]"
                            value="<?php echo e($value); ?>">
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
              <button type="submit" class="btn btn-success" form="languageKeywordForm">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/language/edit-keyword.blade.php ENDPATH**/ ?>