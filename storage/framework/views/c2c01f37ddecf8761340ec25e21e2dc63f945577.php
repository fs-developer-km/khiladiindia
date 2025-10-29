<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Vendor Details')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Vendor Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="<?php echo e(route('admin.vendor_management.registered_vendor')); ?>"><?php echo e(__('Registered Vendors')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Vendor Details')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <div class="h4 card-title"><?php echo e(__('Vendor Information')); ?></div>
              <h2 class="text-center">
                <?php if($vendor->photo != null): ?>
                  <img class="admin-vendor-photo" src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>"
                    alt="..." class="uploaded-img">
                <?php else: ?>
                  <img class="admin-vendor-photo" src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>" alt="..."
                    class="uploaded-img">
                <?php endif; ?>

              </h2>
            </div>

            <div class="card-body">
              <div class="payment-information">

                <?php
                  $currPackage = \App\Http\Helpers\VendorPermissionHelper::currPackageOrPending($vendor->id);
                  $currMemb = \App\Http\Helpers\VendorPermissionHelper::currMembOrPending($vendor->id);
                ?>
                <div class="row mb-3">
                  <div class="col-lg-6">
                    <strong><?php echo e(__('Current Package:')); ?></strong>
                  </div>
                  <div class="col-lg-6">
                    <?php if($currPackage): ?>
                      <a target="_blank"
                        href="<?php echo e(route('admin.package.edit', $currPackage->id)); ?>"><?php echo e($currPackage->title); ?></a>
                      <span class="badge badge-secondary badge-xs mr-2"><?php echo e($currPackage->term); ?></span>
                      <button type="submit" class="btn btn-xs btn-warning" data-toggle="modal"
                        data-target="#editCurrentPackage"><i class="far fa-edit"></i></button>
                      <form action="<?php echo e(route('vendor.currPackage.remove')); ?>" class="d-inline-block deleteForm"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="vendor_id" value="<?php echo e($vendor->id); ?>">
                        <button type="submit" class="btn btn-xs btn-danger deleteBtn"><i
                            class="fas fa-trash"></i></button>
                      </form>

                      <p class="mb-0">
                        <?php if($currMemb->is_trial == 1): ?>
                          (<?php echo e(__('Expire Date') . ':'); ?>

                          <?php echo e(Carbon\Carbon::parse($currMemb->expire_date)->format('M-d-Y')); ?>)
                          <span class="badge badge-primary"><?php echo e(__('Trial')); ?></span>
                        <?php else: ?>
                          (<?php echo e(__('Expire Date') . ':'); ?>

                          <?php echo e($currPackage->term === 'lifetime' ? 'Lifetime' : Carbon\Carbon::parse($currMemb->expire_date)->format('M-d-Y')); ?>)
                        <?php endif; ?>
                        <?php if($currMemb->status == 0): ?>
                          <form id="statusForm<?php echo e($currMemb->id); ?>" class="d-inline-block"
                            action="<?php echo e(route('admin.payment-log.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($currMemb->id); ?>">
                            <select class="form-control form-control-sm bg-warning" name="status"
                              onchange="document.getElementById('statusForm<?php echo e($currMemb->id); ?>').submit();">
                              <option value=0 selected><?php echo e(__('Pending')); ?></option>
                              <option value=1><?php echo e(__('Success')); ?></option>
                              <option value=2><?php echo e(__('Rejected')); ?></option>
                            </select>
                          </form>
                        <?php endif; ?>
                      </p>
                    <?php else: ?>
                      <a data-target="#addCurrentPackage" data-toggle="modal" class="btn btn-xs btn-primary text-white"><i
                          class="fas fa-plus"></i> <?php echo e(__('Add Package')); ?></a>
                    <?php endif; ?>
                  </div>
                </div>

                <?php
                  $nextPackage = \App\Http\Helpers\VendorPermissionHelper::nextPackage($vendor->id);
                  $nextMemb = \App\Http\Helpers\VendorPermissionHelper::nextMembership($vendor->id);
                ?>
                <div class="row mb-3">
                  <div class="col-lg-6">
                    <strong><?php echo e(__('Next Package:')); ?></strong>
                  </div>
                  <div class="col-lg-6">
                    <?php if($nextPackage): ?>
                      <a target="_blank"
                        href="<?php echo e(route('admin.package.edit', $nextPackage->id)); ?>"><?php echo e($nextPackage->title); ?></a>
                      <span class="badge badge-secondary badge-xs mr-2"><?php echo e($nextPackage->term); ?></span>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                        data-target="#editNextPackage"><i class="far fa-edit"></i></button>
                      <form action="<?php echo e(route('vendor.nextPackage.remove')); ?>" class="d-inline-block deleteForm"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="vendor_id" value="<?php echo e($vendor->id); ?>">
                        <button type="submit" class="btn btn-xs btn-danger deleteBtn"><i
                            class="fas fa-trash"></i></button>
                      </form>

                      <p class="mb-0">
                        <?php if($currPackage->term != 'lifetime' && $nextMemb->is_trial != 1): ?>
                          (
                          <?php echo e(__('Activation Date')); ?>:
                          <?php echo e(Carbon\Carbon::parse($nextMemb->start_date)->format('M-d-Y')); ?>,
                          <?php echo e(__('Expire Date')); ?>:
                          <?php echo e($nextPackage->term === 'lifetime' ? 'Lifetime' : Carbon\Carbon::parse($nextMemb->expire_date)->format('M-d-Y')); ?>)
                        <?php endif; ?>
                        <?php if($nextMemb->status == 0): ?>
                          <form id="statusForm<?php echo e($nextMemb->id); ?>" class="d-inline-block"
                            action="<?php echo e(route('admin.payment-log.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($nextMemb->id); ?>">
                            <select class="form-control form-control-sm bg-warning" name="status"
                              onchange="document.getElementById('statusForm<?php echo e($nextMemb->id); ?>').submit();">
                              <option value=0 selected><?php echo e(__('Pending')); ?></option>
                              <option value=1><?php echo e(__('Success')); ?></option>
                              <option value=2><?php echo e(__('Rejected')); ?></option>
                            </select>
                          </form>
                        <?php endif; ?>
                      </p>
                    <?php else: ?>
                      <?php if(!empty($currPackage)): ?>
                        <a class="btn btn-xs btn-primary text-white" data-toggle="modal"
                          data-target="#addNextPackage"><i class="fas fa-plus"></i> <?php echo e(__('Add  Package')); ?></a>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Name') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->name); ?>

                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Username') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e($vendor->username); ?>

                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Email') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e($vendor->email); ?>

                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Phone') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e($vendor->phone); ?>

                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Country') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->country); ?>

                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('City') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->city); ?>

                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('State') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->state); ?>

                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Zip Code') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->zip_code); ?>

                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Address') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->address); ?>

                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4">
                    <strong><?php echo e(__('Details') . ' :'); ?></strong>
                  </div>
                  <div class="col-lg-8">
                    <?php echo e(@$vendor->vendor_info->details); ?>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card-title d-inline-block"><?php echo e(__('All Listings')); ?></div>
                </div>

                <div class="col-lg-3">
                  <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">

                  <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete" data-href="#">
                    <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

                  </button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="col-lg-12">
                <?php if(count($listings) == 0): ?>
                  <h3 class="text-center mt-2"><?php echo e(__('NO LISTING FOUND') . '!'); ?></h3>
                <?php else: ?>
                  <div class="table-responsive">
                    <table class="table table-striped mt-3" id="basic-datatables">
                      <thead>
                        <tr>
                          <th scope="col">
                            <input type="checkbox" class="bulk-check" data-val="all">
                          </th>
                          <th scope="col"><?php echo e(__('Title')); ?></th>
                          <th scope="col"><?php echo e(__('Featured')); ?></th>
                          <th scope="col"><?php echo e(__('Status')); ?></th>
                          <th scope="col"><?php echo e(__('Actions')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td>
                              <input type="checkbox" class="bulk-check" data-val="<?php echo e($listing->id); ?>">
                            </td>
                            <td>
                              <?php echo e(strlen(optional($listing->listing_content->first())->title) > 40 ? mb_substr(optional($listing->listing_content->first())->title, 0, 40, 'utf-8') . '...' : optional($listing->listing_content->first())->title); ?>

                            </td>
                            <?php if(count($charges) > 0): ?>
                              <td>
                                <?php
                                  $order_status = App\Models\FeatureOrder::where('listing_id', $listing->id)->first();
                                  $today_date = now()->format('Y-m-d');
                                ?>

                                <?php if(is_null($order_status)): ?>
                                  <button class="btn btn-primary featurePaymentModal btn-sm " data-toggle="modal"
                                    data-target="#featurePaymentModal_<?php echo e($listing->id); ?>"
                                    data-id="<?php echo e($listing->id); ?>" data-listing-id="<?php echo e($listing->id); ?>">
                                    <?php echo e(__('Manage')); ?>

                                  </button>
                                <?php endif; ?>

                                <?php if($order_status): ?>
                                  <?php if($order_status->order_status == 'pending'): ?>
                                    <h2 class="d-inline-block"><span
                                        class="badge badge-warning"><?php echo e(ucfirst('pending')); ?></span>
                                    </h2>
                                  <?php endif; ?>
                                  <?php if($order_status->order_status == 'completed'): ?>
                                    <?php if($order_status->end_date < $today_date): ?>
                                      <button class="btn btn-primary featurePaymentModal  btn-sm"
                                        data-toggle="modal"data-target="#featurePaymentModal_<?php echo e($listing->id); ?>"
                                        data-id="<?php echo e($listing->id); ?>"><?php echo e(__('Manage')); ?></button>
                                    <?php else: ?>
                                      <h1 class="d-inline-block text-large"><span
                                          class="badge badge-success"><?php echo e(ucfirst('Active')); ?></span>
                                      </h1>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <?php if($order_status->order_status == 'rejected'): ?>
                                    <button class="btn btn-primary featurePaymentModal btn-sm "
                                      data-toggle="modal"data-target="#featurePaymentModal_<?php echo e($listing->id); ?>"
                                      data-id="<?php echo e($listing->id); ?>"><?php echo e(__('Manage')); ?></button>
                                  <?php endif; ?>
                                <?php endif; ?>
                              </td>
                            <?php endif; ?>

                            <td>
                              <form id="statusForm<?php echo e($listing->id); ?>" class="d-inline-block"
                                action="<?php echo e(route('admin.listing_management.update_listing_status')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="listingId" value="<?php echo e($listing->id); ?>">
                                <select
                                  class="form-control <?php echo e($listing->status == 1 ? 'bg-success' : ($listing->status == 2 ? 'bg-danger' : 'bg-warning')); ?> form-control-sm"
                                  name="status"
                                  onchange="document.getElementById('statusForm<?php echo e($listing->id); ?>').submit();">
                                  <option value="1" <?php echo e($listing->status == 1 ? 'selected' : ''); ?>>
                                    <?php echo e(__('Approved')); ?>

                                  </option>
                                  <option value="0" <?php echo e($listing->status == 0 ? 'selected' : ''); ?>>
                                    <?php echo e(__('Pending')); ?>

                                  </option>
                                  <option value="2" <?php echo e($listing->status == 2 ? 'selected' : ''); ?>>
                                    <?php echo e(__('Rejected')); ?>

                                  </option>
                                </select>
                              </form>
                            </td>

                            <td>
                              <a class="btn btn-secondary btn-sm mr-1 mb-1"
                                href="<?php echo e(route('admin.listing_management.edit_listing', ['id' => $listing->id])); ?>">
                                <span class="btn-label">
                                  <i class="fas fa-edit" class="mar--3"></i>
                                </span>
                              </a>
                              <form class="deleteForm d-inline-block"
                                action="<?php echo e(route('admin.listing_management.delete_listing', ['id' => $listing->id])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm deleteBtn  mb-1">
                                  <span class="btn-label">
                                    <i class="fas fa-trash" class="mar--3"></i>
                                  </span>
                                </button>
                              </form>
                            </td>
                          </tr>
                          <?php echo $__env->make('admin.listing.feature-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if ($__env->exists('admin.end-user.vendor.edit-current-package')) echo $__env->make('admin.end-user.vendor.edit-current-package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('admin.end-user.vendor.add-current-package')) echo $__env->make('admin.end-user.vendor.add-current-package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('admin.end-user.vendor.edit-next-package')) echo $__env->make('admin.end-user.vendor.edit-next-package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('admin.end-user.vendor.add-next-package')) echo $__env->make('admin.end-user.vendor.add-next-package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/end-user/vendor/details.blade.php ENDPATH**/ ?>