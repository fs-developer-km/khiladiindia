<!DOCTYPE html>
<html lang="xxx" dir="<?php echo e($currentLanguageInfo->direction == 1 ? 'rtl' : ''); ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="KreativDev">

  <meta name="keywords" content="<?php echo $__env->yieldContent('metaKeywords'); ?>">
  <meta name="description" content="<?php echo $__env->yieldContent('metaDescription'); ?>">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta property="og:title" content="<?php echo $__env->yieldContent('sharetitle'); ?>">
  <meta property="og:title" content="<?php echo $__env->yieldContent('sharetitle'); ?>">
  <meta property="og:image" content="<?php echo $__env->yieldContent('shareimage'); ?>">
  
  <title><?php echo $__env->yieldContent('pageHeading'); ?> <?php echo e('| ' . $websiteInfo->website_title); ?></title>
  
  <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/img/' . $websiteInfo->favicon)); ?>">
  <link rel="apple-touch-icon" href="<?php echo e(asset('assets/img/' . $websiteInfo->favicon)); ?>">

  <?php if ($__env->exists('frontend.partials.styles')) echo $__env->make('frontend.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class=" <?php if(
    ($basicInfo->theme_version == 2 && !request()->routeIs('index')) ||
        ($basicInfo->theme_version == 3 && !request()->routeIs('index'))): ?> theme_2_3 <?php endif; ?>">
  <!-- Preloader start -->
  <?php if($basicInfo->preloader_status == 1): ?>
    <div id="preLoader">
      <img src="<?php echo e(asset('assets/img/' . $basicInfo->preloader)); ?>" alt="">
    </div>
  <?php endif; ?>
  <!-- Preloader end -->

  <div class="request-loader">
    <img src="<?php echo e(asset('assets/img/' . $basicInfo->preloader)); ?>" alt="">
  </div>

  <!-- Header-area start -->
  <?php if($basicInfo->theme_version == 1): ?>
    <?php if ($__env->exists('frontend.partials.header.header-v1')) echo $__env->make('frontend.partials.header.header-v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif($basicInfo->theme_version == 2): ?>
    <?php if ($__env->exists('frontend.partials.header.header-v2')) echo $__env->make('frontend.partials.header.header-v2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif($basicInfo->theme_version == 3): ?>
    <?php if ($__env->exists('frontend.partials.header.header-v3')) echo $__env->make('frontend.partials.header.header-v3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif($basicInfo->theme_version == 4): ?>
    <?php if ($__env->exists('frontend.partials.header.header-v4')) echo $__env->make('frontend.partials.header.header-v4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
  <!-- Header-area end -->

  <?php echo $__env->yieldContent('content'); ?>

  <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Go to Top -->
  <div class="go-top"><i class="fal fa-angle-up"></i></div>
  <!-- Go to Top -->

  <?php if ($__env->exists('frontend.partials.popups')) echo $__env->make('frontend.partials.popups', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php if(!is_null($cookieAlertInfo) && $cookieAlertInfo->cookie_alert_status == 1): ?>
    <?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <!-- WhatsApp Chat Button -->
  <!-- WhatsApp Chat Button -->
  <?php if(!request()->routeIs('frontend.listing.details')): ?>
    <div id="WAButton" class="whatsapp-btn-1"></div>
  <?php endif; ?>

  <?php if($basicInfo->shop_status == 1): ?>
    <!-- Floating Cart Button -->
    <div id="cartIconWrapper" class="cartIconWrapper">
      <?php
        $position = $basicInfo->base_currency_symbol_position;
        $symbol = $basicInfo->base_currency_symbol;
        $totalPrice = 0;
        if (session()->has('productCart')) {
            $productCarts = session()->get('productCart');
            foreach ($productCarts as $key => $product) {
                $totalPrice += $product['price'];
            }
        }
        $totalPrice = number_format($totalPrice);
        $productCartQuantity = 0;
        if (session()->has('productCart')) {
            foreach (session()->get('productCart') as $value) {
                $productCartQuantity = $productCartQuantity + $value['quantity'];
            }
        }
      ?>
      <a href="<?php echo e(route('shop.cart')); ?> " class="d-block" id="cartIcon">
        <div class="cart-length">
          <i class="fal fa-shopping-bag"></i>
          <span class="length totalItems">
            <?php echo e($productCartQuantity); ?> <?php echo e(__('Items')); ?>

          </span>
        </div>
        <div class="cart-total">
          <?php echo e($position == 'left' ? $symbol : ''); ?><span
            class="totalPrice"><?php echo e($totalPrice); ?></span><?php echo e($position == 'right' ? $symbol : ''); ?>

        </div>
      </a>
    </div>
    <!-- Floating Cart Button End-->
  <?php endif; ?>

  <?php echo $__env->make('frontend.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/layout.blade.php ENDPATH**/ ?>