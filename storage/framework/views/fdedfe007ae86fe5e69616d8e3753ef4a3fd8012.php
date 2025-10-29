<div class="sidebar-widget">
  <h4 class="widget-title"><?php echo e(__('Job Categories')); ?></h4>
  <ul class="list-unstyled">
    <li><a href="<?php echo e(route('frontend.jobs.index', ['category' => 'it'])); ?>"><?php echo e(__('IT & Software')); ?></a></li>
    <li><a href="<?php echo e(route('frontend.jobs.index', ['category' => 'marketing'])); ?>"><?php echo e(__('Marketing')); ?></a></li>
    <li><a href="<?php echo e(route('frontend.jobs.index', ['category' => 'design'])); ?>"><?php echo e(__('Design')); ?></a></li>
  </ul>
</div>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/jobs/side-bar.blade.php ENDPATH**/ ?>