<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Orders')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->orders_page_title : __('Orders'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->orders_page_title : __('Orders'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60" style="background-color: #0c0b2d;">
    <div class="container">
      <div class="row gx-xl-5">
        <?php if ($__env->exists('frontend.user.side-navbar')) echo $__env->make('frontend.user.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
          <div class="account-info radius-md mb-40">
            <div class="title">
              <h4><?php echo e(__('Orders')); ?></h4>
            </div>
            <div class="main-info">
              <?php if(count($orders) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO ORDER FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="main-table">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped w-100">
                      <thead>
                        <tr>
                          <th><?php echo e(__('Order Number')); ?></th>
                          <th><?php echo e(__('Date')); ?></th>
                          <th><?php echo e(__('Payment Status')); ?></th>
                          <th><?php echo e(__('Order Status')); ?></th>
                          <th><?php echo e(__('Action')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td>#<?php echo e($item->order_number); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')); ?></td>
                            <?php
                              if ($item->payment_status == 'pending') {
                                  $payment_bg = 'bg-warning';
                              } elseif ($item->payment_status == 'completed') {
                                  $payment_bg = 'bg-success';
                              } elseif ($item->payment_status == 'rejected') {
                                  $payment_bg = 'bg-danger';
                              }

                              if ($item->order_status == 'pending') {
                                  $order_bg = 'bg-warning';
                              } elseif ($item->order_status == 'processing') {
                                  $order_bg = 'bg-info';
                              } elseif ($item->order_status == 'completed') {
                                  $order_bg = 'bg-success';
                              } elseif ($item->order_status == 'rejected') {
                                  $order_bg = 'bg-danger';
                              }

                              //order status

                            ?>
                            <td><span class="badge <?php echo e($payment_bg); ?>"><?php echo e(__($item->payment_status)); ?></span></td>

                            <td><span class="badge <?php echo e($order_bg); ?>"><?php echo e(__($item->order_status)); ?></span></td>

                            <td>
                              <a href="<?php echo e(route('user.order.details', $item->id)); ?>" class="btn"><i
                                  class="fas fa-eye"></i> <?php echo e(__('Details')); ?></a>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--====== End Dashboard Section ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/order/index.blade.php ENDPATH**/ ?>