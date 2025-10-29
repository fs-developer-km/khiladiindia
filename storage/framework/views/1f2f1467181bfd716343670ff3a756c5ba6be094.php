<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h4 class="page-title"><?php echo e(__('Job Postings')); ?></h4>
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
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('vendor.job_posting.create')); ?>" class="btn btn-primary mb-3"><?php echo e(__('Add Job Posting')); ?></a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Location')); ?></th>
                            <th><?php echo e(__('Salary')); ?></th>
                            <th><?php echo e(__('Deadline')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                              <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($job->title); ?></td>
                                <td><?php echo e($job->location); ?></td>
                                <td><?php echo e($job->salary ?? '-'); ?></td>
                                <td><?php echo e($job->deadline ?? '-'); ?></td>
                                <td><?php echo e($job->status ? 'Active' : 'Inactive'); ?></td>
                                <td>
    <a href="<?php echo e(route('vendor.job_posting.edit', $job->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

    <form action="<?php echo e(route('vendor.job_posting.delete', $job->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center"><?php echo e(__('No Job Postings found')); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendors.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/vendors/job_posting/listing.blade.php ENDPATH**/ ?>