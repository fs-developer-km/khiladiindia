<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit State')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>"
          action="<?php echo e(route('admin.listing_specification.location.update_state')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="in_id">

          <div class="form-group">
            <label for=""><?php echo e(__('Country')); ?></label>
            <select name="country_id" class="form-control"id="in_country_id">
              <option value="" ><?php echo e(__('Select a Country')); ?></option>
              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="err_country_id" class="mt-2 mb-0 text-danger em"></p>
          </div>
          
          <div class="form-group">
            <label for=""><?php echo e(__('Name') . '*'); ?></label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" id="in_name">
            <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
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
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/location/state/edit.blade.php ENDPATH**/ ?>