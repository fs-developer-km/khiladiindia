<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Report')); ?></h4>
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
        <a href="#"><?php echo e(__('Report')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <form action="<?php echo e(route('admin.shop_management.report')); ?>" method="GET">
                <div class="row no-gutters">
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('From')); ?></label>
                      <input name="from" type="text" class="form-control datepicker" placeholder="Select Start Date"
                        value="<?php echo e(!empty(request()->input('from')) ? request()->input('from') : ''); ?>" readonly
                        autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('To')); ?></label>
                      <input name="to" type="text" class="form-control datepicker" placeholder="Select To Date"
                        value="<?php echo e(!empty(request()->input('to')) ? request()->input('to') : ''); ?>" readonly
                        autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Payment Gateways')); ?></label>
                      <select class="form-control h-42" name="payment_gateway">
                        <option value="" <?php echo e(empty(request()->input('payment_gateway')) ? 'selected' : ''); ?>>
                          <?php echo e(__('All')); ?>

                        </option>

                        <?php if(count($onlineGateways) > 0): ?>
                          <?php $__currentLoopData = $onlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($onlineGateway->keyword); ?>"
                              <?php echo e(request()->input('payment_gateway') == $onlineGateway->keyword ? 'selected' : ''); ?>>
                              <?php echo e($onlineGateway->name); ?>

                            </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if(count($offlineGateways) > 0): ?>
                          <?php $__currentLoopData = $offlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($offlineGateway->name); ?>"
                              <?php echo e(request()->input('payment_gateway') == $offlineGateway->name ? 'selected' : ''); ?>>
                              <?php echo e($offlineGateway->name); ?>

                            </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Payment Status')); ?></label>
                      <select class="form-control h-42" name="payment_status">
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
                      <label><?php echo e(__('Order Status')); ?></label>
                      <select class="form-control h-42" name="order_status">
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

                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary btn-sm ml-lg-3 card-header-button">
                      <?php echo e(__('Submit')); ?>

                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-lg-2">
              <a href="<?php echo e(route('admin.shop_management.export_report')); ?>"
                class="btn btn-success btn-sm float-lg-right card-header-button">
                <i class="fas fa-file-export"></i> <?php echo e(__('Export')); ?>

              </a>
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
                        <th scope="col"><?php echo e(__('Order No.')); ?></th>
                        <th scope="col"><?php echo e(__('Billing Name')); ?></th>
                        <th scope="col"><?php echo e(__('Billing Email')); ?></th>
                        <th scope="col"><?php echo e(__('Billing Phone')); ?></th>
                        <th scope="col"><?php echo e(__('Billing Address')); ?></th>
                        <th scope="col"><?php echo e(__('Billing City')); ?></th>
                        <th scope="col"><?php echo e(__('Billing State')); ?></th>
                        <th scope="col"><?php echo e(__('Billing Country')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Name')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Email')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Phone')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Address')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping City')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping State')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Country')); ?></th>
                        <th scope="col"><?php echo e(__('Price')); ?></th>
                        <th scope="col"><?php echo e(__('Discount')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Method')); ?></th>
                        <th scope="col"><?php echo e(__('Shipping Cost')); ?></th>
                        <th scope="col"><?php echo e(__('Tax')); ?></th>
                        <th scope="col"><?php echo e(__('Grand Total')); ?></th>
                        <th scope="col"><?php echo e(__('Paid via')); ?></th>
                        <th scope="col"><?php echo e(__('Payment Status')); ?></th>
                        <th scope="col"><?php echo e(__('Order Status')); ?></th>
                        <th scope="col"><?php echo e(__('Order Date')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e('#' . $order->order_number); ?></td>
                          <td><?php echo e($order->billing_name); ?></td>
                          <td><?php echo e($order->billing_email); ?></td>
                          <td><?php echo e($order->billing_phone); ?></td>
                          <td><?php echo e($order->billing_address); ?></td>
                          <td><?php echo e($order->billing_city); ?></td>
                          <td><?php echo e(is_null($order->billing_state) ? '-' : $order->billing_state); ?></td>
                          <td><?php echo e($order->billing_country); ?></td>
                          <td><?php echo e($order->shipping_name); ?></td>
                          <td><?php echo e($order->shipping_email); ?></td>
                          <td><?php echo e($order->shipping_phone); ?></td>
                          <td><?php echo e($order->shipping_address); ?></td>
                          <td><?php echo e($order->shipping_city); ?></td>
                          <td><?php echo e(is_null($order->shipping_state) ? '-' : $order->shipping_state); ?></td>
                          <td><?php echo e($order->shipping_country); ?></td>
                          <td>
                            <?php echo e($order->currency_text_position == 'left' ? $order->currency_text . ' ' : ''); ?><?php echo e($order->total); ?><?php echo e($order->currency_text_position == 'right' ? ' ' . $order->currency_text : ''); ?>

                          </td>
                          <td>
                            <?php if(is_null($order->discount)): ?>
                              -
                            <?php else: ?>
                              <?php echo e($order->currency_text_position == 'left' ? $order->currency_text . ' ' : ''); ?><?php echo e($order->discount); ?><?php echo e($order->currency_text_position == 'right' ? ' ' . $order->currency_text : ''); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if(is_null($order->product_shipping_charge_id)): ?>
                              -
                            <?php else: ?>
                              <?php echo e($order->shippingMethod); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if(is_null($order->shipping_cost)): ?>
                              -
                            <?php else: ?>
                              <?php echo e($order->currency_text_position == 'left' ? $order->currency_text . ' ' : ''); ?><?php echo e($order->shipping_cost); ?><?php echo e($order->currency_text_position == 'right' ? ' ' . $order->currency_text : ''); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <?php echo e($order->currency_text_position == 'left' ? $order->currency_text . ' ' : ''); ?><?php echo e($order->tax); ?><?php echo e($order->currency_text_position == 'right' ? ' ' . $order->currency_text : ''); ?>

                          </td>
                          <td>
                            <?php echo e($order->currency_text_position == 'left' ? $order->currency_text . ' ' : ''); ?><?php echo e($order->grand_total); ?><?php echo e($order->currency_text_position == 'right' ? ' ' . $order->currency_text : ''); ?>

                          </td>
                          <td><?php echo e($order->payment_method); ?></td>
                          <td>
                            <?php if($order->payment_status == 'completed'): ?>
                              <span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                            <?php elseif($order->payment_status == 'pending'): ?>
                              <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                            <?php else: ?>
                              <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($order->order_status == 'pending'): ?>
                              <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                            <?php elseif($order->order_status == 'processing'): ?>
                              <span class="badge badge-primary"><?php echo e(__('Processing')); ?></span>
                            <?php elseif($order->order_status == 'completed'): ?>
                              <span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                            <?php else: ?>
                              <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td><?php echo e($order->createdAt); ?></td>
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
          <div class="mt-3 text-center">
            <div class="d-inline-block mx-auto">
              <?php if(count($orders) > 0): ?>
                <?php echo e($orders->appends([
                        'from' => request()->input('from'),
                        'to' => request()->input('to'),
                        'payment_gateway' => request()->input('payment_gateway'),
                        'payment_status' => request()->input('payment_status'),
                        'order_status' => request()->input('order_status'),
                    ])->links()); ?>

              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/shop/order/report.blade.php ENDPATH**/ ?>