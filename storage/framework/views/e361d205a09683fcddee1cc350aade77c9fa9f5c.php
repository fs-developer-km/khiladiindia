<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h4 class="page-title"><?php echo e(__('Add Job Posting')); ?></h4>
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
            <a href="#"><?php echo e(__('Job Postings')); ?></a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#"><?php echo e(__('Add Job Posting')); ?></a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('vendor.job_posting.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group mb-3">
                        <label><?php echo e(__('Job Title')); ?></label>
                        <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" required>
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label><?php echo e(__('Description')); ?></label>
                        <textarea class="form-control" name="description" rows="5" required><?php echo e(old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label><?php echo e(__('Location')); ?></label>
                        <input type="text" class="form-control" name="location" value="<?php echo e(old('location')); ?>" required>
                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label><?php echo e(__('Salary')); ?></label>
                        <input type="text" class="form-control" name="salary" value="<?php echo e(old('salary')); ?>">
                        <?php $__errorArgs = ['salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group mb-3">
                        <label><?php echo e(__('Deadline')); ?></label>
                        <input type="date" class="form-control" name="deadline" value="<?php echo e(old('deadline')); ?>">
                        <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo e(__('Add Job Posting')); ?></button>
                    <a href="<?php echo e(route('vendor.job_posting.listing')); ?>" class="btn btn-secondary"><?php echo e(__('Back to Listings')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/job_posting/create.blade.php ENDPATH**/ ?>