<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add City')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create"
          action="<?php echo e(route('admin.listing_specification.location.store_city')); ?>" method="post"
          enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for=""><?php echo e(__('Language') . '*'); ?></label>
            <select name="m_language_id" class="form-control">
              <option selected disabled><?php echo e(__('Select a Language')); ?></option>
              <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lang->id); ?>"><?php echo e($lang->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p id="err_m_language_id" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group d-none"id="hide_country">
            <label for=""><?php echo e(__('Country*')); ?></label>
            <select name="country_id" class="form-control" id="country_id">
              <option selected disabled><?php echo e(__('Select a Country')); ?></option>
            </select>
            <p id="err_country_id" class="mt-2 mb-0 text-danger em"></p>
          </div>
          <div class="form-group d-none" id="hide_state">
            <label for=""><?php echo e(__('State*')); ?></label>
            <select name="state_id" class="form-control">
              <option selected disabled><?php echo e(__('Select a State')); ?></option>
            </select>
            <p id="err_state_id" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="form-group">
            <label for=""><?php echo e(__('Name') . '*'); ?></label>
            <input type="text" class="form-control" name="name" placeholder="Enter City Name">
            <p id="err_name" class="mt-2 mb-0 text-danger em"></p>
          </div>
          <div class="form-group">
            <label for=""><?php echo e(__('Featured Image') . '*'); ?></label>
            <br>
            <div class="thumb-preview">
              <img src="<?php echo e(asset('assets/img/noimage.jpg')); ?>" alt="..." class="uploaded-img">
            </div>

            <div class="mt-3">
              <div role="button" class="btn btn-primary btn-sm upload-btn">
                <?php echo e(__('Choose Image')); ?>

                <input type="file" class="img-input" name="feature_image">
              </div>
              <p id="err_feature_image" class="mt-2 mb-0 text-danger em"></p>
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
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/location/city/create.blade.php ENDPATH**/ ?>