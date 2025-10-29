<?php $__env->startSection('pageHeading'); ?>
  <?php echo e(__('Wishlist')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->wishlist_page_title : __('Wishlist'),
  ])) echo $__env->make('frontend.partials.breadcrumb', [
      'breadcrumb' => $bgImg->breadcrumb,
      'title' => !empty($pageHeading) ? $pageHeading->wishlist_page_title : __('Wishlist'),
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!--====== Start Dashboard Section ======-->
  <div class="user-dashboard pt-100 pb-60" style="background-color: #0c0b2d;">
    <div class="container">
      <div class="row gx-xl-5">
        <?php if ($__env->exists('frontend.user.side-navbar')) echo $__env->make('frontend.user.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
          <div class="account-info radius-md mb-40">
            <div class="title">
              <h4><?php echo e(__('Wishlist')); ?></h4>
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
                              <td class="title"><a
                                  href="<?php echo e(route('frontend.listing.details', ['slug' => $content->slug, 'id' => $item->listing_id])); ?>"
                                  target="_blank">
                                  <?php echo e(strlen(@$content->title) > 50 ? mb_substr(@$content->title, 0, 50, 'utf-8') . '...' : @$content->title); ?>

                                </a>
                              </td>
                              <td>
                                <a href="<?php echo e(route('frontend.listing.details', [$content->slug, $item->listing_id])); ?>"
                                  class="btn icon-start"target="_blank">
                                  <i class="fas fa-eye"></i>
                                  <?php echo e(__('View')); ?>

                                </a>
                                <a href="<?php echo e(route('remove.wishlist', $item->listing_id)); ?>" class="btn icon-start">
                                  <i class="fas fa-times"></i>
                                  <?php echo e(__('Remove')); ?>

                                </a>
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

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/user/wishlist.blade.php ENDPATH**/ ?>