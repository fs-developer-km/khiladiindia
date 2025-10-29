<?php $__env->startSection('content'); ?>
  <div class="page-header">
    <h4 class="page-title"><?php echo e(__('Language Management')); ?></h4>
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
        <a href="#"><?php echo e(__('Language Management')); ?></a>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block"><?php echo e(__('Languages')); ?></div>
          <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-plus"></i> <?php echo e(__('Add')); ?>

          </a>
          <a href="#" class="btn btn-secondary btn-sm mr-1 mb-1 float-lg-right float-left editBtn"
            data-toggle="modal" data-target="#addModal">
            <span class="btn-label">
              <i class="fas fa-plus"></i>
            </span>
            <?php echo e(__('Add New Keyword')); ?>

          </a>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if(count($languages) == 0): ?>
                <h3 class="text-center"><?php echo e(__('NO LANGUAGE FOUND') . '!'); ?></h3>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped mt-3" id="basic-datatables">
                    <thead>
                      <tr>
                        <th scope="col"><?php echo e(__('#')); ?></th>
                        <th scope="col"><?php echo e(__('Name')); ?></th>
                        <th scope="col"><?php echo e(__('Code')); ?></th>
                        <th scope="col"><?php echo e(__('Direction')); ?></th>
                        <th scope="col"><?php echo e(__('Website Language')); ?></th>
                        <th scope="col"><?php echo e(__('Actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($language->name); ?></td>
                          <td><?php echo e($language->code); ?></td>
                          <td><?php echo e($language->direction == 1 ? __('RTL') : __('LTR')); ?></td>
                          <td>
                            <?php if($language->is_default == 1): ?>
                              <strong class="badge badge-success"><?php echo e(__('Default')); ?></strong>
                            <?php else: ?>
                              <form class="d-inline-block"
                                action="<?php echo e(route('admin.language_management.make_default_language', ['id' => $language->id])); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-primary btn-sm" type="submit" name="button">
                                  <?php echo e(__('Make Default')); ?>

                                </button>
                              </form>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="#" class="btn  mt-1 btn-secondary btn-sm mr-1 editBtn" data-toggle="modal"
                              data-target="#editModal" data-id="<?php echo e($language->id); ?>" data-name="<?php echo e($language->name); ?>"
                              data-code="<?php echo e($language->code); ?>" data-direction="<?php echo e($language->direction); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              <?php echo e(__('Edit')); ?>

                            </a>

                            <a class="btn btn-info  mt-1 btn-sm mr-1"
                              href="<?php echo e(route('admin.language_management.edit_keyword', $language->id)); ?>">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              <?php echo e(__('Edit Keyword')); ?>

                            </a>

                            <form class="deleteForm d-inline-block"
                              action="<?php echo e(route('admin.language_management.delete', ['id' => $language->id])); ?>"
                              method="post">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-danger  mt-1 btn-sm deleteBtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <?php echo e(__('Delete')); ?>

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
      </div>
    </div>
  </div>

  
  <?php echo $__env->make('admin.language.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->make('admin.language.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Keyword')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form id="ajaxForm2" action="<?php echo e(route('admin.language_management.add_keyword')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for=""><?php echo e(__('Keyword*')); ?></label>
              <input type="text" class="form-control" name="keyword" placeholder="Enter Keyword">
              <p id="err_keyword" class="mt-1 mb-0 text-danger em"></p>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <?php echo e(__('Close')); ?>

          </button>
          <button id="submitBtn2" type="button" class="btn btn-primary btn-sm">
            <?php echo e(__('Submit')); ?>

          </button>
        </div>
      </div>
    </div>
  </div>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/admin/language/index.blade.php ENDPATH**/ ?>