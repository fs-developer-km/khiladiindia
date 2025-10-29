<!-- Header-area start -->
<header class="header-area header-2" data-aos="slide-down">
  <!-- Start mobile menu -->
  <div class="mobile-menu">
    <div class="container">
      <div class="mobile-menu-wrapper"></div>
    </div>
  </div>
  <!-- End mobile menu -->

  <div class="main-responsive-nav">
    <div class="container">
      <!-- Mobile Logo -->
      <div class="logo">
        <?php if(!empty($websiteInfo->logo)): ?>
          <a href="<?php echo e(route('index')); ?>">
            <img src="<?php echo e(asset('assets/img/' . $websiteInfo->logo)); ?>" alt="logo">
          </a>
        <?php endif; ?>
      </div>
      <!-- Menu toggle button -->
      <button class="menu-toggler" type="button">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
  <div class="main-navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand" href="<?php echo e(route('index')); ?>">
          <img src="<?php echo e(asset('assets/img/' . $websiteInfo->logo)); ?>" alt="logo">
        </a>
        <!-- Navigation items -->
        <div class="collapse navbar-collapse">
          <?php $menuDatas = json_decode($menuInfos); ?>
          <ul id="mainMenu" class="navbar-nav mobile-item mx-auto">
            <?php $__currentLoopData = $menuDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $href = get_href($menuData); ?>
              <?php if(!property_exists($menuData, 'children')): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e($href); ?>"><?php echo e($menuData->text); ?></a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link toggle" href="<?php echo e($href); ?>"><?php echo e($menuData->text); ?><i
                      class="fal fa-plus"></i></a>
                  <ul class="menu-dropdown">
                    <?php $childMenuDatas = $menuData->children; ?>
                    <?php $__currentLoopData = $childMenuDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenuData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $child_href = get_href($childMenuData); ?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e($child_href); ?>"><?php echo e($childMenuData->text); ?></a>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <div class="more-option mobile-item">
          <!--<div class="item item-language">-->
          <!--  <div class="language">-->
          <!--    <form action="<?php echo e(route('change_language')); ?>" method="GET">-->
          <!--      <select class="niceselect" name="lang_code" onchange="this.form.submit()">-->
          <!--        <?php $__currentLoopData = $allLanguageInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
          <!--          <option value="<?php echo e($languageInfo->code); ?>"-->
          <!--            <?php echo e($languageInfo->code == $currentLanguageInfo->code ? 'selected' : ''); ?>>-->
          <!--            <?php echo e($languageInfo->name); ?>-->
          <!--          </option>-->
          <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
          <!--      </select>-->
          <!--    </form>-->
          <!--  </div>-->
          <!--</div>-->
          <div class="item">
            <div class="dropdown">
              <button class="btn btn-outline btn-md radius-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php if(!Auth::guard('web')->check()): ?>
                  <?php echo e(__('Customer')); ?>

                <?php else: ?>
                  <?php echo e(Auth::guard('web')->user()->username); ?>

                <?php endif; ?>
              </button>
              <ul class="dropdown-menu radius-sm text-transform-normal">
                <?php if(!Auth::guard('web')->check()): ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('user.signup')); ?>"><?php echo e(__('Signup')); ?></a></li>
                <?php else: ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"><?php echo e(__('Logout')); ?></a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="item">
            <div class="dropdown">
              <button class="btn btn-primary btn-md dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php if(!Auth::guard('vendor')->check()): ?>
                  <?php echo e(__('Vendor')); ?>

                <?php else: ?>
                  <?php echo e(Auth::guard('vendor')->user()->username); ?>

                <?php endif; ?>
              </button>
              <ul class="dropdown-menu radius-0">
                <?php if(!Auth::guard('vendor')->check()): ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('vendor.login')); ?>"><?php echo e(__('Login')); ?></a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('vendor.signup')); ?>"><?php echo e(__('Signup')); ?></a></li>
                <?php else: ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('vendor.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>

                  <li><a class="dropdown-item" href="<?php echo e(route('vendor.logout')); ?>"><?php echo e(__('Logout')); ?></a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>

        </div>
      </nav>
    </div>
  </div>
</header>
<!-- Header-area end -->
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/partials/header/header-v2.blade.php ENDPATH**/ ?>