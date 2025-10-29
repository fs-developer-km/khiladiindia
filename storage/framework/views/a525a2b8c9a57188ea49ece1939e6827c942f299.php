<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('All Requests')); ?></h4>
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
        <a href="#"><?php echo e(__('Featured Listings')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('All Requests')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-10">
              <form id="searchForm" action="<?php echo e(route('admin.featured_listing.all_request')); ?>" method="GET">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Order Number')); ?></label>
                      <input name="order_no" type="text" id="order_no" class="form-control"
                        placeholder="Search Here..."
                        value="<?php echo e(!empty(request()->input('order_no')) ? request()->input('order_no') : ''); ?>">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label><?php echo e(__('Listing Title')); ?></label>
                      <input name="title" type="text" id="listing_title" class="form-control"
                        placeholder="Search Here..."
                        value="<?php echo e(!empty(request()->input('title')) ? request()->input('title') : ''); ?>">
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Payment')); ?></label>
                      <select class="form-control h-42" name="payment_status"
                        onchange="document.getElementById('searchForm').submit()">
                        <option value="" <?php echo e(empty(request()->input('payment_status')) ? 'selected' : ''); ?>>
                          <?php echo e(__('All')); ?>

                        </option>
                        <option value="completed"
                          <?php echo e(request()->input('payment_status') == 'completed' ? 'selected' : ''); ?>>
                          <?php echo e(__('Completed')); ?>

                        </option>
                        <option value="pending" <?php echo e(request()->input('payment_status') == 'pending' ? 'selected' : ''); ?>>
                          <?php echo e(__('Pending')); ?>

                        </option>
                        <option value="rejected"
                          <?php echo e(request()->input('payment_status') == 'rejected' ? 'selected' : ''); ?>>
                          <?php echo e(__('Rejected')); ?>

                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Order')); ?></label>
                      <select class="form-control h-42" name="order_status"
                        onchange="document.getElementById('searchForm').submit()">
                        <option value="" <?php echo e(empty(request()->input('order_status')) ? 'selected' : ''); ?>>
                          <?php echo e(__('All')); ?>

                        </option>
                        <option value="pending" <?php echo e(request()->input('order_status') == 'pending' ? 'selected' : ''); ?>>
                          <?php echo e(__('Pending')); ?>

                        </option>
                        <option value="completed"
                          <?php echo e(request()->input('order_status') == 'completed' ? 'selected' : ''); ?>>
                          <?php echo e(__('Approved')); ?>

                        </option>
                        <option value="rejected" <?php echo e(request()->input('order_status') == 'rejected' ? 'selected' : ''); ?>>
                          <?php echo e(__('Rejected')); ?>

                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label><?php echo e(__('Language')); ?></label>
                      <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                  </div>

                </div>
              </form>
            </div>

            <div class="col-lg-2">
              <button class="btn btn-danger btn-sm d-none bulk-delete float-lg-right"
                data-href="<?php echo e(route('admin.featured_listing.bulk_delete_order')); ?>" class="card-header-button">
                <i class="flaticon-interface-5"></i> <?php echo e(__('Delete')); ?>

              </button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($orders) == 0): ?>
                <h3 class="text-center mt-3"><?php echo e(__('NO REQUEST FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-2">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Order No.')); ?></th>
                        <th scope="col"><?php echo e(__('Listing Title')); ?></th>
                        <th scope="col"><?php echo e(__('Paid via')); ?></th>
                        <th scope="col"><?php echo e(__('Payment Status')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Days')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($order->id); ?>">
                          </td>
                          <td><?php echo e('#' . $order->order_number); ?></td>
                          <td class="title">
                            <?php
                              $listing_content = App\Models\Listing\ListingContent::Where([
                                  ['listing_id', $order->listing_id],
                                  ['language_id', $language->id],
                              ])
                                  ->select('title', 'listing_id', 'slug')
                                  ->first();
                            ?>
                            <?php if(!empty($listing_content)): ?>
                              <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $listing_content->listing_id])); ?>"
                                target="_blank">
                                <?php echo e(strlen(@$listing_content->title) > 60 ? mb_substr(@$listing_content->title, 0, 60, 'utf-8') . '...' : @$listing_content->title); ?>

                              </a>
                            <?php else: ?>
                              --
                            <?php endif; ?>
                          </td>
                          <td><?php echo e($order->payment_method); ?></td>
                          <td>
                            <?php if($order->gateway_type == 'online'): ?>
                              <h2 class="d-inline-block"><span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                              </h2>
                            <?php else: ?>
                              <?php if($order->payment_status == 'pending'): ?>
                                <form id="paymentStatusForm-<?php echo e($order->id); ?>" class="d-inline-block"
                                  action="<?php echo e(route('admin.featured_listing.update_payment_status', ['id' => $order->id])); ?>"
                                  method="post">
                                  <?php echo csrf_field(); ?>
                                  <select
                                    class="form-control form-control-sm <?php if($order->payment_status == 'pending'): ?> bg-warning text-dark <?php elseif($order->payment_status == 'completed'): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>"
                                    name="payment_status"
                                    onchange="document.getElementById('paymentStatusForm-<?php echo e($order->id); ?>').submit()">
                                    <option value="pending" <?php echo e($order->payment_status == 'pending' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Pending')); ?>

                                    </option>
                                    <option value="completed"
                                      <?php echo e($order->payment_status == 'completed' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Completed')); ?>

                                    </option>
                                    <option value="rejected"
                                      <?php echo e($order->payment_status == 'rejected' ? 'selected' : ''); ?>>
                                      <?php echo e(__('Rejected')); ?>

                                    </option>
                                  </select>
                                </form>
                              <?php else: ?>
                                <h2 class="d-inline-block"><span
                                    class="badge badge-<?php echo e($order->payment_status == 'completed' ? 'success' : 'danger'); ?>"><?php echo e(ucfirst($order->payment_status)); ?></span>
                                </h2>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($order->order_status == 'pending'): ?>
                              <form id="orderStatusForm-<?php echo e($order->id); ?>" class="d-inline-block"
                                action="<?php echo e(route('admin.featured_listing.update_order_status', ['id' => $order->id])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <select
                                  class="form-control form-control-sm <?php if($order->order_status == 'pending'): ?> bg-warning text-dark <?php elseif($order->order_status == 'processing'): ?> bg-primary <?php elseif($order->order_status == 'completed'): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>"
                                  name="order_status"
                                  onchange="document.getElementById('orderStatusForm-<?php echo e($order->id); ?>').submit()">
                                  <option value="pending" selected><?php echo e(__('Pending')); ?></option>
                                  <option value="completed"><?php echo e(__('Approved')); ?></option>
                                  <option value="rejected"><?php echo e(__('Rejected')); ?></option>
                                </select>
                              </form>
                            <?php else: ?>
                              <h2 class="d-inline-block"><span
                                  class="badge badge-<?php echo e($order->order_status == 'completed' ? 'success' : 'danger'); ?>">
                                  <?php echo e($order->order_status == 'completed' ? 'approved' : $order->order_status); ?>

                                </span>
                              </h2>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($order->order_status == 'completed'): ?>
                              <?php echo e($order->days); ?> <?php echo e(__('days')); ?>

                              (<?php echo e(\Carbon\Carbon::parse($order->start_date)->format('j F, Y')); ?> -
                              <?php echo e(\Carbon\Carbon::parse($order->end_date)->format('j F, Y')); ?>)
                            <?php else: ?>
                              <?php echo e($order->days); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <?php if(!empty($order->attachment)): ?>
                                  <a href="#" class="dropdown-item" data-toggle="modal"
                                    data-target="#receiptModal-<?php echo e($order->id); ?>">
                                    <?php echo e(__('Receipt')); ?>

                                  </a>
                                <?php endif; ?>

                                <a href="#" class="dropdown-item" data-toggle="modal"
                                  data-target="#detailsModal_<?php echo e($order->id); ?>">
                                  <?php echo e(__('Details')); ?>

                                </a>


                                <form class="deleteForm d-block"
                                  action="<?php echo e(route('admin.featured_listing.delete', ['id' => $order->id])); ?>"
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
                        <?php if ($__env->exists('admin.featured-listing.show-receipt')) echo $__env->make('admin.featured-listing.show-receipt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if ($__env->exists('admin.featured-listing.details')) echo $__env->make('admin.featured-listing.details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="mt-3 text-center">
            <div class="d-inline-block mx-auto">
              <?php echo e($orders->appends([
                      'order_no' => request()->input('order_no'),
                      'payment_status' => request()->input('payment_status'),
                      'order_status' => request()->input('order_status'),
                      'title' => request()->input('title'),
                      'language' => request()->input('language'),
                  ])->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/featured-listing/index.blade.php ENDPATH**/ ?>