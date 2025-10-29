<div class="page-title-area ptb-100">
  <!-- Background Image -->
  <img class="lazyload blur-up bg-img"
    <?php if(!empty($breadcrumb)): ?> src="<?php echo e(asset('assets/img/' . $breadcrumb)); ?>" <?php else: ?> 
    src="<?php echo e(asset('assets/front/images/page-title-bg.jpg')); ?>" <?php endif; ?>
    alt="Bg-img">
  <div class="container">
    <div class="content">
      <h3> <?php echo e(!empty($heading) ? $heading : ''); ?>

      </h3>
      <ul class="list-unstyled">
        <li class="d-inline"><a href="<?php echo e(route('index')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="d-inline">></li>
        <li class="d-inline active"><?php echo e(!empty($title) ? $title : ''); ?></li>
      </ul>
    </div>
  </div>
</div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/partials/details-breadcrumb.blade.php ENDPATH**/ ?>