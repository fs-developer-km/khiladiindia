<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('States')); ?></h4>
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
        <a href="#"><?php echo e(__('Listing Specification')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Location')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('States')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title"><?php echo e(__('States')); ?></div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-sm-6 col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <div class="text-right">
                <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm"><i
                    class="fas fa-plus"></i>
                  <?php echo e(__('Add')); ?></a>

                <button class="btn btn-danger btn-sm ml-2 d-none bulk-delete"
                  data-href="<?php echo e(route('admin.listing_specification.location.bulk_delete_state')); ?>">
                  <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col">
              <?php if(count($states) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO STATE FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Name')); ?></th>
                        <th scope="col"><?php echo e(__('Country Name')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($state->id); ?>">
                          </td>
                          <td>
                            <?php echo e(strlen($state->name) > 20 ? mb_substr($state->name, 0, 20, 'UTF-8') . '...' : $state->name); ?>

                          </td>
                          <td>
                            <?php if($state->country_id): ?>
                              <?php echo e($state->country->name); ?>

                            <?php else: ?>
                              --
                            <?php endif; ?>
                          </td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1  mt-1 editBtn" href="#" data-toggle="modal"
                              data-target="#editModal"
                              data-id="<?php echo e($state->id); ?>"data-country_id="<?php echo e($state->country_id); ?>"
                              data-name="<?php echo e($state->name); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.listing_specification.location.delete_state', ['id' => $state->id])); ?>"
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

  
  <?php echo $__env->make('admin.listing.location.state.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('admin.listing.location.state.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('assets/admin/js/location.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/listing/location/state/index.blade.php ENDPATH**/ ?>