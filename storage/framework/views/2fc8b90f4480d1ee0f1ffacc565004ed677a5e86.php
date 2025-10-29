<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Manage Social Link')); ?></h4>
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
      <?php
        $dContent = App\Models\Listing\ListingContent::where('listing_id', $listing_id)
            ->where('language_id', $defaultLang->id)
            ->first();
        $title = !empty($dContent) ? $dContent->title : '';
      ?>
      <li class="nav-item">
        <a href="#">
          <?php if(!empty($title)): ?>
            <?php echo e(strlen(@$title) > 20 ? mb_substr(@$title, 0, 20, 'utf-8') . '...' : @$title); ?>

          <?php endif; ?>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Manage Social Link')); ?></a>
      </li>
    </ul>
  </div>

  <?php
    $vendorId = App\Models\Listing\Listing::where('id', $listing_id)->pluck('vendor_id')->first();

    if ($vendorId != 0) {
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendorId);

        if (!empty($current_package) && !empty($current_package->features)) {
            $permissions = json_decode($current_package->features, true);
            $SocialLinkLimit = packageTotalSocialLink($vendorId);
        } else {
            $permissions = null;
            $SocialLinkLimit = 0;
        }
    } else {
        $permissions = ['Social Links'];
        $SocialLinkLimit = 999999;
    }
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__(' Manage Social Link')); ?></div>
          <a class="btn btn-info btn-sm float-right d-inline-block"
            href="<?php echo e(route('admin.listing_management.listing', ['language' => $defaultLang->code])); ?>">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            <?php echo e(__('Back')); ?>

          </a>
          <?php
            $dContent = App\Models\Listing\ListingContent::where('listing_id', $listing_id)
                ->where('language_id', $defaultLang->id)
                ->first();
            $slug = !empty($dContent) ? $dContent->slug : '';
          ?>
          <?php if($dContent): ?>
            <a class="btn btn-success btn-sm float-right mr-1 d-inline-block"
              href="<?php echo e(route('frontend.listing.details', ['slug' => $slug, 'id' => $listing_id])); ?>" target="_blank">
              <span class="btn-label">
                <i class="fas fa-eye"></i>
              </span>
              <?php echo e(__('Preview')); ?>

            </a>
          <?php endif; ?>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="alert alert-danger pb-1 dis-none" id="listingErrors">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul></ul>
              </div>
              <form id="listingForm" action="<?php echo e(route('admin.listing_management.update_social_link', $listing_id)); ?>"
                method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="listing_id" value="<?php echo e($listing_id); ?>">

                <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <h4><?php echo e(__('Social Links')); ?></h4>
                      <div class="js-repeaters">
                        <div class="mb-3">
                          <br>
                          <button class="btn btn-primary js-repeaters-add"
                            type="button">+<?php echo e(__('Add Socail Link')); ?></button>
                        </div>
                        <div id="js-repeaters-container">

                          <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="js-repeaters-item p-3" data-item="<?php echo e($keys); ?>">
                              <div class="row align-items-end gutters-2">
                                <div class="col-sm-4 col-lg-3">
                                  <label for="form" class="form-label mb-1"><?php echo e(__('Social Link')); ?></label>
                                  <div class="mb-2">
                                    <input type="text" required class="form-control" value="<?php echo e($link->link); ?>"
                                      name="socail_link[]">
                                  </div>
                                </div>
                                <div class="col-sm-4 col-lg-3">
                                  <label for="form" class="form-label mb-1"><?php echo e(__('Select Icon')); ?></label>
                                  <div class="mb-2">
                                    <button class="btn btn-primary iconpicker-component aaa">
                                      <i class="<?php echo e($link->icon); ?>"></i>
                                    </button>
                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                      data-selected="fa-car" data-toggle="dropdown">
                                    </button>
                                    <div class="dropdown-menu"></div>
                                  </div>
                                </div>
                                <div class="col">
                                  <a href="javascript:void(0)" data-social_link="<?php echo e($link->id); ?>"
                                    class="btn btn-danger btn-sm js-repeaters-remove mb-2 mr-2 deleteSocialLink">
                                    X</a>
                                </div>
                                <div class="repeaters-child-list mt-2 col-12" id="options${it}"></div>
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-12 text-center">
              <button type="submit" form="listingForm" class="btn btn-primary">
                <?php echo e(__('Update')); ?>

              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/admin-partial.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/admin-listing.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/social-link.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('variables'); ?>
  <script>
    "use strict";
    var socialRmvUrl = "<?php echo e(route('admin.listing_management.social_delete')); ?>"
    var SocialLinkLimit = <?php echo e($SocialLinkLimit - 1); ?>;
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/listing/social-link.blade.php ENDPATH**/ ?>