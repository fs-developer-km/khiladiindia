<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit City')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxEditForm" class="modal-form <?php echo e($language->direction == 1 ? 'rtl text-right' : ''); ?>"
          action="<?php echo e(route('admin.listing_specification.location.update_city')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" id="in_id">

          <div class="form-group">
            <label for=""><?php echo e(__('Country*')); ?></label>
            <select name="country_id" class="form-control" id="in_country_id">
              <option selected disabled><?php echo e(__('Select a Country')); ?></option>
              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="editErr_country_id" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group d-none" id="e_hide_state">
            <label for=""><?php echo e(__('State*')); ?></label>
            <select name="state_id" class="form-control state_id" id="in_state_id">
              <option selected disabled><?php echo e(__('Select a State')); ?></option>
              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="editErr_state_id" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Name') . '*'); ?></label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" id="in_name">
            <p id="editErr_name" class="mt-2 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for=""><?php echo e(__('Image') . '*'); ?></label>
            <br>
            <div class="thumb-preview">
              <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img in_image">
            </div>

            <div class="mt-3">
              <div role="button" class="btn btn-primary btn-sm upload-btn">
                <?php echo e(__('Choose Image')); ?>

                <input type="file" class="img-input" name="image">
              </div>
            </div>
            <p id="editErr_image" class="mb-0 text-danger em"></p>
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
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/location/city/edit.blade.php ENDPATH**/ ?>