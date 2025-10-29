<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Support Tickets')); ?></h4>
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
        <a href="#"><?php echo e(__('Support Tickets')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
          <?php if(!request()->filled('status')): ?>
            <?php echo e(__('All Tickets')); ?>

          <?php elseif(request()->filled('status') && request()->input('status') == 1): ?>
            <?php echo e(__('Pending Tickets')); ?>

          <?php elseif(request()->filled('status') && request()->input('status') == 2): ?>
            <?php echo e(__('Open Tickets')); ?>

          <?php elseif(request()->filled('status') && request()->input('status') == 3): ?>
            <?php echo e(__('Closed Tickets')); ?>

          <?php endif; ?>
        </a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6">
              <div class="card-title d-inline-block">
                <?php echo e(__('Support Tickets')); ?>

              </div>
            </div>
            <div class="col-lg-6">
              <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                data-href="<?php echo e(route('admin.support_tickets.bulk_delete')); ?>"><i class="flaticon-interface-5"></i>
                <?php echo e(__('Delete')); ?></button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">

              <?php if(session()->has('course_status_warning')): ?>
                <div class="alert alert-warning">
                  <p class="text-dark mb-0"><?php echo e(session()->get('course_status_warning')); ?></p>
                </div>
              <?php endif; ?>

              <?php if(count($collection) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO SUPPORT TICKETS FOUND ') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                          <input type="checkbox" class="bulk-check" data-val="all">
                        </th>
                        <th scope="col"><?php echo e(__('Ticket ID')); ?></th>
                        <th scope="col"><?php echo e(__('User Type')); ?></th>
                        <th scope="col"><?php echo e(__('Username')); ?></th>
                        <th scope="col"><?php echo e(__('Email')); ?></th>
                        <th scope="col"><?php echo e(__('Subject')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Assigned Staff')); ?></th>
                        <th scope="col"><?php echo e(__('Action')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="<?php echo e($item->id); ?>">
                          </td>
                          <td>
                            <?php echo e($item->id); ?>

                          </td>
                          <td>
                            <?php if($item->user_type == 'vendor'): ?>
                              <span class="badge badge-success"><?php echo e(__('Vendor')); ?></span>
                            <?php else: ?>
                              <span class="badge badge-primary"><?php echo e(__('Customer')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($item->user_type == 'vendor'): ?>
                              <?php if($item->vendor): ?>
                                <a
                                  href="<?php echo e(route('admin.vendor_management.vendor_details', [$item->vendor->id, 'language' => $defaultLang->code])); ?>"><?php echo e($item->vendor->username); ?></a>
                              <?php else: ?>
                                <?php echo e('-'); ?>

                              <?php endif; ?>
                            <?php else: ?>
                              <span class="badge badge-info"><?php echo e(@$item->user->username); ?></span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php echo e($item->email != '' ? $item->email : '-'); ?>

                          </td>
                          <td>
                            <?php echo e($item->subject); ?>

                          </td>
                          <td>
                            <?php if($item->status == 1): ?>
                              <span class="badge badge-info"><?php echo e(__('Pending')); ?></span>
                            <?php elseif($item->status == 2): ?>
                              <span class="badge badge-success"><?php echo e(__('Open')); ?></span>
                            <?php elseif($item->status == 3): ?>
                              <span class="badge badge-danger"><?php echo e(__('Closed')); ?></span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if(!empty($item->admin_id)): ?>
                              <span class="badge badge-info p-2"><?php echo e(@$item->admin->username); ?></span>
                              <a href="<?php echo e(route('admin.support_tickets.unassign', $item->id)); ?>"
                                title="<?php echo e(__('Remove')); ?>" class="btn btn-danger rounded-circle btn-sm"><i
                                  class="fas fa-times text-white"></i>
                              </a>
                            <?php else: ?>
                              <?php echo e('-'); ?>

                            <?php endif; ?>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(__('Select')); ?>

                              </button>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php if(empty(Auth::guard('admin')->user()->role_id)): ?>
                                  <?php if(!empty($item->admin_id)): ?>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                      <?php echo e(__('Assigned to ')); ?><?php echo e(@$item->admin->username); ?>

                                    </a>
                                  <?php else: ?>
                                    <a href="javascript:void(0)" data-toggle="modal"
                                      data-target="#exampleModal<?php echo e($item->id); ?>" class="dropdown-item">
                                      <?php echo e(__('Assing To')); ?>

                                    </a>
                                  <?php endif; ?>
                                <?php endif; ?>
                                <a href="<?php echo e(route('admin.support_tickets.message', $item->id)); ?>" class="dropdown-item">
                                  <?php echo e(__('Message')); ?>

                                </a>
                                <form class="deleteForm d-block"
                                  action="<?php echo e(route('admin.support_tickets.delete', $item->id)); ?>" method="post">
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
          <?php echo e($collection->links()); ?>

        </div>
      </div>
    </div>
  </div>


  <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Assign Staff')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo e(route('assign_stuff.supoort.ticket', $item->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <?php
                  $admins = App\Models\Admin::where('role_id', '!=', null)->get();
                ?>
                <label for=""><?php echo e(__('Staff')); ?> *</label>
                <select name="admin_id" id="" class="form-control">
                  <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->first_name); ?> <?php echo e($admin->last_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
              <button type="submit" class="btn btn-primary"><?php echo e(__('Assign')); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/support_ticket/index.blade.php ENDPATH**/ ?>