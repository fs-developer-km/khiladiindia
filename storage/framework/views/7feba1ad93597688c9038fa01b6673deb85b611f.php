<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Charge')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create" action="<?php echo e(route('admin.featured_listing.charge_store')); ?>"
          method="post">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Days') . '*'); ?></label>
            <input type="number" class="form-control" name="days" placeholder="Enter Days">
            <p id="err_days" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Price')); ?> (<?php echo e($settings->base_currency_text); ?>)*</label>
            <input type="number" class="form-control" name="price" placeholder="Enter Price">
            <p id="err_price" class="mt-2 mb-0 text-danger em"></p>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <?php echo e(__('Close')); ?>

        </button>
        <button id="submitBtn" type="button" class="btn btn-primary btn-sm">
          <?php echo e(__('Save')); ?>

        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/featured-listing/charge/create.blade.php ENDPATH**/ ?>