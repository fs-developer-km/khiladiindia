<!DOCTYPE html>
<html>

<head>
  
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  
  <title><?php echo e(__('Vendor') . ' | ' . $websiteInfo->website_title); ?></title>

  
  <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/img/' . $websiteInfo->favicon)); ?>">

  
  <?php if ($__env->exists('vendors.partials.styles')) echo $__env->make('vendors.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->yieldContent('style'); ?>
</head>

<body data-background-color="<?php echo e(Session::get('vendor_theme_version') == 'light' ? 'white2' : 'dark'); ?>">
  
  <div class="request-loader">
    <img src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader">
  </div>
  

  <div class="wrapper">
    
    <?php if ($__env->exists('vendors.partials.top-navbar')) echo $__env->make('vendors.partials.top-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
    <?php if ($__env->exists('vendors.partials.side-navbar')) echo $__env->make('vendors.partials.side-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>

      
      <?php if ($__env->exists('vendors.partials.footer')) echo $__env->make('vendors.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
    </div>
  </div>
  <?php if ($__env->exists('vendors.check-limit')) echo $__env->make('vendors.check-limit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php if ($__env->exists('vendors.partials.scripts')) echo $__env->make('vendors.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->yieldContent('variables'); ?>
  <?php echo $__env->yieldContent('script'); ?>
  <?php echo $__env->yieldContent('style'); ?>
</body>

</html>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/vendors/layout.blade.php ENDPATH**/ ?>