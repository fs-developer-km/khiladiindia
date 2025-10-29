<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit Charge')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form" action="<?php echo e(route('admin.featured_listing.update')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="in_id">

          <div class="form-group">
            <label for=""><?php echo e(__('Days') . '*'); ?></label>
            <input type="text" class="form-control" name="days" placeholder="Enter Days" id="in_days">
            <p id="editErr_days" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Price')); ?> (<?php echo e($settings->base_currency_text); ?>)*</label>
            <input type="text" class="form-control" name="price" placeholder="Enter Price" id="in_price">
            <p id="editErr_price" class="mt-2 mb-0 text-danger em"></p>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
        <button id="updateBtn" type="button" class="btn btn-primary btn-sm">
          <?php echo e(__('Update')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/featured-listing/charge/edit.blade.php ENDPATH**/ ?>