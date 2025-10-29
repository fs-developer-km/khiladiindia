<script>
  'use strict';
  const baseURL = "<?php echo e(url('/')); ?>";
  const read_more = "Read More";
  const read_less = "Read Less";
  const show_more = "Show More+";
  const show_less = "Show Less-";
  var vapid_public_key = "<?php echo env('VAPID_PUBLIC_KEY'); ?>";
</script>

<!-- Jquery JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/jquery.min.js')); ?>"></script>
<!-- Popper JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/popper.min.js')); ?>"></script>
<!-- Bootstrap JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/bootstrap.min.js')); ?>"></script>
<!-- Bootstrap Datepicker JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Data Tables JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/datatables.min.js')); ?>"></script>
<!-- Nice Select JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/jquery.nice-select.min.js')); ?>"></script>
<!-- Select2 JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/select2.min.js')); ?>"></script>
<!-- Magnific Popup JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/jquery.magnific-popup.min.js')); ?>"></script>
<!-- Counter Up JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/vendors/jquery.waypoints.js')); ?>"></script>
<!-- Swiper Slider JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/swiper-bundle.min.js')); ?>"></script>
<!-- Lazysizes -->
<script src="<?php echo e(asset('assets/front/js/vendors/lazysizes.min.js')); ?>"></script>
<!-- Noui Range Slider JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/nouislider.min.js')); ?>"></script>
<!-- AOS JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/aos.min.js')); ?>"></script>
<!-- Mouse Hover JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/mouse-hover-move.js')); ?>"></script>
<!-- Svg Loader JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/svg-loader.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/front/js/floating-whatsapp.js')); ?>"></script>
<!-- Syotimer script JS -->
<script src="<?php echo e(asset('assets/admin/js/jquery-syotimer.min.js')); ?>"></script>

<!-- Leaflet Map JS -->
<script src="<?php echo e(asset('assets/front/js/vendors/leaflet.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/vendors/leaflet.fullscreen.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/vendors/leaflet.markercluster.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/js/toastr.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/js/push-notification.js')); ?>"></script>

<!-- Main script JS -->
<script src="<?php echo e(asset('assets/front/js/script.js')); ?>"></script>


<script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>



<?php if(!request()->routeIs('frontend.listing.details')): ?>
  <?php if($basicInfo->whatsapp_status == 1): ?>
    <script type="text/javascript">
      var whatsapp_popup = "<?php echo e($basicInfo->whatsapp_popup_status); ?>";
      var whatsappImg = "<?php echo e(asset('assets/img/whatsapp.svg')); ?>";
      $(function() {
        $('#WAButton').floatingWhatsApp({
          phone: "<?php echo e($basicInfo->whatsapp_number); ?>", //WhatsApp Business phone number
          headerTitle: "<?php echo e($basicInfo->whatsapp_header_title); ?>", //Popup Title
          popupMessage: `<?php echo nl2br($basicInfo->whatsapp_popup_message); ?>`, //Popup Message
          showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
          buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
          position: "left" //Position: left | right
        });
      });
    </script>
  <?php endif; ?>
<?php endif; ?>


<!--Start of Tawk.to Script-->
<?php if(!request()->routeIs('frontend.listing.details')): ?>
  <?php if($basicInfo->tawkto_status): ?>
    <script type="text/javascript">
      var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
      (function() {
        var s1 = document.createElement("script"),
          s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = "<?php echo e($basicInfo->tawkto_direct_chat_link); ?>";
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
      })();
    </script>
  <?php endif; ?>
<?php endif; ?>
<!--End of Tawk.to Script-->


<?php echo $__env->yieldContent('script'); ?>
<?php if(session()->has('success')): ?>
  <script>
    "use strict";
    toastr['success']("<?php echo e(__(session('success'))); ?>");
  </script>
<?php endif; ?>

<?php if(session()->has('error')): ?>
  <script>
    "use strict";
    toastr['error']("<?php echo e(__(session('error'))); ?>");
  </script>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
  <script>
    "use strict";
    toastr['warning']("<?php echo e(__(session('warning'))); ?>");
  </script>
<?php endif; ?>
<?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/frontend/partials/scripts.blade.php ENDPATH**/ ?>