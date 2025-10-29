<?php $__env->startSection('pageHeading'); ?>
  <?php echo e($job->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="padding-top: 120px;"> 
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm border rounded mb-5">
        <div class="card-body">
          <h2 class="card-title mb-3"><?php echo e($job->title); ?></h2>

          <p class="card-text mb-3"><?php echo e($job->description); ?></p>

          <ul class="list-unstyled mb-3">
            <li><strong><?php echo e(__('Location')); ?>:</strong> <?php echo e($job->location); ?></li>
            <?php if($job->salary): ?>
              <li><strong><?php echo e(__('Salary')); ?>:</strong> <?php echo e($job->salary); ?></li>
            <?php endif; ?>
            <li><strong><?php echo e(__('Deadline')); ?>:</strong> <?php echo e($job->deadline ? $job->deadline->format('d M, Y') : __('N/A')); ?></li>
            <li><strong><?php echo e(__('Posted By')); ?>:</strong> <?php echo e($job->vendor ? $job->vendor->username : 'Admin'); ?></li>
          </ul>

          <?php $user_id = Auth::check() ? Auth::id() : null; ?>
          <a href="<?php echo e($user_id ? ($job->wishlistedByUser($user_id) ? route('remove.jobwishlist', $job->id) : route('addto.jobwishlist', $job->id)) : '#'); ?>"
             class="btn btn-outline-primary">
            <i class="fal fa-heart me-1"></i> <?php echo e($user_id && $job->wishlistedByUser($user_id) ? __('Saved') : __('Save Job')); ?>

          </a>
        </div>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/jobs/show.blade.php ENDPATH**/ ?>