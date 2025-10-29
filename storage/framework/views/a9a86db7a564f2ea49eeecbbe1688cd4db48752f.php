

<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => !empty($bgImg) ? $bgImg->breadcrumb : '',
      'title' => !empty($pageHeading) ? $pageHeading->dashboard_page_title : __('Dashboard'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => !empty($bgImg) ? $bgImg->breadcrumb : '',
      'title' => !empty($pageHeading) ? $pageHeading->dashboard_page_title : __('Dashboard'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60" style="background-color: #0c0b2d;">
    <div class="container">
      <div class="row gx-xl-5">
        <?php if ($__env->exists('frontend.user.side-navbar')) echo $__env->make('frontend.user.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="col-lg-9">
            
  <div class="user-profile-details mb-30">
  <!-- Google Font (Poppins) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <div class="card shadow-lg border-0 rounded-4 p-4" style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex align-items-center mb-4">
      <div class="me-3">
        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
          <i class="fas fa-user-circle fa-2x"></i>
        </div>
      </div>
      <div>
        <h4 class="mb-0 text-dark"><?php echo e(__('Account Information')); ?></h4>
        <small class="text-muted"><?php echo e(__('Your basic profile details')); ?></small>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php
        $info = [
          ['label' => 'Name', 'icon' => 'user', 'value' => $authUser->name],
          ['label' => 'Username', 'icon' => 'user-tag', 'value' => $authUser->username],
          ['label' => 'Email', 'icon' => 'envelope', 'value' => $authUser->email],
          ['label' => 'Phone', 'icon' => 'phone', 'value' => $authUser->phone],
          ['label' => 'City', 'icon' => 'city', 'value' => $authUser->city],
          ['label' => 'Country', 'icon' => 'globe', 'value' => $authUser->country],
          ['label' => 'State', 'icon' => 'map-marker-alt', 'value' => $authUser->state],
          ['label' => 'Zip Code', 'icon' => 'mail-bulk', 'value' => $authUser->zip_code],
        ];
      ?>

      <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
          <div class="d-flex align-items-center p-3 bg-light rounded h-100">
            <div class="me-3">
              <div class="bg-white text-primary shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-<?php echo e($item['icon']); ?>"></i>
              </div>
            </div>
            <div>
              <div class="text-muted small"><?php echo e(__($item['label'])); ?></div>
              <div class="fw-semibold"><?php echo e($item['value']); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <!-- Address (Full Width) -->
      <div class="col-12">
        <div class="d-flex align-items-start p-3 bg-light rounded">
          <div class="me-3">
            <div class="bg-white text-primary shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
              <i class="fas fa-map"></i>
            </div>
          </div>
          <div>
            <div class="text-muted small"><?php echo e(__('Address')); ?></div>
            <div class="fw-semibold"><?php echo e($authUser->address); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo e(route('user.wishlist')); ?>">
                <div class="card card-box radius-md mb-30 color-1">
                  <div class="card-icon mb-15">
                    <i class="ico-grid"></i>
                  </div>
                  <div class="card-info">
                    <h3 class="mb-0"><?php echo e(count($wishlists)); ?></h3>
                    <p class="mb-0"><?php echo e(__('Wishlist Items')); ?></p>
                  </div>
                </div>
              </a>
            </div>
            <?php if($basicInfo->shop_status == 1): ?>
              <div class="col-md-6">
                <a href="<?php echo e(route('user.order.index')); ?>">
                  <div class="card card-box radius-md mb-30 color-2">
                    <div class="card-icon mb-15">
                      <i class="ico-grid"></i>
                    </div>
                    <div class="card-info">
                      <h3 class="mb-0"><?php echo e(count($orders)); ?></h3>
                      <p class="mb-0"><?php echo e(__('Total Orders')); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            <?php endif; ?>
          </div>
          

          <div class="account-info radius-md mb-40">
            <div class="title">
              <h4><?php echo e(__('Wishlists')); ?></h4>
            </div>
            <div class="main-info">
              <?php if(count($wishlists) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO WISHLIST ITEM FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="main-table">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped w-100">
                      <thead>
                        <tr>
                          <th><?php echo e(__('Serial')); ?></th>
                          <th><?php echo e(__('Listing title')); ?></th>
                          <th><?php echo e(__('Action')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                        ?>
                        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $content = DB::table('listing_contents')
                                ->where([['listing_id', $item->listing_id], ['language_id', $language->id]])
                                ->select('title', 'slug')
                                ->first();
                          ?>
                          <?php if(!is_null($content)): ?>
                            <tr>
                              <td>#<?php echo e($loop->iteration); ?></td>
                              <td>
                                <a href="<?php echo e(route('frontend.listing.details', ['slug' => $content->slug, 'id' => $item->listing_id])); ?>"
                                  target="_blank">
                                  <?php echo e(strlen(@$content->title) > 50 ? mb_substr(@$content->title, 0, 50, 'utf-8') . '...' : @$content->title); ?>

                                </a>
                              </td>
                              <td>
                                <a href="<?php echo e(route('frontend.listing.details', [$content->slug, $item->listing_id])); ?>"
                                  class="btn"target="_blank"><i class="fas fa-eye"></i> <?php echo e(__('View')); ?></a>
                                <a href="<?php echo e(route('remove.wishlist', $item->listing_id)); ?>" class="btn btn-danger"><i
                                    class="fas fa-times"></i><?php echo e(__('Remove')); ?></a>
                              </td>
                            </tr>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
  <!--====== End Dashboard Section ======-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/user/dashboard.blade.php ENDPATH**/ ?>