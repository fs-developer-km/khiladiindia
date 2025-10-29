<div class="modal fade" id="featurePaymentModal_<?php echo e($listing->id); ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Send Request')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="payment-form_<?php echo e($listing->id); ?>" class="modal-form"
          action="<?php echo e(route('admin.listing_management.listing.purchase_feature')); ?>" method="post"
          enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" class="form-control" name="listing_id" id="<?php echo e($listing->id); ?>"
            value="<?php echo e($listing->id); ?>">

          <div class="form-group p-0 mt-2">
            <label for="form-check"><?php echo e(__('Promotion List')); ?>*</label>
            <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <ul class="list-group list-group-bordered mb-2">
                <li class="list-group-item">
                  <div class="form-check p-0">
                    <label class="form-check-label mb-0" for="radio_<?php echo e($charge->id); ?>_<?php echo e($listing->id); ?>">
                      <input class="form-check-input ml-0" type="radio" name="charge"
                        id="radio_<?php echo e($charge->id); ?>_<?php echo e($listing->id); ?>" value="<?php echo e($charge->id); ?>"
                        <?php echo e($index === 0 ? 'checked' : ''); ?>>
                      <?php echo e($charge->days); ?> <?php echo e(__('Days For')); ?> <?php echo e(symbolPrice($charge->price)); ?>

                    </label>
                  </div>
                </li>
              </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(Session::has('select_days_' . $listing->id)): ?>
              <p class="mt-2 text-danger"><?php echo e(Session::get('select_days_' . $listing->id)); ?></p>
            <?php endif; ?>

            <p id="err_charge_<?php echo e($listing->id); ?>" class="mt-2 mb-0 text-danger em"></p>
          </div>

          <div class="order-payment form-block  radius-md mb-30">
            <label><?php echo e(__('Payment Method')); ?></label>
            <div class="mb-30">
              <select name="gateway" id="gateway_<?php echo e($listing->id); ?>"
                class="nice-select form-control payment-gateway"data-listing_id="<?php echo e($listing->id); ?>">
                <option value="" selected="" disabled><?php echo e(__('Choose a Payment Method')); ?></option>
                <?php $__currentLoopData = $onlineGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option <?php if(old('gateway') == $onlineGateway->keyword): echo 'selected'; endif; ?> value="<?php echo e($onlineGateway->keyword); ?>">
                    <?php echo e(__($onlineGateway->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(count($offline_gateways) > 0): ?>
                  <?php $__currentLoopData = $offline_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(old('gateway') == $offlineGateway->id): echo 'selected'; endif; ?> value="<?php echo e($offlineGateway->id); ?>">
                      <?php echo e(__($offlineGateway->name)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </select>

              <?php if(Session::has('select_payment_' . $listing->id)): ?>
                <p class="mt-2 text-danger"><?php echo e(Session::get('select_payment_' . $listing->id)); ?></p>
              <?php endif; ?>

              <p id="err_gateway_<?php echo e($listing->id); ?>" class="mt-2 mb-0 text-danger em"></p>
            </div>

            <?php $__currentLoopData = $offline_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div
                class="<?php if($errors->has('attachment_' . $listing->id) && request()->session()->get('gatewayId') == $offlineGateway->id): ?> d-block <?php else: ?> d-none <?php endif; ?> offline-gateway-info_<?php echo e($listing->id); ?>"
                id="<?php echo e('offline-gateway-' . $offlineGateway->id); ?>">
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="btn btn-lg btn-primary radius-md w-100 featured" type="submit"><?php echo e(__('Submit')); ?>

            </button>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        </button>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/listing/feature-payment.blade.php ENDPATH**/ ?>