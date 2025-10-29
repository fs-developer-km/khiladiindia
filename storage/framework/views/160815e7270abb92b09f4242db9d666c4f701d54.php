<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Charges')); ?></h4>
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
        <a href="#"><?php echo e(__('Featured Listings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Charges')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6">
              <div class="card-title"><?php echo e(__('Charges')); ?></div>
            </div>

            <div class="col-sm-6 mt-2 mt-sm-0">
              <div class="text-right">
                <a href="#" data-toggle="modal" data-target="#createModal"
                  class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                  <?php echo e(__('Add')); ?></a>

                <button class="btn btn-danger btn-sm ml-2 d-none bulk-delete"
                  data-href="<?php echo e(route('admin.featured_listing.charge.bulk_delete')); ?>">
                  <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col">
              <?php if(count($charges) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO INFORMATION FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Days')); ?></th>
                        <th scope="col"><?php echo e(__('Price')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($charge->id); ?>">
                          </td>
                          <td><?php echo e($charge->days); ?></i></td>
                          <td><?php echo e(symbolPrice($charge->price)); ?></i></td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1  mt-1 editBtn" href="#" data-toggle="modal"
                              data-target="#editModal" data-id="<?php echo e($charge->id); ?>" data-days="<?php echo e($charge->days); ?>"
                              data-price="<?php echo e($charge->price); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.featured_listing.charge.delete', ['id' => $charge->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger btn-sm  mt-1 deleteBtn">
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
        <div class="card-footer"></div>
      </div>
    </div>
  </div>

  
  <?php echo $__env->make('admin.featured-listing.charge.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('admin.featured-listing.charge.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/featured-listing/charge/index.blade.php ENDPATH**/ ?>