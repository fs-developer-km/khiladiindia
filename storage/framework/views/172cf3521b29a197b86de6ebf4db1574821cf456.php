<!-- Footer-area start -->
<footer class="footer-area bg-primary-light" data-aos="fade-up">
  <div class="footer-top pt-100 pb-70">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
          <div class="footer-widget">
            <div class="navbar-brand">
              <?php if(!empty($basicInfo->footer_logo)): ?>
                <a href="<?php echo e(route('index')); ?>">
                  <img src="<?php echo e(asset('assets/img/' . $basicInfo->footer_logo)); ?>" alt="Logo">
                </a>
              <?php endif; ?>
            </div>
            <p><?php echo e(!empty($footerInfo) ? $footerInfo->about_company : ''); ?></p>
            <?php if(count($socialMediaInfos) > 0): ?>
              <div class="social-link">
                <?php $__currentLoopData = $socialMediaInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e($socialMediaInfo->url); ?>" target="_blank"><i class="<?php echo e($socialMediaInfo->icon); ?>"></i></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
          <div class="footer-widget">
            <h3><?php echo e(__('Useful Links')); ?></h3>
            <?php if(count($quickLinkInfos) == 0): ?>
              <p class="mb-0"><?php echo e(__('No Link Found') . '!'); ?></p>
            <?php else: ?>
              <ul class="footer-links">
                <?php $__currentLoopData = $quickLinkInfos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quickLinkInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <a href="<?php echo e($quickLinkInfo->url); ?>"><?php echo e($quickLinkInfo->title); ?></a>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7">
          <div class="footer-widget">
            <h3><?php echo e(__('Contact Us')); ?></h3>
            <ul class="info-list">
              <li>
                <i class="fal fa-map-marker-alt"></i>
                <?php if(!empty($basicInfo->address)): ?>
                  <span><?php echo e($basicInfo->address); ?></span>
                <?php endif; ?>
              </li>
              <li>
                <i class="fal fa-phone-plus"></i>
                <a href="tel:<?php echo e($basicInfo->contact_number); ?>"><?php echo e($basicInfo->contact_number); ?></a>
              </li>
              <?php if(!empty($basicInfo->email_address)): ?>
                <li>
                  <i class="fal fa-envelope"></i>
                  <a href="mailto:<?php echo e($basicInfo->email_address); ?>"><?php echo e($basicInfo->email_address); ?></a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-7 col-sm-12">
          <div class="footer-widget">
            <h4><?php echo e(__('Subscribe Us')); ?></h4>
            <p class="lh-1 mb-20"><?php echo e(__('Stay update with us and get offer') . '!'); ?></p>
            <div class="newsletter-form">
              <form id="newsletterForm" class="subscription-form" action="<?php echo e(route('store_subscriber')); ?>"
                method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <input class="form-control radius-0" placeholder="<?php echo e(__('Enter email')); ?>" type="text"
                    name="email_id" required="" autocomplete="off">
                  <button class="btn btn-md btn-primary" type="submit"><?php echo e(__('Subscribe')); ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copy-right-area border-top">
    <div class="container">
      <div class="copy-right-content">
        <span>
          <span>
            <?php if(isset($footerInfo->copyright_text)): ?>
              <?php echo @$footerInfo->copyright_text; ?>

            <?php else: ?>
              <?php echo e(__('Copyright ©2024. All Rights Reserved.')); ?>

            <?php endif; ?>
          </span>
      </div>
    </div>
  </div>
</footer>
<!-- Footer-area end-->
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/partials/footer.blade.php ENDPATH**/ ?>