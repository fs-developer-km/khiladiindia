<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Amenitie')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="ajaxForm" class="modal-form create"
          action="<?php echo e(route('admin.listing_specification.store_aminites', ['language' => request()->input('language')])); ?>"
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
            <label for=""><?php echo e(__('Icon') . '*'); ?></label>
            <div class="btn-group d-block">
              <button type="button" class="btn btn-primary iconpicker-component">
                <i class="fa fa-fw fa-heart"></i>
              </button>
              <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car"
                data-toggle="dropdown"></button>
              <div class="dropdown-menu"></div>
            </div>
            <div class="text-warning mt-2">
              <small><?php echo e(__('Click on the dropdown icon to select an icon.')); ?></small>
            </div>
          </div>
          <div class="form-group">
            <label for=""><?php echo e(__('Title') . '*'); ?></label>
            <input type="text" class="form-control" name="title" placeholder="Enter Aminitie Title">
            <p id="err_title" class="mt-2 mb-0 text-danger em"></p>
          </div>
          <input type="hidden" id="inputIcon" name="icon">
          <p id="err_icon" class="mt-2 mb-0 text-danger em"></p>
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
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/amenitie/create.blade.php ENDPATH**/ ?>