<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Admins')); ?></h4>
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
        <a href="#"><?php echo e(__('Admin Management')); ?></a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#"><?php echo e(__('Admins')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-4">
              <div class="card-title d-inline-block"><?php echo e(__('Admins')); ?></div>
            </div>

            <div class="col-lg-8 mt-2 mt-lg-0">
              <a href="#" data-toggle="modal" data-target="#createModal"
                class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                <?php echo e(__('Add Admin')); ?></a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($admins) == 0): ?>
                <h3 class="text-center mt-2"><?php echo e(__('NO ADMIN FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo e(__('Profile Picture')); ?></th>
                        <th scope="col"><?php echo e(__('Username')); ?></th>
                        <th scope="col"><?php echo e(__('Email ID')); ?></th>
                        <th scope="col"><?php echo e(__('Role')); ?></th>
                        <th scope="col"><?php echo e(__('Status')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td>
                            <img src="<?php echo e(asset('assets/img/admins/' . $admin->image)); ?>" alt="admin image"
                              width="45">
                          </td>
                          <td><?php echo e($admin->username); ?></td>
                          <td><?php echo e($admin->email); ?></td>
                          <td><?php echo e($admin->roleName); ?></td>
                          <td>
                            <form id="statusForm-<?php echo e($admin->id); ?>" class="d-inline-block"
                              action="<?php echo e(route('admin.admin_management.update_status', ['id' => $admin->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <select
                                class="form-control form-control-sm <?php echo e($admin->status == 1 ? 'bg-success' : 'bg-danger'); ?>"
                                name="status"
                                onchange="document.getElementById('statusForm-<?php echo e($admin->id); ?>').submit()">
                                <option value="1" <?php echo e($admin->status == 1 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Active')); ?>

                                </option>
                                <option value="0" <?php echo e($admin->status == 0 ? 'selected' : ''); ?>>
                                  <?php echo e(__('Deactive')); ?>

                                </option>
                              </select>
                            </form>
                          </td>
                          <td>
                            <a class="btn btn-secondary btn-sm  mt-1 mr-1 editBtn" href="#" data-toggle="modal"
                              data-target="#editModal" data-id="<?php echo e($admin->id); ?>"
                              data-role_id="<?php echo e($admin->role_id); ?>" data-first_name="<?php echo e($admin->first_name); ?>"
                              data-last_name="<?php echo e($admin->last_name); ?>"
                              data-image="<?php echo e(asset('assets/img/admins/' . $admin->image)); ?>"
                              data-username="<?php echo e($admin->username); ?>" data-email="<?php echo e($admin->email); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.admin_management.delete_admin', ['id' => $admin->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger  mt-1 btn-sm deleteBtn">
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

        <div class="card-footer"></div>
      </div>
    </div>
  </div>

  
  <?php echo $__env->make('admin.administrator.site-admin.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('admin.administrator.site-admin.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/administrator/site-admin/index.blade.php ENDPATH**/ ?>