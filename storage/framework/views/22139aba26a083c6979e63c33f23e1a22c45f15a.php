 <div class="modal social-media-modal fade" id="socialMediaModal" tabindex="-1" role="dialog"
   aria-labelledby="socialMediaModalTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Share on')); ?></h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="actions">
           <div class="action-btn">
             <a class="facebook"
               href="//www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>&src=sdkpreparse"target="_blank">
               <i class="fab fa-facebook-f"></i>
               <span><?php echo e($keywords['Facebook'] ?? 'Facebook'); ?></span>
             </a>
           </div>
           <div class="action-btn">
             <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>"
               class="linkedin" target="_blank">
               <i class="fab fa-linkedin-in"></i>
               <span><?php echo e($keywords['Linkedin'] ?? 'Linkedin'); ?></span>
             </a>
           </div>

           <div class="action-btn">
             <a class="twitter" href="//twitter.com/intent/tweet?text=<?php echo e(url()->current()); ?>"target="_blank">
               <i class="fab fa-twitter"></i>
               <span><?php echo e($keywords['Twitter'] ?? 'Twitter'); ?></span>
             </a>
           </div>
           <div class="action-btn">
             <a class="whatsapp" href="whatsapp://send?text=<?php echo e(urlencode(url()->current())); ?>"target="_blank">
               <i class="fab fa-whatsapp"></i>
               <span><?php echo e($keywords['Whatsapp'] ?? 'Whatsapp'); ?></span>
             </a>
           </div>
           <div class="action-btn">
             <a href="sms:?body=<?php echo e(url()->current()); ?>" class="sms"target="_blank">
               <i class="fas fa-sms"></i>
               <span><?php echo e($keywords['SMS'] ?? 'SMS'); ?></span>
             </a>
           </div>
           <div class="action-btn">
             <a class="mail"
               href="mailto:?subject=Digital Card&amp;body=Check out this digital card <?php echo e(urlencode(url()->current())); ?>"
               target="_blank">
               <i class="fas fa-at"></i>
               <span><?php echo e($keywords['Mail'] ?? 'Mail'); ?></span>
             </a>
           </div>

         </div>
       </div>
     </div>
   </div>
 </div>
<?php /**PATH /home/u978586496/domains/kineticsage.com/public_html/khiladiindia/resources/views/frontend/journal/share.blade.php ENDPATH**/ ?>