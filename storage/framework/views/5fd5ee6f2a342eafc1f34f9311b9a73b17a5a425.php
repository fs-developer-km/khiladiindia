<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Shipping Charge')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create" action="<?php echo e(route('admin.shop_management.store_charge')); ?>"
          method="post">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Language') . '*'); ?></label>
            <select name="language_id" class="form-control">
              <option selected disabled><?php echo e(__('Select a Language')); ?></option>
              <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="err_language_id" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Title') . '*'); ?></label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title">
            <p id="err_title" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Short Text') . '*'); ?></label>
            <textarea class="form-control" name="short_text" rows="2" cols="80" placeholder="Enter Short Text"></textarea>
            <p id="err_short_text" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <?php $currencyText = $currencyInfo->base_currency_text; ?>

            <label for=""><?php echo e(__('Charge') . ' (' . $currencyText . ')*'); ?></label>
            <input type="number" step="0.01" class="form-control ltr" name="shipping_charge"
              placeholder="Enter Shipping Charge">
            <p id="err_shipping_charge" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Serial Number') . '*'); ?></label>
            <input type="number" class="form-control ltr" name="serial_number" placeholder="Enter Serial Number">
            <p id="err_serial_number" class="mt-2 mb-0 text-danger em"></p>
            <p class="text-warning mt-2 mb-0">
              <small><?php echo e(__('The higher the serial number is, the later the shipping charge will be shown.')); ?></small>
            </p>
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
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/shop/shipping-charge/create.blade.php ENDPATH**/ ?>