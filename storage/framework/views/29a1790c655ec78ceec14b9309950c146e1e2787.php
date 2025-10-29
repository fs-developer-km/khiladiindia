<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Coupon')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form" action="<?php echo e(route('admin.shop_management.store_coupon')); ?>"
          method="post">
          <?php echo csrf_field(); ?>
          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Name') . '*'); ?></label>
                <input type="text" class="form-control" name="name" placeholder="Enter Coupon Name">
                <p id="err_name" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Code') . '*'); ?></label>
                <input type="text" class="form-control" name="code" placeholder="Enter Coupon Code">
                <p id="err_code" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Coupon Type') . '*'); ?></label>
                <select name="type" class="form-control">
                  <option selected disabled><?php echo e(__('Select a Type')); ?></option>
                  <option value="fixed"><?php echo e(__('Fixed')); ?></option>
                  <option value="percentage"><?php echo e(__('Percentage')); ?></option>
                </select>
                <p id="err_type" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Value') . '*'); ?></label>
                <input type="number" step="0.01" class="form-control" name="value"
                  placeholder="Enter Coupon Value">
                <p id="err_value" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('Start Date') . '*'); ?></label>
                <input type="text" class="form-control datepicker" autocomplete="off" name="start_date"
                  placeholder="Enter Start Date">
                <p id="err_start_date" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for=""><?php echo e(__('End Date') . '*'); ?></label>
                <input type="text" class="form-control datepicker" autocomplete="off" name="end_date"
                  placeholder="Enter End Date">
                <p id="err_end_date" class="mt-2 mb-0 text-danger em"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <?php $currencyText = $currencyInfo->base_currency_text; ?>

                <label for=""><?php echo e(__('Minimum Spend') . ' (' . $currencyText . ')'); ?></label>
                <input type="number" step="0.01" class="form-control" name="minimum_spend"
                  placeholder="Enter Minimum Spend">
                <p class="text-warning mt-2 mb-0">
                  <small><?php echo e(__('Keep it blank, if you do not want to keep any minimum spend limit.')); ?></small>
                </p>
              </div>
            </div>
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
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/shop/coupon/create.blade.php ENDPATH**/ ?>