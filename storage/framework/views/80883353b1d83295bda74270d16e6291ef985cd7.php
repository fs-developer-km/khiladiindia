<?php if ($__env->exists('admin.partials.rtl_style')) echo $__env->make('admin.partials.rtl_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Products')); ?></h4>
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
        <a href="#"><?php echo e(__('Listings Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a
          href="<?php echo e(route('admin.listing_management.listing', ['language' => $defaultLang->code])); ?>"><?php echo e(__('Manage Listings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
          <?php if(!empty($dd)): ?>
            <?php echo e(strlen(@$dd->title) > 30 ? mb_substr(@$dd->title, 0, 30, 'utf-8') . '...' : @$dd->title); ?>

          <?php endif; ?>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Products')); ?></a>
      </li>
    </ul>
  </div>

  <?php

    $vendor_id = App\Models\Listing\Listing::where('id', $listing_id)->pluck('vendor_id')->first();

    if ($vendor_id != 0) {
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendor_id);

        $dowgraded = App\Http\Helpers\VendorPermissionHelper::packagesDowngraded($vendor_id);
        $listingCanAdd = packageTotalListing($vendor_id) - vendorTotalListing($vendor_id);
    }

  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"> <?php echo e(__('Products')); ?>

              </div>
            </div>
            <div class="col-lg-2">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-lg-6 mt-2 mt-lg-0">
              <div class="btn-groups gap-10 justify-content-lg-end">
                <?php if($title): ?>
                  <a class="btn btn-success btn-sm d-inline-block"
                    href="<?php echo e(route('frontend.listing.details', ['slug' => @$title->slug, 'id' => @$title->listing_id])); ?>"
                    target="_blank">
                    <span class="btn-label">
                      <i class="fas fa-eye"></i>
                    </span>
                    <?php echo e(__('Preview')); ?>

                  </a>
                <?php endif; ?>

                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.listing_management.listing')); ?>">
                  <span class="btn-label">
                    <i class="fas fa-backward"></i>
                  </span>
                  <?php echo e(__('Back')); ?>

                </a>

                <?php if($vendor_id != 0): ?>
                  <button type="button" class="btn btn-primary btn-sm" id="aa" data-toggle="modal"
                    data-target="#adminCheckLimitModal">

                    <?php if(
                        $dowgraded['listingImgDown'] ||
                            $dowgraded['listingFaqDown'] ||
                            $dowgraded['listingProductDown'] ||
                            $dowgraded['featureDown'] ||
                            $dowgraded['socialLinkDown'] ||
                            $dowgraded['amenitieDown'] ||
                            $dowgraded['listingProductImgDown'] ||
                            $listingCanAdd < 0): ?>
                      <i class="fas fa-exclamation-triangle text-danger"></i>
                    <?php endif; ?>
                    <?php echo e(__('Check Limit')); ?>

                  </button>
                <?php endif; ?>

                <a href="<?php echo e(route('admin.listing_management.create_Product', ['id' => $listing_id])); ?>"
                  class="btn btn-primary btn-sm"><i class="fas fa-plus">
                  </i> <?php echo e(__('Add Product')); ?>

                </a>

                <button class="btn btn-danger btn-sm d-none bulk-delete"
                  data-href="<?php echo e(route('admin.listing_management.listing.product.bulk_delete_product')); ?>"><i
                    class="flaticon-interface-5"></i>
                  <?php echo e(__('Delete')); ?>

                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($listing_products) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO PRODUCT FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $listing_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($product->id); ?>">
                          </td>
                          <td>
                            <?php
                              $listing_product_content = App\Models\Listing\ListingProductContent::where(
                                  'listing_product_id',
                                  $product->id,
                              )
                                  ->where('language_id', $language->id)
                                  ->first();
                            ?>
                            <?php if(!empty($listing_product_content)): ?>
                              <?php echo e(strlen(@$listing_product_content->title) > 50 ? mb_substr(@$listing_product_content->title, 0, 50, 'utf-8') . '...' : @$listing_product_content->title); ?>

                            <?php else: ?>
                              --
                            <?php endif; ?>
                          </td>

                          <td>
                            <form id="statusForm<?php echo e($product->id); ?>" class="d-inline-block"
                              action="<?php echo e(route('admin.listing_management.listing.update_product_status')); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="productId" value="<?php echo e($product->id); ?>">

                              <select
                                class="form-control <?php echo e($product->status == 1 ? 'bg-success' : 'bg-danger'); ?> form-control-sm"
                                name="status"
                                onchange="document.getElementById('statusForm<?php echo e($product->id); ?>').submit();">
                                <option value="1" <?php echo e($product->status == 1 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Active')); ?>

                                </option>
                                <option value="0" <?php echo e($product->status == 0 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Inactive')); ?>

                                </option>
                              </select>
                            </form>
                          </td>

                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a href="<?php echo e(route('admin.listing_management.edit_product', ['id' => $product->id])); ?>"
                                  class="dropdown-item">
                                  <?php echo e(__('Edit')); ?>

                                </a>

                                <form class="deleteForm d-block"
                                  action="<?php echo e(route('admin.listing_management.product.delete_product', ['id' => $product->id])); ?>"
                                  method="post">
                                  <?php echo csrf_field(); ?>
                                  <button type="submit" class="deleteBtn">
                                    <?php echo e(__('Delete')); ?>

                                  </button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="center">
            <?php echo e($listing_products->appends([
                    'language' => request()->input('language'),
                ])->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($__env->exists('admin.listing.check-limit')) echo $__env->make('admin.listing.check-limit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/listing/product/index.blade.php ENDPATH**/ ?>