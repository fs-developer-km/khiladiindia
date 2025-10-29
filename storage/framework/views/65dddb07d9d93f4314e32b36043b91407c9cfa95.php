<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Support Tickets')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('vendor.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Support Tickets')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block">
                <?php echo e(__('Support Tickets')); ?>

              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">

              <?php if(session()->has('course_status_warning')): ?>
                <div class="alert alert-warning">
                  <p class="text-dark mb-0"><?php echo e(session()->get('course_status_warning')); ?></p>
                </div>
              <?php endif; ?>

              <?php if(count($collection) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO SUPPORT TICKET FOUND ') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col"><?php echo e(__('Ticket ID')); ?></th>
                        <th scope="col"><?php echo e(__('Email')); ?></th>
                        <th scope="col"><?php echo e(__('Subject')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Action')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <?php echo e($item->id); ?>

                          </td>
                          <td>
                            <?php echo e($item->email != '' ? $item->email : '-'); ?>

                          </td>
                          <td>
                            <?php echo e($item->subject); ?>

                          </td>
                          <td>
                            <?php if($item->status == 1): ?>
                              <span class="badge badge-info"><?php echo e(__('Pending')); ?></span>
                            <?php elseif($item->status == 2): ?>
                              <span class="badge badge-success"><?php echo e(__('Open')); ?></span>
                            <?php elseif($item->status == 3): ?>
                              <span class="badge badge-danger"><?php echo e(__('Closed')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a href="<?php echo e(route('vendor.support_tickets.message', $item->id)); ?>" class="dropdown-item">
                                  <?php echo e(__('Message')); ?>

                                </a>
                                <form class="deleteForm d-block"
                                  action="<?php echo e(route('vendor.support_tickets.delete', $item->id)); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="deleteBtn">
                                    <?php echo e(__('Delete')); ?>

                                  </button>
                                </form>
                              </div>
                            </div>
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

        <div class="card-footer">
          <?php echo e($collection->links()); ?>

        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/support_ticket/index.blade.php ENDPATH**/ ?>