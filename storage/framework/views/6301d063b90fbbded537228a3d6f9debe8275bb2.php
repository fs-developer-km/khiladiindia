<div class="modal fade" id="detailsModal_<?php echo e($order->id); ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><?php echo e(__('Details')); ?></b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
        $vendorInfo = App\Models\VendorInfo::Where([['vendor_id', $order->vendor_id]])->first();
        $vendor = App\Models\Vendor::Where([['id', $order->vendor_id]])->first();
      ?>
      <div class="modal-body">
        <h3 class="text-warning mt-2"><?php echo e(__('Member details')); ?></h3>
        <b><?php echo e(__('Name')); ?></b>
        <?php if($vendorInfo): ?>
          <p class="mb-0"><?php echo e($vendorInfo->name); ?></p>
        <?php else: ?>
          <p class="mb-0"><?php echo e(__('Admin')); ?></p>
        <?php endif; ?>

        <b><?php echo e(__('Email')); ?></b>
        <p class="mb-0">
          <?php if(@$vendor->to_mail): ?>
            <?php echo e($vendor->to_mail); ?>

          <?php else: ?>
            <?php echo e(@$vendor->email); ?>

          <?php endif; ?>
        </p>
        <b><?php echo e(__('Phone')); ?></b>
        <p class="mb-0"><?php echo e(@$vendor->phone); ?></p>
        <h3 class="text-warning mt-2"><?php echo e(__('Payment details')); ?></h3>
        <p class="mb-0"><strong><?php echo e(__('Package Price')); ?>: </strong>
          <?php echo e(symbolPrice($order->total)); ?>

        </p>
        <p class="mb-0"><strong><?php echo e(__('Method')); ?>: </strong>
          <?php echo e($order->payment_method); ?>

        </p>
        <h3 class="text-warning mt-2"><?php echo e(__('Feature Details')); ?></h3>
        <p class="mb-0"><strong><?php echo e(__('Listing Title')); ?>:

          </strong><?php echo e(strlen(@$listing_content->title) > 35 ? mb_substr(@$listing_content->title, 0, 35, 'utf-8') . '...' : @$listing_content->title); ?>


        </p>
        <p class="mb-0"><strong><?php echo e(__('Total Days')); ?>:
          </strong><?php echo e(!empty($order->days) ? $order->days : ''); ?>

        </p>
        <p class="mb-0"><strong><?php echo e(__('Start Date')); ?>: </strong>
          <?php if($order->order_status == 'completed'): ?>
            <?php echo e(\Illuminate\Support\Carbon::parse($order->start_date)->format('M-d-Y')); ?>

          <?php else: ?>
            <span
              class="badge <?php if($order->order_status == 'pending'): ?> badge-warning   <?php else: ?>  badge-danger <?php endif; ?>"><?php echo e($order->order_status); ?></span>
          <?php endif; ?>
        </p>
        <p class="mb-0"><strong><?php echo e(__('Expire Date')); ?>: </strong>
          <?php if($order->order_status == 'completed'): ?>
            <?php echo e(\Illuminate\Support\Carbon::parse($order->end_date)->format('M-d-Y')); ?>

          <?php else: ?>
            <span
              class="badge <?php if($order->order_status == 'pending'): ?> badge-warning   <?php else: ?>  badge-danger <?php endif; ?>"><?php echo e($order->order_status); ?></span>
          <?php endif; ?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/featured-listing/details.blade.php ENDPATH**/ ?>