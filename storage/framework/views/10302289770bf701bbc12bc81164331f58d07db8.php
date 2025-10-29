<?php if ($__env->exists('admin.partials.rtl-style')) echo $__env->make('admin.partials.rtl-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Shipping Charges')); ?></h4>
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
        <a href="#"><?php echo e(__('Shop Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Shipping Charges')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Shipping Charges')); ?></div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-sm-6 col-lg-4 offset-lg-1 mt-2 mt-lg-0">
              <div class="text-right">
                <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm"><i
                    class="fas fa-plus"></i> <?php echo e(__('Add')); ?></a>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($charges) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO SHIPPING CHARGE FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <th scope="col"><?php echo e(__('Short Text')); ?></th>
                        <th scope="col"><?php echo e(__('Charge')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td>
                            <?php echo e(strlen($charge->title) > 30 ? mb_substr($charge->title, 0, 30, 'UTF-8') . '...' : $charge->title); ?>

                          </td>
                          <td>
                            <?php echo e(strlen($charge->short_text) > 50 ? mb_substr($charge->short_text, 0, 50, 'UTF-8') . '...' : $charge->short_text); ?>

                          </td>
                          <td>
                            <?php echo e($currencyInfo->base_currency_symbol_position == 'left' ? $currencyInfo->base_currency_symbol : ''); ?><?php echo e($charge->shipping_charge); ?><?php echo e($currencyInfo->base_currency_symbol_position == 'right' ? $currencyInfo->base_currency_symbol : ''); ?>

                          </td>
                          <td>
                            <a class="btn btn-secondary btn-sm mr-1  mt-1 btn-sm editBtn" href="#"
                              data-toggle="modal" data-target="#editModal" data-id="<?php echo e($charge->id); ?>"
                              data-title="<?php echo e($charge->title); ?>" data-short_text="<?php echo e($charge->short_text); ?>"
                              data-shipping_charge="<?php echo e($charge->shipping_charge); ?>"
                              data-serial_number="<?php echo e($charge->serial_number); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.shop_management.delete_charge', ['id' => $charge->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger mt-1 btn-sm btn-sm deleteBtn">
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

  
  <?php echo $__env->make('admin.shop.shipping-charge.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('admin.shop.shipping-charge.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/shop/shipping-charge/index.blade.php ENDPATH**/ ?>