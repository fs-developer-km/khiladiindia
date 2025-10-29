
<div class="modal fade" id="receiptModal-<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Payment Receipt')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <img src="<?php echo e(asset('assets/file/attachments/feature-activation/' . $order->attachment)); ?>" alt="receipt" width="100%">
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/featured-listing/show-receipt.blade.php ENDPATH**/ ?>