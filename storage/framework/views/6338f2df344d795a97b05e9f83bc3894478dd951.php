<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Conversations')); ?></h4>
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
        <a href="<?php echo e(route('admin.support_tickets')); ?>"><?php echo e(__('Tickets')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Conversations')); ?></a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <?php
                $vendori = App\Models\Vendor::Where('id', $ticket->user_id)->first();
              ?>
              <div class="card-title d-inline-block"><?php echo e(__('Ticket Details') . ' -'); ?> <a
                  href="<?php echo e(route('admin.vendor_management.vendor_details', ['id' => $ticket->user_id, 'language' => $defaultLang->code])); ?>"
                  class="btn btn-primary text-dark"><?php echo e($vendori->username); ?></a></div>

            </div>
            <div class="col-lg-3 offset-lg-5 mt-2 mt-lg-0 text-right">
              <a href="<?php echo e(route('admin.support_tickets')); ?>" class="btn btn-primary btn-md"><?php echo e(__('Back to Lists')); ?></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <h3 class="text-white"><?php echo e($ticket->subject); ?></h3>

                  <?php if($ticket->status != 3): ?>
                    <form class=" d-block" action="<?php echo e(route('admin.support_ticket.close', $ticket->id)); ?>" method="post"
                      id="closeForm">

                      <?php echo csrf_field(); ?>
                      <button class="close-ticket btn btn-success btn-md TicketCloseBtn" data-href=""><i
                          class="fas fa-check mr-1"></i> <?php echo e(__('Close Ticket')); ?></button>
                    </form>
                  <?php endif; ?>
                </div>
                <div class="col-lg-12 my-3">
                  <?php if($ticket->status == 1): ?>
                    <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                  <?php elseif($ticket->status == 2): ?>
                    <span class="badge badge-primary"><?php echo e(__('Open')); ?></span>
                  <?php else: ?>
                    <span class="badge badge-danger"><?php echo e(__('Closed')); ?></span>
                  <?php endif; ?>
                  <span class="badge badge-secondary"><?php echo e(date('dS F Y, h.i A', strtotime($ticket->created_at))); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 offset-lg-2">
                  <p class="font-16"><?php echo $ticket->description; ?></p>
                  <?php if($ticket->attachment): ?>
                    <a href="<?php echo e(asset('assets/admin/img/support-ticket/attachment/' . $ticket->attachment)); ?>"
                      download="<?php echo e(__('support_file')); ?>" class="btn btn-primary"><i class="fas fa-download"></i>
                      <?php echo e(__('Download Attachment')); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="<?php echo e($ticket->status == 3 ? 'col-lg-12' : 'col-lg-6'); ?>">
      <div class="card card-round">
        <div class="card-body">
          <div class="card-title fw-mediumbold"><?php echo e(__('Replies')); ?></div>
          <div class="card-list">
            <div class="messages-container">
              <?php if(count($ticket->messages) > 0): ?>
                <?php $__currentLoopData = $ticket->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($reply->type == 2): ?>
                    <?php
                      $admin = App\Models\Admin::where('id', $reply->user_id)->first();
                    ?>
                    <div class="item-list">
                      <div class="avatar">
                        <img
                          src="<?php echo e($admin->image ? asset('assets/img/admins/' . $admin->image) : asset('assets/admin/img/blank_user.jpg')); ?>"
                          alt="..." class="avatar-img rounded-circle">
                      </div>
                      <div class="info-user ml-3">
                        <div class="username"><?php echo e($admin->username); ?></div>
                        <div class="status"><?php echo e($admin->id == 1 ? 'Super Admin' : $admin->role->name); ?></div>
                        <p><?php echo $reply->reply; ?></p>
                        <?php if($reply->file): ?>
                          <a href="<?php echo e(asset('assets/admin/img/support-ticket/' . $reply->file)); ?>"
                            download="support_file" class="btn btn-rounded btn-info btn-sm"><?php echo e(__('Download')); ?></a>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php else: ?>
                    <?php if($reply->type == 1): ?>
                      <?php
                        $user = App\Models\User::where('id', $ticket->user_id)->first();
                      ?>
                      <div class="item-list">
                        <div class="avatar">
                          <?php if($user->image): ?>
                            <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets/img/users/' . $user->image)); ?>"
                              alt="user-photo">
                          <?php else: ?>
                            <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets/img/blank-user.jpg')); ?>"
                              alt="user-photo">
                          <?php endif; ?>
                        </div>
                        <div class="info-user ml-3">
                          <div class="username"><?php echo e($user->username); ?></div>
                          <div class="status"><?php echo e(__('Customer')); ?></div>
                          <p><?php echo $reply->reply; ?></p>
                          <?php if($reply->file): ?>
                            <a href="<?php echo e(asset('assets/admin/img/support-ticket/' . $reply->file)); ?>"
                              download="support_file" class="btn btn-rounded btn-info btn-sm"><?php echo e(__('Download')); ?></a>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php elseif($reply->type == 3): ?>
                      <?php
                        $vendor = App\Models\Vendor::where('id', $ticket->user_id)->first();
                      ?>
                      <div class="item-list">
                        <div class="avatar">
                          <?php if($vendor): ?>
                            <?php if($vendor->photo): ?>
                              <img class="avatar-img rounded-circle"
                                src="<?php echo e(asset('assets/admin/img/vendor-photo/' . $vendor->photo)); ?>" alt="user-photo">
                            <?php else: ?>
                              <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets/img/blank_user.jpg')); ?>"
                                alt="user-photo">
                            <?php endif; ?>
                          <?php else: ?>
                            <img class="avatar-img rounded-circle" src="<?php echo e(asset('assets/img/blank_user.jpg')); ?>"
                              alt="user-photo">
                          <?php endif; ?>

                        </div>
                        <div class="info-user ml-3">
                          <div class="username"><a
                              href="<?php echo e(route('admin.vendor_management.vendor_details', ['id' => $ticket->user_id, 'language' => $defaultLang->code])); ?>">
                              <?php echo e(@$vendor->username); ?></a></div>
                          <div class="status"><?php echo e(__('Vendor')); ?></div>
                          <p><?php echo $reply->reply; ?></p>
                          <?php if($reply->file): ?>
                            <a href="<?php echo e(asset('assets/admin/img/support-ticket/' . $reply->file)); ?>"
                              download="support_file" class="btn btn-rounded btn-info btn-sm"><?php echo e(__('Download')); ?></a>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php if($ticket->status != 3): ?>
      <div class="col-lg-6 message-type">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-title fw-mediumbold mb-2"><?php echo e(__('Reply to Ticket')); ?></div>
            <form action="<?php echo e(route('admin.support_ticket.reply', $ticket->id)); ?>" id="ajaxform" method="POST"
              enctype="multipart/form-data"><?php echo csrf_field(); ?>
              <div class="form-group">
                <label for=""><?php echo e(__('Message')); ?> *</label>
                <textarea name="reply" class="summernote" data-height="200"></textarea>
                <?php $__errorArgs = ['reply'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="em text-danger mb-0" id="errreply"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for=""><?php echo e(__('Attachment')); ?></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input"
                      data-href="<?php echo e(route('admin.support_ticket.zip_file.upload')); ?>" name="file" id="zip_file">
                    <label class="custom-file-label" for="zip_file"><?php echo e(__('Choose file')); ?></label>
                  </div>
                </div>
                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="em text-danger mb-0" id="errfile"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <p class="mb-0 show-name"><small></small></p>
                <div class="progress progress-sm d-none">
                  <div class="progress-bar bg-success " role="progressbar" aria-valuenow="" aria-valuemin="0"
                    aria-valuemax=""></div>
                </div>
                <p class="text-warning"><?php echo e(__('Upload only ZIP Files, Max File Size is 20 MB')); ?></p>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success"><?php echo e(__('Message')); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/support-ticket.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/support_ticket/messages.blade.php ENDPATH**/ ?>