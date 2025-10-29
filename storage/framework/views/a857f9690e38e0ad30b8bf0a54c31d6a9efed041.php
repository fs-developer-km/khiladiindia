<?php
  use App\Models\Language;
  $selLang = Language::where('code', request()->input('language'))->first();
?>
<?php if(!empty($selLang) && $selLang->rtl == 1): ?>
  <?php $__env->startSection('styles'); ?>
    <style>
      form:not(.modal-form) input,
      form:not(.modal-form) textarea,
      form:not(.modal-form) select,
      select[name='language'] {
        direction: rtl;
      }

      form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
      }
    </style>
  <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Packages')); ?></h4>
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
        <a href="#"><?php echo e(__('Package Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Packages')); ?></a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Packages')); ?></div>
            </div>
            <div class="col-lg-4 offset-lg-4 mt-2 mt-lg-0">
              <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                data-target="#createModal"><i class="fas fa-plus"></i>
                <?php echo e(__('Add Package')); ?></a>
              <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                data-href="<?php echo e(route('admin.package.bulk.delete')); ?>"><i class="flaticon-interface-5"></i>
                <?php echo e(__('Delete')); ?>

              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($packages) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO PACKAGE FOUND YET')); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <th scope="col"><?php echo e(__('Cost')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($package->id); ?>">
                          </td>
                          <td>
                            <strong><?php echo e(strlen($package->title) > 30 ? mb_substr($package->title, 0, 30, 'UTF-8') . '...' : $package->title); ?></strong>
                            <?php if($package->term == 'monthly'): ?>
                              <small class="badge badge-primary"><?php echo e(__('Monthly')); ?></small>
                            <?php elseif($package->term == 'yearly'): ?>
                              <small class="badge badge-info"><?php echo e(__('Yearly')); ?></small>
                            <?php elseif($package->term == 'lifetime'): ?>
                              <small class="badge badge-secondary"><?php echo e(__('Lifetime')); ?></small>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($package->price == 0): ?>
                              <?php echo e(__('Free')); ?>

                            <?php else: ?>
                              <?php echo e(format_price($package->price)); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($package->status == 1): ?>
                              <h2 class="d-inline-block">
                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                              </h2>
                            <?php else: ?>
                              <h2 class="d-inline-block">
                                <span class="badge badge-danger"><?php echo e(__('Deactive')); ?></span>
                              </h2>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a class="btn btn-secondary btn-sm mt-1"
                              href="<?php echo e(route('admin.package.edit', $package->id) . '?language=' . request()->input('language')); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>
                            <form class="packageDeleteForm d-inline-block" action="<?php echo e(route('admin.package.delete')); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
                              <button type="submit" class="btn btn-danger btn-sm  mt-1 packageDeleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $__env->make('admin.packages.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/admin/js/packages.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/packages/index.blade.php ENDPATH**/ ?>