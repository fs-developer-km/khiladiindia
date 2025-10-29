<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Orders')); ?></h4>
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
        <a href="#"><?php echo e(__('Orders')); ?></a>
      </li>
    </ul>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <form id="searchForm" action="<?php echo e(route('admin.shop_management.orders')); ?>" method="GET">
                <div class="row">
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Order Number')); ?></label>
                      <input name="order_no" type="text" class="form-control" placeholder="Search Here..."
                        value="<?php echo e(!empty(request()->input('order_no')) ? request()->input('order_no') : ''); ?>">
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Payment')); ?></label>
                      <select class="form-control h-42" name="payment_status"
                        onchange="document.getElementById('searchForm').submit()">
                        <option value="" <?php echo e(empty(request()->input('payment_status')) ? 'selected' : ''); ?>>
                          <?php echo e(__('All')); ?>

                        </option>
                        <option value="completed"
                          <?php echo e(request()->input('payment_status') == 'completed' ? 'selected' : ''); ?>>
                          <?php echo e(__('Completed')); ?>

                        </option>
                        <option value="pending" <?php echo e(request()->input('payment_status') == 'pending' ? 'selected' : ''); ?>>
                          <?php echo e(__('Pending')); ?>

                        </option>
                        <option value="rejected"
                          <?php echo e(request()->input('payment_status') == 'rejected' ? 'selected' : ''); ?>>
                          <?php echo e(__('Rejected')); ?>

                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Order')); ?></label>
                      <select class="form-control h-42" name="order_status"
                        onchange="document.getElementById('searchForm').submit()">
                        <option value="" <?php echo e(empty(request()->input('order_status')) ? 'selected' : ''); ?>>
                          <?php echo e(__('All')); ?>

                        </option>
                        <option value="pending" <?php echo e(request()->input('order_status') == 'pending' ? 'selected' : ''); ?>>
                          <?php echo e(__('Pending')); ?>

                        </option>
                        <option value="processing"
                          <?php echo e(request()->input('order_status') == 'processing' ? 'selected' : ''); ?>>
                          <?php echo e(__('Processing')); ?>

                        </option>
                        <option value="completed"
                          <?php echo e(request()->input('order_status') == 'completed' ? 'selected' : ''); ?>>
                          <?php echo e(__('Completed')); ?>

                        </option>
                        <option value="rejected" <?php echo e(request()->input('order_status') == 'rejected' ? 'selected' : ''); ?>>
                          <?php echo e(__('Rejected')); ?>

                        </option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-lg-2">
              <button class="btn btn-danger btn-sm d-none bulk-delete float-lg-right"
                data-href="<?php echo e(route('admin.shop_management.bulk_delete_order')); ?>" class="card-header-button">
                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

              </button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($orders) == 0): ?>
                <h3 class="text-center mt-3"><?php echo e(__('NO ORDER FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-2">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Order No.')); ?></th>
                        <th scope="col"><?php echo e(__('Paid via')); ?></th>
                        <th scope="col"><?php echo e(__('Payment Status')); ?></th>
                        <th scope="col"><?php echo e(__('Order Status')); ?></th>
                        <th scope="col"><?php echo e(__('Receipt')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($order->id); ?>">
                          </td>
                          <td><?php echo e('#' . $order->order_number); ?></td>
                          <td><?php echo e($order->payment_method); ?></td>
                          <td>
                            <?php if($order->gateway_type == 'online'): ?>
                              <h2 class="d-inline-block"><span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                              </h2>
                            <?php else: ?>
                              <?php if($order->payment_status == 'pending'): ?>
                                <form id="paymentStatusForm-<?php echo e($order->id); ?>" class="d-inline-block"
                                  action="<?php echo e(route('admin.shop_management.order.update_payment_status', ['id' => $order->id])); ?>"
                                  method="post">
                                  <?php echo csrf_field(); ?>
                                  <select
                                    class="form-control form-control-sm <?php if($order->payment_status == 'pending'): ?> bg-warning text-dark <?php elseif($order->payment_status == 'completed'): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>"
                                    name="payment_status"
                                    onchange="document.getElementById('paymentStatusForm-<?php echo e($order->id); ?>').submit()">
                                    <option value="pending" <?php echo e($order->payment_status == 'pending' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Pending')); ?>

                                    </option>
                                    <option value="completed"
                                      <?php echo e($order->payment_status == 'completed' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Completed')); ?>

                                    </option>
                                    <option value="rejected"
                                      <?php echo e($order->payment_status == 'rejected' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Rejected')); ?>

                                    </option>
                                  </select>
                                </form>
                              <?php else: ?>
                                <h2 class="d-inline-block"><span
                                    class="badge badge-<?php echo e($order->payment_status == 'completed' ? 'success' : 'danger'); ?>"><?php echo e(ucfirst($order->payment_status)); ?></span>
                                </h2>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <form id="orderStatusForm-<?php echo e($order->id); ?>" class="d-inline-block"
                              action="<?php echo e(route('admin.shop_management.order.update_order_status', ['id' => $order->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <select
                                class="form-control form-control-sm <?php if($order->order_status == 'pending'): ?> bg-warning text-dark <?php elseif($order->order_status == 'processing'): ?> bg-primary <?php elseif($order->order_status == 'completed'): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>"
                                name="order_status"
                                onchange="document.getElementById('orderStatusForm-<?php echo e($order->id); ?>').submit()">
                                <option value="pending" <?php echo e($order->order_status == 'pending' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Pending')); ?>

                                </option>
                                <option value="processing" <?php echo e($order->order_status == 'processing' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Processing')); ?>

                                </option>
                                <option value="completed" <?php echo e($order->order_status == 'completed' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Completed')); ?>

                                </option>
                                <option value="rejected" <?php echo e($order->order_status == 'rejected' ? 'selected' : ''); ?>>
                                  <?php echo e(__('Rejected')); ?>

                                </option>
                              </select>
                            </form>
                          </td>
                          <td>
                            <?php if(!empty($order->attachment)): ?>
                              <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                data-target="#receiptModal-<?php echo e($order->id); ?>">
                                <?php echo e(__('Show')); ?>

                              </a>
                            <?php else: ?>
                              -
                            <?php endif; ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="<?php echo e(route('admin.shop_management.order.details', ['id' => $order->id])); ?>"
                                  class="dropdown-item">
                                  <?php echo e(__('Details')); ?>

                                </a>

                                <?php if(!is_null($order->invoice)): ?>
                                  <a href="<?php echo e(asset('assets/file/invoices/product/' . $order->invoice)); ?>"
                                    class="dropdown-item" target="_blank">
                                    <?php echo e(__('Invoice')); ?>

                                  </a>
                                <?php endif; ?>

                                <form class="deleteForm d-block"
                                  action="<?php echo e(route('admin.shop_management.order.delete', ['id' => $order->id])); ?>"
                                  method="post">
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="deleteBtn">
                                    <?php echo e(__('Delete')); ?>

                                  </button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php if ($__env->exists('admin.shop.order.show-receipt')) echo $__env->make('admin.shop.order.show-receipt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="mt-3 text-center">
            <div class="d-inline-block mx-auto">
              <?php echo e($orders->appends([
                      'order_no' => request()->input('order_no'),
                      'payment_status' => request()->input('payment_status'),
                      'order_status' => request()->input('order_status'),
                  ])->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/shop/order/index.blade.php ENDPATH**/ ?>