<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Messages')); ?></h4>
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
        <a href="#"><?php echo e(__('Messages')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Listing Messages')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Messages')); ?></div>
            </div>
            <div class="col-lg-3">
              <?php if ($__env->exists('admin.partials.languages')) echo $__env->make('admin.partials.languages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">

              <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                data-href="<?php echo e(route('admin.listing.message.bulk_delete.message')); ?>"><i class="flaticon-interface-5"></i>
                <?php echo e(__('Delete')); ?></button>
            </div>

          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($messages) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO MESSAGE FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Listing Title')); ?></th>
                        <th scope="col"><?php echo e(__('Name')); ?></th>
                        <th scope="col"><?php echo e(__('Email ID')); ?></th>
                        <th scope="col"><?php echo e(__('Phone')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($message->id); ?>">
                          </td>
                          <?php
                            $listing_content = App\Models\Listing\ListingContent::where([
                                ['listing_id', $message->listing_id],
                                ['language_id', $language->id],
                            ])->first();
                          ?>

                          <td class="title">
                            <?php if(!empty($listing_content)): ?>
                              <a href="<?php echo e(route('frontend.listing.details', ['slug' => $listing_content->slug, 'id' => $message->listing_id])); ?>"
                                target="_blank">
                                <?php echo e(strlen($listing_content->title) > 40 ? mb_substr($listing_content->title, 0, 40, 'utf-8') . '...' : $listing_content->title); ?>

                              </a>
                            <?php endif; ?>
                          </td>

                          <td><?php echo e($message->name); ?></td>
                          <td><a href="mailto:<?php echo e($message->email); ?>"><?php echo e($message->email); ?></a>
                          </td>
                          <td> <a href="tel:<?php echo e($message->phone); ?>"><?php echo e($message->phone); ?></a>
                          </td>
                          <td>
                            <a class="btn btn-secondary btn-sm  mt-1 mr-1 editBtn" href="#" data-toggle="modal"
                              data-target="#editModal" data-id="<?php echo e($message->id); ?>" data-name="<?php echo e($message->name); ?>"
                              data-phone="<?php echo e($message->phone); ?>" data-message="<?php echo e($message->message); ?>"
                              data-email="<?php echo e($message->email); ?>">
                              <span class="btn-label">
                                <i class="fas fa-eye"></i>
                              </span>
                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.listing.message.delete_message')); ?>"method="post">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="message_id" value="<?php echo e($message->id); ?>">
                              <button type="submit" class="btn btn-danger mt-1 btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                              </button>
                            </form>
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
            <?php echo e($messages->appends([
                    'language' => request()->input('language'),
                ])->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('admin.message.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/message/listing.blade.php ENDPATH**/ ?>