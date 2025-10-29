<?php if ($__env->exists('admin.partials.rtl_style')) echo $__env->make('admin.partials.rtl_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Listings')); ?></h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo e(route('vendor.dashboard')); ?>">
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
        <a href="#"><?php echo e(__('Listings')); ?></a>
      </li>
    </ul>
  </div>
  <?php
    $vendor_id = Auth::guard('vendor')->user()->id;

    if ($vendor_id) {
        $current_package = App\Http\Helpers\VendorPermissionHelper::packagePermission($vendor_id);

        if (!empty($current_package) && !empty($current_package->features)) {
            $permissions = json_decode($current_package->features, true);
        } else {
            $permissions = null;
        }
    } else {
        $permissions = null;
    }
  ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-lg-2">
              <div class="card-title d-inline-block"><?php echo e(__('Listings')); ?></div>
            </div>

            <div class="col-lg-7">
              <form action="<?php echo e(route('vendor.listing_management.listing')); ?>" method="get" id="listingSearchForm">
                <div class="row">

                  <div class="col-md-3 mt-2 mt-lg-0">
                    <select name="category" id="" class="select2"
                      onchange="document.getElementById('listingSearchForm').submit()">
                      <option value="" selected disabled><?php echo e(__('Search by Category')); ?></option>
                      <option value="All" <?php echo e(request()->input('category') == 'All' ? 'selected' : ''); ?>>
                        <?php echo e(__('All')); ?></option>
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($category->slug == request()->input('category')): echo 'selected'; endif; ?> value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col-md-3 mt-2 mt-lg-0">
                    <input type="text" name="title" value="<?php echo e(request()->input('title')); ?>" class="form-control"
                      placeholder="Title">
                  </div>
                  <div class="col-md-3 mt-2 mt-lg-0">
                    <select name="status" id="" class="select2"
                      onchange="document.getElementById('listingSearchForm').submit()">
                      <option value="" selected disabled><?php echo e(__('Search by Approve Status')); ?></option>
                      <option value="All" <?php echo e(request()->input('status') == 'All' ? 'selected' : ''); ?>>
                        <?php echo e(__('All')); ?></option>
                      <option value="approved" <?php echo e(request()->input('status') == 'approved' ? 'selected' : ''); ?>>
                        <?php echo e(__('Approved')); ?>

                      </option>
                      <option value="pending" <?php echo e(request()->input('status') == 'pending' ? 'selected' : ''); ?>>
                        <?php echo e(__('Pending')); ?>

                      </option>
                      <option value="rejected" <?php echo e(request()->input('status') == 'rejected' ? 'selected' : ''); ?>>
                        <?php echo e(__('Rejected')); ?>

                      </option>
                    </select>
                  </div>
                  <div class="col-md-3 mt-2 mt-lg-0">
                    <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-lg-3 mt-3 mt-lg-0">
              <div class="btn-groups gap-10 justify-content-lg-end">
                <a href="<?php echo e(route('vendor.listing_management.create_listing')); ?>" class="btn btn-primary btn-sm"><i
                    class="fas fa-plus"></i> <?php echo e(__('Add Listing')); ?></a>
                <button class="btn btn-danger btn-sm d-none bulk-delete"
                  data-href="<?php echo e(route('vendor.listing_management.bulk_delete.listing')); ?>"><i
                    class="flaticon-interface-5"></i>
                  <?php echo e(__('Delete')); ?></button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($listings) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO LISTING FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Featured Image')); ?></th>
                        <th scope="col"><?php echo e(__('Title')); ?></th>
                        <?php if(count($charges) > 0): ?>
                          <th scope="col"><?php echo e(__('Featured Status')); ?></th>
                        <?php endif; ?>
                        <th scope="col"><?php echo e(__('Category')); ?></th>
                        <th scope="col"><?php echo e(__('Approve Status')); ?></th>
                        <th scope="col"><?php echo e(__('Hide/Show')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $listing_content = $listing->listing_content->first();
                          if (is_null($listing_content)) {
                              $listing_content = App\Models\Listing\ListingContent::where('listing_id', $listing->id)
                                  ->where('language_id', $language->id)
                                  ->first();
                          }
                        ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($listing->id); ?>">
                          </td>

                          <td>
                            <?php if(!empty($listing_content)): ?>
                              <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing->id])); ?>"
                                target="_blank">
                                <div class="max-dimensions">
                                  <img
                                    src="<?php echo e($listing->feature_image ? asset('assets/img/listing/' . $listing->feature_image) : asset('assets/admin/img/noimage.jpg')); ?>"
                                    alt="..." class="uploaded-img">
                                </div>
                              </a>
                            <?php else: ?>
                              <div class="max-dimensions">
                                <img
                                  src="<?php echo e($listing->feature_image ? asset('assets/img/listing/' . $listing->feature_image) : asset('assets/admin/img/noimage.jpg')); ?>"
                                  alt="..." class="uploaded-img">
                              </div>
                            <?php endif; ?>
                          </td>
                          <td class="title">
                            <?php if(!empty($listing_content)): ?>
                              <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing->id])); ?>"
                                target="_blank">
                                <?php echo e(strlen(@$listing_content->title) > 50 ? mb_substr(@$listing_content->title, 0, 50, 'utf-8') . '...' : @$listing_content->title); ?>

                              </a>
                            <?php else: ?>
                              --
                            <?php endif; ?>
                          </td>
                          <?php if(count($charges) > 0): ?>
                            <td>
                              <?php
                                $order_status = App\Models\FeatureOrder::where('listing_id', $listing->id)->first();
                                $today_date = now()->format('Y-m-d');
                              ?>

                              <?php if(is_null($order_status)): ?>
                                <button class="btn btn-primary featurePaymentModal btn-sm " data-toggle="modal"
                                  data-target="#featurePaymentModal_<?php echo e($listing->id); ?>" data-id="<?php echo e($listing->id); ?>"
                                  data-listing-id="<?php echo e($listing->id); ?>">
                                  <?php echo e(__('Pay to Feature')); ?>

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
                                      data-id="<?php echo e($listing->id); ?>"><?php echo e(__('Pay to Feature')); ?></button>
                                  <?php else: ?>
                                    <h1 class="d-inline-block text-large"><span
                                        class="badge badge-success"><?php echo e(ucfirst('Active')); ?></span>
                                    </h1>
                                  <?php endif; ?>
                                <?php endif; ?>
                                <?php if($order_status->order_status == 'rejected'): ?>
                                  <button class="btn btn-primary featurePaymentModal btn-sm "
                                    data-toggle="modal"data-target="#featurePaymentModal_<?php echo e($listing->id); ?>"
                                    data-id="<?php echo e($listing->id); ?>"><?php echo e(__('Pay to Feature')); ?></button>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                          <?php endif; ?>
                          <td>
                            <?php if(!empty($listing_content)): ?>
                              <?php
                                $categoryName = App\Models\ListingCategory::where(
                                    'id',
                                    $listing_content->category_id,
                                )->first();
                              ?>

                              <a href="<?php echo e(route('frontend.listings', ['category_id' => @$categoryName->slug])); ?>"
                                target="_blank">

                                <?php echo e(@$categoryName->name); ?>

                              </a>
                            <?php else: ?>
                              --
                            <?php endif; ?>

                          </td>
                          <td>
                            <?php if($listing->status == 1): ?>
                              <h2 class="d-inline-block"><span class="badge badge-success"><?php echo e(__('Approved')); ?></span>
                              </h2>
                            <?php elseif($listing->status == 2): ?>
                              <h2 class="d-inline-block"><span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                              </h2>
                            <?php else: ?>
                              <h2 class="d-inline-block"><span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                              </h2>
                            <?php endif; ?>
                          </td>
                          <td>
                            <form id="visibilityStatusForm<?php echo e($listing->id); ?>" class="d-inline-block"
                              action="<?php echo e(route('vendor.listing_management.update_listing_visibility')); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="listingId" value="<?php echo e($listing->id); ?>">
                              <select
                                class="form-control <?php echo e($listing->visibility == 1 ? 'bg-success' : 'bg-danger'); ?> form-control-sm"
                                name="visibility"
                                onchange="document.getElementById('visibilityStatusForm<?php echo e($listing->id); ?>').submit();">
                                <option value="1" <?php echo e($listing->visibility == 1 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Show')); ?>

                                </option>
                                <option value="0" <?php echo e($listing->visibility == 0 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Hide')); ?>

                                </option>
                              </select>
                            </form>
                          </td>

                          <td>
                            <?php if($current_package == '[]'): ?>
                              <form class="deleteForm d-block"
                                action="<?php echo e(route('vendor.listing_management.delete_listing', ['id' => $listing->id])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger  mt-1 btn-sm deleteBtn">
                                  <span class="btn-label">
                                    <i class="fas fa-trash"></i>
                                  </span>
                                </button>
                              </form>
                            <?php else: ?>
                              <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false">
                                  <?php echo e(__('Select')); ?>

                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                  <a href="<?php echo e(route('vendor.listing_management.edit_listing', ['id' => $listing->id])); ?>"
                                    class="dropdown-item">
                                    <?php echo e(__('Edit')); ?>

                                  </a>
                                  <?php if(!empty($listing_content)): ?>
                                    <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing->id])); ?>"
                                      class="dropdown-item"target="_blank">
                                      <?php echo e(__('Preview')); ?>

                                    </a>
                                  <?php endif; ?>
                                  <?php if(is_array($permissions) && in_array('Products', $permissions)): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.listing.products', ['id' => $listing->id, 'language' => $defaultLang->code])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('Manage Products')); ?>

                                    </a>
                                  <?php endif; ?>

                                  <?php if(is_array($permissions) &&
                                          (in_array('Messenger', $permissions) ||
                                              in_array('WhatsApp', $permissions) ||
                                              in_array('Telegram', $permissions) ||
                                              in_array('Tawk.To', $permissions))): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.listing.plugins', ['id' => $listing->id])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('Manage Plugins')); ?>

                                    </a>
                                  <?php endif; ?>

                                  <?php if(is_array($permissions) && in_array('Business Hours', $permissions)): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.listing.business_hours', ['id' => $listing->id])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('Business Hours')); ?>

                                    </a>
                                  <?php endif; ?>
                                  <?php if(is_array($permissions) && in_array('Social Links', $permissions)): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.manage_social_link', ['id' => $listing->id])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('Social Links')); ?>

                                    </a>
                                  <?php endif; ?>
                                  <?php if(is_array($permissions) && in_array('Feature', $permissions)): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.manage_additional_specifications', ['id' => $listing->id])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('Features')); ?>

                                    </a>
                                  <?php endif; ?>

                                  <?php if(is_array($permissions) && in_array('FAQ', $permissions)): ?>
                                    <a href="<?php echo e(route('vendor.listing_management.listing.faq', ['id' => $listing->id, 'language' => $defaultLang->code])); ?>"
                                      class="dropdown-item">
                                      <?php echo e(__('FAQs')); ?>

                                    </a>
                                    </a>
                                  <?php endif; ?>

                                  <form class="deleteForm d-block"
                                    action="<?php echo e(route('vendor.listing_management.delete_listing', ['id' => $listing->id])); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="deleteBtn">
                                      <?php echo e(__('Delete')); ?>

                                    </button>
                                  </form>
                                </div>
                              </div>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php echo $__env->make('vendors.listing.feature-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php if(count($listings) < 3): ?>
                        <tr class="opacity-0">
                          <td></td>
                        </tr>
                        <tr class="opacity-0">
                          <td></td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="center">
            <?php echo e($listings->appends([
                    'title' => request()->input('title'),
                    'category' => request()->input('category'),
                    'status' => request()->input('status'),
                    'language' => request()->input('language'),
                ])->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="<?php echo e($anetSource); ?>"></script>
  <script>
    "use strict";
    let stripe_key = "<?php echo e($stripe_key); ?>";
    let public_key = "<?php echo e($anetClientKey); ?>";
    let login_id = "<?php echo e($anetLoginId); ?>";
    var featurePament = "<?php echo e(Session::get('featurePaymentModal')); ?>";
    var modalName = "<?php echo e(Session::get('modalName')); ?>";
    var sessionForget = "<?php echo e(route('vendor.listing_management.listing.purchase_feature.session_forget')); ?>";
  </script>
  <script src="<?php echo e(asset('assets/js/vendor-feature-checkout.js')); ?>"></script>
  <script>
    "use strict";
    <?php if(old('gateway') == 'autorize.net'): ?>
      $(document).ready(function() {
        $('#stripe-element').removeClass('d-none');
      })
    <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/listing/index.blade.php ENDPATH**/ ?>